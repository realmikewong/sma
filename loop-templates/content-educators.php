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
$hero_background_image = get_field('hero_background_image');

// $ = get_field('');

$first_block_title = get_field('first_block_title');
$first_block_content = get_field('first_block_content');
$first_block_video_image = get_field('first_block_video_image');
$first_block_video_shortcode = get_field('first_block_video_shortcode');

$second_block_title = get_field('second_block_title');
$second_block_top_link = get_field('second_block_top_link');
$second_block_content = get_field('second_block_content');
$second_block_our_mission_content = get_field('second_block_our_mission_content');
$second_block_our_work_content = get_field('second_block_our_work_content');
$second_block_video_title = get_field('second_block_video_title');
$second_block_video_placeholder_image = get_field('second_block_video_placeholder_image');
$second_block_video_shortcode = get_field('second_block_video_shortcode');

$awards_block_title = get_field('awards_block_title');
$awards_block_top_link = get_field('awards_block_top_link');
$awards_block_content = get_field('awards_block_content');
$awards_block_categories_list = get_field('awards_block_categories_list');
$awards_block_current_year_award_recipients = get_field('awards_block_current_year_award_recipients');
$awards_block_previous_honorees_link = get_field('awards_block_previous_honorees_link');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero educators">
    <div class="<?php echo esc_attr( $container ); ?> d-flex align-items-center h-100">
      <div class="ps-lg-1">
        <h1 class="ps-2 mb-3"><?php echo $hero_title; ?></h1>
        <div class="ps-2 content max-900"><?php echo $hero_content; ?></div>
      </div>
    </div>
    <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
  </section>

  <?php if( have_rows('initiatives') ): ?>
  <section class="educators-our-initiatives" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <h3 class="block-title text-white text-center mb-3">&gt; Our Initiatives</h3>
      <div class="row">
        <?php while( have_rows('initiatives') ): the_row(); 
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $link = get_sub_field('link');
        ?>
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="image-container bg-image cover" style="background-image: url(<?php echo esc_url($image['sizes']['widescreen']); ?>);"></div>
            <div class="d-flex align-items-center justify-content-between mt-2" style="gap: 10px;">
              <div class="title"><?php echo $title; ?></div>
              <a class="link" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="educators-first-block" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-4">
          <h3 class="block-title heather-blue mb-4">&gt; <?php echo $first_block_title; ?></h3>
          <div class="content-wrapper max-1400 ms-auto me-auto">
            <?php echo $first_block_content; ?>
          </div>
          <div class="video-wrapper">
            <div class="image-box teal max-800 ms-auto me-auto mt-4">
              <div class="image-container">
                <img src="<?php echo esc_url($first_block_video_image['url']); ?>" alt="<?php echo esc_attr($first_block_video_image['alt']); ?>">
              </div>
              <div class="details d-flex align-items-top pb-3">
                <div class="details-wrapper d-flex align-items-center">
                  <h6 class="me-2 mb-0"><?php echo esc_attr($first_block_video_image['alt']); ?></h6>
                  <?php echo do_shortcode($first_block_video_shortcode); ?>
                </div>
              </div>
            </div>
            <div class="polygon"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="educators-second-block" id="sectionThree">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12 ps-lg-3">
          <div class="d-md-flex align-items-center justify-content-between mb-3 mt-3">
            <h3><?php echo $second_block_title; ?></h3>
            <a href="<?php echo $second_block_top_link['url']; ?>"  target="_blank" class="external-link"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /> Visit External Link</a>
          </div>
          <?php echo $second_block_content; ?>
          <h2 class="about-us mt-5 pb-1 mb-3">About Us</h2>
          <div class="row mt-4">
            <div class="col-md-4 text-md-end">
              <h5 class="pe-md-3">Our Mission</h6>
            </div>
            <div class="col-md-8">
              <?php echo $second_block_our_mission_content; ?>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-4 text-md-end">
              <h5 class="pe-md-3">Our Work</h6>
            </div>
            <div class="col-md-8">
              <?php echo $second_block_our_work_content; ?>
            </div>
          </div>
          <div class="video-wrapper mt-md-5">
            <div class="main-wrapper">
              <h4 class="video-title"><?php echo $second_block_video_title; ?></h4>
              <div class="image-box teal max-900 ms-auto me-auto mt-4">
                <div class="image-container">
                  <img src="<?php echo esc_url($second_block_video_placeholder_image['url']); ?>" alt="<?php echo esc_attr($second_block_video_placeholder_image['alt']); ?>">
                </div>
                <div class="details d-flex align-items-top pb-3">
                  <div class="details-wrapper d-flex align-items-center">
                    <h6 class="me-2 mb-0"><?php echo esc_attr($second_block_video_placeholder_image['alt']); ?></h6>
                    <?php echo do_shortcode($second_block_video_shortcode); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="polygon"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="educators-awards" id="sectionFour">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-md-12 ps-lg-4">
          <h3 class="block-title heather-blue mb-5">&gt; <?php echo $awards_block_title; ?></h3>
          <div class="content-wrapper max-1400 ms-auto me-auto">
            <div class="d-md-flex align-items-center justify-content-between mb-3 mt-3">
              <h3><?php echo $awards_block_title; ?></h3>
              <a href="<?php echo $awards_block_top_link['url']; ?>"  target="_blank" class="external-link"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /> Visit External Link</a>
            </div>
            <?php echo $awards_block_content; ?>
            <div class="row mt-4">
              <div class="col-md-4 text-end">
                <h5 class="pe-3">Categories</h6>
              </div>
              <div class="col-md-8">
                <?php echo $awards_block_categories_list; ?>
              </div>
            </div>
            <h3 class="mt-4 mb-3"><?php echo date("Y"); ?> Award Recipients</h3>
            <div class="awards-list max-900 ms-auto"><?php echo $awards_block_current_year_award_recipients; ?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-md-12 ps-lg-3">
          <div class="header-title-wrapper">
            <h3 class="block-title heather-blue">Previous Honorees</h3>
            <a href="<?php echo $awards_block_top_link['url']; ?>" class="internal-link"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-arrow-right.svg'; ?>" /> Learn More</a>
          </div>
          <div class="awards-list max-900 ms-auto">
            <?php if( have_rows('awards_block_previous_awards_list') ):
            while( have_rows('awards_block_previous_awards_list') ): the_row(); 
              $title = get_sub_field('title');
              $content = get_sub_field('content');
            ?>
            <div class="award-section">
              <div class="year-wrapper">
                <h3><?php echo $title; ?></h3>
                <div class="line"></div>
              </div>
              <?php echo $content; ?>
            </div>
            <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="polygon"></div>
  </section>

  

  <div class="educators-footer-cta">
    <?php get_template_part('loop-templates/partials/footer-cta-links-2'); ?>
  </div>

</article>