
        <form role="search" method="get" id="searchform"  action="<?php echo home_url('/'); ?>">
    <div class="find-your-home-cards">
    <ul>
        <li><input type="search" value="" name="s" id="s" placeholder="Search..."/></li>
        <li>
    <select name="location" id="locations">
        <option value="" disabled selected>Choose a location</option>
        <?php 
        $cities = get_posts(array(
            'post_type'      => 'products', 
            'posts_per_page' => -1,
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

        $unique_cities = array();

        foreach ($cities as $city_post_id) {
            $city_name = get_post_meta($city_post_id, 'city', true);
            if (!in_array($city_name, $unique_cities)) {
               $unique_cities[] = $city_name;
               echo "<option value='" . esc_attr($city_name) . "'>" . esc_html($city_name) . "</option>";
           }
        }
        ?>
    </select>
</li>

      </ul>
      <ul>
        <li>
          <select name="status" id="status">
             <option value="" disabled selected>choose a status</option>
             <?php 
$all_status = get_posts(array(
    'post_type'      => 'products', 
    'posts_per_page' => -1,
    'meta_key'       => 'status',    
    'fields'         => 'ids',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'key'     => 'status',
            'compare' => 'EXISTS',
        ),
    ),
));

$unique_statuses = array();

foreach ($all_status as $status_post_id) {
    $status_name = get_post_meta($status_post_id, 'status', true);
    
    if (!in_array($status_name, $unique_statuses)) {
        $unique_statuses[] = $status_name;
        echo "<option value='" . esc_attr($status_name) . "'>" . esc_html($status_name) . "</option>";
    }
}
?>
        
          </select>
        </li>
        <li>
        <select name="type" id="type">
             <option value="" selected disabled>Choose a type</option>
             <?php
             $all_types = get_posts(array(
    'post_type'      => 'products', 
    'posts_per_page' => -1,
    'meta_key'       => 'type',    
    'fields'         => 'ids',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'key'     => 'type',
            'compare' => 'EXISTS',
        ),
    ),
));


$unique_types = array();

foreach ($all_types as $type_post_id) {
    $type_name = get_post_meta($type_post_id, 'type', true);
    
    
    if (!in_array($type_name, $unique_types)) {
        $unique_types[] = $type_name;
        echo "<option value='" . esc_attr($type_name) . "'>" . esc_html($type_name) . "</option>";
    }
}
?>    
        </select>
        </li>   
     </ul>
     <ul>
    <li>
        <select name="cost" id="cost">
            <option value="" disabled selected>Choose a Price range</option>
            <?php
            $args = array(
                'post_type' => 'products',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'range', 
                        'compare' => 'EXISTS',
                    ),
                ),
            );

            $products_query = new WP_Query($args);

            $ranges = array();
            if ($products_query->have_posts()) {
                while ($products_query->have_posts()) {
                    $products_query->the_post();
                    $range = get_field('range');
                    if ($range && !in_array($range['value'], array_column($ranges, 'value'))) {
                        $ranges[] = $range;
                    }
                }
                wp_reset_postdata();
            }

            foreach ($ranges as $range) {
                echo '<option value="' . esc_attr($range['value']) . '">' . esc_html($range['label']) . '</option>';
            }
            ?>
        </select>
    </li>
    </ul>
    </div>

     <div class='container-button d-flex flex-row justify-content-end' style="margin-top:1rem">
         <button class="advance-search"><span class="material-icons">search</span>&nbsp;Advance Search</button>
         <input type='submit'class='search' value='Search'/>
     </div>
     </form>