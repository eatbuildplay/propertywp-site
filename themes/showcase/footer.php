<?php

// Footer Logo
$footerLogo = get_theme_mod('footer_logo');

// Sitemap Page Selection
$sitemapPage = get_theme_mod('sitemap_page');
if( !$sitemapPage ) {
  $hasSitemapPage = false;
} else {
  $hasSitemapPage = true;
  $sitemapPagePermalink = get_permalink( $sitemapPage );
}

// Privacy Policy Page Selection
$privacyPolicyPage = get_theme_mod('privacy_policy_page');
if( !$privacyPolicyPage ) {
  $hasPrivacyPolicyPage = false;
} else {
  $hasPrivacyPolicyPage = true;
  $privacyPolicyPagePermalink = get_permalink( $privacyPolicyPage );
}

?>

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
            <img src="<?php print $footerLogo; ?>" />
          </div>
        </div>

        <div class="col-sm-12 col-md-4">
          <!-- menu -->
          <div class="footer-menu d-flex justify-content-end text-right">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-dropdown" aria-controls="navbar-dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <?php
                wp_nav_menu( array(
                  'theme_location'    => 'footer',
                  'depth'             => 1,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse justify-content-end',
                  'container_id'      => 'navbar-dropdown',
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker(),
                ));
              ?>
            </nav>

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
            <?php if( $hasSitemapPage ) : ?>
              <a href="<?php print $sitemapPagePermalink; ?>">Sitemap</a>
            <?php endif; ?>
            <?php if( $hasPrivacyPolicyPage ) : ?>
              <a href="<?php print $privacyPolicyPagePermalink; ?>">Privacy policy</a>
            <?php endif; ?>
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
