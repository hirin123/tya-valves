<?php
/* ------------------------------------------------------------------
   Thank You America – catalog request handler
   1. Emails the requester a link to the catalog PDF
   2. Emails the lead details to TYA
   3. Saves the lead to leads/catalog-requests.csv
   Requires PHP with mail() enabled (standard on cPanel / most hosts).
   ------------------------------------------------------------------ */

// ===== SETTINGS: check these before going live =====
$SITE_URL    = 'https://tyallc.com/valves';         // where this site lives, no trailing slash
$CATALOGS    = [
    'ball' => ['/assets/TYA-Ball-Valve-Catalog.pdf', 'Ball valves'],
    'needle' => ['/assets/catalogs/TYA-Needle-Valve-Catalog.pdf', 'Needle valves'],
    'manifold' => ['/assets/catalogs/TYA-Manifold-Valve-Catalog.pdf', 'Manifold & gauge root valves'],
    'check' => ['/assets/catalogs/TYA-Check-Valve-Catalog.pdf', 'Check valves'],
    'bleed' => ['/assets/catalogs/TYA-Bleed-Purge-Valve-Catalog.pdf', 'Bleed & purge valves'],
    'mono' => ['/assets/catalogs/TYA-Monoflange-Valve-Catalog.pdf', 'DBB & monoflange valves'],
    'industrial' => ['/assets/catalogs/TYA-Industrial-Valve-Catalog.pdf', 'Industrial gate, globe & check valves'],
    'hp' => ['/assets/catalogs/TYA-High-Pressure-Valves-Catalog.pdf', 'High pressure valves & fittings'],
    'cdp' => ['/assets/catalogs/TYA-Condensate-Pots-Catalog.pdf', 'Condensate pots'],
];
$LEADS_TO    = 'contact@tyallc.com';                 // who receives new catalog requests
$FROM_EMAIL  = 'catalog@tyallc.com';                 // must be an address on your own domain
$FROM_NAME   = 'Thank You America LLC';
$PHONE       = '+1-281-949-6123';
// ====================================================

header('Content-Type: application/json; charset=utf-8');

function fail($msg, $code = 400) { http_response_code($code); echo json_encode(['ok' => false, 'error' => $msg]); exit; }
function clean($v, $max = 200) { $v = trim((string)$v); $v = str_replace(["\r", "\n"], ' ', $v); return mb_substr($v, 0, $max); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') fail('Method not allowed', 405);

// Spam traps: hidden field must stay empty, and the form must not be submitted instantly
if (!empty($_POST['website'])) fail('Spam check failed');
$started = (int)($_POST['started'] ?? 0);
if ($started && (time() * 1000 - $started) < 3000) fail('Please take a moment to fill in the form.');

$name     = clean($_POST['name'] ?? '');
$company  = clean($_POST['company'] ?? '');
$email    = clean($_POST['email'] ?? '', 254);
$country  = clean($_POST['country'] ?? '', 80);
$interest = clean($_POST['interest'] ?? '', 120);
$phone    = clean($_POST['phone'] ?? '', 40);
$catKey   = clean($_POST['catalog'] ?? 'ball', 20);
if (!isset($CATALOGS[$catKey])) $catKey = 'ball';
[$CATALOG, $catName] = $CATALOGS[$catKey];

if ($name === '' || $company === '' || $email === '' || $country === '') fail('Please fill in name, company, email and country.');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) fail('Please enter a valid email address.');

// Simple rate limit: 5 requests per IP per hour
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateFile = sys_get_temp_dir() . '/tya_rate_' . md5($ip);
$hits = array_filter(explode(',', @file_get_contents($rateFile) ?: ''), fn($t) => $t && $t > time() - 3600);
if (count($hits) >= 5) fail('Too many requests. Please email ' . $LEADS_TO . ' instead.', 429);
$hits[] = time(); @file_put_contents($rateFile, implode(',', $hits));

