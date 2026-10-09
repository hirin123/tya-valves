<?php /* Shared footer for every page: quote band, footer links, catalog request form and scripts. */ ?>
</main>
<section class="band">
 <div class="wrap band-grid">
  <div><h2>Tell us the application. We'll match the valve.</h2>
  <p>Send your fluid, pressure, temperature and connection details and our team will recommend a series, confirm materials and quote.</p></div>
  <div class="cta-row"><a class="btn" href="<?= BASE ?>request-quote">Request a quote</a><a class="btn ghost" href="tel:+12819496123">Call +1-281-949-6123</a></div>
 </div>
</section>
<footer class="site-foot">
 <div class="wrap">
  <div class="foot-grid">
   <div><h3>Thank You America LLC</h3>
    <p>Instrumentation valves, fittings and accessories for US process, oil and gas, and hydraulic users.</p>
    <p>4606 FM 1960 W #440-1050<br>Houston, TX 77070</p>
    <p><a href="tel:+12819496123">+1-281-949-6123</a><br><a href="mailto:contact@tyallc.com">contact@tyallc.com</a></p></div>
   <div><h3>Valves</h3><ul><li><a href="<?= BASE ?>needle-valves/">Needle valves</a></li><li><a href="<?= BASE ?>ball-valves/">Ball valves</a></li><li><a href="<?= BASE ?>manifold-valves/">Manifold valves</a></li><li><a href="<?= BASE ?>gauge-root-valves">Gauge root valves</a></li><li><a href="<?= BASE ?>check-valves">Check valves</a></li><li><a href="<?= BASE ?>pressure-relief-valves">Pressure relief valves</a></li><li><a href="<?= BASE ?>bleed-purge-valves">Bleed and purge valves</a></li><li><a href="<?= BASE ?>dbb-monoflange-valves/">DBB and monoflange valves</a></li><li><a href="<?= BASE ?>selection-guide">Ball valve selection guide</a></li><li><a href="<?= BASE ?>products#catalogs" data-catalog>Catalogs (PDF)</a></li><li><a href="<?= BASE ?>industrial-valves/">Gate, globe and check (API 602)</a></li></ul></div>
   <div><h3>Fittings and accessories</h3><ul><li><a href="<?= BASE ?>fittings/tube-fittings">Tube fittings</a></li><li><a href="<?= BASE ?>fittings/pipe-fittings">Pipe fittings</a></li><li><a href="<?= BASE ?>fittings/hydraulic-fittings">Hydraulic fittings</a></li><li><a href="<?= BASE ?>fittings/high-pressure-fittings">High pressure fittings</a></li><li><a href="<?= BASE ?>accessories/condensate-pots">Condensate pots</a></li><li><a href="<?= BASE ?>accessories/sampling-cylinders">Sampling cylinders</a></li><li><a href="<?= BASE ?>accessories/air-headers">Air headers</a></li><li><a href="<?= BASE ?>accessories/thermowells">Thermowells</a></li><li><a href="<?= BASE ?>products">All products</a></li></ul></div>
   <div><h3>Company</h3><ul>
    <li><a href="https://tyallc.com" target="_blank" rel="noopener">Main website: tyallc.com <span class="skip">(opens in a new tab)</span></a></li>
    <li><a href="<?= BASE ?>selection-guide">Ball valve selection guide</a></li><li><a href="<?= BASE ?>products#catalogs" data-catalog>Catalogs (PDF)</a></li>
    <li><a href="<?= BASE ?>industries">Industries we serve</a></li>
    <li><a href="<?= BASE ?>quality-certificates">Quality and certificates</a></li>
    <li><a href="<?= BASE ?>about-us">About us</a></li>
    <li><a href="<?= BASE ?>contact-us">Contact us</a></li></ul></div>
  </div>
  <div class="foot-base">© 2026 Thank You America LLC. Dimensions are for reference only; request a certified drawing before finalizing a design.</div>
 </div>
