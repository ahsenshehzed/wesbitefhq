<?php
/**
 * FleetHQ — Elementor Compatibility Layer
 *
 * Supports both Elementor Free (page builder) and Elementor Pro
 * (Theme Builder locations: header, footer, single, archive).
 */

defined( 'ABSPATH' ) || exit;

/* ──────────────────────────────────────────────
 * 1. Register Theme Locations (Elementor Pro)
 * ────────────────────────────────────────────── */
add_action( 'elementor/theme/register_locations', function ( $manager ) {
	$manager->register_all_core_location();
} );

/* ──────────────────────────────────────────────
 * 2. Basic theme support Elementor needs
 * ────────────────────────────────────────────── */
add_action( 'after_setup_theme', function () {
	// Required by Elementor for proper image handling
	add_theme_support( 'post-thumbnails' );
	// Ensures Elementor canvas/full-width templates work
	add_theme_support( 'title-tag' );
}, 5 );

/* ──────────────────────────────────────────────
 * 3. Elementor Page Template labels
 * ────────────────────────────────────────────── */
add_filter( 'elementor/page_templates/canvas/page_title', '__return_false' );

/* ──────────────────────────────────────────────
 * 4. Pass FleetHQ design tokens to Elementor Kit
 *    (allows matching brand colours in editor)
 * ────────────────────────────────────────────── */
add_action( 'elementor/editor/before_enqueue_scripts', function () {
	wp_add_inline_style( 'wp-admin', '
		/* FleetHQ tokens visible in Elementor colour picker */
		:root {
			--fleethq-black:       #0B0C0F;
			--fleethq-white:       #FFFFFF;
			--fleethq-lime:        #D8FF57;
			--fleethq-surface:     #F5F5F0;
			--fleethq-border:      #E6E6E0;
			--fleethq-text-muted:  #6B6B6B;
			--fleethq-font-head:   "Bricolage Grotesque", system-ui, sans-serif;
			--fleethq-font-body:   "Poppins", system-ui, sans-serif;
		}
	' );
} );

/* ──────────────────────────────────────────────
 * 5. Register custom Elementor widget category
 * ────────────────────────────────────────────── */
add_action( 'elementor/elements/categories_registered', function ( $manager ) {
	$manager->add_category( 'fleethq', [
		'title' => __( 'FleetHQ Sections', 'fleethq' ),
		'icon'  => 'fa fa-car',
	] );
} );

/* ──────────────────────────────────────────────
 * 6. Prevent Elementor overriding our custom fonts
 * ────────────────────────────────────────────── */
add_filter( 'elementor/fonts/additional_fonts', function ( $fonts ) {
	$fonts['Bricolage Grotesque'] = 'googlefonts';
	$fonts['Poppins']             = 'googlefonts';
	$fonts['Inter']               = 'googlefonts';
	return $fonts;
} );

/* ──────────────────────────────────────────────
 * 7. Add FleetHQ CSS to Elementor editor iframe
 * ────────────────────────────────────────────── */
add_action( 'elementor/editor/after_enqueue_styles', function () {
	wp_enqueue_style(
		'fleethq-editor',
		get_template_directory_uri() . '/assets/css/main.css',
		[],
		wp_get_theme()->get( 'Version' )
	);
} );

/* ──────────────────────────────────────────────
 * 8. Body class helper for Elementor templates
 * ────────────────────────────────────────────── */
add_filter( 'body_class', function ( $classes ) {
	if ( class_exists( '\Elementor\Plugin' ) ) {
		$classes[] = 'elementor-enabled';
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			$classes[] = 'elementor-preview';
		}
	}
	return $classes;
} );

/* ──────────────────────────────────────────────
 * 9. Allow Elementor to use full viewport on
 *    pages that use the "Elementor Full Width"
 *    or "Elementor Canvas" template.
 * ────────────────────────────────────────────── */
add_filter( 'fleethq_show_header', function ( $show ) {
	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return $show;
	}
	$doc = \Elementor\Plugin::$instance->documents->get_current();
	if ( ! $doc ) {
		return $show;
	}
	$tpl = $doc->get_meta( '_wp_page_template' );
	if ( in_array( $tpl, [ 'elementor_canvas', 'elementor_header_footer' ], true ) ) {
		return false;
	}
	return $show;
} );

add_filter( 'fleethq_show_footer', function ( $show ) {
	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return $show;
	}
	$doc = \Elementor\Plugin::$instance->documents->get_current();
	if ( ! $doc ) {
		return $show;
	}
	$tpl = $doc->get_meta( '_wp_page_template' );
	if ( in_array( $tpl, [ 'elementor_canvas', 'elementor_header_footer' ], true ) ) {
		return false;
	}
	return $show;
} );
