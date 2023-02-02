<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$hero_title = get_field('hero_title');
$hero_content = get_field('hero_content');
$hero_link_content = get_field('hero_link_content');
$hero_link = get_field('hero_link');
$hero_background_image = get_field('hero_background_image');

$past_conferences_content = get_field('past_conferences_content');
$past_conferences_link_content = get_field('past_conferences_link_content');
$past_conferences_link = get_field('past_conferences_link');

$conferences_scholarship_title = get_field('conferences_scholarship_title');
$conferences_scholarship_content = get_field('conferences_scholarship_content');
$conferences_scholarship_list_of_scholars = get_field('conferences_scholarship_list_of_scholars');

$past_conferences_title = get_field('past_conferences_title');
$past_conferences_image = get_field('past_conferences_image');

$colorClasses = ['teal', 'red-orange', 'blue-purple', 'pink', 'teal-white'];

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<section class="page-hero conferences">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row pt-4 pb-4">
        <div class="col-12 ps-lg-4">
          <h1 class="mb-4"><?php echo $hero_title; ?></h1>
          <div class="content max-700"><?php echo $hero_content; ?></div>
          <div class="mt-4 cta d-flex align-items-center">
            <p class="mb-0"><?php echo $hero_link_content; ?></p>
            <div class="line"></div>
            <a class="btn-link" href="<?php echo $hero_link['url']; ?>"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon-white.svg'; ?>" alt="Explore" /> <?php echo $hero_link['title']; ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="overlay"></div>
    <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
  </section>

  <?php if( have_rows('conferences') ): ?>
  <section class="upcoming-events p-0" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-4">
          <h3 class="block-title">&gt; Upcoming Events</h3>
        </div>
      </div>
    </div>
    <div class="events-list">
    <?php while( have_rows('conferences') ): the_row(); 
      $host = get_sub_field('host');
      $title = get_sub_field('title');
      $subtitle = get_sub_field('subtitle');
      $date = get_sub_field('date');
      $register_now_link = get_sub_field('register_now_link');
      $event_site_link = get_sub_field('event_site_link');
    ?>
      <div class="event">
        <div class="<?php echo esc_attr( $container ); ?> max-1400">
          <div class="row">
            <div class="col-12 ps-lg-4">
              <div class="d-flex align-items-center justify-content-between">
                <div class="left-content">
                  <h6><?php echo $host; ?></h6>
                  <h3><?php echo $title; ?></h3>
                  <?php if ($subtitle): ?><h5><?php echo $subtitle; ?></h5><?php endif; ?>
                  <h4><?php echo $date; ?></h4>
                </div>
                <div class="right-content d-flex flex-column">
                  <?php if ($register_now_link): ?><a href="<?php echo $register_now_link['url']; ?>" class="btn btn-primary">Register Now</a><?php endif; ?>
                  <?php if ($event_site_link): ?><a href="<?php echo $event_site_link['url']; ?>" class="external-link"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /> Event Site</a><?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

  <section class="conferences-page-break d-flex align-items-center">
    <div class="ps-lg-3">
      <h3 class="ps-3 block-title mb-0">&gt; Discover More</h3>
    </div>
  </section>

  <?php if( have_rows('conferences_discover_slider') ): ?>
  <section class="conferences-slider pt-0 pb-2" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-md-12 ps-lg-3 pe-lg-3 mt-md-2 mt-lg-2 mt-sm-2">
          <div class="post-slider images-slider">
            <?php 
              $count = 0;
              while( have_rows('conferences_discover_slider') ): the_row(); 
              $image = get_sub_field('image');
              $title = get_sub_field('title');
              $link = get_sub_field('link');
            ?>
            <div>
              <div class="image-box <?php echo $colorClasses[$count]; ?>">
                <div class="image-container bg-image cover" style="background-image: url(<?php echo esc_url($image['sizes']['widescreen']); ?>);"></div>
                <div class="details d-flex align-items-center">
                  <h6><?php echo $title; ?></h6>
                  <?php if ($link): ?><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a><?php endif; ?>
                </div>
              </div>
            </div>
            <?php $count++; endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="past-conferences" id="sectionThree">
    <div class="<?php echo esc_attr( $container ); ?> max-1200">
      <div class="row">
        <div class="col-12">
          <h3 class="block-title heather-blue">Past conferences</h3>
          <div class="content-wrapper mt-3"><?php echo $past_conferences_content; ?></div>
          <div class="cta-wrapper max-900 ms-auto">
            <div class="mt-4 cta-button d-flex align-items-center purple3">
              <p class="mb-0 context"><?php echo $past_conferences_link_content; ?></p>
              <div class="line"></div>
              <a class="btn-link" href="<?php echo $past_conferences_link['url']; ?>"><?php echo $past_conferences_link['title']; ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="conferences-scholarship" id="sectionFour">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-4">
          <h3 class="block-title heather-blue mt-4">&gt; <?php echo $conferences_scholarship_title; ?></h3>
          <div class="content-wrapper max-1200 mt-4 ms-auto me-auto">
            <?php echo $conferences_scholarship_content; ?>
          </div>
          <div class="list-wrapper max-1000 mt-2 ms-auto me-auto">
            <?php echo $conferences_scholarship_list_of_scholars; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="polygon"></div>
  </section>

  <?php if( have_rows('past_conferences_list') ): ?>
  <section class="past-conferences-list" id="sectionFive">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-4">
          <div class="header mt-4 d-flex align-items-center justify-content-between">
            <div class="title-container">
              <h3 class="block-title heather-blue">&gt; <?php echo $past_conferences_title; ?></h3>
              <p class="ps-3">Previously known as Beyond Flexner Conferences</p>
            </div>
            <img class="d-none d-md-block" src="<?php echo $past_conferences_image['url']; ?>" alt="<?php echo $past_conferences_image['alt']; ?>">
          </div>
          <div class="past-event">
          <?php 
            while( have_rows('past_conferences_list') ): the_row(); 
            $year = get_sub_field('year');
            $title = get_sub_field('title');
            $top_content = get_sub_field('top_content');
            $about = get_sub_field('about');
          ?>
          <div class="event max-1400 ms-auto me-auto mt-4" id="conference<?php echo $year; ?>">
            <div class="year"><?php echo $year; ?></div>
            <div class="content-wrapper max-1200 ms-auto mt-3">
              <div class="title mb-3"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-event-bullet.svg'; ?>" alt="" /> <?php echo $title; ?></div>
              <?php echo $top_content; ?>
              <?php if( have_rows('information_blocks') ): ?>
                <?php while( have_rows('information_blocks') ): the_row(); 
                  $title2 = get_sub_field('title');
                  $content = get_sub_field('content');
                ?>
                  <div class="info-block">
                    <div class="info-title"><?php echo $title2; ?></div>
                    <div class="info-content"><?php echo $content; ?></div>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php if ($about): ?>
              <div class="info-block">
                <div class="info-title">About</div>
                <div class="info-content"><?php echo $about; ?></div>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php get_template_part('loop-templates/partials/footer-cta-links'); ?>

</article>
