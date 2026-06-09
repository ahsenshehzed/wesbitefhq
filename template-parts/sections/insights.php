<?php
/**
 * Template part: Insights / Blog section
 * Pulls the 3 most recent posts automatically via WP_Query.
 */

$arrow_svg = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#101828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 15L15 5M7 5h8v8"/></svg>';

$posts = new WP_Query( [
  'post_type'      => 'post',
  'posts_per_page' => 3,
  'post_status'    => 'publish',
  'orderby'        => 'date',
  'order'          => 'DESC',
] );
?>
<section class="insights" aria-labelledby="insights-headline">
  <div class="insights-head">
    <h2 id="insights-headline"><?php esc_html_e( 'Insights to grow your rental business', 'fleethq' ); ?></h2>
    <a class="btn btn-light" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog' ) ); ?>"><?php esc_html_e( 'View all articles', 'fleethq' ); ?></a>
  </div>

  <div class="blog-grid" id="fhq-bloggrid">
    <?php if ( $posts->have_posts() ) : ?>
      <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
        <article class="blog-card">
          <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="thumb" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'medium_large' ) ); ?>')"></div>
            <?php else : ?>
              <div class="thumb" style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/blog.jpg' ); ?>')"></div>
            <?php endif; ?>
            <div class="body">
              <div class="meta"><?php the_author(); ?> &bull; <?php echo get_the_date( 'd M Y' ); ?></div>
              <div class="title">
                <span><?php the_title(); ?></span>
              </div>
            </div>
          </a>
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
    <?php else : ?>
      <?php
      /* Fallback placeholder cards when no posts exist */
      $placeholders = [
        'How collaboration makes us better designers',
        'The future of fleet management software',
        '5 ways to reduce admin time in your rental business',
      ];
      foreach ( $placeholders as $title ) : ?>
        <article class="blog-card">
          <div class="thumb" style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/blog.jpg' ); ?>')"></div>
          <div class="body">
            <div class="meta"><?php esc_html_e( 'FleetHQ Team', 'fleethq' ); ?></div>
            <div class="title">
              <span><?php echo esc_html( $title ); ?></span>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>
