<?php
/*
Template Name: Property By Location
*/
get_header();?>

<div class="universal-container">
    <div class="sub-universal-container">
    <div class="location-property">
    <div class="left-section-property">
        
        <?php 
        $city_name = isset($_GET['city_name']) ? $_GET['city_name'] : '';
            $args = array(
                'post_type'      => 'products',
                'posts_per_page' => 6,
                'meta_query' => array(
                    array(
                        'key' => 'city',
                        'value' => $city_name,
                    ),
                ),
            );
            $query = new WP_Query($args);
            
            if ($query->have_posts()):
                while($query->have_posts()): 
                    $query->the_post();
                    $name = get_field('name');
                    $image = get_field('image');
                    $cost = get_field('cost');
                    $location = get_field('location');
                    $is_featured=get_field('featured');
                    $is_trendy=get_field('trendy');
                    $is_sale=get_field('sale');
                    $property_id=get_the_id();
                    $categories = get_the_terms(get_the_ID(), 'product_category');
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            $category_name = $category->name;?>
                            <div class="row-property-card hidden">
                                <div class="thumbnail" style="width:35%;border-radius:0;"><a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $property_id; ?>"><img src="<?php echo esc_html($image)?>" alt="img"></a></div>
                                <div class="row-content">
                                    <div class="container-1">
                                        <ul class='tags'>
                                            <?php if ($is_featured):?> 
                                                <li><a href="#">Featured</a></li>
                                            <?php endif;?>
                                            <?php if($is_sale):?>
                                            <li><a href="#">For Sale</a></li> 
                                            <?php endif;?>
                                            <?php if($is_trendy):?>
                                            <li><a href="#">Trendy</a></li>
                                            <?php endif;?>
                                        </ul>
                                         <div class="name"><h5><a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $property_id; ?>"><?php echo esc_html($name)?></a></h5></div>
                                         <div class="location"><span class="material-icons">location_on</span>&nbsp;<?php echo esc_html($location)?></div>
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
                                        <div class="cost"><h5>₹&nbsp;<?php echo esc_html($cost)?></h5></div>
                                        <div class="utilities">
                                            <div class="property-compare"><span class="material-icons">compare</span></div>
                                            <div class="property-wishlist"><span class="material-icons">favorite</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-property-card hidden-pc">
                <div class="thumbnail" style="border-radius:0;"><a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $property_id; ?>"><img src="<?php echo esc_url($image); ?>" alt="img"></a></div>
                <ul class='tags-mobile'>
                            <?php if ($is_featured) : ?>
                                <li class='featured-tag'><a href="#">Featured</a></li>
                            <?php endif; ?>
                            <?php if ($is_sale) : ?>
                                <li class='sale-tag'><a href="#">For Sale</a></li>
                            <?php endif; ?>
                            <?php if ($is_trendy) : ?>
                                <li class='trendy-tag'><a href="#">Trendy</a></li>
                            <?php endif; ?>
                        </ul>
                <div class="column-content">
                    <div class="name-mobile"><h5><?php echo esc_html($name)?></h5></div>
                    <div class="mobile-address"><h6><span class="material-icons">location_on</span><?php echo esc_html($location)?></h6></div>
                    <div class="card-amnety">
                            <ul class='d-flex flex-row align-items-center'>
                                <li><span class="material-icons">bed</span>&nbsp;3</li>
                                <li><span class="material-icons">shower</span>&nbsp;4</li>
                                <li><span class="material-icons">crop_landscape</span>1830 sq.ft</li>
                            </ul>
                    </div>
                    <div class="cost-container-row">
                    <div class="cost"><h5>₹&nbsp;<?php echo esc_html($cost); ?></h5></div>
                    <div class="build-year"><h5>2019</h5></div>
                    </div>
                </div>
            </div>
                            <?php
                        }
                    }
                endwhile;
                wp_reset_postdata(); 
else :
                echo 'No Property found.';
            endif;
            ?>
        </div>
            <div class="right-sidebar">
               <div class="wrapper-bar">
               <?php echo get_template_part('template-parts/search-form');?>
               </div>
            </div>
    </div>
    </div>
</div>
<?php get_footer();
?>
