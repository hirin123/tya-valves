<?php
$title   = 'Product Catalogs (PDF) | Thank You America';
$desc    = 'Download Thank You America catalogs for ball, needle, manifold, check, bleed and purge, monoflange, industrial and high pressure valves, fittings and condensate pots.';
$path    = 'catalogs';
$section = 'products';
include __DIR__ . '/includes/header.php';

/* Catalogs shown on this page. Only the ones whose PDF is on the server are listed.
   Cover image: assets/catalogs/covers/<key>.jpg if present, otherwise the first page
   of the PDF is drawn in the browser with PDF.js. Keys match send-catalog.php. */
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
$needPdfJs = false;
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
    if (!is_file(__DIR__ . '/' . $file)) continue;
    $cover = 'assets/catalogs/covers/' . $key . '.jpg';
    $hasCover = is_file(__DIR__ . '/' . $cover);
    if (!$hasCover) $needPdfJs = true;
    $label = htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
  <a class="cat-card" href="#" data-catalog="<?= $key ?>">
   <span class="cat-cover"<?= $hasCover ? '' : ' data-pdf="' . BASE . $file . '"' ?>>
    <?php if ($hasCover): ?><img src="<?= BASE . $cover ?>" alt="" loading="lazy"><?php else: ?><span class="cat-ph"><?= $label ?></span><?php endif; ?>
    <span class="cat-badge">PDF</span>
   </span>
   <span class="cat-name"><?= $label ?></span>
   <span class="cat-get">Get the catalog</span>
  </a>
<?php endforeach; ?>
 </div>
</div></section>
<?php if ($needPdfJs): ?>
<script src="<?= BASE ?>assets/vendor/pdfjs/pdf.min.js"></script>
<script>
/* Draw page 1 of each PDF that has no cover image, only when its card scrolls into view. */
(function () {
  if (!window.pdfjsLib) return;
  pdfjsLib.GlobalWorkerOptions.workerSrc = "<?= BASE ?>assets/vendor/pdfjs/pdf.worker.min.js";
  function draw(box) {
    pdfjsLib.getDocument({ url: box.getAttribute("data-pdf"), disableAutoFetch: true, disableStream: true }).promise
      .then(function (pdf) { return pdf.getPage(1); })
      .then(function (page) {
        var v = page.getViewport({ scale: 1 }), scale = 600 / v.width, vp = page.getViewport({ scale: scale });
        var c = document.createElement("canvas"); c.width = vp.width; c.height = vp.height;
        return page.render({ canvasContext: c.getContext("2d"), viewport: vp }).promise.then(function () {
          var ph = box.querySelector(".cat-ph"); if (ph) ph.replaceWith(c); else box.prepend(c);
        });
      })
      .catch(function () { /* keep the text placeholder */ });
  }
  var boxes = document.querySelectorAll(".cat-cover[data-pdf]");
  if (!("IntersectionObserver" in window)) { boxes.forEach(draw); return; }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) { if (en.isIntersecting) { io.unobserve(en.target); draw(en.target); } });
  }, { rootMargin: "200px" });
  boxes.forEach(function (b) { io.observe(b); });
})();
</script>
<?php endif; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
