
<?php
/*
Template Name: Home Page
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
            $image = get_field('image');
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
    <!-- latest properties -->
   <?php 
   $args= array(
    'post_type'=>'products',
    'posts_per_page'=>-1,

   );
   $query= new WP_Query($args);
   ?>
   <div class="universal-container">
   <div class="sub-universal-container">
    <div class="heading">
    <h1>Discover Latest Properties</h1>
    <span>Newest Properties Around You</span>
    </div>
    
    <div class="swiper-container-properties">
        <div class="swiper-wrapper">
            <?php 
            if ($query->have_posts()):
                while($query->have_posts()): 
                    $query->the_post();
                    $property_id=get_the_ID();
                    $name = get_field('name');
                    $image = get_field('image');
                    $cost = get_field('cost');
                    $location = get_field('location');
                    $categories = get_the_terms(get_the_ID(), 'product_category');
                    
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            $category_name = $category->name;?>
                            <div class="swiper-slide">
                                <?php get_template_part('template-parts/property-cards', null, array(
                                    'category_name' => $category_name, 
                                    'image' => $image, 
                                    'location' => $location, 
                                    'cost' => $cost, 
                                    'name' => $name,
                                    'property_id'=>$property_id,
                                ));?>
                            </div>
                            <?php
                        }
                    }
                endwhile;
                wp_reset_postdata(); 
else :
                echo 'No Services found.';
            endif;
            ?>
        </div>
    <div class="slider-button-container">
        <div class="slider-button-prev">
        <span class="material-icons">arrow_left</span>
        </div>
        <div class="swiper-pagination"></div>
        <div class="slider-button-next">
        <span class="material-icons">arrow_right</span>
        </div>
    </div>
    </div>
</div>
   </div>
   <!-- Featured section -->
   <div class="universal-container bg-blue">
  
   <div class="sub-universal-container">
          <div class="heading">
            <h1>Featured Properties</h1>
          </div>
          
        <div class="swiper-slide-unique" style='margin-bottom:50px;position:relative;width:100%;'>
        <?php $args = array(
                                  'post_type' => 'products',
                                  'posts_per_page' => -1,
                              );
                          
                              $featured_query = new WP_Query($args);?>
       
            <div class="swiper-wrapper">
            <?php  if ($featured_query->have_posts()) :
            while ($featured_query->have_posts()) :
                $featured_query->the_post(); 
                $portfolio_id = get_the_ID();
                $name = get_field('name'); 
                $image = get_field('image');
                $cost= get_field('cost');
                $location=get_field('location');
                $unit_price=get_field('unit_price');
                ?>
                 <div class="swiper-slide">
                 <div class="top-hero-section">
        <div class="hero-section" style='width:55%'>
            <div class="property-slider">
                <a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $portfolio_id; ?>"><img src="<?php echo esc_html($image)?>" alt="img"></a>
                
           </div>
           
        </div>
         <div class="property-details d-flex flex-column">
            <div class="property-name">
                <h1><?php echo esc_html($name)?></h1>
            </div>
            <div class="property-1-location">
                <h6><span class="material-icons">location_on</span>&nbsp;<?php echo esc_html($location)?></h6>
            </div>
            <?php 
              if ($unit_price) {
                   echo '<div class="property-price">';
                   echo '<h4>₹&nbsp;' . esc_html($unit_price) . '</h4>';
                   echo '</div>';
               }
               ?>
            
            <div class="amneties">
                <ul>
                    <li><span class="material-icons">bed</span>&nbsp;3</li>
                    <li><span class="material-icons">shower</span>&nbsp;4</li>
                    <li><span class="material-icons">crop_landscape</span>1830 sq.ft</li>
                </ul>
            </div>
            <div class="property-price">
                <h2>₹&nbsp;<?php echo esc_html($cost)?></h2>
            </div>
            <div class="property-description">
                
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates illo in quos eveniet nisi molestiae. Placeat debitis fugit exercitationem sint sapiente fugiat vel aspernatur porro? Aut autem quia fuga ipsum.</p>
            </div>

         </div>
        </div>
                 </div>
            <?php
        endwhile;
        wp_reset_postdata(); 
else :
        echo 'No property found.';
    endif;
    ?>
            </div>
           <div class="slider-button-container flying-button">
           <div class="unique-button-prev">
                      <span class="material-icons">arrow_left</span>
              </div> 
              <div class="unique-pagination"></div> 
              <div class="unique-button-next">
                         <span class="material-icons">arrow_right</span>
                     </div>  
           </div>
            
        </div>
        <div class="bottom-slider" style='width:50%;overflow:hidden;'>
           <div class="swiper-slider-3">
                    <?php $args = array(
                                  'post_type' => 'products',
                                  'posts_per_page' => -1,
                              );
                          
                              $featured_query = new WP_Query($args);?>
            <div class="swiper-wrapper">
            <?php  if ($featured_query->have_posts()) :
            while ($featured_query->have_posts()) :
                $featured_query->the_post(); 
                $portfolio_id = get_the_ID();
                $name = get_field('name'); 
                $image = get_field('image');
                $cost= get_field('cost');
                ?>
                <div class="swiper-slide br-7px">
                <a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $portfolio_id; ?>"><img src="<?php echo esc_html($image)?>" alt="img"></a>
                </div>
                <?php
        endwhile;
        wp_reset_postdata(); 
else :
        echo 'No property found.';
    endif;
    ?>
            </div>

        </div>
        <div class="home-wrapper-icon">
       <span class="material-icons">home</span>
       <h5>4 </h5>
       <span>properties</span>
       
       </div>
       </div>      
    </div>
    
   </div>
   <!-- Testimonials sections -->
   <div class="universal-container">
     <div class="sub-universal-container">
     <div class="testimonial-slider">
      <div class="swiper-wrapper">
        <?php $args = array(
            "post_type"=>'Testimonials',
            "posts_per_page"=>"-1",
        );
        $query=new Wp_Query($args);
        ?>
        <?php 
        if ($query->have_posts()):
            while ($query->have_posts()):
              $query->the_post();
              $content=get_field('content');
              $tesimponial_image=get_field('image');
              $designation= get_field("designation");
              $name=get_field('name');
              ?>
         <div class="swiper-slide">
            <div class="testimonial-cards">
                 <div class='bg-comma-container'><img src="<?php echo get_theme_file_uri('image/bg-comma.png') ?>" alt=""></div>
                    <span><?php echo esc_html($content)?></span>
                        <div class='testimonial-contact' style='gap:12px'>
                            <div class="testimonial-contact-image-container">
                                 <img src="<?php echo esc_html($tesimponial_image);?>" alt="">
                            </div>
                            <div class="testimonial-contact-details d-flex flex-column justify-content-center align-items-center">
                            <h6><?php echo esc_html($name)?></h6>
                            <h6><?php echo esc_html($designation)?></h6>
                        </div>
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
   <!-- Discover Properties Section -->
   <div class="universal-container">
    <div class="sub-universal-container">
        <div class="heading">
            <h1>Discover Properties</h1>
            <h6>Find Properties In Your Favourite Cities</h6>
            <div class="grid-container-4">
                <?php 
                $cities = get_posts(array(
                    'post_type'      => 'products',
                    'posts_per_page' => 4,
                    'meta_key'       => 'city', 
                    'fields'         => 'ids',
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        array(
                            'key'     => 'city', 
                            'compare' => 'EXISTS',
                        ),
                    ),
                ));

                
                foreach ($cities as $city_post_id):
                    $city_name = get_post_meta($city_post_id, 'city', true);
                    $args = array(
                        'post_type'      => 'products',
                        'posts_per_page' => 4,
                        'meta_query'     => array(
                            array(
                                'key'   => 'city',
                                'value' => $city_name,
                            ),
                        ),
                    );
                    $query = new WP_Query($args);
                    
                    $post_count = $query->post_count;
                    ?>
                    <div class="discover-card">
                        <div class="discover-card-image-container">
                            <img src="<?php echo get_theme_file_uri('image/hero-2.jpg') ?>" alt="img">
                        </div>
                        <div class="view-all"><a href='<?php echo esc_url(site_url('/property-by-location')) . '?city_name=' . $city_name; ?>'>View All&nbsp;<span class="material-icons">arrow_right</span></a></div>
                        <div class="property-box">
                            <div class="inner-container">
                                <div class="property-location"><h6><?php echo esc_html($city_name) ?></h6></div>
                                <div class="property-count"><h3><?php echo esc_html($post_count) ?></h3><span>properties</span></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


   <!-- Blog section -->
   <div class="universal-container">
     <div class="sub-universal-container">
        <div class="heading">
            <h1>Latest News & Updates</h1>
            <h6>Latest News About Real Estate</h6>
        </div>
        
        <div class="blogs-container">
            <?php $args= array(
                "post_type"=>"post",
                "posts_per_page"=>"-1",
            );
            $query = new Wp_Query($args); 
            ?>
            <div class="blogs-swiper-container">
    <div class="swiper-wrapper">
        <?php if ($query->have_posts()):
            while($query->have_posts()):
                $query->the_post();
                $post_title = get_the_title();
                $post_date = get_the_date();  
                $categories= get_the_category();
                $thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
        ?>
                <div class="swiper-slide">
                    <div class="cards">
                    <div class="thumbnail">
                       <a href="<?php the_permalink(); ?>"><?php echo $thumbnail; ?></a>
                       </div>
                        <div class="date"><span><?php echo esc_html($post_date); ?></span></div>
                        <div class="name"><a href="<?php the_permalink(); ?>"><h5><?php echo esc_html($post_title); ?></h5></a></div>
                        <div class='blog-category'><p><?php 
                            if ($categories) {
                                foreach ($categories as $category) {
                                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                }
                            }
                            ?></p></div>
                    </div>
                </div>
        <?php endwhile;
            wp_reset_postdata(); 
else :
            echo 'No Blogs found.';
        endif;
        ?>
    </div>
    <div class="slider-button-container">
        <div class="blog-slider-button-prev">
            <span class="material-icons">arrow_left</span>
        </div>
        <div class="swiper-pagination-blogs"></div>
        <div class="blog-slider-button-next">
            <span class="material-icons">arrow_right</span>
        </div>
    </div>
</div>

        </div>
     </div>
   </div>
</div>


<?php get_footer();?>