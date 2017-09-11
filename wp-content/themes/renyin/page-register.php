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
        <div class="left_bt">★ 参会注册</div>
        <div class="left_neir">
            <?php
            echo do_shortcode("[contact-form-7 id=\"136\" title=\"Contact form 1\"]");
            ?>
        </div>
    </div>
    <!--中间左侧区域-->
    <?php
    get_sidebar();
    ?>


</div>
<?php get_footer(); ?>