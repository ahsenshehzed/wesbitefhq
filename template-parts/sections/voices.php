<?php
/**
 * Template part: Voices / testimonials (dark, scrolling) + footer CTA
 */
$line1 = fleethq_opt( 'fleethq_cta_line1', 'STOP HOSTING.' );
$line2 = fleethq_opt( 'fleethq_cta_line2', "START\nOWNING." );
$cta_text = $line1 . "\n" . $line2;
?>
<section class="dark" data-nav-dark aria-label="<?php esc_attr_e( 'Customer testimonials and call to action', 'fleethq' ); ?>">

  <!-- testimonials -->
  <div class="voices">
    <h2 class="h2"><?php esc_html_e( 'What rental operators are saying', 'fleethq' ); ?></h2>
    <div class="v-rows" aria-hidden="true">
      <div class="v-track" id="fhq-vt1"></div>
      <div class="v-track rev" id="fhq-vt2"></div>
    </div>
  </div>

  <!-- footer CTA -->
  <div class="footer-cta" aria-label="<?php esc_attr_e( 'Final call-to-action', 'fleethq' ); ?>">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-cta-left.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;left:calc(50% - 235px);top:180px;width:90px;height:auto;pointer-events:none;z-index:2;" />
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-cta-right.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;left:calc(50% + 210px);top:123px;width:65px;height:auto;pointer-events:none;z-index:2;" />
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-cta.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;left:calc(50% + 116px);top:220px;width:28px;height:auto;pointer-events:none;z-index:2;" />
    <h2 class="cta-title">STOP HOSTING.<br><span class="owning-glow">START</span><br><span class="owning-glow">OWNING.</span></h2>

    <form class="cta-field" onsubmit="return false" aria-label="<?php esc_attr_e( 'Email sign-up', 'fleethq' ); ?>">
      <input class="input" type="email" placeholder="<?php esc_attr_e( 'Enter your company email', 'fleethq' ); ?>" aria-label="<?php esc_attr_e( 'Company email', 'fleethq' ); ?>" />
      <button class="btn btn-white" type="submit"><?php esc_html_e( 'Start free trial', 'fleethq' ); ?></button>
    </form>
  </div>

  <?php get_footer(); ?>

</section>
