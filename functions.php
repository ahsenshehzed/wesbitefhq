<?php
/**
 * FleetHQ theme functions
 */

defined( 'ABSPATH' ) || exit;

/* ---- theme setup ---- */
function fleethq_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ] );
	add_theme_support( 'custom-logo', [
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	] );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );
	add_theme_support( 'responsive-embeds' );

	/* Menus */
	register_nav_menus( [
		'primary'          => __( 'Primary Navigation', 'fleethq' ),
		'footer_product'   => __( 'Footer: Product', 'fleethq' ),
		'footer_why'       => __( 'Footer: Why Us', 'fleethq' ),
		'footer_resources' => __( 'Footer: Resources', 'fleethq' ),
		'footer_contact'   => __( 'Footer: Contact', 'fleethq' ),
	] );
}
add_action( 'after_setup_theme', 'fleethq_setup' );

/* ---- enqueue assets ---- */
function fleethq_enqueue() {
	wp_enqueue_style(
		'fleethq-fonts',
		'https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Poppins:ital,wght@0,400;0,500;1,400;1,500&family=Inter:wght@400;500;600;700&family=Dawning+of+a+New+Day&display=swap',
		[],
		null
	);

	wp_enqueue_style(
		'fleethq-main',
		get_template_directory_uri() . '/assets/css/main.css',
		[ 'fleethq-fonts' ],
		wp_get_theme()->get( 'Version' ) . '.' . filemtime( get_template_directory() . '/assets/css/main.css' )
	);

	wp_enqueue_script(
		'fleethq-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		wp_get_theme()->get( 'Version' ) . '.' . filemtime( get_template_directory() . '/assets/js/main.js' ),
		true
	);

	/* Pass image URLs to JS */
	wp_localize_script( 'fleethq-main', 'fleethqData', [
		'dashboardImg'      => get_template_directory_uri() . '/assets/images/dashboard.png',
		'fleetMgmtImg'      => get_template_directory_uri() . '/assets/images/Fleet Management.png',
		'calendarImg'       => get_template_directory_uri() . '/assets/images/Calendar.png',
		'integrationsImg'   => get_template_directory_uri() . '/assets/images/Integrations.png',
		'rentalAgreementImg'=> get_template_directory_uri() . '/assets/images/Rental Agreement.png',
		'freeWebsiteImg'    => get_template_directory_uri() . '/assets/images/Desktop - 105.png',
		'taxiImg'           => get_template_directory_uri() . '/assets/images/illo-taxi.png',
		'tabDailyWageOn'    => get_template_directory_uri() . '/assets/images/illo-taxi.png',
		'tabDailyWageOff'   => get_template_directory_uri() . '/assets/images/tab-dailywage-off.png',
		'tabLuxuryOn'       => get_template_directory_uri() . '/assets/images/tab-luxury.png',
		'tabLuxuryOff'      => get_template_directory_uri() . '/assets/images/tab-luxury-off.png',
		'tabFoundersOn'     => get_template_directory_uri() . '/assets/images/tab-founders.png',
		'tabFoundersOff'    => get_template_directory_uri() . '/assets/images/tab-founders-off.png',
		'tabHourlyOn'       => get_template_directory_uri() . '/assets/images/tab-hourly.png',
		'tabHourlyOff'      => get_template_directory_uri() . '/assets/images/tab-hourly-off.png',
		'tabGrowthOn'       => get_template_directory_uri() . '/assets/images/tab-growth.png',
		'tabGrowthOff'      => get_template_directory_uri() . '/assets/images/tab-growth-off.png',
	] );
}
add_action( 'wp_enqueue_scripts', 'fleethq_enqueue' );

/* ---- Remove WordPress global styles that constrain layout ---- */
function fleethq_remove_global_styles() {
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'fleethq_remove_global_styles', 100 );

/* Remove inline global styles injected by WordPress */
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/* ---- widget areas ---- */
function fleethq_widgets() {
	register_sidebar( [
		'name'          => __( 'Footer Widget Area', 'fleethq' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Widgets shown in the footer columns', 'fleethq' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	] );
}
add_action( 'widgets_init', 'fleethq_widgets' );

/* ---- customizer ---- */
require get_template_directory() . '/inc/customizer.php';

/* ---- Elementor compatibility ---- */
require get_template_directory() . '/inc/elementor-compat.php';

/* ---- Advanced structured SEO (replaces fleethq_seo_head) ---- */
require get_template_directory() . '/inc/seo-structured.php';

/* ---- helper: get customizer value ---- */
function fleethq_opt( $key, $fallback = '' ) {
	return get_theme_mod( $key, $fallback );
}

/* ---- SEO is now handled by inc/seo-structured.php ---- */

/* ---- Gutenberg: allow wide blocks ---- */
function fleethq_block_editor_assets() {
	wp_add_inline_style( 'wp-block-editor', '
		.editor-styles-wrapper { font-family: "Bricolage Grotesque", system-ui, sans-serif; }
	' );
}
add_action( 'enqueue_block_editor_assets', 'fleethq_block_editor_assets' );

/* ---- excerpt length ---- */
add_filter( 'excerpt_length', fn() => 20 );
add_filter( 'excerpt_more',   fn() => '…' );
