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
    <p>We've emailed the catalog to <b data-sent-to></b>. If it isn't there in a few minutes, check your spam folder.</p>
    <p class="small muted">Can't wait? <a href="<?= BASE ?>assets/TYA-Ball-Valve-Catalog.pdf" target="_blank" rel="noopener" data-cat-direct>Open the catalog now</a>.</p>
    <button class="btn ghost" type="button" data-close>Close</button>
   </div>
  </div>
 </div>
</dialog>

<!-- Sticky contact buttons (right edge, every page) -->
<div class="float-contact">
 <a class="fc-call" href="tel:+12819496123" aria-label="Call +1-281-949-6123"><span class="fc-label">+1-281-949-6123</span><svg viewBox="0 0 512 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"/></svg></a>
 <a class="fc-wa" href="https://api.whatsapp.com/send?phone=14452202112&amp;text=Hi" target="_blank" rel="noopener" aria-label="Chat on WhatsApp (opens in a new tab)"><span class="fc-label">WhatsApp</span><svg viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></a>
</div>

<script>window.TYA_BASE = "<?= BASE ?>"; window.TYA_CATS = {"ball": "TYA-Ball-Valve-Catalog.pdf", "needle": "catalogs/TYA-Needle-Valve-Catalog.pdf", "manifold": "catalogs/TYA-Manifold-Valve-Catalog.pdf", "check": "catalogs/TYA-Check-Valve-Catalog.pdf", "bleed": "catalogs/TYA-Bleed-Purge-Valve-Catalog.pdf", "mono": "catalogs/TYA-Monoflange-Valve-Catalog.pdf", "industrial": "catalogs/TYA-Industrial-Valve-Catalog.pdf", "hp": "catalogs/TYA-High-Pressure-Valves-Catalog.pdf", "cdp": "catalogs/TYA-Condensate-Pots-Catalog.pdf"};</script>
<script src="<?= BASE ?>assets/site.js"></script>
</body>
</html>
