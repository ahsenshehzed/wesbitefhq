<?php
/**
 * Single post template — FleetHQ
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>

  <!-- ── Article hero ── -->
  <div class="post-hero">
    <div class="post-hero-inner wrap">

      <!-- Back link -->
      <a class="post-back" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog' ) ); ?>">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13 8H3M7 12l-4-4 4-4"/></svg>
        <?php esc_html_e( 'Back to blog', 'fleethq' ); ?>
      </a>

      <h1 class="post-title"><?php the_title(); ?></h1>

      <!-- Author + date below title -->
      <div class="post-meta-row">
        <span class="post-meta-date"><?php the_author(); ?> &bull; <?php echo get_the_date( 'd M Y' ); ?></span>
      </div>

    </div>
  </div>

  <!-- ── Featured image ── -->
  <?php if ( has_post_thumbnail() ) : ?>
  <div class="post-thumb-wrap">
    <div class="post-thumb">
      <?php the_post_thumbnail( 'large', [ 'class' => 'post-thumb-img' ] ); ?>
    </div>
  </div>
  <?php endif; ?>

  <!-- ── Article body ── -->
  <div class="post-body-wrap">
    <div class="post-content wrap">
      <?php the_content(); ?>

      <!-- Tags -->
      <?php $tags = get_the_tags(); if ( $tags ) : ?>
      <div class="post-tags">
        <?php foreach ( $tags as $tag ) : ?>
          <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tag"><?php echo esc_html( $tag->name ); ?></a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Share -->
      <div class="post-share">
        <span class="post-share-label"><?php esc_html_e( 'Share', 'fleethq' ); ?></span>
        <a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode( get_permalink() ); ?>&text=<?php echo rawurlencode( get_the_title() ); ?>" class="post-share-btn" aria-label="Share on X" target="_blank" rel="noopener">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h3l-7 8 8 12h-6l-5-7-5 7H3l8-9L3 2h6l4 6 5-6z"/></svg>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo rawurlencode( get_permalink() ); ?>&title=<?php echo rawurlencode( get_the_title() ); ?>" class="post-share-btn" aria-label="Share on LinkedIn" target="_blank" rel="noopener">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h4v16H4zM6 2a2 2 0 110 4 2 2 0 010-4zM10 8h4v2a4 4 0 014-2c4 0 4 3 4 6v6h-4v-5c0-2 0-3-2-3s-2 1-2 3v5h-4z"/></svg>
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( get_permalink() ); ?>" class="post-share-btn" aria-label="Share on Facebook" target="_blank" rel="noopener">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
        </a>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="post-share-btn" aria-label="Copy link" onclick="navigator.clipboard&&navigator.clipboard.writeText(this.href);return false;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
        </a>
      </div>

    </div>
  </div>

</article>

<!-- ── Subscribe ── -->
<div class="wrap" style="padding:0 0 64px">
  <div class="blog-subscribe" style="max-width:720px;margin:0 auto">
    <div class="blog-subscribe-title"><?php esc_html_e( 'Subscribe to FleetHQ Blog', 'fleethq' ); ?></div>
    <p class="blog-subscribe-desc"><?php esc_html_e( 'Fleet management tips, growth strategies, and industry insights — straight to your inbox.', 'fleethq' ); ?></p>
    <form class="blog-subscribe-form" onsubmit="return false">
      <input class="input" type="email" placeholder="<?php esc_attr_e( 'Enter your company email', 'fleethq' ); ?>" />
      <button class="btn btn-dark" type="submit"><?php esc_html_e( 'Subscribe', 'fleethq' ); ?></button>
    </form>
  </div>
</div>

<!-- ── Related posts ── -->
<?php
$current_id   = get_the_ID();
$current_cats = wp_get_post_categories( $current_id );
$related = new WP_Query( [
  'post_type'           => 'post',
  'posts_per_page'      => 3,
  'post__not_in'        => [ $current_id ],
  'category__in'        => $current_cats,
  'ignore_sticky_posts' => true,
] );
?>
<?php if ( $related->have_posts() ) : ?>
<section class="post-related">
  <div class="wrap">
    <div class="insights-head" style="margin-bottom:28px">
      <h2 style="font-size:28px;letter-spacing:-0.04em"><?php esc_html_e( 'More from the blog', 'fleethq' ); ?></h2>
      <a class="btn btn-light" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog' ) ); ?>"><?php esc_html_e( 'View all', 'fleethq' ); ?></a>
    </div>
    <div class="blog-grid">
      <?php while ( $related->have_posts() ) : $related->the_post(); ?>
        <article class="blog-card">
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
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php endwhile; ?>

<?php get_template_part( 'template-parts/sections/voices' ); ?>
