<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 09/09/2017
 * Time: 9:33 PM
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="/favicon.ico"/>
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    <script>
        $ = jQuery;
        $(document).ready(function () {

            $("#owl-example").owlCarousel({
                navigation: true,
                pagination: false,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                rewindSpeed: 500,
                navigationText: ["<i class='fa fa-chevron-circle-left'></i>", "<i class='fa fa-chevron-circle-right'></i>"]
            });

            $("#owl-demo-1").owlCarousel({
                pagination: false,
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                rewindSpeed: 500,
                autoPlay : 3000,
                navigationText: ["<i class='fa fa-chevron-circle-left'></i>", "<i class='fa fa-chevron-circle-right'></i>"]
            });


            $("#owl-demo-2").owlCarousel({
                pagination: false,
                navigation: true,
                items : 3,
                slideSpeed: 300,
                paginationSpeed: 400,
                rewindSpeed: 500,
                autoPlay : 3000,
                navigationText: ["<i class='fa fa-chevron-circle-left'></i>", "<i class='fa fa-chevron-circle-right'></i>"]
            });

        });
    </script>
</head>
<body>
<div class="head">
    <div class="container">
        <div class="logo">
        </div>
        <div class="register">
            <a href="<?= get_permalink(get_page_by_path('register')) ?>" class="btn"></a>
        </div>
    </div>
</div>
<div class="menu">
    <div class="container">
        <div class="nav">
            <?php wp_nav_menu(array('theme_location' => 'top', 'container' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav mr-auto">%3$s</ul>',
                'menu_class' => '')); ?>
        </div>
    </div>
</div>
<div class="slider">
    <div id="owl-example" class="owl-carousel">
        <div class="owl-slide slide-1">
        </div>
        <div class="owl-slide slide-2">
        </div>
    </div>
</div>