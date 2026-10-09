<?php
/* Shared header for every page.
   Each page sets $title, $desc, $path and $section (and optionally $extra) and then includes this file. */
require_once __DIR__ . '/config.php';
function cur($key) { global $section; return ($section ?? '') === $key ? ' aria-current="page"' : ''; }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $title ?></title>
<meta name="description" content="<?= $desc ?>">
<link rel="canonical" href="<?= SITE . $path ?>">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $desc ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="<?= SITE ?>assets/img/range.jpg">
<meta property="og:url" content="<?= SITE . $path ?>">
<link rel="icon" href="<?= BASE ?>assets/img/tya-logo.png">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600&family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE ?>assets/style.css?v=4">
<?= $extra ?? '' ?>
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<header class="site-head">
 <div class="wrap head-row">
  <a class="brand" href="<?= BASE ?>" aria-label="Thank You America home"><img src="<?= BASE ?>assets/img/tya-logo.png" alt="Thank You America" width="170" height="46"></a>
  <div class="head-contact">
   <a href="tel:+12819496123">+1-281-949-6123</a>
   <a href="mailto:contact@tyallc.com">contact@tyallc.com</a>
  </div>
  <a class="btn ghost head-main" href="https://tyallc.com" target="_blank" rel="noopener">Visit tyallc.com <svg class="ext" viewBox="0 0 512 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M165.43.04c-8.92-.6-16.56 6.15-17.06 15.06s6.33 16.62 15.24 17.21l274.42 18.58L4.7 484.23c-6.31 6.3-6.26 16.59.11 22.96 6.38 6.37 16.66 6.42 22.96.12L461.11 73.97l18.58 274.42c.59 8.91 8.3 15.74 17.21 15.24s15.66-8.14 15.06-17.05L490.98 36.62c-.35-8.2-6.88-15.01-15.25-15.57L165.43.04z"/></svg><span class="skip">(opens in a new tab)</span></a>
  <a class="btn head-rfq" href="<?= BASE ?>request-quote">Request a quote <span class="count" data-rfq-count>0</span></a>
  <button class="menu-btn" aria-expanded="false" aria-controls="nav">Menu</button>
 </div>
 <nav class="mainnav" id="nav" aria-label="Main">
  <ul class="wrap navlist">
   <li><a href="<?= BASE ?>"<?= cur('home') ?>>Home</a></li>
   <li class="has-drop"><a href="<?= BASE ?>products#valves"<?= cur('valves') ?><?= cur('instr') ?><?= cur('hp') ?> aria-haspopup="true">Valves</a>
    <div class="drop">
     <div><a class="drop-head" href="<?= BASE ?>products#valves">Instrumentation valves</a><ul><li><a href="<?= BASE ?>needle-valves/">Needle valves</a></li><li><a href="<?= BASE ?>ball-valves/">Ball valves</a></li><li><a href="<?= BASE ?>manifold-valves/">Manifold valves</a></li><li><a href="<?= BASE ?>gauge-root-valves">Gauge root valves</a></li><li><a href="<?= BASE ?>check-valves">Check valves</a></li><li><a href="<?= BASE ?>pressure-relief-valves">Pressure relief valves</a></li><li><a href="<?= BASE ?>bleed-purge-valves">Bleed and purge valves</a></li></ul></div>
     <div><a class="drop-head" href="<?= BASE ?>products#valves">Process and high pressure</a><ul><li><a href="<?= BASE ?>dbb-monoflange-valves/">DBB and monoflange valves</a></li><li><a href="<?= BASE ?>high-pressure-valves">High pressure valves</a></li><li><a href="<?= BASE ?>industrial-valves/">Gate, globe and check (API 602)</a></li><li><a href="<?= BASE ?>selection-guide">Ball valve selection guide</a></li><li><a href="<?= BASE ?>products">All products</a></li></ul>
      <a class="drop-cat" href="<?= BASE ?>products#catalogs" data-catalog><svg class="pdf-ico" viewBox="0 0 24 28" aria-hidden="true" focusable="false"><path d="M3 1h12l6 6v19a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" fill="#fff" stroke="currentColor" stroke-width="1.6"/><path d="M15 1v6h6" fill="none" stroke="currentColor" stroke-width="1.6"/><rect x="0" y="13" width="18" height="9" rx="1.5" fill="currentColor"/><text x="9" y="20.2" text-anchor="middle" font-family="Arial,Helvetica,sans-serif" font-size="6.6" font-weight="700" fill="#fff">PDF</text></svg><span>Download a catalog <span class="skip">(PDF)</span></span></a></div>
    </div></li>
   <li class="has-drop"><a href="<?= BASE ?>fittings/"<?= cur('fittings') ?> aria-haspopup="true">Fittings</a>
    <div class="drop" style="min-width:300px;grid-template-columns:auto"><div><a class="drop-head" href="<?= BASE ?>fittings/">Fittings</a><ul><li><a href="<?= BASE ?>fittings/tube-fittings">Tube fittings</a></li><li><a href="<?= BASE ?>fittings/pipe-fittings">Pipe fittings</a></li><li><a href="<?= BASE ?>fittings/hydraulic-fittings">Hydraulic fittings</a></li><li><a href="<?= BASE ?>fittings/high-pressure-fittings">High pressure fittings</a></li></ul></div></div></li>
   <li class="has-drop"><a href="<?= BASE ?>accessories/"<?= cur('acc') ?> aria-haspopup="true">Accessories</a>
    <div class="drop" style="min-width:300px;grid-template-columns:auto"><div><a class="drop-head" href="<?= BASE ?>accessories/">Accessories</a><ul><li><a href="<?= BASE ?>accessories/condensate-pots">Condensate pots</a></li><li><a href="<?= BASE ?>accessories/sampling-cylinders">Sampling cylinders</a></li><li><a href="<?= BASE ?>accessories/air-headers">Air headers</a></li><li><a href="<?= BASE ?>accessories/thermowells">Thermowells</a></li><li><a href="<?= BASE ?>accessories/syphons">Syphons</a></li><li><a href="<?= BASE ?>accessories/orifice-plate-assemblies">Orifice plate assemblies</a></li><li><a href="<?= BASE ?>accessories/tube-clamps">Tube clamps</a></li><li><a href="<?= BASE ?>manifold-valves/manifold-mounting-accessories">Manifold mounting kits</a></li></ul></div></div></li>
   <li><a href="<?= BASE ?>industries"<?= cur('ind') ?>>Industries</a></li>
   <li><a href="<?= BASE ?>about-us"<?= cur('about') ?>>About us</a></li>
   <li><a href="<?= BASE ?>contact-us"<?= cur('contact') ?>>Contact us</a></li>
  </ul>
 </nav>
</header>
<main id="main">
