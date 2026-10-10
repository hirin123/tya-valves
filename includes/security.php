<?php
/* Security headers for every page.
   The Content-Security-Policy only lets the browser run this site's own scripts plus the one inline
   script marked with $CSP_NONCE, load fonts from Google Fonts and images from this site and tyallc.com.
   If you add a new outside service (analytics, chat, maps), add its domain to the matching line below. */
$CSP_NONCE = base64_encode(random_bytes(16));
$IS_HTTPS  = ($_SERVER['HTTPS'] ?? '') === 'on' || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https';
if (!headers_sent()) {
    header_remove('X-Powered-By');
    header("Content-Security-Policy: default-src 'self'; "
        . "script-src 'self' 'nonce-$CSP_NONCE'; "
        . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
        . "font-src 'self' https://fonts.gstatic.com; "
        . "img-src 'self' data: https://tyallc.com; "
        . "connect-src 'self'; frame-src 'none'; object-src 'none'; base-uri 'self'; "
        . "form-action 'self' mailto:; frame-ancestors 'self'" . ($IS_HTTPS ? '; upgrade-insecure-requests' : ''));
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=()');
    header('Cross-Origin-Opener-Policy: same-origin');
    if ($IS_HTTPS) header('Strict-Transport-Security: max-age=31536000');
}
