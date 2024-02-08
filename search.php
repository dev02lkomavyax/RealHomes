<?php get_header();?>
<?php
// Add this code to your theme's search.php file

$args = array(
    'post_type' => 'products', // Your custom post type slug
    'posts_per_page' => -1,
    's' => isset($_GET['s']) ? $_GET['s'] : '', // Search keyword
    'meta_query' => array(
        'relation' => 'OR', // Use AND relation between meta queries
        array(
            'key' => 'sale', // Meta key for the boolean field
            'value' => 'true', // You can set it directly to true if you want to search for true values
            'compare' => '=', // Compare for exact match
            'type' => 'BOOLEAN', // Specify the data type as boolean to ensure correct comparison
        ),
        array(
            'key' => 'city', // Meta key for the second select field
            'value' => isset($_GET['city']) ? $_GET['city'] : '', // Selected value for the second select field
            'compare' => 'LIKE', // Match the value
        ),
        array(
            'key' => 'type', // Meta key for the second select field
            'value' => isset($_GET['type']) ? $_GET['type'] : '', // Selected value for the second select field
            'compare' => 'LIKE', // Match the value
        ),
        
    ),
);

$search_query = new WP_Query($args);?>
<div class="universal-container">
    <div class="sub-universal-container">
    <?php if ($search_query->have_posts()) :
    while ($search_query->have_posts()) : $search_query->the_post();
       
        $name = get_field('name');
        $image = get_field('image');
        $cost = get_field('cost');
        $location = get_field('location');
        $is_featured = get_field('featured');
        $is_trendy = get_field('trendy');
        $is_sale = get_field('sale');
        $property_id = get_the_id();
        ?>
        <div class="row-property-card">
            <div class="thumbnail" style="width:35%;border-radius:0;"><a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $property_id; ?>"><img src="<?php echo esc_url($image); ?>" alt="img"></a></div>
            <div class="row-content">
                <div class="container-1">
                    <ul class='tags'>
                        <?php if ($is_featured) : ?>
                            <li><a href="#">Featured</a></li>
                        <?php endif; ?>
                        <?php if ($is_sale) : ?>
                            <li><a href="#">For Sale</a></li>
                        <?php endif; ?>
                        <?php if ($is_trendy) : ?>
                            <li><a href="#">Trendy</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="name"><h5><a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $property_id; ?>"><?php echo esc_html($name); ?></a></h5></div>
                    <div class="location"><span class="material-icons">location_on</span>&nbsp;<?php echo esc_html($location); ?></div>
                    <div class="card-amneties">
                        <ul>
                            <li><span class="material-icons">bed</span>&nbsp;3</li>
                            <li><span class="material-icons">shower</span>&nbsp;4</li>
                            <li><span class="material-icons">crop_landscape</span>1830 sq.ft</li>
                        </ul>
                    </div>
                </div>
                <div class="container-2">
                    <div class="build-year"><h5>2018</h5></div>
                    <div class="cost"><h5>₹&nbsp;<?php echo esc_html($cost); ?></h5></div>
                    <div class="utilities">
                        <div class="property-compare"><span class="material-icons">compare</span></div>
                        <div class="property-wishlist"><span class="material-icons">favorite</span></div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile;
    wp_reset_postdata();
else :?>
    <div class="universal-container">
        <div class="sub-universal-container">
            <h3>No Results Found</h3>
        </div>
    </div>
<?php endif;
?>
    </div>
</div>
<?php get_footer();?>