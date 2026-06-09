<?php
/**
 * Template Name: Calculator
 * Savings calculator page — FleetHQ
 * Reuses the shared header, testimonials/CTA (voices) and footer.
 */
get_header();
?>

<div class="calc-page">
  <?php get_template_part( 'template-parts/sections/calculator' ); ?>
</div>

<script>
(function(){
  var widget = document.querySelector('.calc-widget');
  if (!widget) return;

  var rate    = document.getElementById('calc-rate');
  var util    = document.getElementById('calc-util');
  var rateVal = document.getElementById('calc-rate-val');
  var utilVal = document.getElementById('calc-util-val');
  var amount  = document.getElementById('calc-amount');

  // Effective platform cut we'd save by leaving Turo, calibrated so the
  // default position ($72/day, 57% utilization) lands on the design's $5,040.
  var TURO_TAKE = 0.3365;

  function fill(el){
    var pct = (el.value - el.min) / (el.max - el.min) * 100;
    el.style.setProperty('--pct', pct + '%');
  }

  function recalc(){
    var r = +rate.value, u = +util.value;
    rateVal.textContent = '$' + r;
    utilVal.textContent = u;

    var annual = Math.round(r * (u / 100) * 365 * TURO_TAKE / 10) * 10;
    amount.textContent = '$' + annual.toLocaleString('en-US');

    fill(rate); fill(util);
  }

  rate.addEventListener('input', recalc);
  util.addEventListener('input', recalc);
  recalc();
})();
</script>

<?php
get_template_part( 'template-parts/sections/voices' ); // testimonials + CTA + footer
?>
