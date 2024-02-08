<?php
function enqueue_jquery() {
    if (!wp_script_is('jquery', 'enqueued')) {
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

function enqueue_scripts() {
   
    wp_enqueue_script('jquery'); 
    wp_enqueue_script('swiper-js-cdn', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap-js', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js", array('jquery'), '5.3.2', true);
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), '', true);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4', 'all');
    
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/custom-scripts.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-scripts', 'search_results_ajax', array(
        'url' => esc_url(home_url('/search-results'))
    ));

}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
function enqueue_theme_styles() {
    wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null );
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');   
    wp_enqueue_style('bootstrap-css', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css", array(), '5.3.2', 'all');
    wp_enqueue_style('theme-style', get_template_directory_uri() .'/style.css', array(),'all');
    wp_enqueue_style('media-queries', get_template_directory_uri() .'/css/media-queries-mobile.css', array(),'all');
}
add_action('wp_enqueue_scripts','enqueue_theme_styles');

function similar_products() {
    get_template_part('template-parts/similar-products.php');
}
function search_form() {
    get_template_part('template-parts/search-form.php');
}
function featured_property() {
    get_template_part('template-parts/featured-property.php');
}
function property_cards() {
    get_template_part('template-parts/property-cards.php');
}
function custom_post_type_products() {
    $args = array(
        'label' => 'Products',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'thumbnail', 'excerpt'),
        // 'show_in_rest' => true,
    );

    register_post_type('products', $args);

    
    register_taxonomy(
        'product_category',
        'products', 
        array(
            'label' => 'Product Categories',
            'rewrite' => array('slug' => 'product-category'), 
            'hierarchical' => true,
            'show_admin_column' => true, 
            'show_in_rest' => true,
        )
    );

    
    register_taxonomy_for_object_type('post_tag', 'products');
}

add_action('init', 'custom_post_type_products');


function custom_post_type_hero() {
    $args = array(
        'label' => 'hero',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title','thumbnail'),
        // 'show_in_rest' => true,
  
    
    );

    register_post_type('hero', $args);

    
}
add_action('init', 'custom_post_type_hero');
function custom_post_type_testimonials() {
    $args = array(
        'label' => 'Testimonials',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title','thumbnail'),
        // 'show_in_rest' => true,
  
    
    );

    register_post_type('Testimonials', $args);

    
}
add_action('init', 'custom_post_type_testimonials');

add_action('wp_ajax_custom_search_action', 'custom_search_action_callback');
add_action('wp_ajax_nopriv_custom_search_action', 'custom_search_action_callback');

function custom_search_action_callback() {
    $keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';
    $location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';
    $status = isset($_GET['status']) ? sanitize_text_field($_GET['status']) : '';
    $types = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
    $cost= isset($_GET['cost']) ? sanitize_text_field($_GET['cost']):'';
    $args = array(
        'post_type' => 'products', 
        'posts_per_page' => -1,
        // 's' => $keyword, 
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'city',
                'value' => $location,
                'compare' => '='
            ),
            array(
                'key' => 'status',
                'value' => $status,
                'compare' => '='
            ),
            array(
                'key' => 'type',
                'value' => $types,
                'compare' => '='
            ),
            array(
                'key' => 'cost',
                'value' => $cost,
                'compare' => 'Like'
            )
        )
    );


    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            
        }
        wp_reset_postdata();
    } else {
        echo '<p>No results found.</p>';
    }

    wp_die();
}
function custom_search_2_action_callback() {
    $keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';
    $location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';
    $status = isset($_GET['status']) ? sanitize_text_field($_GET['status']) : '';
    $types = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
    $cost= isset($_GET['cost']) ? sanitize_text_field($_GET['cost']):'';
    $args = array(
        'post_type' => 'products', 
        'posts_per_page' => -1,
        // 's' => $keyword, 
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'city',
                'value' => $location,
                'compare' => '='
            ),
            array(
                'key' => 'name',
                'value' => $keyword,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'status',
                'value' => $status,
                'compare' => '='
            ),
            array(
                'key' => 'type',
                'value' => $types,
                'compare' => '='
            ),
            array(
                'key' => 'range',
                'value' => $cost, 
                'compare' => 'LIKE'
            ),
        )
    );


    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            
        }
        wp_reset_postdata();
    } else {
        echo '<p>No results found.</p>';
    }

    wp_die();
}
add_theme_support('post-thumbnails');




