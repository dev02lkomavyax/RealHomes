<?php get_header(); ?>
<?php

$current_cat_id = get_queried_object_id();


$args = array(
    'cat' => $current_cat_id,
    'posts_per_page' => -1,
    'post_type' => 'post', 
);

$custom_query = new WP_Query($args);
?>
<?php
$current_cat = get_queried_object(); 
$current_cat_name = $current_cat->name; 
?>
<div class='unviversal-container'>
<div class="sub-universal-container">
    <h1><?php echo $current_cat_name ?></h1>
<div class="all-blog-container">
    <?php
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
    $title = get_the_title(); 
    $trimmed_title = wp_trim_words($title, 6);
        ?> 
              <div class="cards">
    <div class='thumbnail'><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
        <div class="date"><span><i class="far fa-calendar-alt">&nbsp;</i></span><span><?php echo get_the_date('d F Y'); ?></span></div>
        <div class="name"><h5><a href="<?php the_permalink(); ?>"><?php echo esc_html($trimmed_title); ?></a></h5></div>
        <div class="read-more" id='mobile-read-more'><a href="<?php the_permalink(); ?>">Read more&nbsp;<i class="fas fa-solid fa-arrow-right"></i></a></div>
    
        
        </div>
        <?php
    endwhile;
    
    wp_reset_postdata();
else :
        echo 'No posts found';
    endif;
    ?>
    </div>

</div>
</div>
<?php get_footer(); ?>
