<?php
/* FAQ section with FAQPage structured data.
   A page sets $faqs = [['Question?', 'Plain-text answer.'], ...] and optionally $faqAlt = true
   for the grey background, then includes this file. Answers are plain text (escaped here). */
if (empty($faqs) || !is_array($faqs)) return;
$faqLd = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => []];
foreach ($faqs as $f) {
  $faqLd['mainEntity'][] = ['@type' => 'Question', 'name' => $f[0],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]];
}
?>
<section class="section<?= !empty($faqAlt) ? ' alt' : '' ?> faq" id="faq"><div class="wrap">
 <div class="section-head"><h2>Frequently asked questions</h2></div>
 <div class="faq-list">
<?php foreach ($faqs as $i => $f): ?>
  <details<?= $i === 0 ? ' open' : '' ?>><summary><?= htmlspecialchars($f[0], ENT_QUOTES, 'UTF-8') ?></summary><p><?= htmlspecialchars($f[1], ENT_QUOTES, 'UTF-8') ?></p></details>
<?php endforeach; ?>
 </div>
</div></section>
<script type="application/ld+json"><?= json_encode($faqLd, JSON_HEX_TAG | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<?php $faqs = null; $faqAlt = false; ?>
