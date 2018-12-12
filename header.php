<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php bloginfo('name') ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Container -->
  <div class="container">
    <!-- Top Bar -->
    <div class="row justify-content-between">
      <div class="col-12 col-sm-4">
        <div class="topbar">

          <?php
          $phonenumber = ot_get_option( 'header_phone_number', false);
            if ( $phonenumber !== false) { ?>
                <p>شماره تماس: <?php echo $phonenumber; ?></p>
          <?php } ?>


        </div>
      </div>
      <div class="col-3 d-none d-sm-block">

        <?php
        $instagram = ot_get_option( 'instagram', false);
          if ( $instagram !== false) { ?>
            <div class="topbar socialtop instatop">
              <a href="https://www.instagram.com/r.mohammadreza73/" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
            </div>
        <?php } ?>

        <?php
        $telegram = ot_get_option( 'telegram', false);
          if ( $telegram !== false) { ?>
            <div class="topbar socialtop telegramtop">
              <a href="https://www.telegram.me/Mohammadreza_73" target="_blank"><i class="fab fa-telegram-plane fa-lg"></i></a>
            </div>
        <?php } ?>

      </div>
    </div>
    <!-- End Top Bar -->

    <!-- Main content -->
    <div class="main-content">
      <div class="col-12">
        <div class="row justify-content-between">
          <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
            <div class="logoarea">
              <a href="#">

                <?php
                $logo = ot_get_option( 'logo', false);
                  if ( $logo !== false) { ?>
                <img src="<?php echo $logo; ?>">

                <?php } ?>

                <h1><?php bloginfo('name') ?></h1>
                <h3><?php bloginfo('description') ?></h3>
              </a>
            </div>
          </div>
          <div class=" d-none d-md-block col-md-5 col-lg-4 col-xl-4">
            <div class="searcharea">

              <?php wp_nav_menu( array( 'theme_location' => 'topsearch-menu' ) ); ?>

              <?php
                $header_search_box = ot_get_option( 'header_search_box', false );
                  if ( $header_search_box == 'on' ) { ?>
                     <?php get_search_form(); ?>
                <?php } ?>

            </div>
          </div>
        </div>
        <!-- Navbar -->
        <div class="row">
          <div class="navbar">
            <a id="simple-menu" class="mobile-side-menu d-block d-md-none" href="#sidr"><i class="fa fa-bars"></i></a>
              <!-- Mobile Menu -->
              <div id="sidr" class="side-menu">

                <header>
                  <section>

                      <a href="#" class="user"><i class="far fa-user"></i></a>
                      <a href="#" class="shop"><i class="fas fa-shopping-cart"></i><span class="badge badge-success">0</span></a>

                    <form>
                      <input type="text" name="search" value="" placeholder="مثلا: قاب آیفون">
                      <button type="submit" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                  </section>
                </header>

                <?php wp_nav_menu( array( 'theme_location' => 'side-menu' ) ); ?>
              </div>
              <!-- End Mobile Menu -->

            <div class="col-12 d-none d-md-block col-md-12">
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>

              <?php
              $cta_title = ot_get_option( 'cta_title', false);
              $cta_url = ot_get_option( 'cta_url', false);
                if ( $cta_title !== false) { ?>
                  <ul class="cta">
                    <li><a href="<?php echo $cta_url; ?>"><?php echo $cta_title; ?></a></li>
                  </ul>
              <?php } ?>

            </div>
          </div>
        </div>
        <!-- End Navbar -->
