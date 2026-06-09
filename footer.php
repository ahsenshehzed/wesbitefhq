  <!-- ============ FOOTER ============ -->
<?php
// ── Elementor Pro: render footer location if set, else use theme footer ──
$show_footer = apply_filters( 'fleethq_show_footer', true );
if ( $show_footer && function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) :
	// Elementor Pro footer template renders here
elseif ( $show_footer ) :
?>
  <footer class="site-footer footer" data-nav-dark>
    <div class="footer-inner">
      <div class="footer-top-divider" aria-hidden="true"></div>
      <div class="footer-grid">

        <!-- Brand + social -->
        <div class="footer-col brand">
          <?php if ( file_exists( get_template_directory() . '/assets/images/logo-stacked.png' ) ) : ?>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-stacked.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          <?php else : ?>
            <span style="font-size:28px;font-weight:700;letter-spacing:-0.04em;display:block;margin-bottom:16px;"><?php bloginfo( 'name' ); ?></span>
          <?php endif; ?>
          <div class="footer-social">
            <?php if ( $tw = fleethq_opt( 'fleethq_social_twitter', '#' ) ) : ?>
            <a href="<?php echo esc_url( $tw ); ?>" aria-label="X / Twitter" rel="noopener">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h3l-7 8 8 12h-6l-5-7-5 7H3l8-9L3 2h6l4 6 5-6z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( $li = fleethq_opt( 'fleethq_social_linkedin', '#' ) ) : ?>
            <a href="<?php echo esc_url( $li ); ?>" aria-label="LinkedIn" rel="noopener">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h4v16H4zM6 2a2 2 0 110 4 2 2 0 010-4zM10 8h4v2a4 4 0 014-2c4 0 4 3 4 6v6h-4v-5c0-2 0-3-2-3s-2 1-2 3v5h-4z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( $ig = fleethq_opt( 'fleethq_social_instagram', '#' ) ) : ?>
            <a href="<?php echo esc_url( $ig ); ?>" aria-label="Instagram" rel="noopener">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( $yt = fleethq_opt( 'fleethq_social_youtube', '#' ) ) : ?>
            <a href="<?php echo esc_url( $yt ); ?>" aria-label="YouTube" rel="noopener">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-4-.5-5.8a3 3 0 00-2.1-2.1C18.6 3.5 12 3.5 12 3.5s-6.6 0-8.4.6A3 3 0 001.5 6.2C1 8 1 12 1 12s0 4 .5 5.8a3 3 0 002.1 2.1c1.8.6 8.4.6 8.4.6s6.6 0 8.4-.6a3 3 0 002.1-2.1C23 16 23 12 23 12zM10 15.5v-7l6 3.5z"/></svg>
            </a>
            <?php endif; ?>
          </div>
        </div>

        <!-- Footer menus -->
        <?php
        $footer_fallbacks = [
          'footer_product' => [
            'title' => __( 'Product', 'fleethq' ),
            'links' => [
              __( 'Fleet Management', 'fleethq' )    => '#',
              __( 'Booking Management', 'fleethq' )  => '#',
              __( 'Turo Sync', 'fleethq' )           => '#',
              __( 'Analytics', 'fleethq' )           => '#',
              __( 'Insurance', 'fleethq' )           => '#',
            ],
          ],
          'footer_why' => [
            'title' => __( 'Why us', 'fleethq' ),
            'links' => [
              __( 'Pricing', 'fleethq' )             => get_permalink( get_page_by_path( 'pricing' ) ) ?: home_url( '/pricing/' ),
              __( 'Daily Wage Fleet', 'fleethq' )    => '#',
              __( 'Luxury Fleet', 'fleethq' )        => '#',
              __( 'Partner Program', 'fleethq' )     => '#',
              __( 'About Us', 'fleethq' )            => '#',
            ],
          ],
          'footer_resources' => [
            'title' => __( 'Resources', 'fleethq' ),
            'links' => [
              __( 'Blogs', 'fleethq' )               => get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blogs/' ),
              __( 'Case Studies', 'fleethq' )        => '#',
              __( 'Free Tools & Templates', 'fleethq' ) => '#',
            ],
          ],
          'footer_contact' => [
            'title' => __( 'Contact', 'fleethq' ),
            'links' => [
              __( 'Help Center', 'fleethq' )         => '#',
              __( 'Careers', 'fleethq' )             => '#',
            ],
          ],
        ];
        foreach ( $footer_fallbacks as $location => $data ) : ?>
        <div class="footer-col">
          <h5><?php echo esc_html( $data['title'] ); ?></h5>
          <?php if ( has_nav_menu( $location ) ) : ?>
            <?php wp_nav_menu( [ 'theme_location' => $location, 'container' => false, 'fallback_cb' => false ] ); ?>
          <?php else : ?>
            <ul>
              <?php foreach ( $data['links'] as $label => $url ) : ?>
                <li><a href="<?php echo esc_url( $url ); ?>"><span><?php echo esc_html( $label ); ?></span></a></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>

      </div><!-- .footer-grid -->

      <div class="footer-bottom">
        <span class="cr"><?php echo esc_html( fleethq_opt( 'fleethq_footer_copyright', 'Copyright ' . date( 'Y' ) . '. All Rights Reserved by FleetHQ' ) ); ?></span>
        <div class="links">
          <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacy Policy', 'fleethq' ); ?></a>
          <a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"><?php esc_html_e( 'Terms and Conditions', 'fleethq' ); ?></a>
        </div>
      </div>
    </div><!-- .footer-inner -->
  </footer>
<?php endif; // end show_footer / Elementor Pro footer check ?>

</div><!-- .stage -->

<?php wp_footer(); ?>
</body>
</html>
