<div id="header">
  <header>

    <div class="container">
      <div class="row">

        <div class="col-4 col-lg-9 order-lg-1 my-auto">
          <div id="menu">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-dropdown" aria-controls="navbar-dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <?php
                wp_nav_menu( array(
                  'theme_location'    => 'primary',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse justify-content-end',
                  'container_id'      => 'navbar-dropdown',
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker(),
                ));
              ?>
            </nav>
          </div><!-- /#menu -->
        </div><!-- /.col -->

        <div class="col-4 col-lg-2 my-auto order-md-0">

          <div id="logo" class="d-flex justify-content-center justify-content-lg-start">
            <a href="<?php print site_url(); ?>">
              <img id="logo-image" class="d-none d-lg-block logo-full" src="<?php print get_template_directory_uri() . '/assets/encore_logo.png'; ?>" />
              <img id="logo-image" class="d-lg-none logo-slim" src="<?php print get_template_directory_uri() . '/assets/encore_logo_slim.png'; ?>"/>
            </a>
          </div>

        </div><!-- /.col -->

        <div id="cart-col" class="col-4 col-lg-1 order-lg-2 d-flex">
          <div id="cart"></div>
        </div><!-- /.col-md-2 -->

      </div><!-- /.row -->
    </div><!-- /.container -->

  </header>
</div>
