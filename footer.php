<!-- Call Bar -->
<div class="row">
  <div class="support d-none d-md-block">
    <div class="col-lg-12">

      <?php
      $footer_text = ot_get_option( 'footer_text', false);
        if ( $footer_text !== false) { ?>
          <span class="text"><?php echo $footer_text; ?></span>
      <?php } ?>

      <?php
      $footer_phone_number = ot_get_option( 'footer_phone_number', false);
        if ( $footer_phone_number !== false) { ?>

          <span class="call"><?php echo$footer_phone_number; ?><i class="fas fa-phone"></i></span>

        <?php } ?>

    </div>
  </div>
</div>
<!-- End Call Bar -->
<!-- Footer -->
<div class="row">
  <div class="col-6 col-md-3">
    <?php dynamic_sidebar( 'firstcolfooter' ); ?>
  </div>

  <div class="col-6 col-md-3">
  <?php dynamic_sidebar( 'secondcolfooter' ); ?>
  </div>

  <div class="col-12 col-md-6">
    <?php dynamic_sidebar( 'thirdcolfooter' ); ?>
  </div>
</div>
<!-- End Footer -->
</div>
</div>
<!-- End Main content -->
<div class="row">
<div class="col-12">
<div class="sub-footer">
  <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

  <?php
  $copyright = ot_get_option( 'copy_right', false);
    if ( $copyright !== false) { ?>
      <span><?php echo $copyright; ?></span>
  <?php } ?>

</div>

<div class="power-by">
  <span> طراحی شده با <i class="fas fa-heart"></i> توسط محمدرضا </span>
</div>
</div>
</div>
</div>
<!-- End Container -->


<?php wp_footer(); ?>

<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery(".owl-carousel").owlCarousel({
    'items': 1,
    'rtl': true,
    });

  jQuery('#simple-menu').sidr({
    side: 'right'
    });

  });
</script>
</body>

</html>
