<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();
?>

        <!--中间-->
        <div class="midd">
            <div class="midd_m">
                <!--中间左侧区域-->
                <div class="left">
                    <div class="aw">
                        <div class="bt"
                             style="background:url(/wp-content/themes/renyin/resources/images/bt_bj2.jpg) center;"><span
                                    style="width:315px;">会议介绍</span></div>
                        <div class="neir">
                                <?php
                                $original_query = $wp_query;
                                $wp_query = null;
                                $args = array('pagename' => 'luntaigaikuang');
                                $wp_query = new WP_Query($args);
                                if (have_posts()) :
                                while (have_posts()) : the_post();
                                ?>
                            <?php the_excerpt() ?>
                            <?php
                            endwhile;
                            endif;
                            $wp_query = null;
                            $wp_query = $original_query;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="aw">
                        <div class="bt"
                             style="background:url(/wp-content/themes/renyin/resources/images/bt_bj2.jpg) center;"><span
                                    style="width:315px;">论坛学术指导委员会</span></div>
                        <div id="demo3a"
                             style="overflow:hidden;height:400px;height:400px\9;*height:400px; margin-top:10px;">
                            <div id="demo4a">
                                <table width="99%" border="0" cellpadding="4" cellspacing="0"
                                       style="line-height:26px;">
                                    <tbody>
                                    <?php
                                    $original_query = $wp_query;
                                    $wp_query = null;
                                    $args = array(
//                            'posts_per_page' => 2,
                                        'post_type' => array("wp_xueshus")
                                    );
                                    $wp_query = new WP_Query($args);
                                    $i = 0;
                                    if (have_posts()) :
                                        while (have_posts()) : the_post();
                                            ?>
                                            <?php
                                            if($i % 3 === 0) {
                                                echo "<tr>";
                                            }
                                            ?>
                                            <td width="12%" valign="top">
                                                <?php the_post_thumbnail("tou_thumbnail") ?>
                                            </td>
                                            <td width="22%" valign="top">
                                                <strong><?= get_the_title() ?></strong>
                                                <br>
                                                <?= get_post_meta(get_the_ID(), "user_title", true) ?>
                                                <br>
                                                <?= get_post_meta(get_the_ID(), "company", true) ?>
                                            </td>
                                            <?php
                                            if($i % 3 === 2) {
                                                echo "</tr>";
                                            }
                                            $i++;
                                            ?>
                                            <?php
                                        endwhile;
                                    endif;
                                    $b = 3 - $i % 3;
                                    if ($b !== 3) {
                                        for($j = 0; $j < $b; $j++) {
                                            echo "<td></td>";
                                        }
                                        "</tr>";
                                    }
                                    $wp_query = null;
                                    $wp_query = $original_query;
                                    wp_reset_postdata();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="demo5a">
                            </div>
                        </div>
                        <script>
                            var speeda1 = 30
                            document.getElementById("demo5a").innerHTML = document.getElementById("demo4a").innerHTML

                            function Marqueea1() {
                                console.log(document.getElementById("demo5a").offsetTop - document.getElementById("demo3a").scrollTop);
                                if (document.getElementById("demo5a").offsetTop - document.getElementById("demo3a").scrollTop <= 0)
                                    document.getElementById("demo3a").scrollTop -= document.getElementById("demo4a").offsetHeight
                                else {
                                    document.getElementById("demo3a").scrollTop++
                                }
                            }

                            var MyMara1 = setInterval(Marqueea1, speeda1)
                            document.getElementById("demo3a").onmouseover = function () {
                                clearInterval(MyMara1)
                            }
                            document.getElementById("demo3a").onmouseout = function () {
                                MyMara1 = setInterval(Marqueea1, speeda1)
                            }
                        </script>

                    </div>
                    <div class="aw">
                        <div class="bt"
                             style="background:url(/wp-content/themes/renyin/resources/images/bt_bj3.jpg) center;"><span
                                    style="width:295px;">大会日程</span></div>
                        <div class="neir table_neir">
                            <?php
                            $original_query = $wp_query;
                            $wp_query = null;
                            $args = array('pagename' => 'day');
                            $wp_query = new WP_Query($args);
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    ?>
                                    <?php the_content() ?>
                                    <?php
                                endwhile;
                            endif;
                            $wp_query = null;
                            $wp_query = $original_query;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="aw">
                        <div class="bt"
                             style="background:url(/wp-content/themes/renyin/resources/images/bt_bj5.jpg) center;"><span
                                    style="width:200px;">合作媒体</span></div>
                        <div class="neir">
                            <br>
                            <table width="99%" cellpadding="4" cellspacing="0">
                                <tbody>
                                <?php
                                $original_query = $wp_query;
                                $wp_query = null;
                                $args = array(
//                            'posts_per_page' => 2,
                                    'post_type' => array("wp_meitis")
                                );
                                $wp_query = new WP_Query($args);
                                $i = 0;
                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        ?>
                                        <?php
                                        if($i % 4 === 0) {
                                            echo "<tr>";
                                        }
                                        ?>
                                        <td width="130">
                                            <div align="center">
                                                <a href=" <?= get_post_meta(get_the_ID(), "link", true) ?>">
                                                   <?php the_post_thumbnail("meiti_thumbnail") ?>
                                                </a>
                                            </div>
                                        </td>
                                        <?php
                                        if($i % 4 === 3) {
                                            echo "</tr>";
                                        }
                                        $i++;
                                        ?>
                                        <?php
                                    endwhile;
                                endif;
                                $b = 4 - $i % 4;
                                if ($b !== 4) {
                                    for($j = 0; $j < $b; $j++) {
                                        echo "<td  width=\"130\"></td>";
                                    }
                                    "</tr>";
                                }
                                $wp_query = null;
                                $wp_query = $original_query;
                                wp_reset_postdata();
                                ?>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>


                </div>
                <style type="text/css">
                    .underline_a {
                        color: #0000FF;
                    }

                    .underline_a:hover {
                        text-decoration: underline;
                    }

                    -->
                </style>

                <?php get_sidebar(); ?>
            </div>
        </div>
<?php get_footer(); ?>