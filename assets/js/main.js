/* FleetHQ WordPress Theme — main.js */
(function () {
  "use strict";

  /* ---- 1. Booking-notification marquees ---- */
  var bookings = [
    ["Booking #234 was refunded",    "#ff8b8f"],
    ["Booking #233 was confirmed",   "#90e140"],
    ["New booking received",         "#40c3e1"],
    ["Booking #232 was cancelled",   "#f3e655"],
    ["Payment of $420 received",     "#7640e1"],
    ["Booking #231 was modified",    "#e140c3"],
    ["Trip #118 completed",          "#90e140"],
    ["Renter ID approved",           "#7640e1"],
    ["Booking #229 was extended",    "#ff8b8f"],
    ["Insurance verified",           "#40c3e1"],
    ["Booking #228 was confirmed",   "#90e140"],
    ["Deposit released $200",        "#f3e655"]
  ];

  function tag(text, color) {
    return '<div class="booking-tag"><span class="dot" style="background:' + color + '"></span>' +
           '<span class="lbl">' + text + "</span></div>";
  }

  function buildMarquee(id, offset, reverse) {
    var el = document.getElementById(id);
    if (!el) return;
    var seq = [];
    for (var i = 0; i < bookings.length; i++) {
      var b = bookings[(i + offset) % bookings.length];
      seq.push(tag(b[0], b[1]));
    }
    var html = seq.join("");
    el.innerHTML = '<div class="track' + (reverse ? " rev" : "") + '">' + html + html + "</div>";
  }

  buildMarquee("fhq-m1", 0, false);
  buildMarquee("fhq-m2", 4, true);
  buildMarquee("fhq-m3", 8, false);

  /* ---- 2. "One platform" accordion stack ---- */
  var stackItems = [
    {
      label: "Fleet & Booking Management", dot: "#e16540",
      title: "Your entire operation, one dashboard",
      body: "Stop juggling spreadsheets and missed reservations. FleetHQ gives you real-time visibility across every vehicle, every booking, and every dollar — so you can manage your fleet with confidence and never miss a rental opportunity.",
      img: "dashboardImg"
    },
    {
      label: "Free Booking Website", dot: "rgba(225,64,185,.55)",
      title: "Your own branded booking site",
      body: "Launch a professional, conversion-ready rental website in minutes. Take direct bookings, set your own policies, and stop paying platform fees on every trip you earn.",
      img: "freeWebsiteImg", imgSize: "100%"
    },
    {
      label: "Rental Agreements", dot: "rgba(64,163,225,.55)",
      title: "Contracts signed before pickup",
      body: "Generate, send, and e-sign rental agreements automatically. Every trip is protected with the right paperwork, captured digitally and stored against the booking.",
      img: "rentalAgreementImg"
    },
    {
      label: "Verification & Insurance", dot: "#90c83f",
      title: "Know exactly who is driving",
      body: "Built-in identity checks, license verification, and insurance validation run automatically — so you approve renters faster and reduce risk on every booking.",
      img: "integrationsImg"
    },
    {
      label: "Turo Calendar Sync", dot: "#7640e1",
      title: "One calendar across every platform",
      body: "Sync availability with Turo and beyond in real time. No more double bookings, no more manually blocking dates, no more booking nightmares.",
      img: "calendarImg"
    }
  ];

  var stack = document.getElementById("fhq-stack");
  if (stack) {
    var accs = [];
    var activeIndex = 0;
    var n = stackItems.length;

    function layoutStack() {
      accs.forEach(function (acc, i) {
        var depth = (i - activeIndex + n) % n;
        if (depth === 0) {
          acc.classList.add("open");
          acc.style.width     = "930px";
          acc.style.transform = "translateX(-50%)";
          acc.style.top       = "148px";
          acc.style.height    = "416px";
          acc.style.zIndex    = 100;
        } else {
          acc.classList.remove("open");
          var back = n - depth;
          var step = 28;
          acc.style.width     = (930 - 2 * step * back) + "px";
          acc.style.transform = "translateX(-50%)";
          acc.style.top       = (148 - 34 * back) + "px";
          acc.style.height    = "60px";
          acc.style.zIndex    = 50 + depth;
        }
      });
    }

    stackItems.forEach(function (it, idx) {
      var acc = document.createElement("div");
      acc.className = "acc";
      var imgKey = it.img || "dashboardImg";
      var imgSrc = (typeof fleethqData !== "undefined") ? (fleethqData[imgKey] || fleethqData.dashboardImg) : "";
      acc.innerHTML =
        '<div class="acc-head">' +
          '<span class="dot" style="background:' + it.dot + '"></span>' +
          '<span class="label">' + it.label + "</span>" +
        "</div>" +
        '<div class="acc-body">' +
          '<div class="acc-copy"><h3>' + it.title + "</h3><p>" + it.body + "</p></div>" +
          '<div class="acc-prev"' + (imgSrc ? ' style="background-image:url(\'' + imgSrc + '\')' + (it.imgSize ? ';background-size:' + it.imgSize : '') + '"' : "") + '></div>' +
        "</div>";

      acc.querySelector(".acc-head").addEventListener("click", function () {
        activeIndex = idx;
        layoutStack();
      });

      acc.addEventListener("mouseenter", function () {
        var depth = (idx - activeIndex + n) % n;
        if (depth === 0) return;
        var back = n - depth;
        acc.style.top = (148 - 34 * back - 10) + "px";
        acc.style.boxShadow = "0 12px 32px rgba(0,0,0,.13)";
        acc.style.width = (930 - 2 * 28 * back + 16) + "px";
        acc.querySelector(".label").style.color = "var(--ink)";
      });

      acc.addEventListener("mouseleave", function () {
        var depth = (idx - activeIndex + n) % n;
        if (depth === 0) return;
        var back = n - depth;
        acc.style.top = (148 - 34 * back) + "px";
        acc.style.boxShadow = "";
        acc.style.width = (930 - 2 * 28 * back) + "px";
        acc.querySelector(".label").style.color = "";
      });

      stack.appendChild(acc);
      accs.push(acc);
    });

    layoutStack();
  }

  /* ---- 3. "Built for every corner" tab strip ---- */
  var carSVG = '<svg viewBox="0 0 80 80" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"><path d="M8 52l6-18c1-3 3-4 6-4h40c3 0 5 1 6 4l6 18"/><path d="M6 52h68v10H6z"/><circle cx="22" cy="62" r="5"/><circle cx="58" cy="62" r="5"/><path d="M20 30l4-10h32l4 10"/></svg>';
  var founderSVG = '<svg viewBox="0 0 80 80" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="40" cy="26" r="12"/><path d="M16 66c0-13 11-22 24-22s24 9 24 22"/></svg>';
  var clockSVG = '<svg viewBox="0 0 80 80" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="40" cy="40" r="28"/><path d="M40 22v18l12 8"/></svg>';
  var growthSVG = '<svg viewBox="0 0 80 80" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 60h56"/><path d="M16 60V46M32 60V36M48 60V42M64 60V26"/><path d="M14 30l16-8 12 6 22-12"/><path d="M56 16h8v8"/></svg>';
  var fd = (typeof fleethqData !== "undefined") ? fleethqData : {};

  var tabs = [
    {
      label: "Daily Wage Fleet", imgOn: fd.tabDailyWageOn || "", imgOff: fd.tabDailyWageOff || "",
      title: "Turn every car into a daily revenue machine",
      cols: [
        { h: "Maximize daily utilization", p: "Keep every vehicle booked and every turnaround tight. FleetHQ automates scheduling, availability, and calendar management so no car sits idle." },
        { h: "Cut admin time by 10+ hours a week", p: "Agreements, payments, and renter verification run automatically. Focus on growing your fleet, not managing paperwork." }
      ]
    },
    {
      label: "Luxury Fleet", imgOn: fd.tabLuxuryOn || "", imgOff: fd.tabLuxuryOff || "", svg: carSVG,
      title: "Run a premium fleet like a premium business",
      cols: [
        { h: "Protect every high-value vehicle", p: "ID verification, insurance checks, and criminal background screening happen before any renter gets the keys. Your cars are covered, your liability is reduced, and your standards are non-negotiable." },
        { h: "Charge what your fleet is worth with Inquire option", p: "Enable inquire only pricing for luxury fleet to keep the premium experience. FleetHQ gives you the pricing control to match your rates to the true value of your vehicles." }
      ]
    },
    {
      label: "Hourly Bookings", imgOn: fd.tabHourlyOn || "", imgOff: fd.tabHourlyOff || "", svg: clockSVG,
      title: "Fill more windows. Earn more per car.",
      cols: [
        { h: "More booking flexibility, zero scheduling chaos", p: "Offer hourly and daily rentals from one unified calendar. Availability updates in real time across every channel so every window is accurate and every booking is conflict-free." },
        { h: "Convert more renters with a frictionless experience", p: "From first click to signed agreement, the entire booking flow is automated. Renters get instant confirmation and operators get paid — without a single back-and-forth." }
      ]
    },
    {
      label: "Founders", imgOn: fd.tabFoundersOn || "", imgOff: fd.tabFoundersOff || "", svg: founderSVG,
      title: "Build a real rental business, not just a side hustle",
      cols: [
        { h: "Go from operator to owner in days, not months", p: "Launch a branded booking website, automate your agreements, and start accepting direct reservations without a single developer or agency. Everything is set up and ready from day one." },
        { h: "Save 10+ hours every week from the start", p: "Skip the spreadsheets, manual follow-ups, and OTA dashboards. FleetHQ handles the operational heavy lifting so you can focus on adding cars and growing revenue." }
      ]
    },
    {
      label: "Growth", imgOn: fd.tabGrowthOn || "", imgOff: fd.tabGrowthOff || "", svg: growthSVG,
      title: "Scale direct without leaving Turo behind",
      cols: [
        { h: "Zero double bookings across every channel", p: "Your Turo calendar and FleetHQ stay in perfect sync in real time. Every booking, block, and availability update reflects instantly — no manual adjustments, no costly conflicts." },
        { h: "Keep 100% of your direct booking revenue", p: "Every reservation through your FleetHQ site is a booking with no OTA fee attached. Grow your direct channel alongside Turo and watch your margins compound with every rental." }
      ]
    }
  ];

  var strip    = document.getElementById("fhq-tabstrip");
  var cdTitle  = document.getElementById("fhq-cd-title");
  var cdCols   = document.getElementById("fhq-cd-cols");

  function illoFor(t, active) {
    var src = active ? (t.imgOn || t.imgOff) : (t.imgOff || t.imgOn);
    if (src) return '<img src="' + src + '" alt="' + t.label + '"/>';
    return t.svg || "";
  }

  function renderCols(cols) {
    if (!cdCols || !cols) return;
    cdCols.innerHTML = cols.map(function (c) {
      return '<div class="corner-col"><h4>' + c.h + '</h4><p>' + c.p + '</p></div>';
    }).join("");
  }

  if (strip) {
    var cards = [];
    tabs.forEach(function (t, idx) {
      var card = document.createElement("div");
      var isActive = idx === 0;
      card.className = "tabcard" + (isActive ? " active" : "");
      card.innerHTML = '<div class="tc-label">' + t.label + '</div><div class="tc-illo">' + illoFor(t, isActive) + '</div>';
      card.addEventListener("click", function () {
        cards.forEach(function (c, i) {
          c.classList.remove("active");
          c.querySelector(".tc-illo").innerHTML = illoFor(tabs[i], false);
        });
        card.classList.add("active");
        card.querySelector(".tc-illo").innerHTML = illoFor(t, true);
        if (cdTitle) cdTitle.textContent = t.title;
        renderCols(t.cols);
      });
      strip.appendChild(card);
      cards.push(card);
    });
  }

  /* ---- 4. Dark testimonials (two scrolling rows) ---- */
  var voices = [
    ['"The Turo sync alone was worth it. No more manually blocking dates, no more double booking nightmares. It just works."', "Priya M.", "Multi-Platform Host, Los Angeles, CA"],
    ['"FleetHQ gave me the control I was missing. I finally run my fleet like a real business, not a side hustle."', "Raymond T.", "Fleet Owner, Houston, TX"],
    ['"We manage 20+ vehicles and keeping track of everything was a nightmare. Now it is all in one place."', "DeShawn W.", "Private Rental Operator, Miami, FL"],
    ['"Cut my admin time by more than half. The automated agreements and verification are a game changer."', "Marcus L.", "Daily Rentals, Phoenix, AZ"],
    ['"My branded booking site pays for itself. No more platform fees eating into every single trip."', "Aisha K.", "Independent Host, Atlanta, GA"],
    ['"Onboarding new cars used to take a day. With FleetHQ it takes minutes and everything just syncs."', "Tomás R.", "Growing Fleet, San Diego, CA"]
  ];

  function vcard(v) {
    return '<div class="v-card"><p>' + v[0] + "</p>" +
           '<div><div class="name">' + v[1] + '</div><div class="role">' + v[2] + "</div></div></div>";
  }

  function fillVoices(id, offset) {
    var el = document.getElementById(id);
    if (!el) return;
    var seq = [];
    for (var i = 0; i < voices.length; i++) seq.push(vcard(voices[(i + offset) % voices.length]));
    el.innerHTML = seq.join("") + seq.join("");
  }

  fillVoices("fhq-vt1", 0);
  fillVoices("fhq-vt2", 3);

  /* ---- Footer accordion (single open at a time) ---- */
  document.querySelectorAll('.footer-col li.has-children > a').forEach(function (a) {
    a.addEventListener('click', function (e) {
      e.preventDefault();
      var li = a.closest('.has-children');
      var isOpen = li.classList.contains('open');
      document.querySelectorAll('.footer-col li.has-children.open').forEach(function (el) {
        el.classList.remove('open');
      });
      if (!isOpen) li.classList.add('open');
    });
  });

  /* ---- Mega dropdown right panel ---- */
  function activateMegaItem(item) {
    var mega = item.closest('.nav-mega');
    if (!mega) return;
    mega.querySelectorAll('.mega-item').forEach(function (el) { el.classList.remove('active'); });
    if (item.classList.contains('has-sub')) {
      mega.querySelectorAll('.mega-right').forEach(function (p) { p.classList.remove('visible'); });
      var targetId = item.dataset.target;
      if (targetId) {
        var panel = document.getElementById(targetId);
        if (panel) panel.classList.add('visible');
      }
    }
    item.classList.add('active');
  }

  document.querySelectorAll('.nav-mega .mega-item').forEach(function (item) {
    item.addEventListener('mouseenter', function () { activateMegaItem(item); });
    item.addEventListener('click', function (e) { e.preventDefault(); activateMegaItem(item); });
  });

  /* ---- Hero figure scroll-scale ---- */
  (function () {
    var frame = document.querySelector(".hero-figure .frame");
    var fig   = document.querySelector(".hero-figure");
    var hero  = document.querySelector(".hero");
    if (!frame || !fig || !hero) return;
    frame.style.transformOrigin = "top center";
    var basePad = 40;
    function onScroll() {
      var s = Math.min(window.scrollY / 400, 1);
      var scale = 1 + s * 0.12;
      frame.style.transform = "scale(" + scale + ")";
      hero.style.paddingBottom = (basePad + frame.offsetHeight * (scale - 1)) + "px";
    }
    window.addEventListener("scroll", onScroll, { passive: true });
  })();

  /* ---- Nav dark/light toggle on scroll ---- */
  (function () {
    var header = document.querySelector(".site-header");
    if (!header) return;
    function updateNav() {
      var scrolled = window.scrollY > 40;
      header.classList.toggle("nav-scrolled", scrolled);
      var navBottom = header.getBoundingClientRect().bottom;
      var isDark = false;
      document.querySelectorAll("[data-nav-dark]").forEach(function (sec) {
        var r = sec.getBoundingClientRect();
        if (r.top <= navBottom && r.bottom > 0) isDark = true;
      });
      header.classList.toggle("nav-dark", isDark);
    }
    window.addEventListener("scroll", updateNav, { passive: true });
    window.addEventListener("load", updateNav);
    updateNav();
  })();

  /* ---- Dropdown hover via JS (handles pointer-events on scrolled nav) ---- */
  (function () {
    var navLinks = document.querySelector('.nav-links');
    if (!navLinks) return;
    var openItem = null;
    function closeAll() {
      navLinks.querySelectorAll('.menu-item-has-children').forEach(function (li) {
        li.classList.remove('nav-open');
        var sub = li.querySelector('.sub-menu, .nav-mega');
        if (sub) sub.style.display = '';
      });
      openItem = null;
    }
    navLinks.querySelectorAll('.menu-item-has-children').forEach(function (li) {
      var sub = li.querySelector('.sub-menu, .nav-mega');
      if (!sub) return;
      li.addEventListener('mouseenter', function () {
        closeAll();
        sub.style.display = 'flex';
        li.classList.add('nav-open');
        openItem = li;
      });
      li.addEventListener('mouseleave', function () {
        sub.style.display = '';
        li.classList.remove('nav-open');
        if (openItem === li) openItem = null;
      });
    });
    document.addEventListener('click', function (e) {
      if (!navLinks.contains(e.target)) closeAll();
    });
  })();

  /* ---- Mobile nav hamburger ---- */
  var burger = document.querySelector('.nav-burger:not(.nav-burger-close)');
  var navMob = document.getElementById('nav-mobile');
  function closeMobileNav() {
    if (!navMob) return;
    navMob.classList.remove('open');
    navMob.setAttribute('aria-hidden', 'true');
    if (burger) { burger.classList.remove('open'); burger.setAttribute('aria-expanded', 'false'); }
    document.body.style.overflow = '';
  }
  if (burger && navMob) {
    burger.addEventListener('click', function () {
      var open = navMob.classList.toggle('open');
      burger.classList.toggle('open', open);
      burger.setAttribute('aria-expanded', String(open));
      navMob.setAttribute('aria-hidden', String(!open));
      document.body.style.overflow = open ? 'hidden' : '';
    });
    var closeBtn = navMob.querySelector('.nav-burger-close');
    if (closeBtn) closeBtn.addEventListener('click', closeMobileNav);
    navMob.querySelectorAll('.nav-mobile-col a').forEach(function (a) {
      a.addEventListener('click', closeMobileNav);
    });
  }

})();
