<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="top-navigation">
      <div id="header">
        <div class="container" id="mobile-fix">
          <div class="row">
            <div class="col-md-2">
              <a class="logo brand-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>">
                <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/logo.png" alt="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>" class="logo-potw not-lazy">
              </a>
              
            </div>
            <div class="col-md-10">
              <?php
              wp_nav_menu(
              array(
              'theme_location'    =>  'main-menu', // as registered in functions.php
              'depth'             =>   3, // as we set up in our CSS
              'container'         =>  'nav', // html wrapper of the menu ul
              'container_class'   =>  'main-menu', // wrapper class
              'menu_class'        =>  'top-menu d-flex flex-row navigation top-menu justify-content-end list-unstyled', // classes of the menu ul tag
              'fallback_cb'       =>  false // if primary menu is not created, then show nothing
              )
              );
              ?>
              <div class="menu-mobile">
                <?php
                wp_nav_menu(
                array(
                'theme_location'    =>  'mobile-menu', // as registered in functions.php
                'depth'             =>   3, // as we set up in our CSS
                'container'         =>  'nav', // html wrapper of the menu ul
                'container_class'   =>  'main-menu', // wrapper class
                'menu_class'        =>  'top-menu d-flex flex-row navigation top-menu justify-content-end list-unstyled', // classes of the menu ul tag
                'fallback_cb'       =>  false // if primary menu is not created, then show nothing
                )
                );
                ?>
              </div>
              <button type="button" class="navbar-open">
              <i class="mobile-nav-toggler flaticon flaticon-menu"></i>
              </button>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="row">
            <div class="d-flex flex-row-reverse">
              <div id="header-gradient-btn">
                <a href=""  class="gradient_button">Get Started Today</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- Mobile Menu -->
      <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn">
          <i class="flaticon flaticon-close"></i>
        </div>
        <nav class="menu-box">
        <ul class="navigation clearfix"></ul>
      </nav>
    </div>
  </div>
  <div class="container">