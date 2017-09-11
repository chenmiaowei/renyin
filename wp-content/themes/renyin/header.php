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
    <style>
        .hide {
            display: none
        }

        .show {
            display: inline-block;
        }

        #tt {
            color: #09F;
            display: block;
            margin-left: 200px;
        }

        .STYLE1 {
            color: #0000FF
        }
    </style>
    <script>
        $ = jQuery;
        $(function () {
            $('#tt').click(function (event) {
                // $('#botto div').hide("500",function(){

                // });
                if ($('#people').hasClass('hide')) {
                    //显示
                    $('#people').removeClass('hide').addClass('show');
                    $(this).text('+View Bio');
                } else {
                    // 隐藏
                    $('#people').removeClass('show').addClass('hide');
                    $(this).text('+View Bio');
                }
                <!-- $('#pp').css('visibility','visible');-->

            })
        })
    </script>
</head>
<body>
<!--大框-->
<div class="mian">
    <!--主体区域-->
    <div class="mian_m">
        <!--头部-->
        <div class="head">
            <div class="logo">
                <!--<img src="/wp-content/themes/renyin/resources/images/logo_bj.jpg" border="0" />-->
                <!--<div class="tu"></div>
                <div class="zi">
                    <p style="font-size:30px; margin-top:35px;">BIT's 5th World DNA and Genome Day</p>
                    <p>Date: April 25-29, 2014 Place: Dalian, China</p>
                </div>-->
            </div>

            <div class="menu">
                <div class="nav">
                    <?php wp_nav_menu(array('theme_location' => 'top', 'container' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav mr-auto">%3$s</ul>',
                        'menu_class' => '')); ?>
                </div>
            </div>

            <?php if (is_home()) {
                ?>
                <div class="ban">
                    <div id="fsD1" class="focus">
                        <div id="D1pic1" class="fPic">
                            <div class="fcon" style="display: block;">
                                <a href="register.asp" target="_blank">
                                    <img src="/wp-content/themes/renyin/resources/images/01.jpg" border="0"
                                         style="opacity: 0.95;">
                                </a>
                            </div>
                            <div class="fcon" style="display: none;">
                                <img src="/wp-content/themes/renyin/resources/images/02.jpg" style="opacity: 1; ">
                            </div>
                            <div class="fcon" style="display: none;">
                                <img src="/wp-content/themes/renyin/resources/images/03.jpg" style="opacity: 1; ">
                            </div>
                        </div>
                        <div class="fbg">
                            <div class="D1fBt" id="D1fBt">
                                <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>1</i></a>
                                <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a>
                                <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>3</i></a>
                            </div>
                        </div>
                        <span class="prev"></span>
                        <span class="next"></span>
                    </div>
                    <script type="text/javascript">
                        Qfast.add('widgets', {
                            path: "/wp-content/themes/renyin/resources/js/terminator2.2.min.js",
                            type: "js",
                            requires: ['fx']
                        });
                        Qfast(false, 'widgets', function () {
                            K.tabs({
                                id: 'fsD1',   //½¹µãÍ¼°ü¹üid
                                conId: "D1pic1",  //** ´óÍ¼Óò°ü¹üid
                                tabId: "D1fBt",
                                tabTn: "a",
                                conCn: '.fcon', //** ´óÍ¼ÓòÅäÖÃclass
                                auto: 1,   //×Ô¶¯²¥·Å 1»ò0
                                effect: 'fade',   //Ð§¹ûÅäÖÃ
                                eType: 'click', //** Êó±êÊÂ¼þ
                                pageBt: true,//ÊÇ·ñÓÐ°´Å¥ÇÐ»»Ò³Âë
                                bns: ['.prev', '.next'],//** Ç°ºó°´Å¥ÅäÖÃclass
                                interval: 3000  //** Í£¶ÙÊ±¼ä
                            })
                        })
                    </script>
                </div>
                <?php
            } ?>
        </div>