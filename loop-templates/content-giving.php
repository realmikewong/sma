<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$blog_title = get_bloginfo( 'name' );

$hero_title = get_field('hero_title');
$hero_content = get_field('hero_content');
$hero_right_content = get_field('hero_right_content');
$hero_background_image = get_field('hero_background_image');
$hero_donation_link = get_field('hero_donation_link');

// $ = get_field('');

$block_title = get_field('block_title');
$block_left_title = get_field('block_left_title');
$block_left_content = get_field('block_left_content');
$block_right_title = get_field('block_right_title');
$block_right_content = get_field('block_right_content');

$images = get_field('gallery');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero giving" id="sectionOne">
    <div class="d-flex align-items-center h-100">
      <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
          <div class="col-md-6">
            <h1 class="mt-3 mt-md-0 ps-lg-4"><?php echo $hero_title; ?></h1>
            <div class="content max-700 ps-lg-4 mt-md-4"><?php echo $hero_content; ?></div>
          </div>
          <div class="col-md-6 pb-1 pb-md-0">
            <div class="max-600">
              <div class="right-content max-300 mt-4"><?php echo $hero_right_content; ?></div>
              <a class="external-link mt-2" href="<?php echo $hero_donation_link; ?>" target="_blank"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /> Donate Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
    </div>
  </section>

  <section class="giving-block-section" id="sectionTwo" style="padding-bottom: 10px !important;">
    <div class="<?php echo esc_attr( $container ); ?> max-1400 mt-3">
      <div class="row">
        <div class="col-md-12 ps-lg-3 pe-lg-3">
          <h2 class="mb-4"><?php echo $block_title; ?></h2>
        </div>
        <div class="col-md-6 ps-3 pe-3">
          <h5><?php echo $block_left_title; ?></h5>
          <?php echo $block_left_content; ?>
        </div>
        <div class="col-md-6 ps-3 pe-3">
          <h5><?php echo $block_right_title; ?></h5>
          <?php echo $block_right_content; ?>
        </div>
      </div>
    </div>
  </section>


  <?php get_template_part('loop-templates/partials/footer-cta-links'); ?>


</article>