<?php
/* Template Name: Blogs Page */
get_header();
$categories = get_categories();
?>

<div class="unviversal-container">
    <div class="sub-universal-container">
        <?php foreach ($categories as $category) {
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'cat'            => $category->term_id,
            );

            $query = new WP_Query($args); ?>
                <h1><?php echo esc_html($category->name); ?></h1>
            <div class="all-blog-container" style="margin:3% auto"> 
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="posts">
                            <div class="cards">
                                <div class='thumbnail'><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                                <div class="date"><span><i class="far fa-calendar-alt">&nbsp;</i></span><span><?php echo get_the_date('d F Y'); ?></span></div>
                                <div class="name"><h5><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h5></div>
                                <div class="read-more" id='mobile-read-more'><a href="<?php the_permalink(); ?>">Read more&nbsp;<i class="fas fa-solid fa-arrow-right"></i></a></div>
                            </div>
                    </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
