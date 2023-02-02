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
$hero_link = get_field('hero_link');

// $ = get_field('');

$first_block_title = get_field('first_block_title');
$first_block_content = get_field('first_block_content');

$allies_title = get_field('allies_title');


?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero ally">
    <div class="d-flex align-items-center h-100">
      <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
          <div class="col-md-6">
            <h4 class="ps-3"><?php echo $blog_title; ?></h4>
            <h1 class="ps-4"><?php echo $hero_title; ?></h1>
          </div>
          <div class="col-md-6">
            <div class="max-600">
              <?php echo $hero_content; ?>
              <a class="external-link mt-2" href="<?php echo $hero_link; ?>" target="_blank"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon-white.svg'; ?>" alt="Explore" /> Become an Ally</a>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
    </div>
  </section>
  
  <section class="ally-first-block" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-4">
          <h3 class="block-title">&gt; <?php echo $first_block_title; ?></h3>
          <div class="content-wrapper max-1400 ms-auto me-auto mt-4">
            <?php echo $first_block_content; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if( have_rows('allies_list') ): ?>
  <section class="allies-list" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 ps-lg-4">
          <h3 class="block-title heather-blue">&gt; <?php echo $allies_title; ?></h3>
          <div class="list-wrapper max-1400 ms-auto me-auto mt-4">
          <?php while( have_rows('allies_list') ): the_row(); 
            $title = get_sub_field('title');
            $external_link = get_sub_field('external_link');
            $image = get_sub_field('image');
            $content = get_sub_field('content');
          ?>
            <div class="ally">
              <div class="header d-flex justify-content-between align-items-center">
                <h4><?php echo $title; ?></h4>
                <a href="<?php echo $external_link; ?>" target="_blank" class="external-link"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /> Visit External Site</a>
              </div>
              <div class="row pt-3 pb-5">
                <div class="col-md-3">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
                <div class="col-md-9"><?php echo $content; ?></div>
              </div>
            </div>
          <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <div class="educators-footer-cta">
    <?php get_template_part('loop-templates/partials/footer-cta-links-2'); ?>
  </div>

</article>