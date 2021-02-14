<!-- Flexbox container for aligning the toasts -->
<div aria-live="polite" aria-atomic="true" class="d-flex align-items-center position-fixed w-100 bottom-0 start-50 translate-middle" style="z-index: 1;justify-content: flex-end !important;">
  <div class="toast d-flex align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
    <div class="toast-body">Property saved with success.</div>
    <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

<div class="footer-wrap">
  <footer>
    <div class="container">

      <!-- First row -->
      <div class="row">



        <div class="col-sm-12 col-md-4">
          <!-- address -->
          <div class="footer-address">
            <ul class="f-adress">

              <li class="d-flex align-items-center">
              <i class="fas fa-map"></i>
                <?php print get_theme_mod('street_address'); ?>
              </li>

              <?php $email = get_theme_mod('email'); ?>
              <li class="d-flex align-items-center">
                <i class="fas fa-envelope"></i>
                <a href="<?php print $email; ?>"><?php print $email; ?></a>
              </li>

              <li class="d-flex align-items-center">
                <i class="fas fa-phone"></i>
                <a href="tel: <?php print get_theme_mod('phone'); ?>"><?php print get_theme_mod('phone'); ?></a>
              </li>

              <li class="d-flex align-items-center">
                <i class="fas fa-fax"></i><?php print get_theme_mod('fax'); ?>
              </li>

            </ul>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 pb-4">
          <div class="footer-logo d-flex justify-content-center">
            <img src="<?php print get_template_directory_uri() . '/assets/encore_logo.png'; ?>" />
          </div>
        </div>

        <div class="col-sm-12 col-md-4">
          <!-- menu -->
          <div class="footer-menu d-flex justify-content-end text-right">
            <ul class="menu">
              <li>
                <a href="<?php print site_url( 'register' ); ?>">Account</a>
              </li>
              <li>
                <a href="<?php print site_url( 'careers' ); ?>">Careers</a>
              </li>
              <li>
                <a href="<?php print site_url( 'properties' ); ?>">Properties</a>
              </li>
              <li>
                <a href="<?php print site_url( 'sitemap' ); ?>">Sitemap</a>
              </li>
            </ul>
          </div>


        </div>


      </div>

      <!-- Last row -->
      <div class="row">
        <div class="col-md-12">
          <div class="footer-copyright d-flex justify-content-center">
            <h6><?php print get_theme_mod('copyright'); ?></h6>
          </div>
          <div class="footer-privacy d-flex justify-content-center">
            <a href="<?php print site_url( 'sitemap' ); ?>">Sitemap</a>
            <a href="<?php print site_url( 'privacy-policy' ); ?>">Privacy policy</a>
          </div>
        </div><!-- ./col-12 -->
      </div>

    </footer>
</div>

<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>
