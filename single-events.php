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
$event_hero_background_image = get_field('event_hero_background_image');

$event_hero_cosponsor_first_logo = get_field('event_hero_cosponsor_first_logo');
$event_hero_cosponsor_second_logo = get_field('event_hero_cosponsor_second_logo');
$event_hero_cosponsor_third_logo = get_field('event_hero_cosponsor_third_logo');
$event_about_long_description = get_field('event_about_long_description');
$events_slider = get_field('events_slider');
$event_agenda = get_field('event_agenda');
$key_speakers = get_field('key_speakers');

$colorClasses = ['teal', 'red-orange', 'blue-purple', 'pink', 'teal-white'];

?>


<div class="wrapper" id="full-width-page-wrapper" style="margin-top: 113px;">

  <div id="hero-content">
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-6 mt-2">
      
          <!-- hero titles -->
          <h5 class="ms-3 hosted-by">Hosted by: <?php echo $event_hero_hosted_by; ?><h5>
          <h1 class="ms-3 mb-1"><?php echo $event_hero_name; ?></h1>
          <h3 class="ms-3 mb-3"><?php echo $event_hero_subtitle; ?></h3>
          <h3 class="ms-3 mb-3"><?php echo $event_hero_date; ?></h3>
        
          <!-- hero cta buttons and short description -->
          <a class="external-link ms-3 mt-2" href="<?php echo esc_url($event_hero_registration_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Register Now</a>

          <a class="external-link ms-3 mt-2" href="<?php echo esc_url($event_hero_site_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Event Site</a>

          <p class="pt-2 mt-4 ms-3 mb-3 me-3" style="border-top: solid 1px #ccc;color: #0F125C;font-family: action_sansregular;font-size: 28px;"><?php echo $event_hero_short_description; ?></p>
        </div>

        <!-- hero images -->
        <div class="col-md-6 pe-2 image-container">
          <img src="<?php echo esc_url($event_hero_second_image['url']); ?>" alt="<?php echo esc_attr($event_hero_second_image['alt']); ?>" class="img-1">
          
          <img src="<?php echo esc_url($event_hero_first_image['url']); ?>" alt="<?php echo esc_attr($event_hero_first_image['alt']); ?>">
        </div>

  	  </div>
    </div>

    <!-- co-sponsored logos -->
    <div class="container">
      <div class="col-8 offset-2" style="border-top: solid 1px #ccc;">
        <div class="ms-lg-3 mb-lg-2 mt-2 mt-lg-4">
          <h4>CO-SPONSORED BY</h4>
        </div>
        <div class="row align-items-center mb-3">
          <div class="col-4 ms-lg-2 align-items-center max-300">
            <img src="<?php echo esc_url($event_hero_cosponsor_first_logo['url']); ?>" alt="<?php echo esc_attr($event_hero_cosponsor_first_logo['alt']); ?>">
          </div>
          <div class="col-4 align-items-center max-300">
            <img src="<?php echo esc_url($event_hero_cosponsor_second_logo['url']); ?>" alt="<?php echo esc_attr($event_hero_cosponsor_second_logo['alt']); ?>">
          </div>
          <div class="col-4 align-items-center max-300">
            <img src="<?php echo esc_url($event_hero_cosponsor_third_logo['url']); ?>" alt="<?php echo esc_attr($event_hero_cosponsor_third_logo['alt']); ?>">
          </div>
        </div>
      </div>
    </div>

  </div> <!-- hero content div -->

    
