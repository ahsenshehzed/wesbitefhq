<?php
/**
 * Template part: Hero section
 * Content editable via Customizer → Hero Section
 */
$badge    = fleethq_opt( 'fleethq_hero_badge',    'Start a rental business on your terms →' );
$headline = fleethq_opt( 'fleethq_hero_headline', 'Own Your Fleet. Own Your Guests. Own Your Profit.' );
$sub      = fleethq_opt( 'fleethq_hero_sub',      'Own your fleet, automate your operations, scale on your terms, and keep every dollar you earn.' );
$cta      = fleethq_opt( 'fleethq_hero_cta',      'Start free trial' );
$dash_img = get_template_directory_uri() . '/assets/images/dashboard-app.webp';
?>
<section class="hero wrap" aria-labelledby="hero-headline">

  <div class="hero-badge">
    <span class="tag-new"><?php esc_html_e( 'New', 'fleethq' ); ?></span>
    <span class="txt"><?php echo esc_html( $badge ); ?></span>
  </div>

  <h1 id="hero-headline" class="display"><?php echo esc_html( $headline ); ?></h1>
  <p class="lede"><?php echo esc_html( $sub ); ?></p>

  <form class="hero-cta" action="https://fms.fleethq.io/auth/register" method="get" target="_blank" role="search" aria-label="<?php esc_attr_e( 'Start free trial', 'fleethq' ); ?>">
    <input class="input" type="email" name="email" placeholder="<?php esc_attr_e( 'Enter your company email', 'fleethq' ); ?>" aria-label="<?php esc_attr_e( 'Company email', 'fleethq' ); ?>" />
    <button class="btn btn-dark" type="submit"><?php echo esc_html( $cta ); ?></button>
  </form>

  <div class="hero-figure">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-route.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;top:-40px;left:-100px;width:180px;height:auto;pointer-events:none;z-index:0;mix-blend-mode:multiply;border:none;border-radius:0;background:none;-webkit-mask-image:radial-gradient(ellipse 80% 85% at 55% 55%,black 60%,transparent 100%);mask-image:radial-gradient(ellipse 80% 85% at 55% 55%,black 60%,transparent 100%);" />
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-car.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;top:-30px;right:-130px;width:170px;height:auto;pointer-events:none;z-index:0;mix-blend-mode:multiply;border:none;border-radius:0;background:none;-webkit-mask-image:radial-gradient(ellipse 80% 80% at 45% 55%,black 55%,transparent 100%);mask-image:radial-gradient(ellipse 80% 80% at 45% 55%,black 55%,transparent 100%);" />
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-bolt.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;bottom:9px;left:-22px;width:12px;height:auto;pointer-events:none;z-index:0;border:none;border-radius:0;background:none;" />
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-icons.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;bottom:-20px;right:-80px;width:100px;height:auto;pointer-events:none;z-index:0;mix-blend-mode:multiply;border:none;border-radius:0;background:none;-webkit-mask-image:radial-gradient(ellipse 80% 80% at 45% 45%,black 55%,transparent 100%);mask-image:radial-gradient(ellipse 80% 80% at 45% 45%,black 55%,transparent 100%);" />
    <div class="frame">
      <img src="<?php echo esc_url( $dash_img ); ?>" alt="<?php esc_attr_e( 'FleetHQ dashboard screenshot', 'fleethq' ); ?>" width="704" loading="eager" style="position:relative;z-index:1;" />
    </div>
  </div>

</section>
