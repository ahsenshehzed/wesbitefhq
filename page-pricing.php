<?php
/**
 * Template Name: Pricing
 * Pricing page template — FleetHQ
 */
get_header();
?>

<div class="pricing-page">

  <!-- ── Dark hero ── -->
  <section class="pricing-hero dark" data-nav-dark>
    <div class="pricing-hero-inner wrap">
      <p class="pricing-eyebrow"><?php esc_html_e( 'Plans & Pricing', 'fleethq' ); ?></p>
      <h1 class="display" style="color:#fff;max-width:640px;margin:0 auto">
        <?php esc_html_e( 'Simple pricing', 'fleethq' ); ?><br><?php esc_html_e( 'for every fleet size', 'fleethq' ); ?>
      </h1>
      <p class="lede" style="margin-top:16px;color:#dcdcdc;text-align:center">
        <?php esc_html_e( 'Start free. Scale as you grow. Keep every dollar you earn.', 'fleethq' ); ?>
      </p>

      <!-- Toggle (annual / monthly) -->
      <div class="price-toggle" role="group" aria-label="<?php esc_attr_e( 'Billing period', 'fleethq' ); ?>">
        <button class="price-toggle-btn active" data-period="annual"><?php esc_html_e( 'Annual', 'fleethq' ); ?> <span class="price-save"><?php esc_html_e( 'Save 20%', 'fleethq' ); ?></span></button>
        <button class="price-toggle-btn" data-period="monthly"><?php esc_html_e( 'Monthly', 'fleethq' ); ?></button>
      </div>
    </div>
  </section>

  <!-- ── Pricing cards ── -->
  <section class="pricing-cards-wrap dark">
    <div class="pricing-cards wrap">

      <!-- Starter -->
      <div class="price-card">
        <div class="price-card-head">
          <div class="price-card-name"><?php esc_html_e( 'Starter', 'fleethq' ); ?></div>
          <p class="price-card-desc"><?php esc_html_e( 'Perfect for independent operators just getting started.', 'fleethq' ); ?></p>
        </div>
        <div class="price-card-price">
          <span class="price-amount" data-annual="$149" data-monthly="$179">$149</span>
          <span class="price-period"><?php esc_html_e( '/mo', 'fleethq' ); ?></span>
        </div>
        <div class="price-vehicles"><?php esc_html_e( 'Up to 15 Cars', 'fleethq' ); ?></div>
        <div class="price-includes"><?php esc_html_e( 'Includes:', 'fleethq' ); ?></div>
        <ul class="price-features">
          <li><?php esc_html_e( 'Mobile Optimized Branded Website', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Direct Fleet Booking', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Renter ID & Insurance Verification', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Payment Integration', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Bonzah Damage & Liability Insurance', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Automated E-Sign Agreements', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Turo Calendar Sync', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Booking Calendar with Turo View', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Manual Price Customization', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Security Deposit Handling', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Real-Time Analytics', 'fleethq' ); ?></li>
        </ul>
        <a class="btn btn-light price-cta" href="<?php echo esc_url( home_url( '/signup' ) ); ?>"><?php esc_html_e( 'Get started', 'fleethq' ); ?></a>
      </div>

      <!-- Professional — popular -->
      <div class="price-card price-card-featured">
        <div class="price-card-head">
          <div class="price-card-name-row">
            <div class="price-card-name"><?php esc_html_e( 'Professional', 'fleethq' ); ?></div>
            <span class="price-popular-pill"><?php esc_html_e( 'POPULAR', 'fleethq' ); ?></span>
          </div>
          <p class="price-card-desc"><?php esc_html_e( 'For growing teams managing larger fleets.', 'fleethq' ); ?></p>
        </div>
        <div class="price-card-price">
          <span class="price-amount" data-annual="$249" data-monthly="$299">$249</span>
          <span class="price-period"><?php esc_html_e( '/mo', 'fleethq' ); ?></span>
        </div>
        <div class="price-vehicles"><?php esc_html_e( 'Up to 75 Cars', 'fleethq' ); ?></div>
        <div class="price-includes"><?php esc_html_e( 'For growing teams, includes:', 'fleethq' ); ?></div>
        <ul class="price-features">
          <li><?php esc_html_e( 'Everything in Starter', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Support for larger fleets (up to 75 cars)', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Renter Criminal Background Check', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Priority Feature Access', 'fleethq' ); ?></li>
        </ul>
        <a class="btn btn-dark price-cta" href="<?php echo esc_url( home_url( '/signup' ) ); ?>"><?php esc_html_e( 'Get started', 'fleethq' ); ?></a>
      </div>

      <!-- Enterprise -->
      <div class="price-card">
        <div class="price-card-head">
          <div class="price-card-name"><?php esc_html_e( 'Enterprise', 'fleethq' ); ?></div>
          <p class="price-card-desc"><?php esc_html_e( 'For large organizations running fleets at scale.', 'fleethq' ); ?></p>
        </div>
        <div class="price-card-price">
          <span class="price-amount price-custom"><?php esc_html_e( 'Custom', 'fleethq' ); ?></span>
          <span class="price-period"><?php esc_html_e( '/mo', 'fleethq' ); ?></span>
        </div>
        <div class="price-vehicles"><?php esc_html_e( '75+ Cars', 'fleethq' ); ?></div>
        <div class="price-includes"><?php esc_html_e( 'For large organizations, includes:', 'fleethq' ); ?></div>
        <ul class="price-features">
          <li><?php esc_html_e( 'Everything in Professional', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Support for fleets more than 75', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Flexible Invoicing', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Priority support', 'fleethq' ); ?></li>
        </ul>
        <a class="btn btn-light price-cta" href="<?php echo esc_url( home_url( '/demo' ) ); ?>"><?php esc_html_e( 'Book a demo', 'fleethq' ); ?></a>
      </div>

    </div><!-- .pricing-cards -->

    <!-- ── Trusted logos — inside dark section ── -->
    <div class="pricing-trust-dark wrap">
      <p class="pricing-trust-label"><?php esc_html_e( 'Trusted by fleet operators across the country', 'fleethq' ); ?></p>
      <div class="partners pricing-partners-dark" style="margin-top:24px">
        <div class="partner"><div class="wm">checkr</div></div>
        <div class="partner"><div class="wm">Stripe</div></div>
        <div class="partner"><div class="wm">Turo</div></div>
        <div class="partner"><div class="wm">bonzah</div></div>
      </div>
    </div>
  </section>

  <!-- ── Feature comparison table ── -->
  <section class="pricing-compare" style="display:none">
    <div class="wrap">
      <h2 class="h2" style="text-align:center;margin-bottom:56px"><?php esc_html_e( 'Compare features & plans', 'fleethq' ); ?></h2>

      <div class="compare-table-wrap">
        <table class="compare-table">
          <thead>
            <tr>
              <th class="compare-feature-col"></th>
              <th>
                <div class="compare-plan-name"><?php esc_html_e( 'Starter', 'fleethq' ); ?></div>
                <a class="btn btn-ghost compare-select" href="<?php echo esc_url( home_url( '/signup' ) ); ?>"><?php esc_html_e( 'Get started', 'fleethq' ); ?></a>
              </th>
              <th class="compare-featured-col">
                <div class="compare-plan-name"><?php esc_html_e( 'Professional', 'fleethq' ); ?></div>
                <a class="btn btn-dark compare-select" href="<?php echo esc_url( home_url( '/signup' ) ); ?>"><?php esc_html_e( 'Get started', 'fleethq' ); ?></a>
              </th>
              <th>
                <div class="compare-plan-name"><?php esc_html_e( 'Enterprise', 'fleethq' ); ?></div>
                <a class="btn btn-ghost compare-select" href="<?php echo esc_url( home_url( '/demo' ) ); ?>"><?php esc_html_e( 'Book demo', 'fleethq' ); ?></a>
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- Fleet & Booking -->
            <tr class="compare-category"><td colspan="4"><?php esc_html_e( 'Fleet & Booking Management', 'fleethq' ); ?></td></tr>
            <tr><td><?php esc_html_e( 'Vehicle management', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Booking calendar', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Vehicle limit', 'fleethq' ); ?></td><td class="c-val">5</td><td class="c-val compare-featured-col">20</td><td class="c-val">Unlimited</td></tr>
            <tr><td><?php esc_html_e( 'Turo calendar sync', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Multi-platform management', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>

            <!-- Website & Agreements -->
            <tr class="compare-category"><td colspan="4"><?php esc_html_e( 'Website & Agreements', 'fleethq' ); ?></td></tr>
            <tr><td><?php esc_html_e( 'Free booking website', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Custom domain', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'White-label branding', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-dash compare-featured-col">—</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Digital rental agreements', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'E-signature', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Custom agreement templates', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>

            <!-- Verification & Insurance -->
            <tr class="compare-category"><td colspan="4"><?php esc_html_e( 'Verification & Insurance', 'fleethq' ); ?></td></tr>
            <tr><td><?php esc_html_e( 'Driver ID verification', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'License verification', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Insurance verification', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Background checks', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>

            <!-- Analytics & Reporting -->
            <tr class="compare-category"><td colspan="4"><?php esc_html_e( 'Analytics & Reporting', 'fleethq' ); ?></td></tr>
            <tr><td><?php esc_html_e( 'Basic analytics', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Revenue reporting', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Fleet utilization reports', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Custom reports & exports', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-dash compare-featured-col">—</td><td class="c-check">✓</td></tr>

            <!-- Support -->
            <tr class="compare-category"><td colspan="4"><?php esc_html_e( 'Support', 'fleethq' ); ?></td></tr>
            <tr><td><?php esc_html_e( 'Help center access', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Email support', 'fleethq' ); ?></td><td class="c-check">✓</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Priority support', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-check compare-featured-col">✓</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( 'Dedicated onboarding', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-dash compare-featured-col">—</td><td class="c-check">✓</td></tr>
            <tr><td><?php esc_html_e( '24/7 dedicated support', 'fleethq' ); ?></td><td class="c-dash">—</td><td class="c-dash compare-featured-col">—</td><td class="c-check">✓</td></tr>
          </tbody>
        </table>
      </div><!-- .compare-table-wrap -->

    </div>
  </section>

  <!-- ── FAQ ── -->
  <section class="pricing-faq">
    <div class="wrap pricing-faq-inner">
      <h2 class="h2"><?php esc_html_e( 'Frequently asked questions', 'fleethq' ); ?></h2>
      <?php
      $faqs = [
        [ 'q' => 'Do I need a credit card to start?',            'a' => 'No. Your 14-day free trial starts immediately with no credit card required. You\'ll only be asked for payment details when you choose to upgrade.' ],
        [ 'q' => 'Can I change my plan later?',                  'a' => 'Yes. You can upgrade, downgrade, or cancel your plan at any time from your account settings. Changes take effect at the next billing cycle.' ],
        [ 'q' => 'What happens if I go over my vehicle limit?',   'a' => 'We\'ll notify you before you hit your limit. You can add more vehicles by upgrading to the next plan — we\'ll never lock you out mid-rental.' ],
        [ 'q' => 'Is there a setup fee?',                        'a' => 'None. FleetHQ is designed to get you running in minutes. There are no setup fees, implementation costs, or hidden charges on any plan.' ],
        [ 'q' => 'How does the annual discount work?',           'a' => 'Choosing annual billing saves you 20% compared to paying month-to-month. The full year is billed upfront.' ],
        [ 'q' => 'Can I get a demo before signing up?',          'a' => 'Absolutely. Book a demo with our team and we\'ll walk you through the platform, answer your questions, and help you find the right plan.' ],
      ];
      ?>
      <ul class="faq-list">
        <?php foreach ( $faqs as $i => $faq ) : ?>
          <li class="faq-item">
            <button class="faq-btn" aria-expanded="false">
              <span class="faq-num"><?php echo $i + 1; ?></span>
              <span class="faq-q"><?php echo esc_html( $faq['q'] ); ?></span>
              <span class="faq-icon">+</span>
            </button>
            <div class="faq-body"><p class="faq-a"><?php echo esc_html( $faq['a'] ); ?></p></div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

</div><!-- .pricing-page -->

<script>
(function(){
  // FAQ accordion
  document.querySelectorAll('.faq-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var item = btn.closest('.faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(function(el) {
        el.classList.remove('open');
        el.querySelector('.faq-btn').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) { item.classList.add('open'); btn.setAttribute('aria-expanded', 'true'); }
    });
  });

  // Pricing toggle
  var btns = document.querySelectorAll('.price-toggle-btn');
  var amounts = document.querySelectorAll('.price-amount[data-annual]');
  btns.forEach(function(btn){
    btn.addEventListener('click', function(){
      btns.forEach(function(b){ b.classList.remove('active'); });
      btn.classList.add('active');
      var period = btn.dataset.period;
      amounts.forEach(function(el){
        el.textContent = el.dataset[period];
      });
    });
  });

  // Force dark nav at page load — sticky header sits exactly at hero top so
  // the overlap check in main.js returns false at scrollY=0. Run after all
  // deferred scripts (window load fires after defer) so we win.
  window.addEventListener('load', function() {
    var header = document.querySelector('.site-header');
    var hero   = document.querySelector('.pricing-hero[data-nav-dark]');
    if (header && hero) header.classList.add('nav-dark');
  });
})();
</script>

<?php
get_template_part( 'template-parts/sections/voices' );
get_footer();
?>
