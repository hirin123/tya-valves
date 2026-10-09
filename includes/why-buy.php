<?php
/* "Why buy from Thank You America" — shared section used on every product page.
   Edit the headings, text or icons here and the change applies across the whole site.
   Icons live in assets/img/icons/. A page may set $whyAlt = true for the grey background. */
$whyItems = [
  ['icon' => 'ico-usa.png',   'title' => 'A US company you can call',
   'text'  => 'Thank You America LLC is based in Houston, Texas. You deal with one US company for the quote, the order and the invoice, on a US phone line.'],
  ['icon' => 'ico-valve.png', 'title' => 'Matched to your application',
   'text'  => 'Tell us the fluid, pressure and temperature. We recommend the product and confirm materials, seats and packing, because they often set the real limit.'],
  ['icon' => 'ico-docs.png',  'title' => 'Documentation You Can Trust',
   'text'  => 'Heat-traceable material test reports, NACE MR0175 materials for sour service, and certified drawings on request.'],
];
?>
<style>
.why-list.icons li{padding-left:66px;min-height:84px}
.why-list.icons li::before{display:none}
.why-list.icons .why-ico{position:absolute;left:0;top:20px;width:48px;height:48px}
</style>
<section class="section<?= !empty($whyAlt) ? ' alt' : '' ?> why compact"><div class="wrap">
 <div class="section-head"><h2>Why buy from Thank You America</h2><a class="btn ghost" href="<?= BASE ?>about-us#why">All reasons to choose TYA</a></div>
 <ul class="why-list three icons">
<?php foreach ($whyItems as $w): ?>
  <li><img class="why-ico" src="<?= BASE ?>assets/img/icons/<?= $w['icon'] ?>" alt="" width="48" height="48"><b><?= $w['title'] ?></b><?= $w['text'] ?></li>
<?php endforeach; ?>
 </ul>
</div></section>
<?php $whyAlt = false; ?>
