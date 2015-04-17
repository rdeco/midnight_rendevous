<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Midnight Rendevous - Home Page</title>



         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/foundation.slider.js"></script>
         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/foundation.orbit.js"></script>
         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/foundation.dropdown.js"></script>

         <!-- Go to www.addthis.com/dashboard to customize your tools -->
         <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508cf07b372297e2"></script>




        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Bad+Script|Cinzel+Decorative|Raleway' rel='stylesheet' type='text/css'>

        <?php wp_head(); ?>

    </head>


    <body class="body">
        <div>
            <div class="row">
                <header class="small-12 columns">
                    <nav class="top-bar" data-topbar>
                        <ul class="title-area">

                            <?php $logo = get_option('theme_logo', IMAGES.'/logo_360.png'); ?>

                            <li class="name show-for-large-up">
                                <a href="<?php bloginfo('url'); ?>">
                                    <img class="logo" src="<?php print $logo; ?>" alt="<?php bloginfo('name'); ?>">
                                </a>
                            </li>

                            <li class="name show-for-medium-only">
                                <a href="<?php bloginfo('url'); ?>">
                                    <img class="logo" src="<?php print $logo; ?>" alt="<?php bloginfo('name'); ?>">
                                </a>
                            </li>

                            <li class="name show-for-small-only">
                                <a href="<?php bloginfo('url'); ?>">
                                    <img class="logo" src="<?php print $logo; ?>" alt="<?php bloginfo('name'); ?>">
                                </a>
                            </li>

                            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                        </ul>

                        <?php if( is_active_sidebar ('header-searchbar-widget-area')) : ?>
                            <?php dynamic_sidebar ('header-searchbar-widget-area'); ?>
                        <?php endif; ?>

                        <section class="top-bar-section">
                              <?php foundation_primary_menu(); ?>
                        </section>

                   </nav> <!-- .top-bar -->

                   <hr class="header">

                   <div class="row headerContent">
                       <article class="small-12 medium-4 large-5 columns headerArticle">

                            <?php if( is_active_sidebar ('header-left-widget-area')) : ?>
                                <?php dynamic_sidebar ('header-left-widget-area'); ?>
                            <?php endif; ?>

                       </article>

                       <div class="medium-8 large-7 columns hide-for-small-only">
                           <?php if( is_active_sidebar ('header-right-widget-area')) :?>
                                <?php dynamic_sidebar ('header-right-widget-area'); ?>
                           <?php endif; ?>
                            </div>
                       </div>
                    </div> <!-- .row.headerContent -->
                </header>
            </div> <!-- .row -->
            <!--END OF HEADER -->


