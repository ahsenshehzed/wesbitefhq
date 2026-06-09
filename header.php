<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
<style>
/* ── FleetHQ: force full-width, override all WP layout constraints ── */
:root {
  --wp--style--global--content-size: 100% !important;
  --wp--style--global--wide-size: 100% !important;
}
html, body {
  width: 100% !important;
  max-width: 100% !important;
  margin: 0 !important;
  padding: 0 !important;
}
body > .wp-site-blocks,
body > #page,
body > .site,
#content, #primary, #main,
.entry-content, .wp-block-group,
.wp-block-post-content {
  width: 100% !important;
  max-width: 100% !important;
  margin: 0 !important;
  padding: 0 !important;
}
/* ── Page top spacing — clears fixed nav on all page types ── */
.hero,
.post-hero,
.pricing-hero,
.blog-page,
.blog-page-hero,
.single-article,
.wrap.entry-content {
  margin-top: 54px !important;
}
.hero { padding-top: 72px !important; }
</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="stage">
<?php
// ── Elementor Pro: render header location if set, else use theme header ──
$show_header = apply_filters( 'fleethq_show_header', true );
if ( $show_header && function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'header' ) ) :
	// Elementor Pro header template will render here
	do_action( 'fleethq_after_header' );
elseif ( $show_header ) :
?>

<header class="site-header<?php if ( is_page_template( 'page-pricing.php' ) ) echo ' nav-dark'; ?>">
  <nav class="nav-inner wrap" aria-label="<?php esc_attr_e( 'Primary navigation', 'fleethq' ); ?>">

    <div class="nav-left">
      <!-- Logo -->
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-brand">
          <img class="site-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          <img class="site-logo-mark" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-mark.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          <img class="site-logo-dark"  src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-scrolled.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          <img class="site-logo-white" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-white.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
        </a>
      <?php endif; ?>

      <!-- Primary menu -->
      <div class="nav-links">
        <?php
        wp_nav_menu( [
          'theme_location' => 'primary',
          'container'      => false,
          'fallback_cb'    => function () {
            $pricing_url = '';
            $pricing_page = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'page-pricing.php' ] );
            if ( $pricing_page ) $pricing_url = get_permalink( $pricing_page[0]->ID );
            if ( ! $pricing_url ) {
              $p = get_page_by_path( 'pricing' );
              if ( $p ) $pricing_url = get_permalink( $p->ID );
            }
            if ( ! $pricing_url ) $pricing_url = home_url( '/pricing/' );

            $blog_url = get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' );

            $calc_url = '';
            $calc_page = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'page-calculator.php' ] );
            if ( $calc_page ) $calc_url = get_permalink( $calc_page[0]->ID );
            if ( ! $calc_url ) { $cp = get_page_by_path( 'calculator' ); if ( $cp ) $calc_url = get_permalink( $cp->ID ); }
            if ( ! $calc_url ) $calc_url = home_url( '/calculator/' );

            echo '<ul>
              <li class="menu-item-has-children">
                <a href="#">Product</a>
                <ul class="sub-menu">
                  <li><a href="#">Fleet &amp; Booking Management</a></li>
                  <li><a href="#">Free Booking Website</a></li>
                  <li><a href="#">Rental Agreements</a></li>
                  <li><a href="#">Verification &amp; Insurance</a></li>
                  <li><a href="#">Turo Calendar Sync</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a href="#">Why us</a>
                <ul class="sub-menu">
                  <li><a href="#">Daily Wage Fleet</a></li>
                  <li><a href="#">Luxury Cars</a></li>
                  <li><a href="#">Short/Long Term Rentals</a></li>
                  <li><a href="#">About Us</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a href="#">Resources</a>
                <ul class="sub-menu">
                  <li><a href="' . esc_url( $blog_url ) . '">Blog</a></li>
                  <li><a href="#">Case Studies</a></li>
                  <li><a href="' . esc_url( $calc_url ) . '">Savings Calculator</a></li>
                </ul>
              </li>
              <li><a href="' . esc_url( $pricing_url ) . '">Pricing</a></li>
            </ul>';
          },
        ] );
        ?>
      </div>
    </div><!-- .nav-left -->

    <div class="nav-mobile-bar">
      <a class="btn btn-dark nav-demo-btn" href="https://calendly.com/z-fleethq/30min" target="_blank" rel="noopener"><?php esc_html_e( 'Book a demo', 'fleethq' ); ?></a>
      <button class="nav-burger" aria-label="Open menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>

    <div class="nav-right">
      <a class="btn btn-ghost" href="https://fms.fleethq.io/" target="_blank" rel="noopener"><?php esc_html_e( 'Open app', 'fleethq' ); ?></a>
      <span class="vsep" aria-hidden="true"></span>
      <a class="btn btn-ghost" href="https://fms.fleethq.io/auth/register" target="_blank" rel="noopener"><?php esc_html_e( 'Start free trial', 'fleethq' ); ?></a>
      <a class="btn btn-dark"  href="https://calendly.com/z-fleethq/30min" target="_blank" rel="noopener"><?php esc_html_e( 'Book a demo', 'fleethq' ); ?></a>
    </div>

  </nav>
