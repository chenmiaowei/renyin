<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 09/09/2017
 * Time: 10:17 PM
 */

get_header();
?>

<div class="midd_m">
    <div class="left">
        <?php
        // TO SHOW THE PAGE CONTENTS
        while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
            <div class="left_bt">★ <?= the_title() ?></div>
                <div class="left_neir">
                <?php the_content() ?>
            </div>
            <?php
        endwhile; //resetting the page loop
        ?>
    </div>

    <!--中间左侧区域-->
    <?php
    get_sidebar();
    ?>


</div>
<?php get_footer(); ?>