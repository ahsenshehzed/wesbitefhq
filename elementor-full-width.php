<?php
/**
 * Template Name: Elementor Full Width
 * Template Post Type: page, post
 *
 * Full-width Elementor template: keeps the FleetHQ header and footer
 * but lets Elementor control the entire content area (no .wrap constraint).
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
