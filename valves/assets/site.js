(function () {
  var BASE = window.TYA_BASE || "/";
  var KEY = "tya_rfq_v1";
  var EMAIL = "contact@tyallc.com";

  function load() { try { return JSON.parse(localStorage.getItem(KEY)) || []; } catch (e) { return []; } }
  function save(list) { try { localStorage.setItem(KEY, JSON.stringify(list)); } catch (e) {} updateCount(); }
  function updateCount() {
    var n = load().reduce(function (a, i) { return a + (i.qty || 1); }, 0);
    document.querySelectorAll("[data-rfq-count]").forEach(function (el) { el.textContent = n; });
  }
  function toast(msg) {
    var t = document.querySelector(".toast");
    if (!t) { t = document.createElement("div"); t.className = "toast"; t.setAttribute("role", "status"); document.body.appendChild(t); }
    t.textContent = msg; t.classList.add("show");
    clearTimeout(t._h); t._h = setTimeout(function () { t.classList.remove("show"); }, 2200);
  }

  // Mobile menu
  var mb = document.querySelector(".menu-btn"), nav = document.querySelector(".mainnav");
  if (mb && nav) mb.addEventListener("click", function () {
    var open = nav.classList.toggle("open"); mb.setAttribute("aria-expanded", open);
  });

  // Add to quote
  function markAdded() {
    var parts = load().map(function (i) { return i.key; });
    document.querySelectorAll(".add").forEach(function (b) {
      var on = parts.indexOf(b.dataset.series + "|" + b.dataset.part) > -1;
      b.classList.toggle("added", on); b.textContent = on ? "In quote" : "Add to quote";
    });
  }
  document.addEventListener("click", function (e) {
    var b = e.target.closest(".add"); if (!b) return;
    var list = load(), key = b.dataset.series + "|" + b.dataset.part;
    var found = list.filter(function (i) { return i.key === key; })[0];
    if (found) { found.qty += 1; toast(b.dataset.part + " quantity: " + found.qty); }
    else { list.push({ key: key, part: b.dataset.part, series: b.dataset.series, desc: b.dataset.desc, qty: 1 }); toast(b.dataset.part + " added to your quote"); }
    save(list); markAdded();
  });

  // Tabs
  document.querySelectorAll(".tabs").forEach(function (tabs) {
    tabs.addEventListener("click", function (e) {
      var t = e.target.closest(".tab"); if (!t) return;
      tabs.querySelectorAll(".tab").forEach(function (x) {
        var on = x === t; x.setAttribute("aria-selected", on);
        document.getElementById(x.getAttribute("aria-controls")).hidden = !on;
      });
    });
  });

  // Valve finder
  var finder = document.querySelector("[data-finder]");
  if (finder) {
    var state = { p: "any", f: "any", e: "any" };
    var cards = Array.prototype.slice.call(document.querySelectorAll(".s-card"));
    var result = document.querySelector("[data-finder-result]"), none = document.querySelector(".no-match");
    function apply() {
      var shown = 0;
      cards.forEach(function (c) {
        var ok = (state.p === "any" || +c.dataset.rating >= +state.p) &&
                 (state.f === "any" || c.dataset.flow === state.f) &&
                 (state.e === "any" || c.dataset.ends.split(" ").indexOf(state.e) > -1);
        c.hidden = !ok; if (ok) shown++;
      });
      result.textContent = shown === cards.length ? "Showing all " + shown + " series" : shown + " of " + cards.length + " series match";
      none.hidden = shown > 0;
    }
    finder.addEventListener("click", function (e) {
      var c = e.target.closest(".chip"); if (!c) return;
      var g = c.dataset.group;
      finder.querySelectorAll('.chip[data-group="' + g + '"]').forEach(function (x) { x.setAttribute("aria-pressed", x === c); });
      state[g] = c.dataset.value; apply();
    });
    apply();
  }

  // RFQ page
  var cartEl = document.querySelector("[data-cart]");
  function renderCart() {
    if (!cartEl) return;
    var list = load();
    if (!list.length) {
      cartEl.innerHTML = '<div class="cart-empty"><p><b>Your quote list is empty.</b></p><p class="muted" style="margin:0">Open any product page and use <b>Add to quote</b> next to the part numbers you need, or describe your application in the form and we will recommend a valve.</p><p style="margin:14px 0 0"><a class="btn ghost" href="' + BASE + 'products">Browse products</a></p></div>';
      return;
    }
    var rows = list.map(function (i, n) {
      return "<tr><th>" + i.part + '<div class="small muted" style="font-weight:400">' + i.series + "</div></th><td>" + i.desc +
        '</td><td><label class="small" for="q' + n + '" style="position:absolute;left:-999px">Quantity for ' + i.part + '</label><input class="qty" id="q' + n + '" type="number" min="1" value="' + i.qty + '" data-i="' + n + '"></td><td><button class="remove" data-r="' + n + '">Remove</button></td></tr>';
    }).join("");
    cartEl.innerHTML = '<div class="table-wrap"><table><thead><tr><th>Part number</th><th>Description</th><th>Qty</th><th></th></tr></thead><tbody>' + rows + "</tbody></table></div>";
  }
  if (cartEl) {
    renderCart();
    cartEl.addEventListener("input", function (e) {
      if (!e.target.matches(".qty")) return;
      var list = load(), i = +e.target.dataset.i; list[i].qty = Math.max(1, parseInt(e.target.value, 10) || 1); save(list);
    });
    cartEl.addEventListener("click", function (e) {
      if (!e.target.matches(".remove")) return;
      var list = load(); list.splice(+e.target.dataset.r, 1); save(list); renderCart();
    });
  }

  var form = document.querySelector("[data-rfq-form]");
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var msg = form.querySelector(".form-msg");
      var req = ["name", "company", "email"].filter(function (n) { return !form.elements[n].value.trim(); });
      if (req.length) { msg.className = "form-msg err"; msg.textContent = "Add your " + req.join(", ") + " so we can send the quote."; return; }
      var f = form.elements, list = load();
      var lines = list.length ? list.map(function (i) { return "- " + i.part + " x " + i.qty + " (" + i.series + ": " + i.desc + ")"; }).join("\n") : "- No part numbers selected, please recommend";
      var body = "Request for quote\n\nItems:\n" + lines +
        "\n\nFluid / service: " + f.fluid.value + "\nOperating pressure: " + f.pressure.value + "\nTemperature: " + f.temp.value +
        "\nDocumentation needed: " + f.docs.value + "\nRequired by: " + f.date.value + "\nShip-to ZIP: " + f.zip.value +
        "\n\nNotes:\n" + f.notes.value +
        "\n\n" + f.name.value + "\n" + f.company.value + "\n" + f.email.value + "\n" + f.phone.value;
      var subject = "RFQ - Thank You America - " + f.company.value;
      window.location.href = "mailto:" + EMAIL + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);
      msg.className = "form-msg"; msg.textContent = "Your email app should open with the request filled in. Press send to reach our team, or call +1-281-949-6123.";
    });
  }


  // Catalog request form (gated download)
  var modal = document.getElementById("catalog-modal");
  if (modal && typeof modal.showModal === "function") {
    var cform = modal.querySelector("[data-catalog-form]"), done = modal.querySelector(".cat-done");
    document.addEventListener("click", function (e) {
      var a = e.target.closest("[data-catalog]"); if (!a) return;
      e.preventDefault();
      var nav = document.querySelector(".mainnav.open"); if (nav) nav.classList.remove("open");
      cform.hidden = false; done.hidden = true; cform.querySelector(".form-msg").textContent = "";
      cform.elements.started.value = Date.now();
      var key = a.getAttribute("data-catalog"); if (key && cform.elements.catalog.querySelector('option[value="' + key + '"]')) cform.elements.catalog.value = key;
      modal.showModal(); setTimeout(function () { cform.elements.name.focus(); }, 30);
    });
    modal.addEventListener("click", function (e) { if (e.target === modal || e.target.closest("[data-close]")) modal.close(); });
    function catUrl() { var m = window.TYA_CATS || {}; return BASE + "assets/" + (m[cform.elements.catalog.value] || "TYA-Ball-Valve-Catalog.pdf"); }
    cform.addEventListener("submit", function (e) {
      e.preventDefault();
      var f = cform.elements, msg = cform.querySelector(".form-msg"), btn = cform.querySelector(".cat-submit");
      var missing = [["name","name"],["company","company"],["email","email"],["country","country"]].filter(function (x) { return !f[x[0]].value.trim(); }).map(function (x) { return x[1]; });
      if (missing.length) { msg.className = "form-msg err"; msg.textContent = "Add your " + missing.join(", ") + " so we can send the catalog."; return; }
      if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(f.email.value.trim())) { msg.className = "form-msg err"; msg.textContent = "Check the email address; it doesn't look complete."; return; }
      btn.disabled = true; btn.textContent = "Sending..."; msg.textContent = "";
      fetch(BASE + "send-catalog.php", { method: "POST", body: new FormData(cform) })
        .then(function (r) { return r.json().catch(function () { return { ok: false }; }); })
        .then(function (res) {
          if (res.ok) { modal.querySelector("[data-sent-to]").textContent = f.email.value.trim(); var d = modal.querySelector("[data-cat-direct]"); if (d) d.href = catUrl(); cform.hidden = true; done.hidden = false; cform.reset(); }
          else { msg.className = "form-msg err"; msg.innerHTML = (res.error || "The request didn't go through.") + ' You can also <a href="' + catUrl() + '" target="_blank" rel="noopener">open the catalog directly</a>.'; }
        })
        .catch(function () { msg.className = "form-msg err"; msg.innerHTML = 'The request didn\'t go through. Please <a href="' + catUrl() + '" target="_blank" rel="noopener">open the catalog directly</a> or email contact@tyallc.com.'; })
        .then(function () { btn.disabled = false; btn.textContent = "Email me the catalog"; });
    });
  }

  updateCount(); markAdded();
})();
