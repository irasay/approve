<?php

// Основная информация
$main_logo = get_field("main_logo", 2);
$main_phone = get_field("main_phone", 2);
$main_email = get_field("main_email", 2);
$main_address = get_field("main_address", 2);

// Секция Промо
// $promo_bg = get_field("promo_bg", 2);
// $promo_title = get_field("promo_title", 2);

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="topline">
			<div class="container">
          <div class="row align-items-center text-center">
              <div class="col-lg-2">
                  <a href="/" class="border-none logo">
                      <img src="<?php echo $main_logo ?>" class="logo-img" alt="<?php bloginfo( 'name' ); ?>">
                  </a>
              </div>
              <div class="col-lg-3">
                  <a href="tel:<?php echo $main_phone ?>" class="border-none contacts-item"><i class="fas fa-phone-alt"></i> <?php echo $main_phone ?></a>
              </div>
              <div class="col-lg-3">
                  <a href="mailto:<?php echo $main_email ?>" class="border-none contacts-item"><i class="fa fa-envelope-open" aria-hidden="true"></i> <?php echo $main_email ?></a>
              </div>
              <div class="col-lg-4">
                  <a href="/contacts/" class="border-none contacts-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $main_address ?></a>
              </div>
          </div>
      </div>
		</div>
		<div class="header-menu">
			<nav>
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav>
		</div>
	</header>
    
    <?php 
    
    // $imgBg = get_the_post_thumbnail_url( get_queried_object()->ID ); 
    $imgBg = get_the_post_thumbnail_url( 2 ); 
    
    ?>
    
    <section class="promo-inner" style="background: linear-gradient(to top right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url(<?php if ($imgBg !== false) { echo $imgBg; } else { echo $promo_bg; }?>); background-size: cover; background-position: center; height: 200px; color: #fff;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                   
                    <h1 class="promo-title"><?php single_post_title() ?></h1>
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                      yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

	<div id="content" class="site-content">
