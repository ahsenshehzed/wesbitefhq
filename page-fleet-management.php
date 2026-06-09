<?php
/**
 * Template Name: Fleet Management
 * Fleet Management product page — FleetHQ
 */
get_header();
$dash    = get_template_directory_uri() . '/assets/images/Fleet Management.png';
$cal_img = get_template_directory_uri() . '/assets/images/fm-calendar.png';
$card_img = get_template_directory_uri() . '/assets/images/fm-vehicle-card.png';
?>

<div class="fm-page">

  <!-- ── Hero ── -->
  <section class="fm-hero wrap" aria-labelledby="fm-headline">
    <p class="fm-eyebrow"><?php esc_html_e( 'Fleet Management', 'fleethq' ); ?></p>
    <h1 id="fm-headline" class="display fm-title"><?php esc_html_e( 'Car Rental Fleet Management Software', 'fleethq' ); ?></h1>
    <p class="lede fm-sub"><?php esc_html_e( 'Manage, track, and grow your vehicle inventory with FleetHQ. The ultimate car rental fleet management system built for independent brands.', 'fleethq' ); ?></p>

    <form class="hero-cta" action="https://fms.fleethq.io/auth/register" method="get" target="_blank" role="search" aria-label="<?php esc_attr_e( 'Start free trial', 'fleethq' ); ?>">
      <input class="input" type="email" name="email" placeholder="<?php esc_attr_e( 'Enter your company email', 'fleethq' ); ?>" aria-label="<?php esc_attr_e( 'Company email', 'fleethq' ); ?>" />
      <button class="btn btn-dark" type="submit"><?php esc_html_e( 'Start free trial', 'fleethq' ); ?></button>
    </form>

    <div class="hero-figure fm-hero-figure">
      <div class="frame">
        <img src="<?php echo esc_url( $dash ); ?>" alt="<?php esc_attr_e( 'FleetHQ fleet management dashboard', 'fleethq' ); ?>" loading="eager" />
      </div>
    </div>
  </section>

  <!-- ── Built to scale ── -->
  <section class="fm-scale" aria-labelledby="fm-scale-headline">
    <div class="section-head">
      <h2 id="fm-scale-headline" class="h2"><?php esc_html_e( 'Fleet Management Software Built to Scale Your Inventory', 'fleethq' ); ?></h2>
      <p class="lede"><?php esc_html_e( 'Building a profitable car rental business requires professional infrastructure. FleetHQ provides a complete cloud architecture engineered to automate your entire business model, helping you transition from marketplace hosting to a private enterprise.', 'fleethq' ); ?></p>
      <a class="btn btn-dark" href="https://fms.fleethq.io/auth/register" target="_blank" rel="noopener"><?php esc_html_e( 'Start free trial', 'fleethq' ); ?></a>
    </div>

    <div class="fm-scale-grid wrap">
      <div class="fm-features">
        <div class="fm-feature">
          <h3><?php esc_html_e( 'Centralized Operations Command', 'fleethq' ); ?></h3>
          <p><?php esc_html_e( 'Keep every vehicle booked and every turnaround tight. FleetHQ automates scheduling, availability, and calendar management so no car sits idle and no opportunity is missed.', 'fleethq' ); ?></p>
        </div>
        <div class="fm-feature">
          <h3><?php esc_html_e( 'Preserve Asset Health', 'fleethq' ); ?></h3>
          <p><?php esc_html_e( 'Mark any car unavailable for specific dates in your dashboard to preserve asset health and handle maintenance.', 'fleethq' ); ?></p>
        </div>
        <div class="fm-feature">
          <h3><?php esc_html_e( 'Dynamic Inventory Growth', 'fleethq' ); ?></h3>
          <p><?php esc_html_e( 'Utilize our car rental fleet management software to centralize operations and securely grow your vehicle inventory.', 'fleethq' ); ?></p>
        </div>
      </div>

      <div class="fm-visual">
        <div class="fm-visual-panel">
          <img class="fm-visual-cal" src="<?php echo esc_url( $cal_img ); ?>" alt="<?php esc_attr_e( 'Next 14 days availability calendar', 'fleethq' ); ?>" loading="lazy" />
        </div>
        <img class="fm-visual-card" src="<?php echo esc_url( $card_img ); ?>" alt="<?php esc_attr_e( 'Chevrolet Equinox vehicle card', 'fleethq' ); ?>" loading="lazy" />
      </div>
    </div>
  </section>

  <?php get_template_part( 'template-parts/sections/faq' ); ?>
  <?php get_template_part( 'template-parts/sections/insights' ); ?>

</div><!-- .fm-page -->

<?php
get_template_part( 'template-parts/sections/voices' ); // testimonials + CTA + footer
?>
