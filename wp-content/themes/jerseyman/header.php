<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <?php // force Internet Explorer to use the latest rendering engine available ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php wp_title(''); ?></title>

        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <?php // wordpress head functions ?>
        <?php wp_head(); ?>
        <?php // end of wordpress head ?>

    </head>

    <body <?php echo body_class(); ?>>

    <div class="searchbar">
        <div class="search-container">
        <?php get_search_form(); ?>
        </div>
    </div>

    <div class="page-wrapper nav_content">
    
    <div class="banner-ad">
        <?php if(is_front_page()) {
            $ads = get_field('home_top_ad', 'options'); // Get all the ads
            if($ads) {
                $key = array_rand($ads, 1); // Get the key of the random ad
                $ad = $ads[$key]; // Get the add array from the returned key
            }
        } else {
            $ads = get_field('top_ad', 'options');
            if($ads) {
                $key = array_rand($ads, 1);
                $ad = $ads[$key];
            }
        }  ?>
        
        <?php 

            $link = $ad['link'];
            $image = $ad['image'];
        ?>

        <a href="<?php echo $link; ?>">
            <img src="<?php echo $image['url']; ?>" alt="">
        </a>
        
        
        
    </div>
    <div class="header">
        
        <div class="header-logo">
            <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
            
            <a href="/">
            <img src="<?php echo $logo['0']; ?>" alt="">
            </a>
        </div>

        <nav id="site-navigation" class="main-navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'primary-menu' ) ); ?>
        </nav>

        <div class="header-search">
            <i data-swap-target=".searchbar" class="fa fa-lg fa-search search-toggle"></i>
        </div>

        <div class="mobile-nav-trigger mobile_nav_handle">
            <i class="fa fa-lg fa-bars"></i>
        </div>

        <div class="header-social">
            <?php get_template_part( 'social-menu' ); ?>
        </div>

        <a class="header-cta" href="#">
            <i class="icon starburst"></i>

            <div>
                Join Now
                <span>
                    For Exclusive Benefits
                </span>
            </div>
        </a>


    </div>


        