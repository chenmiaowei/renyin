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
        <div class="container">
            <!--中间左侧区域-->
            <div class="left">
                <div class="left-item">
                    <div
                            class="title"><span
                                style="width:315px;">会议介绍</span></div>
                    <div class="about-us item-content">
                        <div class="thumb">

                        </div>
                        <div class="content">
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
                </div>
                <div class="left-item">
                    <div
                            class="title"><span>参会人员简介</span></div>
                    <div class="item-content zhidao">
                        <div id="owl-demo-2" class="owl-carousel owl-theme">
                            <?php
                            $original_query = $wp_query;
                            $wp_query = null;
                            $args = array(
                                'post_type' => array("wp_xueshus"),
                                'posts_per_page' => -1,
                                'order' => 'ASC' // not required because it's the default value
                            );
                            $wp_query = new WP_Query($args);
                            $i = 0;
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    ?>
                                    <?php
                                    if ($i % 2 === 0) {
                                        echo "<div class='item'>";
                                    }
                                    ?>
                                    <a class='item-child' href="<?= get_post_permalink() ?>">
                                        <div class="thumb">
                                            <?php the_post_thumbnail("tou_thumbnail") ?>
                                        </div>
                                        <div class="con">
                                            <strong><?= get_the_title() ?></strong>
                                            <br>
                                            <?= get_post_meta(get_the_ID(), "user_title", true) ?>
                                            <br>
                                            <?= get_post_meta(get_the_ID(), "company", true) ?>
                                        </div>
                                    </a>
                                    <?php
                                    if ($i % 2 === 1) {
                                        echo "</div>";
                                    }
                                    $i++;
                                    ?>
                                    <?php
                                endwhile;
                            endif;
                            $b = 2 - $i % 2;
                            if ($b !== 2) {
                                for ($j = 0; $j < $b; $j++) {
                                    echo "<a class='item-child'></a>";
                                }
                                echo "</div>";
                            }
                            $wp_query = null;
                            $wp_query = $original_query;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="left-item">
                    <div class="title"><span
                                style="width:295px;">大会日程</span></div>
                    <div class="richeng item-content">
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
                <div class="left-item">
                    <div class="title"><span style="width:200px;">合作媒体</span></div>
                    <div class="item-content hezuo">
                        <div id="owl-demo-1" class="owl-carousel owl-theme">
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
                                    <div class="item">
                                        <a href=" <?= get_post_meta(get_the_ID(), "link", true) ?>">
                                            <?php the_post_thumbnail("meiti_thumbnail") ?>
                                        </a>
                                    </div>
                                    <?php
                                    $i++;
                                    ?>
                                    <?php
                                endwhile;
                            endif;
                            $wp_query = null;
                            $wp_query = $original_query;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
            <div style="clear: both"></div>
        </div>
    </div>
<?php get_footer(); ?>