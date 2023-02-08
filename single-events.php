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


<style type="text/css">


h1 {
  color: #0F125C;font-family: action_sanslight;
  white-space: nowrap;
}

h2 {
  font-family: action_sanslight;
}

h3 {
  color: #0025A0;font-family: action_sanslight;font-size: 35px;
}

h4 {
		color: #0025A0;
		font-family: $font-family-serif;
		font-size: 28px;
	}


h5 {
  color: #0025A0;
  font-family: action_sanslight;
  font-size: 20px;
}


#hero-content {
  background: radial-gradient(circle, #FFFFFF, #CBEBFF, #E5C1FF);
  padding: 3.75rem 0;
  position: relative;
}
.hero-bg-image {
  position: absolute;
  background-repeat: no-repeat;
  background-size: contain;
  background-position: center center;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: .25;
  z-index: 1;
}
.hero-bg-image.cover {
  background-size: cover;
}
.image-container .img-1 {
  position: relative;
  top: 50px;
  left: 275px;
  width: 279px;
}
a.external-link:hover {
  background-color: #fff;
  color: #0f125c;
}
.about-event {
  top: -22px;
  position: relative;
}
.about-event .details {
  content: "";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #def6fe;
  -webkit-clip-path: polygon(0 0,100% 0,80% 100%,0% 100%);
  clip-path: polygon(0 0,100% 0,80% 100%,0% 100%);
  background: linear-gradient(
    90deg,
    rgb(255, 255, 255) 0%,
    rgb(222, 246, 254) 50%
  );
  z-index: 10;
}
.about-event .details p {
  color: #0F125C;
  font-family: action_sanslight;
  font-size: 25px;width: 75%;
}
.slick-slide {
  margin-left: 5px;
  margin-right: 5px;
}
.image-box .details a {
  text-transform: capitalize;
}
.image-box .details {
    padding: 20px 0;
}






</style>

<div class="wrapper" id="full-width-page-wrapper" style="margin-top: 113px;">

  <div id="hero-content">
    <div class="container">
      <div class="row mb-3">
        <div class="col-md-6 mt-2">
      
          <!-- hero titles -->
          <h5 class="ms-3">Hosted by: <?php echo $event_hero_hosted_by; ?><h5>
          <h1 class="ms-3 mb-1"><?php echo $event_hero_name; ?></h1>
          <h3 class="ms-3 mb-3"><?php echo $event_hero_subtitle; ?></h3>
          <h3 class="ms-3 mb-3"><?php echo $event_hero_date; ?></h3>
        
          <!-- hero cta buttons and short description -->
          <a class="external-link ms-3 mt-2" href="<?php echo esc_url($event_hero_registration_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Register Now</a>

          <a class="external-link ms-3 mt-2" href="<?php echo esc_url($event_hero_site_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Event Site</a>

          <p class="mt-4 ms-3 mb-3" style="color: #0F125C;font-family: action_sansregular;font-size: 28px;"><?php echo $event_hero_short_description; ?></p>
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
  <section class="events-slider" id="slider"> <!-- Traci - I think this has something to do with the images not appearing
                                                    Mike - I haven't figured out the issue yet but I did declare the slider in the head above -->
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

  <section id=""> <!-- I think there needs to be a class on this section so we can target the css -->
  <div class="col-12">
      <div class="title-container ms-lg-4 mb-2 mb-lg-4 mt-2 mt-lg-4">
        <h2 class="max-500" style="font-family: action_sansregular;font-size: 37px;margin-left: 55px;">EVENT AGENDA</h2>
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

<div class="col-md-9 ps-5 mb-2"> <!-- begin div for daily agenda details -->

