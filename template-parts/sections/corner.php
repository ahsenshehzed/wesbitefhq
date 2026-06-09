<?php
/**
 * Template part: Built for every corner of the rental market
 * Tab strip and interaction handled by JS; content editable via WP editor on page
 */
?>
<section class="corner" aria-labelledby="corner-headline">
  <div class="section-head">
    <h2 id="corner-headline" class="h2"><?php esc_html_e( 'Built for every corner of the', 'fleethq' ); ?><br><?php esc_html_e( 'rental market', 'fleethq' ); ?></h2>
    <p class="lede" style="width:500px">
      <?php esc_html_e( 'Daily rentals, luxury fleets, short-term, long-term — whatever your market, FleetHQ gives you the infrastructure to run it professionally, scale it confidently, and own every dollar you earn.', 'fleethq' ); ?>
    </p>
  </div>

  <div class="corner-card">
    <!-- Tab strip populated by JS -->
    <div class="tabstrip" id="fhq-tabstrip" role="tablist" aria-label="<?php esc_attr_e( 'Market segments', 'fleethq' ); ?>"></div>

    <div class="corner-divider" aria-hidden="true"></div>

    <div class="corner-detail">
      <div>
        <h3 id="fhq-cd-title"><?php esc_html_e( 'Turn every car into a daily revenue machine', 'fleethq' ); ?></h3>
        <a class="btn btn-light explore" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Explore more', 'fleethq' ); ?></a>
      </div>
      <div class="corner-cols" id="fhq-cd-cols">
        <div class="corner-col">
          <h4><?php esc_html_e( 'Maximize daily utilization', 'fleethq' ); ?></h4>
          <p><?php esc_html_e( 'Keep every vehicle booked and every turnaround tight. FleetHQ automates scheduling, availability, and calendar management so no car sits idle and no opportunity is missed.', 'fleethq' ); ?></p>
        </div>
        <div class="corner-col">
          <h4><?php esc_html_e( 'Cut admin time by 10+ hours a week', 'fleethq' ); ?></h4>
          <p><?php esc_html_e( 'Agreements, payments, and renter verification run automatically. Focus on growing your fleet, not managing the paperwork that comes with every booking.', 'fleethq' ); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
