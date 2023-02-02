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
$hero_subtitle = get_field('hero_subtitle');
$hero_title_text_color = get_field('hero_title_text_color');
$hero_content = get_field('hero_content');
$hero_background_image = get_field('hero_background_image');

// $ = get_field('');

$blue_block_title = get_field('blue_block_title');
$blue_block_content = get_field('blue_block_content');

$first_section_title = get_field('first_section_title');
$first_section_content = get_field('first_section_content');

$second_block_title = get_field('second_block_title');
$second_block_content = get_field('second_block_content');

$posts_args = array(
  'posts_per_page'   => 6,
  'post_type'        => 'post',
  'orderby'          => 'date',
  'order'            => 'DESC',
  'category_name'    => 'video',
);

$posts_query = new WP_Query( $posts_args );

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero resources">
    <div class="d-flex align-items-center h-100">
      <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
          <div class="col-12">
            <h2 class="ps-md-3 max-500"><?php echo $hero_subtitle; ?></h2>
            <h1 class="ps-md-5 max-1000" style="color: <?php echo $hero_title_text_color; ?>"><?php echo $hero_title; ?></h1>
          </div>
        </div>
      </div>
      <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['url']); ?>);"></div>
    </div>
  </section>

  <section class="resources-blue-block" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12">
          <h3 class="block-title text-white mb-4 ps-lg-3">&gt; <?php echo $blue_block_title; ?></h3>
          <div class="content-wrapper max-1000 ms-auto me-auto">
            <?php echo $blue_block_content; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="resources-block section-one" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12">
          <h3 class="block-title heather-blue mb-4 ps-lg-3">&gt; <?php echo $first_section_title; ?></h3>
          <div class="content-wrapper max-1000 ms-auto me-auto">
            <hr />
            <?php echo $first_section_content; ?>
          </div>
          <?php if ($posts_query->have_posts()): ?>
          <div class="max-1200 ms-auto me-auto">
            <div class="title-container mt-3 d-flex align-items-center justify-content-between">
              <h3>Videos</h3>
              <a href="<?php echo get_permalink(79); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.061" height="30" viewBox="0 0 30.061 30">
                  <g id="Component_44_24" data-name="Component 44 – 24" style="isolation: isolate">
                    <g id="Icon_feather-arrow-up-right" data-name="Icon feather-arrow-up-right" transform="matrix(0.985, 0.174, -0.174, 0.985, 11.342, 8.521)">
                      <path id="Path_28" data-name="Path 28" d="M0,11.338,10.324,0" transform="translate(0)" fill="none" stroke="#62b0de" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                      <path id="Path_29" data-name="Path 29" d="M0,0,10.32,0l0,11.335" transform="translate(0.004 0)" fill="none" stroke="#62b0de" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    </g>
                    <g id="Ellipse_2" data-name="Ellipse 2" fill="none" stroke="#62b0de" stroke-width="1.5">
                      <ellipse cx="15.03" cy="15" rx="15.03" ry="15" stroke="none"/>
                      <ellipse cx="15.03" cy="15" rx="14.28" ry="14.25" fill="none"/>
                    </g>
                  </g>
                </svg>
                <span class="ps-1">View Complete Collection</span>
              </a>
            </div>
            <div class="post-slider mt-3">
            <?php 
              while ($posts_query->have_posts()): 
              $posts_query->the_post();
            ?>
              <div class="post-box h-100 video">
                <a href="<?php echo the_permalink(); ?>">
                  <?php if (has_post_thumbnail( $post->ID ) ): 
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                  ?>
                  <div class="image-container">
                    <img src="<?php echo $image[0]; ?>" alt="">
                  </div>
                  <?php endif; ?>
                  <div class="details-wrapper">
                    <h3><?php echo the_title(); ?></h3>
                    <div class="content max-1000 post-slider-desc"><p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p></div>
                  </div>
                </a>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <div class="max-1200 ms-auto me-auto">
          <div class="title-container d-flex align-items-center justify-content-between">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="resources-block section-two" id="sectionThree">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12">
          <h3 class="block-title heather-blue mb-4 ps-3">&gt; <?php echo $second_block_title; ?></h3>
          <div class="content-wrapper max-1000 ms-auto me-auto">
            <hr />
            <?php echo $second_block_content; ?>
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