<?php // check for rows (parent repeater)
  if( have_rows('event_agenda')): ?>
  <div id="days">
    <?php // loop through rows (parent repeater)
      while( have_rows('event_agenda')): the_row(); ?>
      <div>
        
        <h3><?php the_sub_field('event_day'); ?></h3> <!-- this works to show all the days -->
        
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
                
                <div class="row pt-3">
                  <div class="col-md-6 ps-2"><img class="pe-1" src="https://socialmission.org/wp-content/uploads/2023/02/map-pin-svgrepo-com.svg" alt style="width:30px;height:30px"><p><?php echo $agenda_item_location; ?></p></div>
                  <div class="col-md-6"><img class="pe-1" src="https://socialmission.org/wp-content/uploads/2023/02/clock-1-svgrepo-com.svg" alt style="width:30px;height:30px"><p><?php echo $agenda_item_time; ?></p></div>
                </div>
                <div class="row pt-1">
                  <div class="col-md-8 ps-2"><h4><?php echo $agenda_item_name; ?></h4></div>
                  <div class="col-md-8 ps-2"><h5><?php echo $agenda_item_subtitle; ?></h5></div>
                </div>
                <div class="row">
                  <div class="col-md-8 ps-2"><p><?php echo $agenda_item_description; ?></p></div>
                  <div class="col-md-4"><img src="<?php echo esc_url($agenda_item_image['url']); ?>" alt="<?php echo esc_attr($agenda_item_image['alt']); ?>"></div>
                </div>
                
                <div class="row">
                  <div class="col-md-7 ps-2 pt-3"><h5>Speakers</h5></div>
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
                          <p><?php echo $speaker_name; ?></br>
                          <?php echo $speaker_organization; ?></p>
                        </div> <!-- closes the column -->
                          <?php endwhile; // finishes the loop getting agenda item speakers?> 
                          <?php endif; //if(get_sub_field('agenda_item_speakers')): ?>
                        <div class="col-md-4">
                          <div class="row"><div class="cta-button blue pb-3 mt-3 text-center"><a href="<?php echo $agenda_item_register_now['url']; ?>" target="_blank"><?php echo $agenda_item_register_now['title']; ?></a></div></div>
                          <div class="row"><div class="cta-button blue pb-3 mt-3 text-center"><a href="<?php echo $agenda_item_learn_more['url']; ?>" target="_blank"><?php echo $agenda_item_learn_more['title']; ?></a></div></div>
                        </div>
                  </div> <!-- closes the row -->

                </div>
        <?php endwhile; ?>
        <?php endif; //if(get_sub_field('agenda_details')): ?>
    </div>
    <?php endwhile; // while( has_sub_field('event_agenda')): ?>
    </div>
    <?php endif; // if(get_field('event_agenda')): ?>

    </div> <!-- end of the div for the daily agenda details -->

  </section>

  <!-- Key Speakers -->
  <section class="students-third-block" id="sectionThree">
    <div class="col-12">
      <div class="title-container ms-lg-4 mb-2 mb-lg-4 mt-2 mt-lg-4">
        <h2 class="max-500" style="font-family: action_sansregular;font-size: 37px;margin-left: 55px;">KEY SPEAKERS</h2>
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
            <h4 class="mt-2" style="font-size: 1.5rem;margin-bottom: 0;text-transform: uppercase;"><?php echo $name; ?></h4>
            <h5 class="mb-0" style="font-size: 1rem;"><?php echo $subtitle; ?></h5>
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
  <section class=""> <!-- this needs a class that will give the blue background. Can't use the student one b/c it mess up the font styles -->
        <div class="row">
          <div class="col-md-6 ps-4">
            
          <h5 class="ms-3">Hosted by: <?php echo $event_hero_hosted_by; ?></h5></div>
        </div>
        <div class="row">
          <div class="col-md-6 ps-4"><h2 class="ms-3 mb-1"><?php echo $event_hero_name; ?></h2></div>
          <div class="col-md-2">
            <a class="external-link ms-3 mt-2" href="<?php echo esc_url($event_hero_registration_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Register Now</a>

           <a class="external-link ms-3 mt-2" href="<?php echo esc_url($event_hero_site_link); ?>" target="_blank"><img class="pe-1" src="/wp-content/themes/sma/images/external-link-icon.svg" alt="Register now">Event Site</a>
           <p><img class="pe-1" src="/wp-content/themes/sma/images/icon-arrow-right.svg"><a href="/conferences/">More events</a></p>
          </div>
        </div>
        <div class="row col-md-6 ps-4">
          <h3 class="ms-2 mb-3"><?php echo $event_hero_subtitle; ?></h3>
        </div>
        <div class="row col-md-6 ps-4">
          <h3 class="ms-2 mb-3"><?php echo $event_hero_date; ?></h3>
        </div>

  </section>

  <!-- bottom banner section -->
  <div class="join-footer-cta">
    <?php get_template_part('loop-templates/partials/footer-cta-links'); ?>
  </div>

</div> <!-- full-width-page-wrapper -->

<?php
get_footer();
