
      <div class="cards">
      <div class='thumbnail'>
            <div class="for-sale">For Sale</div>
            <div class="featured">featured</div>
            <div class="more-photos"><span class="material-icons">photo_camera</span></div>
            <div class="more-videos"><span class="material-icons">play_circle</span></div>
            <div class="wishlist"><span class="material-icons">favorite</span></div>
            <div class="compare"><span class="material-icons">compare</span></div>
            <a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $args['property_id']; ?>"><img src="<?php echo esc_html($args['image']); ?>" alt="image"></a>
        </div>
          <div class="name"><a href="<?php echo esc_url(site_url('/property-page')) . '?property_id=' . $args['property_id']; ?>"><?php echo esc_html($args['name']); ?></a></div>
          <div class='location'><span class="material-icons">location_on</span><?php echo esc_html($args['location']); ?></div>
          <div class="type"><?php echo esc_html($args['category_name']); ?></div>
          <div class='cost'>
            <div><h5>₹&nbsp;<?php echo esc_html($args['cost']); ?></h5></div>
            <div class="cost-right-side">
            <div><span class="material-icons">bathroom</span>4</div>
            <div><span class="material-icons">bathroom</span>4.5</div>
            <div><span class="material-symbols-outlined">house</span>1800 sq.ft</div>
            </div>
            </div>
      </div>
   
