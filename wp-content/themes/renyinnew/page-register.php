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
                <div class="title">参会注册</div>
                <div class="item-content page-content">
                    <?php
                    echo do_shortcode("[contact-form-7 id=\"136\" title=\"Contact form 1\"]");
                    ?>
                </div>
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
