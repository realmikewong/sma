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
$first_block_first_image = get_field('first_block_first_image');
$first_block_first_image_link= get_field('first_block_first_image_link');
$first_block_second_image = get_field('first_block_second_image');
$first_block_second_image_link = get_field('first_block_second_image_link');
$first_block_third_image = get_field('first_block_third_image');
$first_block_third_image_link = get_field('first_block_third_image_link');

$second_block_title = get_field('second_block_title');
$second_block_content = get_field('second_block_content');

$third_block_title = get_field('third_block_title');
$third_block_content = get_field('third_block_content');
$third_block_link_context = get_field('third_block_link_context');
$third_block_link = get_field('third_block_link');
$third_block_link_message = get_field('third_block_link_message');

$fourth_block_title = get_field('fourth_block_title');

$colorClasses = ['teal', 'red-orange', 'blue-purple', 'pink', 'teal-white'];

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero students">
    <div class="<?php echo esc_attr( $container ); ?> d-flex align-items-center h-100">
      <div class="ps-lg-1">
        <h1 class="ps-3 pe-3 mb-md-3"><?php echo $hero_title; ?></h1>
        <div class="ps-3 pe-3 content max-700"><?php echo $hero_content; ?></div>
      </div>
    </div>
    <div class="overlay"></div>
    <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
  </section>

  <section class="student-initiatives pt-0" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row images">
        <div class="col-md-8">
          <div class="image-box first-image yellow">
            <div class="image-container">
              <img src="<?php echo esc_url($first_block_first_image['url']); ?>" alt="<?php echo esc_attr($first_block_first_image['alt']); ?>">
            </div>
            <div class="details ps-lg-3">
              <h6><?php echo esc_attr($first_block_first_image['alt']); ?></h6>
              <a href="<?php echo $first_block_first_image_link['url']; ?>"><?php echo $first_block_first_image_link['title']; ?><span>&gt;</span></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="image-box second-image green mb-2">
            <div class="image-container">
              <img src="<?php echo esc_url($first_block_second_image['url']); ?>" alt="<?php echo esc_attr($first_block_second_image['alt']); ?>">
            </div>
            <div class="details">
              <h6><?php echo esc_attr($first_block_second_image['alt']); ?></h6>
              <a href="<?php echo $first_block_second_image_link['url']; ?>"><?php echo $first_block_second_image_link['title']; ?><span>&gt;</span></a>
            </div>
          </div>
          <div class="image-box third-image blue-purple">
            <div class="image-container">
              <img src="<?php echo esc_url($first_block_third_image['url']); ?>" alt="<?php echo esc_attr($first_block_third_image['alt']); ?>">
            </div>
            <div class="details">
              <h6><?php echo esc_attr($first_block_third_image['alt']); ?></h6>
              <a href="<?php echo $first_block_third_image_link['url']; ?>"><?php echo $first_block_third_image_link['title']; ?><span>&gt;</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 mt-md-0 ps-lg-4">
          <h3 class="block-title heather-blue mb-4">&gt; <?php echo $first_block_title; ?></h3>
          <div class="ps-lg-4 max-1400"><?php echo $first_block_content; ?></div>
        </div>
      </div>

    </div>
    <div class="overlay"></div>
    <div class="bottom-polygon"></div>
  </section>

  <section class="student-assembly" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-2">
          <h3 class="block-title heather-blue mb-4">&gt; <?php echo $second_block_title; ?></h3>
          <div class="ps-lg-4"><?php echo $second_block_content; ?></div>
        </div>
      </div>
    </div>
  </section>

  <?php if( have_rows('slider') ): ?>
  <section class="students-slider" id="slider">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-md-12 ps-lg-3 pe-lg-3">
          <h3 class="mb-4">Recent Student Assembly Initiatives</h3>
          <div class="post-slider images-slider">
            <?php 
              $count = 0;
              while( have_rows('slider') ): the_row(); 
              $image = get_sub_field('image');
              $content = get_sub_field('content');
              $link = get_sub_field('link');
            ?>
            <div>
              <div class="image-box <?php echo $colorClasses[$count]; ?>">
                <div class="image-container bg-image cover" style="background-image: url(<?php echo esc_url($image['sizes']['widescreen']); ?>);"></div>
                <div class="details d-flex align-items-center">
                  <h6><?php echo $content; ?></h6>
                  <?php if ($link): ?><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a><?php endif; ?>
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

  <section class="students-third-block" id="sectionThree">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-4">
          <h3 class="block-title heather-blue mb-4">&gt; <?php echo $third_block_title; ?></h3>
          <div class="ps-lg-4"><?php echo $third_block_content; ?></div>
          <?php if ($third_block_link): ?>
          <div class="ms-auto max-600 me-5 mt-5">
            <div class="mt-4 cta-button d-flex align-items-center blue">
              <p class="mb-0 context"><?php echo $third_block_link_context; ?></p>
              <div class="line"></div>
              <a href="<?php echo $third_block_link['url']; ?>"><?php echo $third_block_link['title']; ?></a>
            </div>
            <div class="link-message mt-4"><?php echo $third_block_link_message; ?></div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-12">
        <div class="title-container ms-lg-4 mb-2 mb-lg-5 mt-2 mt-lg-4">
          <h2 class="max-500"><?php echo $fourth_block_title; ?></h2>
          <div class="line"></div>
        </div>
        <?php if( have_rows('fourth_block_students') ): ?>
          <div class="students ps-2 pe-2 max-1200 ms-auto me-auto">
            <div class="row">
            <?php while( have_rows('fourth_block_students') ): the_row(); 
              $image = get_sub_field('image');
              $name = get_sub_field('name');
              $subtitle = get_sub_field('subtitle');
              $second_subtitle = get_sub_field('second_subtitle');
              $bio_link = get_sub_field('bio_link');
            ?>
              <div class="col-md-4 mb-4">
                <div class="image-container bg-image cover" style="background-image: url(<?php echo $image['url']; ?>);"></div>
                <h4 class="mt-2"><?php echo $name; ?></h4>
                <h5 class="mb-0"><?php echo $subtitle; ?></h5>
                <h6><?php echo $second_subtitle; ?></h6>
                <a href="<?php echo $bio_link; ?>" class="bio-link"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /> Read Bio</a>
              </div>
            <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="polygon"></div>
  </section>
  <section class="students-awards" id="sectionFour">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-md-12 ps-lg-3">
          <div class="header-title-wrapper">
            <h3 class="block-title heather-blue">Previous Honorees</h3>
          </div>
          <div class="awards-list max-900 ps-3">
            <?php if( have_rows('student_awards_block_previous_awards_list') ):
            while( have_rows('student_awards_block_previous_awards_list') ): the_row(); 
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
  </section>
  <div class="students-footer-cta">
    <?php get_template_part('loop-templates/partials/footer-cta-links-2'); ?>
  </div>

</article>