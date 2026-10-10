<?php
$title   = 'Product Catalogs (PDF) | Thank You America';
$desc    = 'Download Thank You America catalogs for ball, needle, manifold, check, bleed and purge, monoflange, industrial and high pressure valves, fittings and condensate pots.';
$path    = 'catalogs';
$section = 'products';
include __DIR__ . '/includes/header.php';

/* Catalogs shown on this page. Keys match send-catalog.php, which attaches the PDF. */
$catalogs = [
    'ball'       => ['assets/TYA-Ball-Valve-Catalog.pdf',                   'Ball valves'],
    'needle'     => ['assets/catalogs/TYA-Needle-Valve-Catalog.pdf',        'Needle valves'],
    'manifold'   => ['assets/catalogs/TYA-Manifold-Valve-Catalog.pdf',      'Manifold & gauge root valves'],
    'check'      => ['assets/catalogs/TYA-Check-Valve-Catalog.pdf',         'Check valves'],
    'bleed'      => ['assets/catalogs/TYA-Bleed-Purge-Valve-Catalog.pdf',   'Bleed & purge valves'],
    'mono'       => ['assets/catalogs/TYA-Monoflange-Valve-Catalog.pdf',    'DBB & monoflange valves'],
    'industrial' => ['assets/catalogs/TYA-Industrial-Valve-Catalog.pdf',    'Industrial gate, globe & check valves'],
    'hp'         => ['assets/catalogs/TYA-High-Pressure-Valves-Catalog.pdf','High pressure valves & fittings'],
    'cdp'        => ['assets/catalogs/TYA-Condensate-Pots-Catalog.pdf',     'Condensate pots'],
];
?>
<section class="p-head banner world-bg"><div class="wrap">
 <div class="crumbs"><a href="<?= BASE ?>">Home</a> / Catalogs</div>
 <h1>Product Catalogs</h1>
 <ul class="specline"><li class="hot">Free PDF downloads</li><li>Part numbers</li><li>Dimensions</li><li>Materials &amp; ratings</li></ul>
</div></section>
<section class="section"><div class="wrap">
 <div class="section-head"><h2>Choose a catalog</h2><p class="muted">Click a catalog, tell us where to send it, and we'll email you the PDF.</p></div>
 <div class="cat-list">
<?php foreach ($catalogs as $key => [$file, $name]):
    $label = htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
  <a class="cat-card" href="#" data-catalog="<?= $key ?>" aria-label="Get the <?= $label ?> catalog (PDF)">
   <svg class="cat-doc" viewBox="0 0 100 130" aria-hidden="true" focusable="false">
    <path d="M4 0h66l30 30v96a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z" fill="#fff" stroke="#D5DBE5" stroke-width="2"/>
    <path d="M70 0v26a4 4 0 0 0 4 4h26z" fill="#E6E9EF"/>
    <rect x="14" y="44" width="56" height="5" fill="#E6E9EF"/><rect x="14" y="56" width="72" height="5" fill="#E6E9EF"/><rect x="14" y="68" width="64" height="5" fill="#E6E9EF"/>
    <rect class="cat-doc-band" x="0" y="88" width="78" height="28" fill="#cd0001"/>
    <text x="39" y="108" text-anchor="middle" fill="#fff" font-family="Arial,Helvetica,sans-serif" font-size="16" font-weight="700" letter-spacing="1.5">PDF</text>
   </svg>
   <span class="cat-name"><?= $label ?></span>
   <span class="cat-get">Get the catalog</span>
  </a>
<?php endforeach; ?>
 </div>
</div></section>


<?php include __DIR__ . '/includes/footer.php'; ?>
