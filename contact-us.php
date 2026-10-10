<?php
$title   = 'Contact Thank You America | Houston, TX Valve Supplier';
$desc    = 'Call +1-281-949-6123 or email contact@tyallc.com for instrumentation valve quotes, distributor pricing and technical help from Houston, TX.';
$path    = 'contact-us';
$section = 'contact';
include __DIR__ . '/includes/header.php';
?>
<section class="hero"><div class="wrap">
 <h1>Contact us</h1><div class="rule" aria-hidden="true"></div>
 <p class="lede">Call, email or send a quote request. Tell us the application and we'll recommend the right valve.</p>
</div></section>
<section class="section"><div class="wrap two">
 <div class="table-wrap"><table><tbody>
  <tr><th scope="row">Phone</th><td><a href="tel:+12819496123">+1-281-949-6123</a></td></tr>
  <tr><th scope="row">Website</th><td><a href="https://tyallc.com" target="_blank" rel="noopener">tyallc.com</a></td></tr>
  <tr><th scope="row">Email</th><td><a href="mailto:contact@tyallc.com">contact@tyallc.com</a></td></tr>
  <tr><th scope="row">Address</th><td style="white-space:normal">Thank You America LLC<br>4606 FM 1960 W #440-1050<br>Houston, TX 77070<br><a href="https://www.google.com/maps/search/?api=1&query=4606+FM+1960+W+440-1050+Houston+TX+77070">Open in Google Maps</a></td></tr>
 </tbody></table></div>
 <div><h2>Need a price?</h2><p>The quote form lets you list part numbers and quantities along with your fluid, pressure, temperature and delivery details, so we can respond with a firm quote.</p>
  <a class="btn" href="<?= BASE ?>request-quote">Request a quote</a></div>
</div></section>
<?php $whyAlt = true; include INC . 'why-buy.php'; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