<!-- About the Event -->
  <div class="about-event">
    <div class="row">

      <div class="col-md-9">
        <div class="details">
          <div class="ms-4 pt-4 pb-3">
            <h4 class="mb-2" style="color: #0F125C;font-family: action_sansregular;font-size: 35px;">About the Event</h4>
            <p class="mb-2"><?php echo $event_about_long_description; ?></p>
          </div>    
        </div>
      </div>

      <div class="col-md-2 d-flex justify-content-end align-self-center">
        <div>
          <p style="color: #0F125C;font-family: action_sansregular;font-size: 25px;">Share with friends</p>
          <div data-aos="fade-in"><?php echo do_shortcode('[Sassy_Social_Share]'); ?></div>
        </div> 
      </div>

    </div>
  </div>

  <!-- Events Slider -->
  <?php if( have_rows('events_slider') ): ?>
  <section class="events-slider" id="slider">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-md-12">
          <div class="post-slider images-slider">
            <?php 
              $count = 0;
              while( have_rows('events_slider') ): the_row(); 
              $image = get_sub_field('slider_image');
              $content = get_sub_field('slider_content');
              $link = get_sub_field('slider_link');
            ?>
            <div>
              <div class="image-box <?php echo $colorClasses[$count]; ?>">
                <div class="image-container bg-image cover" style="background-image: url(<?php echo esc_url($image['sizes']['widescreen']); ?>);"></div>
                <div class="details d-flex align-items-center">
                  <h6 style="font-size: 1.1rem;margin-bottom: 0;margin-right: 10px;"><?php echo $content; ?></h6>
                  <?php if ($link): ?><a href="<?php echo $link['url']; ?>" style="font-family: action_sansregular,sans-serif;font-size: 1.1rem;"><?php echo $link['title']; ?></a><?php endif; ?>
                </div>
              </div>
            </div>
            <?php $count++; endwhile; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="polygon"></div>

  </section>
  <?php endif; ?>

  <!-- Event Agenda -->

  <section class="event-agenda" id="event-agenda">
    <div class="col-12">
        <div class="title-container ms-lg-4 mb-2 mb-lg-3 mt-2 mt-lg-4">
          <h2 class="event-agenda">EVENT AGENDA</h2>
        </div>
    </div>

  <?php
    if(have_rows('event_agenda')):
      while( have_rows('event_agenda')) : the_row();
      // get parent value
      $event_day = get_sub_field('event_day');

      // loop over sub repeater rows
      if(have_rows('agenda_details')):
        while(have_rows('agenda_details')) : the_row();

          // get sub value
          $agenda_item_location = get_sub_field('agenda_item_location');
          $agenda_item_time = get_sub_field('agenda_item_time');
          $agenda_item_name = get_sub_field('agenda_item_name');
          $agenda_item_subtitle = get_sub_field('agenda_item_subtitle');
          $agenda_item_description = get_sub_field('agenda_item_description');
          $agenda_item_speakers = get_sub_field('agenda_item_speakers');
          $agenda_item_image = get_sub_field('agenda_item_image');
          $agenda_item_video = get_sub_field('agenda_item_video');
          $agenda_item_register = get_sub_field('agenda_item_register_now');
          $agenda_item_learn_more = get_sub_field('agenda_item_learn_more');

        endwhile;
      endif;
    endwhile;
  endif; ?>

<div class="pt-1 pb-3 ps-5 mb-2 event-agenda"> <!-- events open -->
  <div class="col-md-10">

