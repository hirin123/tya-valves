<?php
$title   = 'Request a Quote: Instrumentation Valves & Fittings | TYA';
$desc    = 'Send part numbers, sizes and materials for a fast quote on instrument valves, manifolds, tube fittings and accessories. Distributor and OEM quotes welcome.';
$path    = 'request-quote';
$section = 'contact';
include __DIR__ . '/includes/header.php';
?>
<section class="hero"><div class="wrap">
 <h1>Request a quote</h1><div class="rule" aria-hidden="true"></div>
 <p class="lede">Review the part numbers you added, tell us about the application, and send. Not sure what you need? Leave the list empty and describe the service; we'll recommend a series.</p>
</div></section>
<section class="section"><div class="wrap rfq-grid">
 <div><h2>Your quote list</h2><div data-cart></div>
  <div class="note" style="margin-top:20px"><b>Prefer to talk it through?</b> Call <a href="tel:+12819496123">+1-281-949-6123</a> or email <a href="mailto:contact@tyallc.com">contact@tyallc.com</a>.</div>
  <div class="why-side"><h3>What happens after you send</h3><ul class="ticks"><li>We check the series, seat and body material against your fluid, pressure and temperature</li><li>We confirm documentation such as MTRs or NACE MR0175</li><li>You receive a quote from Thank You America LLC, Houston, TX</li></ul></div></div>
 <div><h2>Application details</h2>
 <form data-rfq-form novalidate>
  <div class="row2"><div class="field"><label for="name">Your name *</label><input id="name" name="name" autocomplete="name" required></div>
  <div class="field"><label for="company">Company *</label><input id="company" name="company" autocomplete="organization" required></div></div>
  <div class="row2"><div class="field"><label for="email">Email *</label><input id="email" name="email" type="email" autocomplete="email" required></div>
  <div class="field"><label for="phone">Phone</label><input id="phone" name="phone" type="tel" autocomplete="tel"></div></div>
  <div class="field"><label for="fluid">Fluid or service</label><input id="fluid" name="fluid" placeholder="e.g. natural gas sample, hydraulic oil, seawater"></div>
  <div class="row2"><div class="field"><label for="pressure">Max operating pressure</label><input id="pressure" name="pressure" placeholder="e.g. 4,500 psi"></div>
  <div class="field"><label for="temp">Temperature range</label><input id="temp" name="temp" placeholder="e.g. -20 to 200 °F"></div></div>
  <div class="field"><label for="docs">Documentation</label><select id="docs" name="docs"><option>Standard</option><option>Material test reports (MTR)</option><option>MTR and NACE MR0175</option><option>Other, see notes</option></select></div>
  <div class="row2"><div class="field"><label for="date">Required by</label><input id="date" name="date" type="date"></div>
  <div class="field"><label for="zip">Ship-to ZIP code</label><input id="zip" name="zip" autocomplete="postal-code"></div></div>
  <div class="field"><label for="notes">Notes</label><textarea id="notes" name="notes" rows="4" placeholder="End connections, NPT or BSP, seat material, handle type, quantities by date"></textarea></div>
  <button class="btn" type="submit">Send quote request</button>
  <p class="form-msg" role="status"></p>
 </form></div>
</div></section>
<?php include __DIR__ . '/includes/footer.php'; ?>
