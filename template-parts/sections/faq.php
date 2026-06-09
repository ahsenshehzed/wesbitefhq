<?php
/**
 * Template part: Frequently asked questions (accordion).
 * Self-contained — markup + accordion script.
 */
$faqs = [
  [ 'q' => 'Do I need a credit card to start?',            'a' => 'No. Your 14-day free trial starts immediately with no credit card required. You\'ll only be asked for payment details when you choose to upgrade.' ],
  [ 'q' => 'Can I change my plan later?',                  'a' => 'Yes. You can upgrade, downgrade, or cancel your plan at any time from your account settings. Changes take effect at the next billing cycle.' ],
  [ 'q' => 'What happens if I go over my vehicle limit?',   'a' => 'We\'ll notify you before you hit your limit. You can add more vehicles by upgrading to the next plan — we\'ll never lock you out mid-rental.' ],
  [ 'q' => 'Is there a setup fee?',                        'a' => 'None. FleetHQ is designed to get you running in minutes. There are no setup fees, implementation costs, or hidden charges on any plan.' ],
  [ 'q' => 'How does the annual discount work?',           'a' => 'Choosing annual billing saves you 20% compared to paying month-to-month. The full year is billed upfront.' ],
  [ 'q' => 'Can I get a demo before signing up?',          'a' => 'Absolutely. Book a demo with our team and we\'ll walk you through the platform, answer your questions, and help you find the right plan.' ],
];
?>
<section class="pricing-faq">
  <div class="wrap pricing-faq-inner">
    <h2 class="h2"><?php esc_html_e( 'Frequently asked questions', 'fleethq' ); ?></h2>
    <ul class="faq-list">
      <?php foreach ( $faqs as $i => $faq ) : ?>
        <li class="faq-item">
          <button class="faq-btn" aria-expanded="false">
            <span class="faq-num"><?php echo $i + 1; ?></span>
            <span class="faq-q"><?php echo esc_html( $faq['q'] ); ?></span>
            <span class="faq-icon">+</span>
          </button>
          <div class="faq-body"><p class="faq-a"><?php echo esc_html( $faq['a'] ); ?></p></div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<script>
(function(){
  document.querySelectorAll('.pricing-faq .faq-btn').forEach(function(btn){
    btn.addEventListener('click', function(){
      var item = btn.closest('.faq-item');
      var isOpen = item.classList.contains('open');
      btn.closest('.faq-list').querySelectorAll('.faq-item.open').forEach(function(el){
        el.classList.remove('open');
        el.querySelector('.faq-btn').setAttribute('aria-expanded','false');
      });
      if (!isOpen) { item.classList.add('open'); btn.setAttribute('aria-expanded','true'); }
    });
  });
})();
</script>
