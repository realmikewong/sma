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

$first_block_title = get_field('first_block_title');
$first_block_main_image = get_field('first_block_main_image');
$first_block_second_image = get_field('first_block_second_image');
$first_block_content = get_field('first_block_content');

$second_block_title = get_field('second_block_title');
$second_block_main_image = get_field('second_block_main_image');
$second_block_content = get_field('second_block_content');
$second_block_collage_image = get_field('second_block_collage_image');

$third_block_title = get_field('third_block_title');
$third_block_top_content = get_field('third_block_top_content');
$third_block_bottom_content = get_field('third_block_bottom_content');
$third_block_main_image = get_field('third_block_main_image');

$fourth_block_title = get_field('fourth_block_title');
$fourth_block_top_content = get_field('fourth_block_top_content');
$fourth_block_bottom_content = get_field('fourth_block_bottom_content');
$fourth_block_image = get_field('fourth_block_image');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero our-team">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row pt-4 pb-4">
        <div class="col-12 ps-lg-4">
          <h1 class="mb-3 pb-3 max-800"><?php echo $hero_title; ?></h1>
          <div class="content max-900"><?php echo $hero_content; ?></div>
        </div>
      </div>
    </div>
    <div class="overlay"></div>
    <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
  </section>

  <section class="history-block first" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12 ps-lg-3">
          <h2 class="max-1200"><?php echo $first_block_title; ?></h2>
          <div class="image-box first-image yellow max-600 ps-md-3">
            <div class="image-container">
              <img src="<?php echo esc_url($first_block_main_image['url']); ?>" alt="<?php echo esc_attr($first_block_main_image['alt']); ?>">
            </div>
            <div class="details">
              <h6><?php echo esc_attr($first_block_main_image['alt']); ?></h6>
            </div>
          </div>
          <div class="image-box second-image red-blue max-300 d-none d-lg-block d-xl-block d-xxl-block">
            <div class="image-container">
              <img src="<?php echo esc_url($first_block_second_image['url']); ?>" alt="<?php echo esc_attr($first_block_second_image['alt']); ?>">
            </div>
          </div>
          <?php echo $first_block_content; ?>
          <?php if( have_rows('first_block_links') ): ?>
            <div class="d-flex flex-column align-items-end">
              <?php 
                $count = 0;
                while( have_rows('first_block_links') ): the_row(); 
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <div class="mt-4 cta-button d-flex align-items-center <?php if ($count === 0): echo 'purple2'; endif; ?>">
                <p class="mb-0 context"><?php echo $content; ?></p>
                <div class="line"></div>
                <?php if ($link_target === '_blank'): ?>
                <a class="transparent" href="<?php echo $link['url']; ?>" target="_blank"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /><?php echo $link['title']; ?></a>
                <?php else: ?>
                <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                <?php endif; ?>
              </div>
              <?php $count++; endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="history-block second" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12 ps-lg-3">
          <h2 class="mb-md-4"><?php echo $second_block_title; ?></h2>
        </div>
        <div class="col-md-5 ps-lg-3">
          <div class="image-box teal-white">
            <div class="image-container mb-2 mb-md-0">
              <img src="<?php echo esc_url($second_block_main_image['url']); ?>" alt="<?php echo esc_attr($second_block_main_image['alt']); ?>">
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <?php echo $second_block_content; ?>
        </div>
      </div>
    </div>
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-md-6">
        <?php if( have_rows('second_block_links') ): ?>
          <div class="d-flex flex-column">
            <?php 
              $count = 0;
              while( have_rows('second_block_links') ): the_row(); 
              $content = get_sub_field('content');
              $link = get_sub_field('link');
              $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="mt-4 cta-button d-flex align-items-center ps-lg-2 <?php if ($count === 0): echo 'blue'; else: echo 'purple2'; endif; ?>">
              <p class="mb-0 context"><?php echo $content; ?></p>
              <div class="line"></div>
              <?php if ($link_target === '_blank'): ?>
              <a class="transparent" href="<?php echo $link['url']; ?>" target="_blank"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /><?php echo $link['title']; ?></a>
              <?php else: ?>
              <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
              <?php endif; ?>
            </div>
            <?php $count++; endwhile; ?>
          </div>
        <?php endif; ?>
        </div>
        <div class="col-md-6">
          <img class="w-100 ps-4 mt-3 mt-md-0" src="<?php echo esc_url($second_block_collage_image['url']); ?>" alt="<?php echo esc_attr($second_block_collage_image['alt']); ?>">
        </div>
      </div>
    </div>
  </section>

  <section class="history-block third" id="sectionThree">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12 ps-3">
          <h2 class="mb-md-4"><?php echo $third_block_title; ?></h2>
          <div class="max-1400">
            <?php echo $third_block_top_content; ?>
          </div>
        </div>
        <div class="col-md-5 ps-3">
          <div class="image-box red-orange pt-3 pe-3">
            <div class="image-container">
              <img src="<?php echo esc_url($third_block_main_image['url']); ?>" alt="<?php echo esc_attr($third_block_main_image['alt']); ?>">
            </div>
            <div class="details">
              <h6><?php echo esc_attr($third_block_main_image['alt']); ?></h6>
            </div>
          </div>
          <?php if( have_rows('third_block_links') ): ?>
          <div class="d-flex flex-column">
            <?php 
              $count = 0;
              while( have_rows('third_block_links') ): the_row(); 
              $content = get_sub_field('content');
              $link = get_sub_field('link');
              $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="mt-4 cta-button d-flex align-items-center <?php if ($count === 0): echo 'purple2'; endif; ?>">
              <p class="mb-0 context"><?php echo $content; ?></p>
              <div class="line"></div>
              <?php if ($link_target === '_blank'): ?>
              <a class="transparent" href="<?php echo $link['url']; ?>" target="_blank"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /><?php echo $link['title']; ?></a>
              <?php else: ?>
              <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
              <?php endif; ?>
            </div>
            <?php $count++; endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
        <div class="col-md-7">
          <div class="max-600">
            <?php echo $third_block_bottom_content; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="polygon"></div>
  </section>

  <section class="history-block fourth" id="sectionFour">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12">
          <div class="ps-lg-5">
            <h2 class="mb-4 mt-4"><?php echo $fourth_block_title; ?></h2>
            <?php echo $fourth_block_top_content; ?>
            <div>
              <div class="image-box blue ps-3 max-500">
                <div class="image-container">
                  <img src="<?php echo esc_url($fourth_block_image['url']); ?>" alt="<?php echo esc_attr($fourth_block_image['alt']); ?>">
                </div>
                <div class="details">
                  <h6><?php echo esc_attr($fourth_block_image['alt']); ?></h6>
                </div>
              </div>
              <?php echo $fourth_block_bottom_content; ?>
            </div>
            <?php if( have_rows('fourth_block_links') ): ?>
            <div class="d-flex flex-column max-700">
              <?php 
                $count = 0;
                while( have_rows('fourth_block_links') ): the_row(); 
                $content = get_sub_field('content');
                $link = get_sub_field('link');
                $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <div class="mt-4 cta-button d-flex align-items-center <?php if ($count === 0): echo 'purple2'; endif; ?>">
                <p class="mb-0 context"><?php echo $content; ?></p>
                <div class="line"></div>
                <?php if ($link_target === '_blank'): ?>
                <a class="transparent" href="<?php echo $link['url']; ?>" target="_blank"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon.svg'; ?>" alt="Explore" /><?php echo $link['title']; ?></a>
                <?php else: ?>
                <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                <?php endif; ?>
              </div>
              <?php $count++; endwhile; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="polygon"></div>
  </section>

  <?php get_template_part('loop-templates/partials/footer-cta-links'); ?>

</article>