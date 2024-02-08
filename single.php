<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) : the_post();
        $thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
        ?>
        <div>
             <div class="universal-container">
                
                 <div class='post-banner'><?php echo $thumbnail ?></div>
                <div class="sub-universal-container">
                <div class='heading'><h1><?php the_title();?></h1></div>
                <?php the_content()?>
                </div>
             </div>
        </div>
        <?php
        endwhile;
        ?>

    </main>
</div>
<?php get_footer(); ?>
