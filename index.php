<?php
/**
 * Blog index / fallback template
 */
get_header();
?>
<main class="wrap entry-content" style="padding-top:60px">
  <h1 class="h2" style="margin-bottom:40px"><?php esc_html_e( 'Latest Posts', 'fleethq' ); ?></h1>
  <?php if ( have_posts() ) : ?>
    <div class="blog-grid" style="margin:0">
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
          <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="thumb" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'medium_large' ) ); ?>')"></div>
            <?php endif; ?>
            <div class="body">
              <div class="meta"><?php the_author(); ?> &bull; <?php echo get_the_date(); ?></div>
              <div class="title"><span><?php the_title(); ?></span></div>
            </div>
          </a>
        </article>
      <?php endwhile; ?>
    </div>
    <div style="margin-top:40px"><?php the_posts_navigation(); ?></div>
  <?php else : ?>
    <p><?php esc_html_e( 'No posts found.', 'fleethq' ); ?></p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
