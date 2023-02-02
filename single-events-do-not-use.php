<?php
/**
 * The template for displaying all single Events posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$event_hero_name = get_field('event_hero_name');
$event_hero_hosted_by = get_field('event_hero_hosted_by');
$event_hero_subtitle = get_field('event_hero_subtitle');
$event_hero_date = get_field('event_hero_date');
$event_hero_registration_link = get_field('event_hero_registration_link');
$event_hero_site_link = get_field('event_hero_site_link');
$event_hero_short_description = get_field('event_hero_short_description');
$event_hero_first_image = get_field('event_hero_first_image');
$event_hero_second_image = get_field('event_hero_second_image');
$event_hero_third_image = get_field('event_hero_third_image');
$event_hero_cosponsor_first_logo = get_field('event_hero_cosponsor_first_logo');
$event_hero_cosponsor_second_logo = get_field('event_hero_cosponsor_second_logo');
$event_hero_cosponsor_third_logo = get_field('event_hero_cosponsor_third_logo');
$event_about_long_description = get_field('event_about_long_description');
$key_speakers = get_field('key_speakers');

?>

<div class="wrapper" id="full-width-page-wrapper" style="margin-top: 113px;">
  <div class="container" id="hero-content">
    <div class="row">
      <div class="col-md-12 mt-4 content-area" id="hero">
      <!-- hero titles -->
        <div class="ps-lg-3">
          <h5 class="ms-3">Hosted by: <?php echo $event_hero_hosted_by; ?><h5>
          <h1 class="ms-3 mb-1"><?php echo $event_hero_name; ?></h1>
          <h3 class="ms-3 mb-3"><?php echo $event_hero_subtitle; ?></h3>
          <h4 class="ms-3 mb-3"><?php echo $event_hero_date; ?></h4>
        </div>
      </div>
    </div> 

<!-- row 1 -->        
    <div class="container">
      <div class="row mb-3">

        <div class="col-md-4">
        <!-- hero cta buttons and short description --> 
          <a class="external-link ms-3 mt-2" href="?php echo esc_url($event_hero_registration_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Register Now</a>
          <a class="external-link ms-3 mt-2" href="?php echo esc_url($event_hero_site_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Event Site</a>
          <p class="mt-4 ms-3 mb-3"><?php echo $event_hero_short_description; ?></p>
        </div>

        <!-- hero images -->
        <div class="col-md-6 pe-2 image-container">
          <img src="<?php echo esc_url($event_hero_second_image['url']); ?>" alt="<?php echo esc_attr($event_hero_second_image['alt']); ?>">           
          <img src="<?php echo esc_url($event_hero_first_image['url']); ?>" alt="<?php echo esc_attr($event_hero_first_image['alt']); ?>">
        </div>

        <div class="col-md-2">
          <p>COSPONSORED BY</p>
        </div>

  	  </div>
    </div> <!-- row 2 -->
    <div class="overlay"></div>
  </div> <!-- hero content div -->
    
<!-- co-sponsored logos -->
    
    <!-- About the Event -->
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3 class="ms-3 mb-2">About the Event</h3>
          <p class="ms-3 mb-2"><?php echo $event_about_long_description; ?></p>      
        </div>
        <div class="col-md-4 offset-md-2">
          <p>Share with friends</p>
          <div data-aos="fade-in"><?php echo do_shortcode('[Sassy_Social_Share]'); ?></div>
        </div>
      </div>
    </div>

</div> <!-- full-width-page-wrapper starts on line 31 -->

<?php
get_footer();
















