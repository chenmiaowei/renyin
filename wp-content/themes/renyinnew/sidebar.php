<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 09/09/2017
 * Time: 9:49 PM
 */

?>

<div class="right">
    <div class="right-item">
        <div class="title">下载专区</div>
        <div class="content">
            <table width="100%" border="0" cellpadding="0" cellspacing="4">
                <tbody>
                <tr>
                    <td width="3%"><img src="/wp-content/themes/renyinnew/resources/images/wod.jpg" width="20"
                                        height="20"></td>
                    <td width="97%" align="left"><strong><a
                                    href="/wp-content/themes/renyinnew/resources/2017第二届中国人因工程高峰论坛.docx">会议简介</a></strong><a
                                href="会议简介.docx"></a></td>
                </tr>
                </tbody>
            </table>
            <!--img src="/wp-content/themes/renyinnew/resources/images/12.jpg" border="0" />
              <p>China Medicinal Biotech Association </p-->
        </div>
    </div>
    <div class="right-item">
        <div class="title">指导单位</div>
        <div class="content">
            <p><img width="112"
                    src="/wp-content/themes/renyinnew/resources/images/zairenhaotian.png"><br>
                中国载人航天工程办公室</p>

        </div>
    </div>
    <div class="right-item">
        <div class="title">主办单位</div>
        <div class="content">
            <p><img width="180"
                    src="/wp-content/themes/renyinnew/resources/images/hangtian_logo.png"><br>
                中国航天员科研训练中心 </p>
            <p><img width="180"
                    src="/wp-content/themes/renyinnew/resources/images/zhejiang_logo.png"><br>
                浙江大学 </p>
        </div>
    </div>
    <div class="right-item">
        <div class="title">支持单位</div>
        <div class="content">
            <style type="text/css">
                <!--
                .STYLE1 {
                    font-family: "宋体"
                }

                .STYLE2 {
                    font-family: "宋体";
                    font-size: 12px;
                }

                .STYLE3 {
                    font-size: 12px
                }

                a:link {
                    color: #000000;
                    text-decoration: none;
                }

                a:visited {
                    text-decoration: none;
                    color: #000000;
                }

                a:hover {
                    text-decoration: underline;
                }

                a:active {
                    text-decoration: none;
                }

                .STYLE5 {
                    font-family: "宋体";
                    font-size: 12px;
                    font-weight: bold;
                    color: #666666;
                }

                .STYLE7 {
                    font-family: "宋体";
                    font-size: 12px;
                    font-weight: bold;
                }

                .STYLE10 {
                    color: #000000
                }

                -->
            </style>
            <div id="demod" style="overflow:hidden;height:500px;width:100%">
                <div id="demo1d">
                    <table width="100%" border="0">
                        <tbody>
                        <?php
                        $original_query = $wp_query;
                        $wp_query = null;
                        $args = array(
//                            'posts_per_page' => 2,
                            'post_type' => array("wp_zhichis")
                        );
                        $wp_query = new WP_Query($args);
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                ?>
                                <tr>
                                    <td valign="center" height="20">
                                        <div align="center" class="STYLE2"><a
                                                    href="<?= get_post_meta(get_the_ID(), "link", true) ?>"
                                                    target="_blank">
                                                <?php the_post_thumbnail("sli_thumbnail") ?>
                                            </a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="center" height="20">
                                        <div align="center" class="STYLE2">
                                            <a href="<?= get_post_meta(get_the_ID(), "link", true) ?>/" target="_blank">
                                                <strong><?php the_title() ?></strong></a><br>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            endwhile;
                        endif;
                        $wp_query = null;
                        $wp_query = $original_query;
                        wp_reset_postdata();
                        ?>

                        </tbody>
                    </table>
                </div>
                <div id="demo2d">
                </div>
            </div>
            <script>
                var speed = 30;
                $("#demo2d").html($("#demo1d").html());

                function Marquee() {
                    if (demo2d.offsetTop - demod.scrollTop <= 0) {
                        demod.scrollTop -= demo1d.offsetHeight;
                    }
                    else {
                        demod.scrollTop++;
                    }
                }

                var MyMar = setInterval(Marquee, speed)
                demod.onmouseover = function () {
                    clearInterval(MyMar)
                }
                demod.onmouseout = function () {
                    MyMar = setInterval(Marquee, speed)
                }
            </script>
        </div>
    </div>
    <div class="right-item">
        <div class="title">协办单位</div>
        <div class="content">
            <style type="text/css">
                <!--
                .STYLE1 {
                    font-family: "宋体"
                }

                .STYLE2 {
                    font-family: "宋体";
                    font-size: 12px;
                }

                .STYLE3 {
                    font-size: 12px
                }

                a:link {
                    color: #000000;
                    text-decoration: none;
                }

                a:visited {
                    text-decoration: none;
                    color: #000000;
                }

                a:hover {
                    text-decoration: underline;
                }

                a:active {
                    text-decoration: none;
                }

                .STYLE5 {
                    font-family: "宋体";
                    font-size: 12px;
                    font-weight: bold;
                    color: #666666;
                }

                .STYLE7 {
                    font-family: "宋体";
                    font-size: 12px;
                    font-weight: bold;
                }

                .STYLE10 {
                    color: #000000
                }

                -->
            </style>
            <div id="demod1" style="overflow:hidden;height:500px;width:100%">
                <div id="demo3d">
                    <table width="100%" border="0">
                        <tbody>
                        <?php
                        $original_query = $wp_query;
                        $wp_query = null;
                        $args = array(
//                            'posts_per_page' => 2,
                            'post_type' => array("wp_xiebans")
                        );
                        $wp_query = new WP_Query($args);
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                ?>
                                <tr>
                                    <td valign="center" height="20">
                                        <div align="center" class="STYLE2"><a
                                                    href="<?= get_post_meta(get_the_ID(), "link", true) ?>"
                                                    target="_blank">
                                                <?php the_post_thumbnail("sli_thumbnail") ?>
                                            </a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="center" height="20">
                                        <div align="center" class="STYLE2">
                                            <a href="<?= get_post_meta(get_the_ID(), "link", true) ?>" target="_blank">
                                                <strong><?php the_title() ?></strong></a><br>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            endwhile;
                        endif;
                        $wp_query = null;
                        $wp_query = $original_query;
                        wp_reset_postdata();
                        ?>

                        </tbody>
                    </table>
                </div>
                <div id="demo4d">
                </div>
            </div>
            <script>
                var speed = 30;
                $("#demo4d").html($("#demo3d").html());

                function Marquee() {
                    if (demo4d.offsetTop - demod1.scrollTop <= 0) {
                        demod1.scrollTop -= demo3d.offsetHeight;
                    }
                    else {
                        demod1.scrollTop++;
                    }
                }

                var MyMar = setInterval(Marquee, speed)
                demod1.onmouseover = function () {
                    clearInterval(MyMar)
                }
                demod1.onmouseout = function () {
                    MyMar = setInterval(Marquee, speed)
                }
            </script>
        </div>
    </div>
</div>
