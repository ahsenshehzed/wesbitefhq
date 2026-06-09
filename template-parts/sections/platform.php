<?php
/**
 * Template part: One Platform accordion stack
 * Stack items and interactions are managed in assets/js/main.js
 */
$clickme = get_template_directory_uri() . '/assets/images/click-me.png';
?>
<section class="platform" aria-labelledby="platform-headline">
  <div class="section-head">
    <h2 id="platform-headline" class="h2">
      <?php esc_html_e( 'One platform. Every booking. Every vehicle. Total control.', 'fleethq' ); ?>
    </h2>
    <p class="lede" style="width:425px">
      <?php esc_html_e( 'Own your fleet, automate your operations, scale on your terms, and keep every dollar you earn.', 'fleethq' ); ?>
    </p>
  </div>

  <div class="platform-stage">
    <div class="clickme" aria-hidden="true">
      <img src="<?php echo esc_url( $clickme ); ?>" alt="" />
    </div>
    <!-- Accordion stack built by JS -->
    <div class="stack" id="fhq-stack"></div>
  </div>
</section>
