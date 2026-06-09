<?php
/**
 * Front page template — assembles all landing-page sections
 */
get_header();
?>

<?php get_template_part( 'template-parts/sections/hero' ); ?>
<?php get_template_part( 'template-parts/sections/trusted' ); ?>
<?php get_template_part( 'template-parts/sections/transform' ); ?>
<?php get_template_part( 'template-parts/sections/platform' ); ?>
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>
<?php get_template_part( 'template-parts/sections/corner' ); ?>
<?php get_template_part( 'template-parts/sections/calculator' ); ?>
<?php get_template_part( 'template-parts/sections/results' ); ?>
<?php get_template_part( 'template-parts/sections/pricing' ); ?>
<?php get_template_part( 'template-parts/sections/insights' ); ?>
<?php get_template_part( 'template-parts/sections/voices' ); ?>
