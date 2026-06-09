<?php
/**
 * Template Name: Elementor Canvas
 * Template Post Type: page, post
 *
 * Blank canvas — no header, no footer.
 * Use for Elementor full-page designs (landing pages, sales pages).
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
</head>
<body <?php body_class( 'elementor-page elementor-page--canvas' ); ?>>
<?php wp_body_open(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

<?php wp_footer(); ?>
</body>
</html>
