<?php
/**
 * Template part: Results bento grid
 * Numbers editable via Customizer → Results Stats
 */
$s = fn( $k, $d ) => fleethq_opt( $k, $d );
?>
<section class="results" aria-labelledby="results-headline">
  <h2 id="results-headline" class="h2">
    <?php esc_html_e( 'Real results ', 'fleethq' ); ?><em><?php esc_html_e( 'from', 'fleethq' ); ?></em><?php esc_html_e( ' real fleet ', 'fleethq' ); ?><em><?php esc_html_e( 'operators', 'fleethq' ); ?></em>
  </h2>

  <div class="bento">
    <!-- Row 1: stat | stat | quote(span 2) -->
    <div class="cell stat c-yellow">
      <div class="num"><?php echo esc_html( $s( 'fleethq_stat1_num', '57%' ) ); ?></div>
      <div class="cap"><?php echo esc_html( $s( 'fleethq_stat1_cap', 'increase in utilization' ) ); ?></div>
    </div>

    <div class="cell stat c-lav">
      <div class="num"><?php echo esc_html( $s( 'fleethq_stat2_num', '$5,900+' ) ); ?></div>
      <div class="cap"><?php echo esc_html( $s( 'fleethq_stat2_cap', 'saved annually per car' ) ); ?></div>
    </div>

    <div class="cell quote span2">
      <p><?php esc_html_e( '"FleetHQ helped me go from relying on Turo spreadsheets to running my own brand with a real booking system. I\'m finally building something that\'s mine."', 'fleethq' ); ?></p>
      <div class="who">
        <div class="name"><?php esc_html_e( 'Raymond T.', 'fleethq' ); ?></div>
        <div class="role"><?php esc_html_e( 'Fleet Owner, Houston, TX', 'fleethq' ); ?></div>
      </div>
    </div>

    <!-- Row 2: quote(span 2) | stat | stat -->
    <div class="cell quote span2">
      <p><?php esc_html_e( '"The Turo sync alone was worth it. No more manually blocking dates, no more double booking nightmares. It just works."', 'fleethq' ); ?></p>
      <div class="who">
        <div class="name"><?php esc_html_e( 'Priya M.', 'fleethq' ); ?></div>
        <div class="role"><?php esc_html_e( 'Multi-Platform Host, Los Angeles, CA', 'fleethq' ); ?></div>
      </div>
    </div>

    <div class="cell stat c-green">
      <div class="num"><?php echo esc_html( $s( 'fleethq_stat4_num', '100%' ) ); ?></div>
      <div class="cap"><?php echo esc_html( $s( 'fleethq_stat4_cap', 'revenue kept' ) ); ?></div>
    </div>

    <div class="cell stat c-pink">
      <div class="num"><?php echo esc_html( $s( 'fleethq_stat3_num', '10+' ) ); ?></div>
      <div class="cap"><?php echo esc_html( $s( 'fleethq_stat3_cap', 'hours saved per week' ) ); ?></div>
    </div>

    <!-- Row 3: stat | quote(span 2) | stat -->
    <div class="cell stat c-lav">
      <div class="num"><?php echo esc_html( $s( 'fleethq_stat5_num', '3x' ) ); ?></div>
      <div class="cap"><?php echo esc_html( $s( 'fleethq_stat5_cap', 'faster renter verification' ) ); ?></div>
    </div>

    <div class="cell quote span2">
      <p><?php esc_html_e( '"We manage 20+ vehicles and keeping track of bookings, payments, and insurance was a nightmare. FleetHQ gave us the control we were missing."', 'fleethq' ); ?></p>
      <div class="who">
        <div class="name"><?php esc_html_e( 'DeShawn W.', 'fleethq' ); ?></div>
        <div class="role"><?php esc_html_e( 'Private Rental Operator, Miami, FL', 'fleethq' ); ?></div>
      </div>
    </div>

    <div class="cell stat c-yellow">
      <div class="num"><?php echo esc_html( $s( 'fleethq_stat6_num', '60%' ) ); ?></div>
      <div class="cap"><?php echo esc_html( $s( 'fleethq_stat6_cap', 'less time on admin' ) ); ?></div>
    </div>
  </div>
</section>
