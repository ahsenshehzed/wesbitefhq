<?php
/**
 * Template part: Transform (dark) section with booking marquees
 */
$badge    = fleethq_opt( 'fleethq_transform_badge',    'Setting up policies for trip modification →' );
$headline = fleethq_opt( 'fleethq_transform_headline', 'Transform the way you manage your fleet with FleetHQ' );
$never    = fleethq_opt( 'fleethq_transform_never',    'Never miss an opportunity' );
$dash_img = get_template_directory_uri() . '/assets/images/Fleet Management.png';
?>
<section class="dark" aria-labelledby="transform-headline">
  <div class="transform wrap">
    <div class="pill">
      <span class="tag-new red"><?php esc_html_e( 'New', 'fleethq' ); ?></span>
      <span class="txt"><?php echo esc_html( $badge ); ?></span>
    </div>
    <h2 id="transform-headline" class="h2 dark-title" style="width:583px;margin:0 auto;text-align:center">
      <?php echo esc_html( $headline ); ?>
    </h2>
    <p class="lede" style="font-size:14px;width:393px;max-width:90%;margin:16px auto 0;text-align:center;">
      <?php esc_html_e( 'Own your fleet, automate your operations, scale on your terms, and keep every dollar you earn.', 'fleethq' ); ?>
    </p>
    <a class="btn btn-light openapp" href="<?php echo esc_url( home_url( '/app' ) ); ?>"><?php esc_html_e( 'Open app', 'fleethq' ); ?></a>
    <div class="transform-fig">
      <img src="<?php echo esc_url( $dash_img ); ?>" alt="<?php esc_attr_e( 'FleetHQ booking dashboard', 'fleethq' ); ?>" loading="lazy" />
    </div>
    <div class="never"><?php echo esc_html( $never ); ?></div>
  </div>

  <!-- Marquees populated by JS -->
  <div class="marquee" id="fhq-m1" aria-hidden="true"></div>
  <div class="marquee" id="fhq-m2" aria-hidden="true"></div>
  <div class="marquee" id="fhq-m3" style="margin-bottom:90px" aria-hidden="true"></div>
</section>
