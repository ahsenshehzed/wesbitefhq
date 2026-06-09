<?php
/**
 * Template part: Savings Calculator (Turo vs. FleetHQ)
 * Hero copy + interactive slider widget. Computes annual savings live.
 */
$eyebrow  = fleethq_opt( 'fleethq_calc_eyebrow',  'Still renting only on Turo?' );
$headline = fleethq_opt( 'fleethq_calc_headline', 'Calculate how much you can save with FleetHQ' );
$sub1     = fleethq_opt( 'fleethq_calc_sub1',     'You might be giving away hundreds each month without realizing it.' );
$sub2     = fleethq_opt( 'fleethq_calc_sub2',     'Use our calculator to compare what you earn on Turo vs. what you could earn with private rentals, using the same car, same rates, same effort.' );
$spark    = get_template_directory_uri() . '/assets/images/doodle-cta.png';
?>
<section class="calc-hero wrap" aria-labelledby="calc-headline">
  <p class="calc-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
  <h1 id="calc-headline" class="display calc-title"><?php echo esc_html( $headline ); ?></h1>
  <p class="lede calc-sub"><?php echo esc_html( $sub1 ); ?></p>
  <p class="lede calc-sub"><?php echo esc_html( $sub2 ); ?></p>

  <form class="hero-cta" action="https://fms.fleethq.io/auth/register" method="get" target="_blank" role="search" aria-label="<?php esc_attr_e( 'Start free trial', 'fleethq' ); ?>">
    <input class="input" type="email" name="email" placeholder="<?php esc_attr_e( 'Enter your company email', 'fleethq' ); ?>" aria-label="<?php esc_attr_e( 'Company email', 'fleethq' ); ?>" />
    <button class="btn btn-dark" type="submit"><?php esc_html_e( 'Start free trial', 'fleethq' ); ?></button>
  </form>
</section>

<section class="calc-widget wrap" aria-label="<?php esc_attr_e( 'Savings calculator', 'fleethq' ); ?>">
  <div class="calc-grid">

    <!-- Controls -->
    <div class="calc-controls">
      <div class="calc-field">
        <label class="calc-label" for="calc-rate"><?php esc_html_e( 'How much is your daily rental rate?', 'fleethq' ); ?></label>
        <div class="calc-value"><span id="calc-rate-val">$72</span><span class="calc-unit"><?php esc_html_e( '/day', 'fleethq' ); ?></span></div>
        <input type="range" class="calc-slider" id="calc-rate" min="20" max="300" step="1" value="72"
               aria-label="<?php esc_attr_e( 'Daily rental rate in dollars', 'fleethq' ); ?>" />
      </div>

      <div class="calc-field">
        <label class="calc-label" for="calc-util"><?php esc_html_e( 'How much is your utilization?', 'fleethq' ); ?></label>
        <div class="calc-value"><span id="calc-util-val">57</span><span class="calc-unit">%</span></div>
        <input type="range" class="calc-slider" id="calc-util" min="0" max="100" step="1" value="57"
               aria-label="<?php esc_attr_e( 'Fleet utilization percentage', 'fleethq' ); ?>" />
      </div>
    </div>

    <!-- Result -->
    <div class="calc-result">
      <img class="calc-result-spark" src="<?php echo esc_url( $spark ); ?>" alt="" aria-hidden="true" />
      <h2 class="calc-result-title"><?php esc_html_e( 'WE CAN HELP', 'fleethq' ); ?><br><?php esc_html_e( 'YOU SAVE!', 'fleethq' ); ?></h2>
      <p class="calc-result-note"><?php esc_html_e( 'Assuming 21 days of utilization on Turo.', 'fleethq' ); ?></p>
      <div class="calc-result-amount" id="calc-amount" aria-live="polite">$5,040</div>
      <p class="calc-result-period"><?php esc_html_e( 'Annually', 'fleethq' ); ?></p>
    </div>

  </div>
</section>
