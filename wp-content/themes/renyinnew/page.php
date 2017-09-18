<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 09/09/2017
 * Time: 10:17 PM
 */

get_header();
?>
    <div class="midd">
        <div class="container">
            <div class="left">
                <div class="left-item">
                    <?php
                    // TO SHOW THE PAGE CONTENTS
                    while (have_posts()) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
                        <div class="title"><?= the_title() ?></div>
                        <div class="item-content page-content">
                            <?php the_content() ?>
                        </div>
                        <?php
                    endwhile; //resetting the page loop
                    ?>
                </div>
            </div>
            <!--中间左侧区域-->
            <?php
            get_sidebar();
            ?>
            <div style="clear: both"></div>
        </div>
    </div>
<?php get_footer(); ?>