<?php
/**
 * Template part: Pricing section for the landing page.
 * Condensed version of the Pricing page — heading + billing toggle + 3 plan
 * cards + link to the full pricing page. Reuses the .price-card styles.
 */
$pricing_url = '';
$pp = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'page-pricing.php' ] );
if ( $pp ) $pricing_url = get_permalink( $pp[0]->ID );
if ( ! $pricing_url ) { $p = get_page_by_path( 'pricing' ); if ( $p ) $pricing_url = get_permalink( $p->ID ); }
if ( ! $pricing_url ) $pricing_url = home_url( '/pricing/' );
?>
<section class="pricing-section dark" data-nav-dark aria-labelledby="lp-pricing-headline">
  <div class="pricing-hero">
    <div class="pricing-hero-inner wrap">
      <p class="pricing-eyebrow"><?php esc_html_e( 'Plans & Pricing', 'fleethq' ); ?></p>
      <h2 id="lp-pricing-headline" class="h2" style="color:#fff;max-width:640px;margin:0 auto">
        <?php esc_html_e( 'Simple pricing for every fleet size', 'fleethq' ); ?>
      </h2>
      <p class="lede" style="margin-top:16px;color:#dcdcdc;text-align:center">
        <?php esc_html_e( 'Start free. Scale as you grow. Keep every dollar you earn.', 'fleethq' ); ?>
      </p>

      <div class="price-toggle" role="group" aria-label="<?php esc_attr_e( 'Billing period', 'fleethq' ); ?>">
        <button class="price-toggle-btn active" data-period="annual"><?php esc_html_e( 'Annual', 'fleethq' ); ?> <span class="price-save"><?php esc_html_e( 'Save 20%', 'fleethq' ); ?></span></button>
        <button class="price-toggle-btn" data-period="monthly"><?php esc_html_e( 'Monthly', 'fleethq' ); ?></button>
      </div>
    </div>
  </div>

  <div class="pricing-cards-wrap">
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
          <li><?php esc_html_e( 'Automated E-Sign Agreements', 'fleethq' ); ?></li>
          <li><?php esc_html_e( 'Turo Calendar Sync', 'fleethq' ); ?></li>
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

    <div class="wrap pricing-section-foot">
      <a class="btn btn-light" href="<?php echo esc_url( $pricing_url ); ?>"><?php esc_html_e( 'View full pricing & features →', 'fleethq' ); ?></a>
    </div>
  </div>
</section>

<script>
(function(){
  var sec = document.querySelector('.pricing-section');
  if (!sec) return;
  var btns = sec.querySelectorAll('.price-toggle-btn');
  var amounts = sec.querySelectorAll('.price-amount[data-annual]');
  btns.forEach(function(btn){
    btn.addEventListener('click', function(){
      btns.forEach(function(b){ b.classList.remove('active'); });
      btn.classList.add('active');
      var period = btn.dataset.period;
      amounts.forEach(function(el){ el.textContent = el.dataset[period]; });
    });
  });
})();
</script>