<?php // check for rows (parent repeater)
  if( have_rows('event_agenda')): ?>
  <div id="days">
    <?php // loop through rows (parent repeater)
      while( have_rows('event_agenda')): the_row(); ?>
      <div class="mt-4 mb-4 pt-3 pe-3 pb-3 ps-3 agenda-border">
        
        <h3 style="margin-bottom: 0;"><?php the_sub_field('event_day'); ?></h3>
        
        <?php // check for rows (sub repeater)
          if( have_rows('agenda_details')): ?>
            <?php  // loop through rows (sub repeater)
              while( have_rows('agenda_details')): the_row();
              $agenda_item_location = get_sub_field('agenda_item_location');
              $agenda_item_time = get_sub_field('agenda_item_time');
              $agenda_item_name = get_sub_field('agenda_item_name');
              $agenda_item_subtitle = get_sub_field('agenda_item_subtitle');
              $agenda_item_description = get_sub_field('agenda_item_description');
              $agenda_item_image = get_sub_field('agenda_item_image');
              $agenda_item_video = get_sub_field('agenda_item_video');
              $agenda_item_register_now = get_sub_field('agenda_item_register_now');
              $agenda_item_learn_more = get_sub_field('agenda_item_learn_more');
              $agenda_item_image = get_sub_field('agenda_item_image');
            ?>
                
                <div class="row pt-3 mt-2">
                  <div class="col-md-4 ps-2"><h6 class="agenda-info"><img class="pe-1" src="https://socialmission.org/wp-content/uploads/2023/02/map-pin-svgrepo-com.svg" alt style="width:30px;height:30px"><?php echo $agenda_item_location; ?></h6></div>
                  <div class="col-md-6"><h6 class="agenda-info"><img class="pe-1" src="https://socialmission.org/wp-content/uploads/2023/02/clock-1-svgrepo-com.svg" alt style="width:30px;height:30px"><?php echo $agenda_item_time; ?></h6></div>
                </div>
                <div class="row pt-1">
                  <div class="col-md-8 ps-2"><h4 class="event-agenda"><?php echo $agenda_item_name; ?></h4></div>
                  <div class="col-md-8 ps-2"><h5 class="event-agenda"><?php echo $agenda_item_subtitle; ?></h5></div>
                </div>
                <div class="row">
                  <div class="col-md-8 ps-2"><h5 class="agenda-desc" id="agenda-desc"><?php echo $agenda_item_description; ?></h5></div>
                  <div class="col-md-4"><img src="<?php echo esc_url($agenda_item_image['url']); ?>" alt="<?php echo esc_attr($agenda_item_image['alt']); ?>"></div>
                </div>
                
                <div class="row">
                  <div class="col-md-8 ps-2 pt-3"><h5 class="event-agenda-speakers">Speakers</h5></div>
                </div>
              
                <div class="container event-speaker">
                  <div class="row">
                    <?php // check for speaker rows (sub-sub repeater)
                       if( have_rows('agenda_item_speakers')): ?>
                        <?php // loop through speaker rows (sub-sub repeater)
                          while( have_rows('agenda_item_speakers')): the_row();
                          $speaker_name = get_sub_field('speaker_name');
                          $speaker_organization = get_sub_field('speaker_organization');
                          $speaker_photo = get_sub_field('speaker_photo');
                        ?>
                        <div class="col-md-2">
                          <img class="speaker-img" src="<?php echo esc_url($speaker_photo['url']); ?>" alt="<?php echo esc_attr($speaker_photo['alt']); ?>">
                          <div class="event-agenda-speaker"><h6 class="event-agenda-speaker"><?php echo $speaker_name; ?></h6></div>
                          <div class="event-agenda-org"><h6 style="text-align: center";><?php echo $speaker_organization; ?></h6></div>
                        </div> <!-- closes the column -->
                          <?php endwhile; // finishes the loop getting agenda item speakers?> 
                          <?php endif; //if(get_sub_field('agenda_item_speakers')): ?>
                        <div class="col-md-4">
                          <div class="row"><div class="cta-button blue pb-3 mt-2 text-center"><a href="<?php echo $agenda_item_register_now['url']; ?>" target="_blank"><?php echo $agenda_item_register_now['title']; ?></a></div></div>
                          <div class="row"><div class="cta-button tb pb-3 mt-2 text-center"><a href="<?php echo $agenda_item_learn_more['url']; ?>" target="_blank"><?php echo $agenda_item_learn_more['title']; ?></a></div></div>
                        </div>
                  </div> <!-- closes the row -->
                
                </div>
        <?php endwhile; ?>
        <?php endif; //if(get_sub_field('agenda_details')): ?>

    </div>
    <?php endwhile; // while( has_sub_field('event_agenda')): ?>
    </div>
    <?php endif; // if(get_field('event_agenda')): ?>
    </div> <!-- closing, blue background-->
  </section>
  
  <!-- Key Speakers -->
  <section class="events-key-speakers" id="sectionThree">
    <div class="col-12 ps-2">
      <div class="title-container ms-lg-4 mb-2 mb-lg-4 mt-2 mt-lg-4">
        <h2 class="max-500 key-speakers">KEY SPEAKERS</h2>
        <!--<div class="line"></div>-->
      </div>
      <?php if( have_rows('key_speakers') ): ?>
      <div class="students max-1200 ms-auto me-auto">
        <div class="row">
        <?php while( have_rows('key_speakers') ): the_row(); 
          $image = get_sub_field('speaker_photo');
          $name = get_sub_field('speaker_name');
          $subtitle = get_sub_field('speaker_organization');
        ?>
          <div class="col-md-3 mb-2" style="text-align: center;">
            <div class="image-container bg-image cover" style="background-image: url(<?php echo $image['url']; ?>);"></div>
            <h4 class="key-speakers"><?php echo $name; ?></h4>
            <h5 class="key-speakers"><?php echo $subtitle; ?></h5>
          </div>
        <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- News Feed -->
  <!-- We'll use the Juicer WordPress plug-in -->
  <!-- Need to create a custom field for the Juicer feed for each event and then place that into this template using a shortcode -->
  <!-- replace the sassy social share with the juicer info -->
  <!--  <div data-aos="fade-in"><?php echo do_shortcode('[Sassy_Social_Share]'); ?></div> -->

  <!-- bottom banner section -->
  <section class="future ms-3">
        <div class="row">

          <div class="col-md-6 col-sm-12 offset-1 ps-4">
            <h5>Hosted by: <?php echo $event_hero_hosted_by; ?></h5>
            <h2 class="mb-1"><?php echo $event_hero_name; ?></h2>
            <h3><?php echo $event_hero_subtitle; ?></h3>
            <h4 class="mb-3"><?php echo $event_hero_date; ?></h4>
          </div>

          <div class="col-md-2 col-sm-12" style="text-align: center;">
            <a class="external-link trans-white" href="<?php echo esc_url($event_hero_registration_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon-white.svg" alt="Register now">Register Now</a>
            <a class="external-link trans-white mt-2" href="<?php echo esc_url($event_hero_site_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon-white.svg" alt="Register now">Event Site</a>
            <div class="more mt-2"><img class="pe-2" src="/wp-content/themes/sma/images/icon-arrow-up-right-white.svg"><a href="/conferences/">More events</a></div>
          </div>

        </div>
  </section>

  <!-- bottom banner section -->
  <div class="join-footer-cta">
    <?php get_template_part('loop-templates/partials/footer-cta-links'); ?>
  </div>

</div> <!-- full-width-page-wrapper -->

<?php
get_footer();
