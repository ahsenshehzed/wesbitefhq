<?php
/**
 * 404 template
 */
get_header();
?>
<main class="wrap entry-content" style="text-align:center;padding:120px 24px">
  <h1 class="display" style="margin-bottom:16px">404</h1>
  <p class="lede" style="margin:0 auto 32px"><?php esc_html_e( 'The page you\'re looking for doesn\'t exist.', 'fleethq' ); ?></p>
  <a class="btn btn-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'fleethq' ); ?></a>
</main>
<?php get_footer(); ?>
