<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>New Homes</title>
</head>
<body>
<div class="nav-container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary p-0 navbar-custom" >
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo site_url();?>">
                    <div class="logo">
    <img src="https://ultra-realhomes.b-cdn.net/wp-content/uploads/2022/11/ultra-header-logo.png" alt="logo">
</div>                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-custom"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex justify-content-between align-items-center " id="mobile-navbar" style="margin:0 auto;">
                        <ul class="navbar-nav align-items-center me-5  mb-2 mb-lg-0 pt-3 pb-3">
                            <!-- <li class="nav-item">
                            <a class="navbar-brand" id='navbar-brand-2' href="<?php echo site_url();?>">
                            <img src="https://ultra-realhomes.b-cdn.net/wp-content/uploads/2022/11/ultra-header-logo.png" alt='brand'>
                            </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo site_url();?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('real-estate/')?>"
                                    role="button" aria-expanded="false">
                                    Real Estate
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo site_url('/blogs')?>">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="<?php echo site_url()?>">Contact</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav  me-5  mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo site_url();?>"><i class="fab fa-brands fa-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    role="button" aria-expanded="false">
                                    <i class="fab fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><i class="fab fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><i class="fab fa-brands fa-youtube"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active d-flex align-items-center" aria-current="page"
                                    href="<?php echo site_url()?>"><span class="material-icons">call</span>&nbsp;1800-1300-23</a>
                            </li>
                            <li class="nav-item" id='account-icon'>
    <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
        <span class="material-icons">account_circle</span>
    </a>
</li>
                              
                        </ul>
                        </div>
                    </div>
                </div>
            </nav>
       
<div >
<form role="search" method="get" id="searchform" class="sub-header" action="<?php echo home_url('/'); ?>" style='position:relative'>

    <ul class="sub-header-menu d-flex flex-row justify-content-around align-items-center">
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

        $unique_cities = array(); // Initialize unique cities array

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


        <li><select name="status" id="status">
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
        
        </select></li>
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
     <ul class="cost-drop-down">
    <li>
        <select name="cost" id="cost">
            <option value="" disabled selected>Choose a range</option>
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

     <div class='container-button d-flex flex-row justify-content-end'>
         <button class="advance-search"><span class="material-icons">search</span>&nbsp;Advance Search</button>
         <input type='submit'class='search' value='Search'/>
     </div>
     </form>
</div>
</div>
<div class="modal fade" id="fullscreenModal" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body d-flex flex-row align-items-center" style='gap:20px'>
            <div class="left-modal">
                <div class="overlay">
               <?php $day = date('d'); 
                     $month = date('F'); 
                     $year = date('Y'); 
                     $dayOfWeek = date('l');?>

                    <h4>Owning a home is a keystone of wealth… <br>
                        both financial affluence and emotional security.
                    </h4>
                    <div class="time">
                        <div class='d-flex flex-row align-items-center'><h5><?php echo $month?></h5>&nbsp;<h5><?php echo $day ?>,</h5>&nbsp;<h5><?php echo $year?></h5></div>
                        <div><h5><?php echo $dayOfWeek?></h5></div>
                    </div>
                </div>
                <img src="https://w0.peakpx.com/wallpaper/278/522/HD-wallpaper-great-villa-houses-swimming-pool-love-four-seasons-home-attractions-in-dreams-villa-pools-graphy-exterior-beautiful-houses.jpg" alt="bg">
            </div>
            <div class="right-modal" style="position:relative">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <?php  echo do_shortcode('[user_registration_login]');?>
            </div>
            </div>
        </div>
    </div>
</div>