</footer>
<dialog class="cat-modal" id="catalog-modal" aria-labelledby="cat-title">
 <div class="cat-box">
  <div class="cat-top"><h2 id="cat-title">Get a product catalog</h2><button class="cat-close" type="button" data-close aria-label="Close">×</button></div>
  <div class="cat-body">
   <form class="cat-form" data-catalog-form novalidate>
    <p class="muted small" style="margin-bottom:14px">Tell us where to send it. Choose a catalog and we'll email you a download link right away.</p>
    <div class="row2"><div class="field"><label for="c-name">Name *</label><input id="c-name" name="name" autocomplete="name" required></div>
    <div class="field"><label for="c-company">Company *</label><input id="c-company" name="company" autocomplete="organization" required></div></div>
    <div class="field"><label for="c-email">Work email *</label><input id="c-email" name="email" type="email" autocomplete="email" required></div>
    <div class="row2"><div class="field"><label for="c-country">Country *</label><select id="c-country" name="country" required>
     <option value="">Select country</option><option>United States</option><option>Canada</option><option>Mexico</option><option>United Kingdom</option><option>United Arab Emirates</option><option>Saudi Arabia</option><option>India</option><option>Other</option></select></div>
    <div class="field"><label for="c-phone">Phone</label><input id="c-phone" name="phone" type="tel" autocomplete="tel"></div></div>
    <div class="field"><label for="c-catalog">Catalog *</label><select id="c-catalog" name="catalog" required><option value="ball">Ball valves</option><option value="needle">Needle valves</option><option value="manifold">Manifold &amp; gauge root valves</option><option value="check">Check valves</option><option value="bleed">Bleed &amp; purge valves</option><option value="mono">DBB &amp; monoflange valves</option><option value="industrial">Industrial gate, globe &amp; check valves</option><option value="hp">High pressure valves &amp; fittings</option><option value="cdp">Condensate pots</option></select></div>
    <div class="field"><label for="c-interest">Anything else we should know?</label><input id="c-interest" name="interest" placeholder="e.g. application, quantities, other products"></div>
    <div class="hp" aria-hidden="true"><label for="c-web">Leave this empty</label><input id="c-web" name="website" tabindex="-1" autocomplete="off"></div>
    <input type="hidden" name="started">
    <button class="btn cat-submit" type="submit">Email me the catalog</button>
    <p class="form-msg" role="status"></p>
   </form>
   <div class="cat-done" hidden>
    <h3>Check your inbox</h3>
    <p>We've sent the catalog link to <b data-sent-to></b>. If it isn't there in a few minutes, check your spam folder.</p>
    <p class="small muted">Can't wait? <a href="<?= BASE ?>assets/TYA-Ball-Valve-Catalog.pdf" target="_blank" rel="noopener" data-cat-direct>Open the catalog now</a>.</p>
    <button class="btn ghost" type="button" data-close>Close</button>
   </div>
  </div>
 </div>
</dialog>

<script>window.TYA_BASE = "<?= BASE ?>"; window.TYA_CATS = {"ball": "TYA-Ball-Valve-Catalog.pdf", "needle": "catalogs/TYA-Needle-Valve-Catalog.pdf", "manifold": "catalogs/TYA-Manifold-Valve-Catalog.pdf", "check": "catalogs/TYA-Check-Valve-Catalog.pdf", "bleed": "catalogs/TYA-Bleed-Purge-Valve-Catalog.pdf", "mono": "catalogs/TYA-Monoflange-Valve-Catalog.pdf", "industrial": "catalogs/TYA-Industrial-Valve-Catalog.pdf", "hp": "catalogs/TYA-High-Pressure-Valves-Catalog.pdf", "cdp": "catalogs/TYA-Condensate-Pots-Catalog.pdf"};</script>
<script src="<?= BASE ?>assets/site.js"></script>
</body>
</html>
