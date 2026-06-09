<?php
/**
 * FleetHQ Theme Customizer settings
 */

function fleethq_customizer( $wp_customize ) {

	/* ---- Hero section ---- */
	$wp_customize->add_section( 'fleethq_hero', [
		'title'    => __( 'Hero Section', 'fleethq' ),
		'priority' => 30,
	] );

	$fields = [
		'fleethq_hero_badge'    => [ 'Hero Badge Text',    'Start a rental business on your terms →' ],
		'fleethq_hero_headline' => [ 'Hero Headline',      'Own Your Fleet. Own Your Guests. Own Your Profit.' ],
		'fleethq_hero_sub'      => [ 'Hero Subtext',       'Own your fleet, automate your operations, scale on your terms, and keep every dollar you earn.' ],
		'fleethq_hero_cta'      => [ 'Hero CTA Label',     'Start free trial' ],
	];
	foreach ( $fields as $id => [ $label, $default ] ) {
		$wp_customize->add_setting( $id, [ 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ] );
		$wp_customize->add_control( $id, [ 'label' => __( $label, 'fleethq' ), 'section' => 'fleethq_hero', 'type' => 'text' ] );
	}

	/* ---- Transform (dark) section ---- */
	$wp_customize->add_section( 'fleethq_transform', [
		'title'    => __( 'Transform Section', 'fleethq' ),
		'priority' => 31,
	] );
	$wp_customize->add_setting( 'fleethq_transform_badge', [ 'default' => 'Setting up policies for trip modification →', 'sanitize_callback' => 'sanitize_text_field' ] );
	$wp_customize->add_control( 'fleethq_transform_badge', [ 'label' => __( 'Transform Badge Text', 'fleethq' ), 'section' => 'fleethq_transform', 'type' => 'text' ] );
	$wp_customize->add_setting( 'fleethq_transform_headline', [ 'default' => 'Transform the way you manage your fleet with FleetHQ', 'sanitize_callback' => 'sanitize_text_field' ] );
	$wp_customize->add_control( 'fleethq_transform_headline', [ 'label' => __( 'Transform Headline', 'fleethq' ), 'section' => 'fleethq_transform', 'type' => 'text' ] );
	$wp_customize->add_setting( 'fleethq_transform_never', [ 'default' => 'Never miss an opportunity', 'sanitize_callback' => 'sanitize_text_field' ] );
	$wp_customize->add_control( 'fleethq_transform_never', [ 'label' => __( '"Never miss" Text', 'fleethq' ), 'section' => 'fleethq_transform', 'type' => 'text' ] );

	/* ---- CTA Banner ---- */
	$wp_customize->add_section( 'fleethq_cta', [
		'title'    => __( 'CTA Banner', 'fleethq' ),
		'priority' => 32,
	] );
	$wp_customize->add_setting( 'fleethq_cta_line1', [ 'default' => 'STOP HOSTING.', 'sanitize_callback' => 'sanitize_text_field' ] );
	$wp_customize->add_control( 'fleethq_cta_line1', [ 'label' => __( 'CTA Line 1', 'fleethq' ), 'section' => 'fleethq_cta', 'type' => 'text' ] );
	$wp_customize->add_setting( 'fleethq_cta_line2', [ 'default' => "START\nOWNING.", 'sanitize_callback' => 'sanitize_textarea_field' ] );
	$wp_customize->add_control( 'fleethq_cta_line2', [ 'label' => __( 'CTA Line 2', 'fleethq' ), 'section' => 'fleethq_cta', 'type' => 'textarea' ] );

	/* ---- Results / Stats ---- */
	$wp_customize->add_section( 'fleethq_results', [
		'title'    => __( 'Results Stats', 'fleethq' ),
		'priority' => 33,
	] );
	$stats = [
		'fleethq_stat1_num' => [ 'Stat 1 Number', '57%' ],
		'fleethq_stat1_cap' => [ 'Stat 1 Caption', 'increase in utilization' ],
		'fleethq_stat2_num' => [ 'Stat 2 Number', '$5,900+' ],
		'fleethq_stat2_cap' => [ 'Stat 2 Caption', 'saved annually per car' ],
		'fleethq_stat3_num' => [ 'Stat 3 Number', '10+' ],
		'fleethq_stat3_cap' => [ 'Stat 3 Caption', 'hours saved per week' ],
		'fleethq_stat4_num' => [ 'Stat 4 Number', '100%' ],
		'fleethq_stat4_cap' => [ 'Stat 4 Caption', 'revenue kept' ],
		'fleethq_stat5_num' => [ 'Stat 5 Number', '3x' ],
		'fleethq_stat5_cap' => [ 'Stat 5 Caption', 'faster renter verification' ],
		'fleethq_stat6_num' => [ 'Stat 6 Number', '60%' ],
		'fleethq_stat6_cap' => [ 'Stat 6 Caption', 'less time on admin' ],
	];
	foreach ( $stats as $id => [ $label, $default ] ) {
		$wp_customize->add_setting( $id, [ 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ] );
		$wp_customize->add_control( $id, [ 'label' => __( $label, 'fleethq' ), 'section' => 'fleethq_results', 'type' => 'text' ] );
	}

	/* ---- Social links ---- */
	$wp_customize->add_section( 'fleethq_social', [
		'title'    => __( 'Social Links', 'fleethq' ),
		'priority' => 34,
	] );
	foreach ( [ 'twitter' => 'Twitter / X', 'linkedin' => 'LinkedIn', 'instagram' => 'Instagram', 'youtube' => 'YouTube' ] as $key => $label ) {
		$wp_customize->add_setting( 'fleethq_social_' . $key, [ 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ] );
		$wp_customize->add_control( 'fleethq_social_' . $key, [ 'label' => __( $label . ' URL', 'fleethq' ), 'section' => 'fleethq_social', 'type' => 'url' ] );
	}

	/* ---- Footer ---- */
	$wp_customize->add_section( 'fleethq_footer', [
		'title'    => __( 'Footer', 'fleethq' ),
		'priority' => 35,
	] );
	$wp_customize->add_setting( 'fleethq_footer_copyright', [ 'default' => 'Copyright ' . date( 'Y' ) . '. All Rights Reserved', 'sanitize_callback' => 'sanitize_text_field' ] );
	$wp_customize->add_control( 'fleethq_footer_copyright', [ 'label' => __( 'Copyright Text', 'fleethq' ), 'section' => 'fleethq_footer', 'type' => 'text' ] );
}
add_action( 'customize_register', 'fleethq_customizer' );
