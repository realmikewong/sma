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
$hero_background_image = get_field('hero_background_image');
$hero_join_now_link = get_field('hero_join_now_link');

$images = get_field('gallery');

// $ = get_field('');

$colorClasses = ['teal', 'red-orange', 'blue-purple', 'pink', 'teal-white'];


?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero join">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row pt-2 pt-md-4 pb-4">
        <div class="col-md-8 ps-lg-4">
          <h1 class="mb-md-3 pb-2 pb-md-3 max-900"><?php echo $hero_title; ?></h1>
          <div class="content max-900"><?php echo $hero_content; ?></div>
        </div>
        <div class="col-md-4 d-flex align-items-center">
        <a href="<?php echo $hero_join_now_link; ?>" target="_blank" class="external-link"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon-white.svg'; ?>" alt="Explore" /> Join Now</a>
        </div>
      </div>
    </div>
    <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
  </section>

  <?php if( $images ): ?>
  <section class="join-slider mt-2 mt-md-0" id="gallery">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-md-12 ps-lg-4 pe-lg-4">
          <div class="post-slider images-slider">
            <?php 
              $count = 0;
              foreach( $images as $image ):
            ?>
            <div>
              <div class="image-box <?php echo $colorClasses[$count]; ?>">
                <div class="image-container bg-image cover" style="background-image: url(<?php echo esc_url($image['sizes']['widescreen']); ?>);"></div>
              </div>
            </div>
            <?php $count++; endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
 
  <section class="giving-bottom">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-3">
          <div class="d-flex align-items-center" style="gap: 20px;">
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/sma-logo.png'; ?>" alt="<?php echo $blog_title; ?>" />
            <h1>We are <?php echo $blog_title; ?><br/><span>Welcome</span></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="join-footer-cta">
    <?php get_template_part('loop-templates/partials/footer-cta-links'); ?>
  </div>

</article>