$link = $SITE_URL . $CATALOG;
$e = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
$fromHeader = '=?UTF-8?B?' . base64_encode($FROM_NAME) . "?= <$FROM_EMAIL>";

// ---- 1. Email to the requester ----
$boundary = 'b' . md5(uniqid('', true));
$text = "Hello $name,\n\nThank you for your interest in Thank You America $catName.\n\nDownload the catalog here:\n$link\n\n"
      . "It includes part numbers, dimensions, materials and ratings.\n\n"
      . "Need help choosing? Reply to this email with your fluid, pressure, temperature and connection details and we'll recommend a valve and quote.\n\n"
      . "Thank You America LLC\n4606 FM 1960 W #440-1050, Houston, TX 77070\n$PHONE | $LEADS_TO\n$SITE_URL\n";
$html = '<div style="font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:1.6;color:#1D2433;max-width:560px">'
      . '<p>Hello ' . $e($name) . ',</p>'
      . '<p>Thank you for your interest in Thank You America ' . $e($catName) . '.</p>'
      . '<p><a href="' . $e($link) . '" style="display:inline-block;background:#AE2230;color:#fff;text-decoration:none;font-weight:bold;padding:12px 22px;border-radius:4px">Download the ' . $e($catName) . ' catalog (PDF)</a></p>'
      . '<p>It includes part numbers, dimensions, materials and ratings.</p>'
      . '<p>Need help choosing? Reply to this email with your fluid, pressure, temperature and connection details and we\'ll recommend a valve and quote.</p>'
      . '<p style="color:#5A6476;font-size:13px">Thank You America LLC<br>4606 FM 1960 W #440-1050, Houston, TX 77070<br>' . $e($PHONE) . ' | <a href="mailto:' . $e($LEADS_TO) . '">' . $e($LEADS_TO) . '</a><br><a href="' . $e($SITE_URL) . '">' . $e($SITE_URL) . '</a></p></div>';
$body = "--$boundary\r\nContent-Type: text/plain; charset=UTF-8\r\n\r\n$text\r\n--$boundary\r\nContent-Type: text/html; charset=UTF-8\r\n\r\n$html\r\n--$boundary--";
$headers = "From: $fromHeader\r\nReply-To: $LEADS_TO\r\nMIME-Version: 1.0\r\nContent-Type: multipart/alternative; boundary=\"$boundary\"";
$sentUser = mail($email, 'Your Thank You America catalog: ' . $catName, $body, $headers, "-f$FROM_EMAIL");

// ---- 2. Lead notification to TYA ----
$lead = "New catalog request from the website\n\nName: $name\nCompany: $company\nEmail: $email\nCountry: $country\nCatalog: $catName\nNotes: $interest\nPhone: $phone\n"
      . "Time (server): " . date('Y-m-d H:i:s T') . "\nIP: $ip\n\nCatalog email sent to requester: " . ($sentUser ? 'yes' : 'NO, please send manually') . "\n";
$leadHeaders = "From: $fromHeader\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
@mail($LEADS_TO, "Catalog request: $company ($country)", $lead, $leadHeaders, "-f$FROM_EMAIL");

// ---- 3. Save to CSV ----
$dir = __DIR__ . '/leads';
if (!is_dir($dir)) { @mkdir($dir, 0750); @file_put_contents("$dir/.htaccess", "Require all denied\nDeny from all\n"); }
$fh = @fopen("$dir/catalog-requests.csv", 'a');
if ($fh) {
    if (filesize("$dir/catalog-requests.csv") === 0) fputcsv($fh, ['date', 'name', 'company', 'email', 'country', 'catalog', 'notes', 'phone', 'email_sent']);
    fputcsv($fh, [date('Y-m-d H:i:s'), $name, $company, $email, $country, $catName, $interest, $phone, $sentUser ? 'yes' : 'no']);
    fclose($fh);
}

if (!$sentUser) fail('We saved your request but could not send the email just now. Our team will email the catalog to you shortly.', 500);
echo json_encode(['ok' => true]);
