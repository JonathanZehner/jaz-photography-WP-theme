<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale-1" />

        <title><?php bloginfo('name'); ?></title>

        <!--=============== Fonts ================-->
        <link rel="stylesheet" href="https://use.typekit.net/sdh8wzb.css">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="content">
            <header>
                <div class="container">
                    <div class="row">
                    <!-- Brand Logo -->
                        <div class="col-lg-6 logo-container">
                            <?php
                                // Display logo if it's set, if not then display site title
                                if(get_header_image() == ''){ ?>
                                    <h1><a href="<?php echo get_home_url(); ?>"><?php bloginfo('name');?></a></h1>
                                <?php
                                } else {?>
                                    <a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height;?>" width="<?php echo get_custom_header()->width;?>" alt="Company Logo" /></a>
                                <?php
                                }
                            ?>
                        </div>
                        
                    <!-- Navigation Menu -->
                        <div class="col-lg-6 navigation">
                            <nav class="custom-menu-class">
                                <?php // Create Navigation Menu
                                    wp_nav_menu(array(
                                        // Key                      Value
                                        'theme_location'    =>  'main-menu',
                                    ));
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
