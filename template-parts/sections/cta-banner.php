<?php
/**
 * Template part: Dark CTA Banner
 */
$line1 = fleethq_opt( 'fleethq_cta_line1', 'STOP HOSTING.' );
$line2 = fleethq_opt( 'fleethq_cta_line2', "START\nOWNING." );
$cta_text = $line1 . "\n" . $line2;
?>
<section class="cta-band-wrap" aria-label="<?php esc_attr_e( 'Start your free trial', 'fleethq' ); ?>">
  <div class="cta-band">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-cta-left.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;left:calc(50% - 235px);top:105px;width:90px;height:auto;pointer-events:none;z-index:2;" />
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-cta-right.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;left:calc(50% + 210px);top:48px;width:65px;height:auto;pointer-events:none;z-index:2;" />
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doodle-cta.png' ); ?>" alt="" aria-hidden="true"
         style="position:absolute;left:calc(50% + 116px);top:145px;width:28px;height:auto;pointer-events:none;z-index:2;" />
    <h2 class="cta-title">STOP HOSTING.<br><span class="owning-glow">START</span><br><span class="owning-glow">OWNING.</span></h2>

    <form class="cta-field" action="https://fms.fleethq.io/auth/register" method="get" target="_blank" aria-label="<?php esc_attr_e( 'Email sign-up', 'fleethq' ); ?>">
      <input class="input" type="email" name="email" placeholder="<?php esc_attr_e( 'Enter your company email', 'fleethq' ); ?>" aria-label="<?php esc_attr_e( 'Company email', 'fleethq' ); ?>" />
      <button class="btn btn-white" type="submit"><?php esc_html_e( 'Start free trial', 'fleethq' ); ?></button>
    </form>
  </div>
</section>
