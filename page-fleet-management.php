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
    <h1 id="fm-headline" class="display fm-title"><?php esc_html_e( 'Car Rental Fleet', 'fleethq' ); ?><br><?php esc_html_e( 'Management Software', 'fleethq' ); ?></h1>
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
      <div class="fm-features" role="tablist" aria-label="<?php esc_attr_e( 'Fleet management capabilities', 'fleethq' ); ?>">
        <button class="fm-feature active" type="button" role="tab" aria-selected="true" data-shot="0">
          <h3><?php esc_html_e( 'Centralized Operations Command', 'fleethq' ); ?></h3>
          <p><?php esc_html_e( 'Keep every vehicle booked and every turnaround tight. FleetHQ automates scheduling, availability, and calendar management so no car sits idle and no opportunity is missed.', 'fleethq' ); ?></p>
        </button>
        <button class="fm-feature" type="button" role="tab" aria-selected="false" data-shot="1">
          <h3><?php esc_html_e( 'Preserve Asset Health', 'fleethq' ); ?></h3>
          <p><?php esc_html_e( 'Mark any car unavailable for specific dates in your dashboard to preserve asset health and handle maintenance.', 'fleethq' ); ?></p>
        </button>
        <button class="fm-feature" type="button" role="tab" aria-selected="false" data-shot="2">
          <h3><?php esc_html_e( 'Dynamic Inventory Growth', 'fleethq' ); ?></h3>
          <p><?php esc_html_e( 'Utilize our car rental fleet management software to centralize operations and securely grow your vehicle inventory.', 'fleethq' ); ?></p>
        </button>
      </div>

      <div class="fm-visual">
        <!-- Shot 0: command center — car tile behind, calendar smaller in front -->
        <div class="fm-shot active" data-shot="0">
          <div class="fm-composite">
            <img class="fm-card" src="<?php echo esc_url( $card_img ); ?>" alt="<?php esc_attr_e( 'Chevrolet Equinox vehicle card', 'fleethq' ); ?>" loading="lazy" />
            <img class="fm-cal" src="<?php echo esc_url( $cal_img ); ?>" alt="<?php esc_attr_e( 'Next 14 days availability calendar', 'fleethq' ); ?>" loading="lazy" />
          </div>
        </div>
        <!-- Shot 1: asset health — single vehicle -->
        <div class="fm-shot fm-shot-single" data-shot="1">
          <img src="<?php echo esc_url( $card_img ); ?>" alt="<?php esc_attr_e( 'Vehicle availability card', 'fleethq' ); ?>" loading="lazy" />
        </div>
        <!-- Shot 2: inventory growth — full fleet dashboard -->
        <div class="fm-shot fm-shot-single fm-shot-wide" data-shot="2">
          <img src="<?php echo esc_url( $dash ); ?>" alt="<?php esc_attr_e( 'Fleet management dashboard', 'fleethq' ); ?>" loading="lazy" />
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part( 'template-parts/sections/faq' ); ?>
  <?php get_template_part( 'template-parts/sections/insights' ); ?>

</div><!-- .fm-page -->

<script>
(function(){
  var feats = document.querySelectorAll('.fm-feature');
  var shots = document.querySelectorAll('.fm-shot');
  if (!feats.length) return;
  function activate(i){
    feats.forEach(function(f){
      var on = f.dataset.shot === String(i);
      f.classList.toggle('active', on);
      f.setAttribute('aria-selected', on ? 'true' : 'false');
    });
    shots.forEach(function(s){ s.classList.toggle('active', s.dataset.shot === String(i)); });
  }
  feats.forEach(function(f){
    f.addEventListener('click', function(){ activate(f.dataset.shot); });
    f.addEventListener('mouseenter', function(){ activate(f.dataset.shot); });
  });
})();
</script>


<?php
get_template_part( 'template-parts/sections/voices' ); // testimonials + CTA + footer
?>
