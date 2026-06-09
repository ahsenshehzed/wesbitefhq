<?php
/**
 * Activate the FleetHQ theme and scaffold preview pages.
 * Usage: php dev/scaffold.php /path/to/wp
 */
$wp = $argv[1] ?? getenv('HOME') . '/wp';
define( 'WP_USE_THEMES', false );
require rtrim( $wp, '/' ) . '/wp-load.php';

switch_theme( 'fleethq' );
echo "Active theme: " . wp_get_theme()->get('Name') . "\n";

global $wp_rewrite;
update_option( 'permalink_structure', '/%postname%/' );
$wp_rewrite->set_permalink_structure( '/%postname%/' );
$wp_rewrite->flush_rules( true );

function devmk_page( $title, $slug, $template = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) { return $existing->ID; }
	$id = wp_insert_post( array(
		'post_title' => $title, 'post_name' => $slug,
		'post_status' => 'publish', 'post_type' => 'page',
	) );
	if ( $template ) { update_post_meta( $id, '_wp_page_template', $template ); }
	echo "page: $slug (#$id)" . ( $template ? " [$template]" : "" ) . "\n";
	return $id;
}

$home_id    = devmk_page( 'Home', 'home' );
$pricing_id = devmk_page( 'Pricing', 'pricing', 'page-pricing.php' );
$blog_id    = devmk_page( 'Blog', 'blog' );

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home_id );
update_option( 'page_for_posts', $blog_id );

if ( ! get_page_by_path( 'hello-fleet', OBJECT, 'post' ) ) {
	wp_insert_post( array(
		'post_title' => 'Welcome to FleetHQ', 'post_name' => 'hello-fleet',
		'post_content' => 'Sample post for previewing blog and single templates.',
		'post_status' => 'publish', 'post_type' => 'post',
	) );
	echo "post: hello-fleet\n";
}
echo "Scaffold complete.\n";
