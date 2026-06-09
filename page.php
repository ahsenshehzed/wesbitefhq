<?php
/**
 * Generic page template — supports Elementor, Gutenberg, and classic content
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
// ── If this page was built with Elementor, the_content() renders the
//    Elementor canvas. No wrapping div needed — Elementor controls layout.
$is_elementor = class_exists( '\Elementor\Plugin' )
	&& \Elementor\Plugin::$instance->db->is_built_with_elementor( get_the_ID() );
?>

<?php if ( $is_elementor ) : ?>
  <main id="main" class="site-main elementor-page-content">
    <?php the_content(); ?>
  </main>

<?php else : ?>
  <main class="wrap entry-content" style="padding-top:80px;padding-bottom:80px;">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="h2" style="margin-bottom:32px"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php
      wp_link_pages( [
        'before' => '<div class="page-links">' . __( 'Pages:', 'fleethq' ),
        'after'  => '</div>',
      ] );
      ?>
    </article>
  </main>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
