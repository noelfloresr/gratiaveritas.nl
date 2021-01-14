<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="site-wrapper">
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header-container">
              <div class="left-column">
                <!-- Menu -->
                <nav class="nav">
                  <ul class="menu">
                    <?php wp_nav_menu(array('menu' => 2, 'container' => false, 'items_wrap' => '%3$s')); ?>
                  </ul>
                </nav>
              </div>
              <div class="right-column">
                <!-- Logo -->
                <a href="<?php bloginfo('url'); ?>" id="logo"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" class="img-fluid" alt="Astrid Logo"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="menu-mobile-container">
          <div class="button-container">
            <button class="menu-toggle" id="button-menu-toggle">
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <div class="nav">
            <ul class="menu-mobile" id="menu-mobile">
              <?php wp_nav_menu(array('menu' => 2, 'container' => false, 'items_wrap' => '%3$s')); ?>
            </ul>
          </div>
        </div>
      </div>
    </header>