</header>
<div class="nav-mobile" id="nav-mobile" aria-hidden="true">
  <div class="nav-mobile-head">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-brand">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="height:28px;width:auto;" />
    </a>
    <div style="display:flex;align-items:center;gap:10px;">
      <a class="btn btn-dark" href="<?php echo esc_url( home_url( '/demo' ) ); ?>"><?php esc_html_e( 'Book a demo', 'fleethq' ); ?></a>
      <button class="nav-burger nav-burger-close" aria-label="Close menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
  <div class="nav-mobile-grid">
    <div class="nav-mobile-col">
      <span class="nav-mobile-cat"><?php esc_html_e( 'Product', 'fleethq' ); ?></span>
      <a href="#"><?php esc_html_e( 'Fleet & Booking Management', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Free Booking Website', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Rental Agreements', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Verification & Insurance', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Turo Calendar Sync', 'fleethq' ); ?></a>
      <?php
      $mob_pricing = '';
      $mob_p = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'page-pricing.php' ] );
      if ( $mob_p ) $mob_pricing = get_permalink( $mob_p[0]->ID );
      if ( ! $mob_pricing ) { $pp = get_page_by_path('pricing'); if($pp) $mob_pricing = get_permalink($pp->ID); }
      if ( ! $mob_pricing ) $mob_pricing = home_url('/pricing/');
      $mob_blog = get_permalink( get_option('page_for_posts') ) ?: home_url('/blog/');
      $mob_calc = '';
      $mob_cp = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'page-calculator.php' ] );
      if ( $mob_cp ) $mob_calc = get_permalink( $mob_cp[0]->ID );
      if ( ! $mob_calc ) { $mcp = get_page_by_path('calculator'); if($mcp) $mob_calc = get_permalink($mcp->ID); }
      if ( ! $mob_calc ) $mob_calc = home_url('/calculator/');
      ?>
      <a href="<?php echo esc_url( $mob_pricing ); ?>"><?php esc_html_e( 'Pricing', 'fleethq' ); ?></a>
    </div>
    <div class="nav-mobile-col">
      <span class="nav-mobile-cat"><?php esc_html_e( 'Why us', 'fleethq' ); ?></span>
      <a href="#"><?php esc_html_e( 'Daily Wage Fleet', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Luxury Cars', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Short/Long Term Rentals', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Founders', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Competitor Comparison', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'About Us', 'fleethq' ); ?></a>
    </div>
    <div class="nav-mobile-col">
      <span class="nav-mobile-cat"><?php esc_html_e( 'Resources', 'fleethq' ); ?></span>
      <a href="<?php echo esc_url( $mob_blog ); ?>"><?php esc_html_e( 'Blog', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Case Studies', 'fleethq' ); ?></a>
      <a href="<?php echo esc_url( $mob_calc ); ?>"><?php esc_html_e( 'Savings Calculator', 'fleethq' ); ?></a>
    </div>
    <div class="nav-mobile-col">
      <span class="nav-mobile-cat"><?php esc_html_e( 'Company', 'fleethq' ); ?></span>
      <a href="#"><?php esc_html_e( 'Open App', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Start Free Trial', 'fleethq' ); ?></a>
      <a href="#"><?php esc_html_e( 'Partner Program', 'fleethq' ); ?></a>
    </div>
  </div>
</div>
<?php endif; // end show_header / Elementor Pro header check ?>
