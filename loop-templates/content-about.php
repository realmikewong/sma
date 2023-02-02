<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$about_hero_title = get_field('about_hero_title');
$about_hero_content = get_field('about_hero_content');
$about_hero_link_content = get_field('about_hero_link_content');
$about_hero_video_shortcode = get_field('about_hero_video_shortcode');
$about_hero_background_image = get_field('about_hero_background_image');

$about_title = get_field('about_title');
$about_content = get_field('about_content');
$about_left_image = get_field('about_left_image');
$about_left_image_caption = get_field('about_left_image_caption');
$about_left_image_link = get_field('about_left_image_link');
$about_second_image = get_field('about_second_image');
$about_second_image_link = get_field('about_second_image_link');
$about_third_image = get_field('about_third_image');
$about_third_video_shortcode = get_field('about_third_video_shortcode');
$third_image_content = get_field('third_image_content');

$page_break_title = get_field('page_break_title');
$hisory_title = get_field('hisory_title');
$history_content = get_field('history_content');
$history_links = get_field('history_links');

$community_title = get_field('community_title');
$community_content = get_field('community_content');
$community_link_context = get_field('community_link_context');
$community_link = get_field('community_link');

$last_block_title = get_field('last_block_title');
$last_block_content = get_field('last_block_content');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<section class="page-hero about">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row pt-4 pb-4">
        <div class="col-12 ps-lg-4">
          <h1 class="mb-4"><?php echo $about_hero_title; ?></h1>
          <div class="content max-700"><?php echo $about_hero_content; ?></div>
          <div class="mt-4 cta d-flex align-items-center">
            <p class="mb-0"><?php echo $about_hero_link_content; ?></p>
            <div class="line"></div>
            <?php echo do_shortcode($about_hero_video_shortcode); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="overlay"></div>
    <div class="bg-image cover" style="background-image: url(<?php echo esc_url($about_hero_background_image['sizes']['widescreen']); ?>);"></div>
  </section>

  <section class="about-sma" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-md-6 ps-lg-4">
          <?php echo $about_title; ?>
          <div class="content-wrapper mt-md-4">
            <?php echo $about_content; ?>
          </div>
          <div class="image-box pink max-800 mt-3">
            <div class="image-container">
              <img src="<?php echo esc_url($about_second_image['url']); ?>" alt="<?php echo esc_attr($about_second_image['alt']); ?>">
            </div>
            <div class="details">
              <h6><?php echo esc_attr($about_second_image['alt']); ?></h6>
              <a href="<?php echo $about_second_image_link['url']; ?>"><?php echo $about_second_image_link['title']; ?><span>&gt;</span></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-lg-end">
          <div class="image-box purple max-700">
            <div class="image-container">
              <img src="<?php echo esc_url($about_left_image['url']); ?>" alt="<?php echo esc_attr($about_left_image['alt']); ?>">
            </div>
      			<div class="mt-1 caption">
      				<p align="right" class="mb-0"><?php echo $about_left_image_caption; ?></p>
      			</div>
            <div class="details">
              <h6><?php echo esc_attr($about_left_image['alt']); ?></h6>
              <a href="<?php echo $about_left_image_link['url']; ?>"><?php echo $about_left_image_link['title']; ?><span>&gt;</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row bottom-content">
        <div class="col-lg-5" style="position: relative; z-index: -1;"></div>
        <div class="col-lg-7">
          <div class="image-box teal">
            <div class="image-container">
              <img src="<?php echo esc_url($about_third_image['url']); ?>" alt="<?php echo esc_attr($about_third_image['alt']); ?>">
            </div>
            <div class="details d-md-flex align-items-top">
              <div class="details-wrapper">
                <h6><?php echo esc_attr($about_third_image['alt']); ?></h6>
                <?php echo do_shortcode($about_third_video_shortcode); ?>
              </div>
              <div class="mt-2 mt-md-0"><?php echo $third_image_content; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="polygon"></div>
  </section>

  <?php if( have_rows('second_block_blocks') ): ?>
  <section class="about-second-block pt-md-5 pb-md-4" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?>">
      <?php 
        $count = 0;
        while( have_rows('second_block_blocks') ): the_row(); 
        $image = get_sub_field('image');
        $content = get_sub_field('content');
      ?>
      <div class="row <?php if ($count === 0): echo 'first'; else: echo 'second'; endif; ?>">
        <div class="col-md-5 mt-3 mt-lg-0 ps-lg-4">
          <div class="image-box <?php if ($count === 0): echo 'blue'; else: echo 'green'; endif; ?>">
            <div class="image-container">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="content-wrapper">
            <?php echo $content; ?>
          </div>
        </div>
      </div>
      <?php $count++; endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

  <section class="about-page-break d-flex align-items-center justify-content-center">
    <h3><?php echo $page_break_title; ?></h3>
  </section>

  <?php if( have_rows('explore_topics') ): ?>
  <section class="about-explore-topics p-0" id="sectionThree">
    <div class="topics-wrapper d-flex justify-content-between">
      <div class="topics d-lg-flex justify-content-between">
        <?php 
          $count = 0;
          while( have_rows('explore_topics') ): the_row(); 
          $category = get_sub_field('category');
          $list = get_sub_field('list');
        ?>
          <div class="list d-flex flex-column <?php if ($count === 1): echo 'second'; endif; ?> <?php if ($count === 2): echo 'last'; endif; ?>">
            <div class="title"><?php echo $category; ?></div>
            <ul class="items d-flex flex-column">
              <?php while( have_rows('list') ): the_row(); 
                $link = get_sub_field('link');
                $link_url = $link['url'];
                $link_title = $link['title'];
              ?>
              <li><a class="button" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
              <?php endwhile; ?>
            </ul>
          </div>
        <?php $count++; endwhile; ?>
      </div>
      <div class="end-wrapper"><h5>&gt; Explore Topics</h5></div>
    </div>
  </section>
  <?php endif; ?>

  <section class="about-our-history" id="sectionFour">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col">
          <h3 class="block-title ms-lg-3">&gt; <?php echo $hisory_title; ?></h3>
          <div class="content-container pt-3 pt-lg-5 pb-lg-3">
            <?php echo $history_content; ?>
            <?php if( have_rows('history_links') ): ?>
              <div class="links d-flex flex-column align-items-end">
                <?php 
                  $count = 0;
                  while( have_rows('history_links') ): the_row(); 
                  $context = get_sub_field('context');
                  $link = get_sub_field('link');
                ?>
                <div class="mt-4 cta-button d-flex align-items-center <?php if ($count === 0): echo 'blue'; else: echo 'purple'; endif; ?>">
                  <p class="mb-0 context"><?php echo $context; ?></p>
                  <div class="line"></div>
                  <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
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

  <section class="about-community" id="sectionFive">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col">
          <h3 class="block-title ms-lg-3 pt-4">&gt; <?php echo $community_title; ?></h3>
          <div class="content-container pt-3 pb-3 max-1000">
            <?php echo $community_content; ?>
            <div class="mt-4 cta-button teal ms-xl-auto max-800 d-flex align-items-center">
              <p class="mb-0 context"><?php echo $community_link_context; ?></p>
              <div class="line"></div>
              <a href="<?php echo $community_link['url']; ?>"><?php echo $community_link['title']; ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="polygon"></div>
  </section>

  <section class="about-bottom-block">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
          <div class="col ps-4">
            <div class="title-container">
              <h2 class="max-500 mb-3"><?php echo $last_block_title; ?></h2>
            </div>
            <?php echo $last_block_content; ?>
          </div>
        </div>
    </div>
    <div class="radial-bg"></div>
  </section>

  <?php get_template_part('loop-templates/partials/footer-cta-links'); ?>

</article>
