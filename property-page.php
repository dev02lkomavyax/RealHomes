
<?php
/*
Template Name: Property Page
*/
get_header();?>
<div class="wrapper">
   <div class="universal-container">
   <?php if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];
    $args = array(
        'post_type' => 'products',
        'p' => $property_id,
    );
    $property_query = new WP_Query($args);

    if ($property_query->have_posts()) {
        while ($property_query->have_posts()) {
            $property_query->the_post();
            $property_id = get_the_ID();
            $name = get_field('name');
            $image = get_field('image');
            $cost = get_field('cost');
            $unit_price=get_field('unit_price');
            $location = get_field('location');
            $slide1=get_field('slide1');
            $slide2=get_field("slide2");
            $slide3=get_field("slide3");
            $slide4=get_field("slide4");
            $slide5=get_field("slide5");
            $slide6=get_field('slide6');
            $mode1=get_field('mode1');
            $mode2=get_field('mode2');
            $payment1=get_field('payment1');
            $payment2=get_field('payment2');
            $payment3=get_field('payment3');
            $duration1=get_field('duration1');
            $duration2=get_field('duration2');
            $duration3=get_field('duration3');
            ?>
   <div class="sub-universal-container d-flex flex-row fdr-column">
        <div class="top-hero-section d-flex flex-column width-100" style='width:55%;gap:10px'>
        <div class="hero-section" style='width:100%;overflow-hidden'>
            <div class="property-slider" style='position:relative'>
                <div class="swiper-container-property-page">
               <div class="custom-button-prev">
                      <span class="material-icons">arrow_left</span>
              </div>  
              <div class="custom-button-next">
                         <span class="material-icons">arrow_right</span>
                     </div>
                 <div class="swiper-wrapper">
                    <div class="swiper-slide">
                       <div class="image-slider"><img src="<?php echo esc_html($slide1)?>" alt="hero">
                    </div>
                    </div>
                    <div class="swiper-slide">
                       <div class="image-slider"><img src="<?php echo esc_html($slide2)?>" alt="hero">
                    </div>
                    </div>
                    <div class="swiper-slide">
                       <div class="image-slider"><img src="<?php echo esc_html($slide3)?>" alt="hero">
                    </div>
                    </div>
                    <div class="swiper-slide">
                       <div class="image-slider"><img src="<?php echo esc_html($slide4)?>" alt="hero">
                    </div>
                    </div>
                    <div class="swiper-slide">
                       <div class="image-slider"><img src="<?php echo esc_html($slide5)?>" alt="hero">
                    </div>
                    </div>
                    <div class="swiper-slide">
                       <div class="image-slider"><img src="<?php echo esc_html($slide6)?>" alt="hero">
                    </div>
                    </div>
                    </div>    
                 </div>  
            </div>
           </div>
           <div class="album" style='width:100%;overflow:hidden'>
            <div class="swiper-container-property-page-album">
                 <div class="swiper-wrapper">
                     <div class="swiper-slide">
                       <div class="image-cards" style='border-radius:12px'>
                          <img src="<?php echo esc_html($slide1)?>" alt="">
                      </div>
                     </div>
                     <div class="swiper-slide">
                       <div class="image-cards" style='border-radius:12px'>
                          <img src="<?php echo esc_html($slide2)?>" alt="">
                      </div>
                     </div>
                     <div class="swiper-slide">
                       <div class="image-cards" style='border-radius:12px'>
                          <img src="<?php echo esc_html($slide3)?>" alt="img">
                      </div>
                     </div>
                     <div class="swiper-slide">
                       <div class="image-cards" style='border-radius:12px'>
                          <img src="<?php echo esc_html($slide4)?>" alt="img">
                      </div>
                     </div>
                     <div class="swiper-slide">
                       <div class="image-cards" style='border-radius:12px'>
                          <img src="<?php echo esc_html($slide5)?>" alt="img">
                      </div>
                     </div>
                     <div class="swiper-slide">
                       <div class="image-cards" style='border-radius:12px'>
                          <img src="<?php echo esc_html($slide6)?>" alt="mg">
                      </div>
                     </div>
                 </div>
            </div>   
           </div>
        </div>
         <div class="property-details d-flex flex-column">
            <div class="property-name">
                <h1><?php echo esc_html($name)?></h1>
            </div>
            <div class="property-1-location">
                <h6><?php echo esc_html($location)?></h6>
            </div>
            <div class="property-price">
                <h2>₹&nbsp;<?php echo esc_html($cost)?></h2>
            </div>
            <?php 
              if ($unit_price) {
                   echo '<div class="property-price">';
                   echo '<h4>₹&nbsp;' . esc_html($unit_price) . '</h4>';
                   echo '</div>';
               }
               ?>
            <div class="property-description">
                <div class="description-heading"><h4>Description</h4></div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates illo in quos eveniet nisi molestiae. Placeat debitis fugit exercitationem sint sapiente fugiat vel aspernatur porro? Aut autem quia fuga ipsum.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates illo in quos eveniet nisi molestiae. Placeat debitis fugit exercitationem sint sapiente fugiat vel aspernatur porro? Aut autem quia fuga ipsum.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates illo in quos eveniet nisi molestiae. Placeat debitis fugit exercitationem sint sapiente fugiat vel aspernatur porro? Aut autem quia fuga ipsum.</p>       
            </div>

         </div>
        </div>
    </div>
    <!-- Additional Details -->
    <div class="universal-container">
    <div class="sub-universal-container">
    <div class="additional-details">
        <div class="heading"><h1>Additional Details</h1></div>
        <ul class='d-flex flex-column'>
            <li>
               <span>BEDROOM FEATURES:</span>
               <span>Main Floor Master Bedroom, Walk-In Closet</span>
            </li>
            <li>
               <span>DINING AREA:</span>
               <span>Breakfast Counter/Bar, Living/Dining Combo</span>
            </li>
            <li>
               <span>DOORS & WINDOWS:</span>
               <span>Bay Window</span>
            </li>
            <li>
               <span>ENTRY LOCATION:</span>
               <span>Mid Level</span>
            </li>
            <li>
               <span>EXTERIOR CONSTRUCTION:</span>
               <span>Wood</span>
            </li>
            <li>
               <span>ENTRY LOCATION:</span>
               <span>Mid Level</span>
            </li>
        </ul>
    </div>
    </div>
    </div>
    <!-- Property overview -->
   <div class="universal-container">
   <div class="sub-universal-container">
        <div class="overview">
            <div class="heading"><h1>Overview</h1></div>
            <ul class='d-flex flex-row justify-content-between'>
                <li>
                    <span>Bedroom</span>
                    <span>1</span>
                </li>
                <li>
                  <span>Washroom</span>
                  <span>1</span>
                </li>
                <li>
                     <span>Area</span>
                     <span>1450 sq. ft.</span>
                </li>
                <li>
                   <span>Year Built</span>
                   <span>2013</span>
                </li>
                <li>
                <span>Lot Size</span>
                  <span>1800 sq. ft.</span>
                </li>
                <li>
                <span>Garage</span>
                  <span>1</span>
                </li>
            </ul>
        </div>

    </div>
   </div>
    <!-- Property common Note -->
    <div class="universal-container">
    <div class="sub-universal-container">
        <div class="heading"><h1>Properties Common Note</h1></div>
        <div class="common-note-content">
        <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio culpa asperiores, officiis voluptates, consectetur repellat iure nemo nobis totam enim ea nam corrupti veniam modi. Odio dolore reprehenderit possimus voluptatum?</span>
        </div>
        <div class="features">
            <div class="heading"><h3 style='color:#b0b0b0'>Features</h3></div>
            <ul class="d-flex flex-row justify-content-between">
                <li><span class="material-icons">check_circle</span>2 stories</li>
                <li><span class="material-icons">check_circle</span>Home Theater</li>
                <li><span class="material-icons">check_circle</span>Marble Rooms</li>
                <li><span class="material-icons">check_circle</span>Gym</li>
                
            </ul>
        </div>
    </div>
    </div>
    <!-- Floor Plans -->
    <div class="universal-container">
    <div class="sub-universal-container">
        <div class="floor-plans">
            <div class="heading"><h1>Floor Plans</h1></div>
            <div class="floor-plan-content">
                 <div class="left-section">
                  <ul class='d-flex flex-row align-items-center' style='padding:1rem 0.5rem;list-style-type:none;'>
                    <li class='floor-lists'><a href="#">1 Bedroom Apartment</a></li>
                    <li class="floor-lists"><a href="#">2 Bedroom Apartment</a></li>
                    <li class='floor-lists'><a href="#">4 Bedroom Apartment</a></li>    
                  </ul>
                  <div class="bedroom-content-wrapper">
                  <div class='bedroom-content'>
                      <div class="heading-content">
                          <h6>1 Bedroom Apartment</h6><h6>Price on call</h6>
                      </div>
                   </div>
                 <div class="body-content">
                       <p>A walk in closet a bathroom with a variety, toilet and walk in shower are also attached in the bedroom.</p>
                 </div>
                  </div>
                 </div>
                 <div class="right-section">
                   <img src="<?php echo get_theme_file_uri('image/floor-map.png')?>" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Payment Options -->
    <div class="universal-container">
        <div class="sub-universal-container">
        
        <div class="heading"><h2>Payment Options</h2></div>
        <h3>Payment Mode:</h3>
        <div class='payment-mode'><ul class="d-flex flex-row align-items-center"> 
             <li><h5><?php echo esc_html($mode1)?></h5></li>
             <li><h5><?php echo esc_html($mode2)?></h5></li>
             
        </ul></div>
    <table>
        <tr>
            <th>No. of Months</th>
            <th>E.M.I</th>
        </tr>
        <tr>
            <td><?php echo esc_html($duration1)?></td>
            <td><?php echo esc_html($payment1)?></td>
           
        </tr>
        <tr>
        <td><?php echo esc_html($duration2)?></td>
        <td><?php echo esc_html($payment1)?></td>
        </tr>
        <tr>
        <td><?php echo esc_html($duration3)?></td>
        <td><?php echo esc_html($payment3)?></td>
        </tr>
        
    </table>
        </div>
    </div>
    <!-- Video section -->
    <div class="universal-container">
    <div class="sub-universal-container d-flex flex-row justify-content-between video-section">
         <div class="video-container">
         <div class="property-video-heading"><h1>Property Video</h1></div>
         <div class="property-video">
            <img src="<?php echo get_theme_file_uri('image/house2.jpg')?>" alt="image">
         </div>
         <div class="property-video-heading"><h1>Property on map</h1></div>
         <div class="property-video">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.9071797691563!2d77.10668097529144!3d28.692423075632004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d03e4b79b75f7%3A0xb93e3fc0c0975c62!2sAldeko%20Panels%20-%20Aluminium%20Composite%20Panel%20Manufacturer%20%7C%20ACP%20Sheet%20%7C%20ACP%20Panel!5e0!3m2!1sen!2sin!4v1706605438514!5m2!1sen!2sin" width="970" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
         </div>
         <div class="featured-property-sidebar">
            <div class="heading"><h3>Featured Property</h3></div>
         <?php get_template_part('template-parts/featured-property');?>
         </div>

    </div>
    </div>
    <!-- Leave a reply section -->
       <div class="universal-container">
       <div class="sub-universal-container">
       <div class="contact-us"style='background:#e7f6fd'>
            <div class="heading d-flex justify-content-center"><h1>Leave a reply</h1></div>
            <form method="post" class="custom-form" id="contactForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

    <input type="hidden" name="action" value="submit_contact_form">

    <input type="email" id="email" name="email" width="100" placeholder="Your Email" required><br><br>
    
    
    <input type="tel" id="phone"maxlength="10" name="phone" placeholder="Your phone" required>
    <br><br>

    <textarea rows="5" type="text" id="requirements" name="requirements" placeholder="Your requirements" required></textarea><br><br>

    
    <input type="hidden" id="fullPhoneNumber" name="fullPhoneNumber" value="">
    
    
    <input id='submit' type="submit" value="Submit">
</form>
        </div>
       </div>
       </div>
    
        <div class="universal-container">
        <div class="sub-universal-container">
    <div class="heading"><h1>Similar Products</h1></div>
    <div class="sort-by">
        <ul class="d-flex flex-row align-items-center ">
           <li class='sort-lists'>Recommended</li>
           <li class='sort-lists'>Property Features</li>
           <li class='sort-lists'>Property Type</li>
           <li class='sort-lists'>Property Location</li>
           <li class='sort-lists'>Property status</li>
           <li class='sort-lists'>Property agent</li>
       </ul>
   </div>
    <div class="property-container">
        <?php 
        $args = array(
            'post_type'      => 'products',
            'posts_per_page' => 3,
        );
        $query = new WP_Query($args);
        
        if ($query->have_posts()):
            while($query->have_posts()): 
                $query->the_post();
                $name = get_field('name');
                $image = get_field('image');
                $cost = get_field('cost');
                $location = get_field('location');
                $property_id=get_the_id();
                $categories = get_the_terms(get_the_ID(), 'product_category');
                if ($categories && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        $category_name = $category->name;
                        get_template_part('template-parts/property-cards', null, array(
                            'category_name' => $category_name, 
                            'image'         => $image, 
                            'location'      => $location, 
                            'cost'          => $cost, 
                            'name'          => $name,
                            'property_id'   => $property_id,
                        ));
                    }
                }
            endwhile;
            wp_reset_postdata(); 
else :
            echo 'No Property found.';
        endif;
        ?>
    </div>
</div>
        </div>
        <?php
        }
        wp_reset_postdata();
    } else {
        echo 'Property not found.';
    }
} else {
    echo 'No Property ID provided.';
}
?>
</div>


<?php get_footer();?>