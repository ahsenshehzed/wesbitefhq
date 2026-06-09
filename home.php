<?php
/**
 * Blog archive template — FleetHQ
 */
get_header();

$current_cat = get_queried_object();
$categories  = get_categories( [ 'orderby' => 'count', 'order' => 'DESC', 'hide_empty' => true ] );
?>

<div class="blog-page">

  <!-- ── Page header ── -->
  <div class="blog-page-hero wrap">
    <div class="blog-page-hero-inner" style="text-align:left">
      <h1 class="display"><?php esc_html_e( 'Blog', 'fleethq' ); ?></h1>
    </div>
    <form class="blog-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input class="blog-search-input" type="search" name="s" placeholder="<?php esc_attr_e( 'Search articles…', 'fleethq' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" />
      <button class="blog-search-btn" type="submit" aria-label="<?php esc_attr_e( 'Search', 'fleethq' ); ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      </button>
    </form>
  </div>

  <!-- ── Category pills ── -->
  <?php if ( count( $categories ) > 1 ) : ?>
  <div class="blog-cats-wrap">
    <div class="blog-cats wrap">
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog' ) ); ?>"
         class="blog-cat <?php echo ( ! is_category() ) ? 'active' : ''; ?>">
        <?php esc_html_e( 'All', 'fleethq' ); ?>
      </a>
      <?php foreach ( $categories as $cat ) : ?>
        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
           class="blog-cat <?php echo ( is_category( $cat->term_id ) ) ? 'active' : ''; ?>">
          <?php echo esc_html( $cat->name ); ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <div class="wrap blog-archive-wrap">

    <?php if ( have_posts() ) : ?>

      <!-- ── Posts grid ── -->
      <div class="blog-grid blog-grid-archive">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
            <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="thumb" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'medium_large' ) ); ?>')"></div>
              <?php else : ?>
                <div class="thumb" style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/blog.jpg' ); ?>')"></div>
              <?php endif; ?>
              <div class="body">
                <div class="meta"><?php the_author(); ?> &bull; <?php echo get_the_date( 'd M Y' ); ?></div>
                <div class="title"><span><?php the_title(); ?></span></div>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>

      <!-- ── Pagination ── -->
      <div class="blog-pagination">
        <?php
        the_posts_pagination( [
          'mid_size'  => 2,
          'prev_text' => '←',
          'next_text' => '→',
        ] );
        ?>
      </div>

    <?php else : ?>
      <p class="blog-empty"><?php esc_html_e( 'No posts found. Check back soon.', 'fleethq' ); ?></p>
    <?php endif; ?>

  </div><!-- .blog-archive-wrap -->

</div><!-- .blog-page -->

<?php get_template_part( 'template-parts/sections/voices' ); ?>
