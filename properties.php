<?php 
/*
Template Name: All Properties Page
*/
get_header();?>
<div class="wrapper">
    
<div>
        <div class="map-container">
            <?php 
            $args =array(
                'post_type'=>'hero',
                 "posts_per_page"=>"6"
            );
            $query= new WP_Query($args);
            ?>
         <div class="swiper-container">
             <div class="swiper-wrapper">
       <?php  if ($query->have_posts()):
        while($query->have_posts()): 
            $query->the_post();
            $name = get_field('name');
            $image = get_field('image');
            $cost = get_field('cost');
            
            ?>
                 <div class="swiper-slide">
                    <div class="banner-section">
                        <div class="banner">
                            <img src="<?php echo esc_html($image)?>" alt="banner">
                            
                        </div>
                    </div>
                 </div>
               <?php endwhile;
        wp_reset_postdata(); 
else :
        echo 'No properties found.';
    endif;
    ?>
             </div>
         </div>
        </div>
    </div>
    <!-- <div class="container">
    <div class="universal-container">
       
    </div>
    </div> -->
   <?php 
   $args= array(
    'post_type'=>'products',
    'posts_per_page'=>-1,

   );
   $query= new WP_Query($args);
   ?>
   <div class="universal-container">
   <div class="sub-universal-container">
   <div class="bread-crumb">
           <ul class='d-flex flex-row align-items-start'>
             <li><span>Home</span> > <span style='color: #1db2ff;'>Full Grid Width</span></li>
           </ul>
        </div>
    <div class="heading">
        <h1>Properties Grid Fullwidth</h1>
        <span>1 to 6 out of 10 properties</span>
    </div>
   <div class="property-container">
    <?php 
    if ($query->have_posts()):
        while($query->have_posts()): 
            $query->the_post();
            $name = get_field('name');
            $property_id=get_the_id();
            $image = get_field('image');
            $cost = get_field('cost');
            $location = get_field('location');
            $categories = get_the_terms(get_the_ID(), 'product_category');
    
            if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $category_name = $category->name;
                    get_template_part('template-parts/property-cards', null, array(
                        'category_name' => $category_name, 
                        'image' => $image, 
                        'location' => $location, 
                        'cost' => $cost, 
                        'name' => $name,
                        'property_id'=>$property_id,
                    ));
                }
            }
        endwhile;
        wp_reset_postdata(); 
else :
        echo 'No Services found.';
    endif;
    ?>
</div>


   </div>
   </div> 
   <div class="universal-container">
   <div class="sub-universal-container">
    <div class="pagination-buttons">
        <ul class='d-flex flex-row' style='gap:10px'>
            <li>1</li>
            <li>2</li>
        </ul>
    </div>
   </div>
   </div>
</div>


<?php get_footer();?>