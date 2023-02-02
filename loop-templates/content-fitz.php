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
$hero_background_image = get_field('hero_background_image');

// $ = get_field('');

$first_block_first_image = get_field('first_block_first_image');
$first_block_second_image = get_field('first_block_second_image');
$first_block_third_image = get_field('first_block_third_image');
$first_block_fourth_image = get_field('first_block_fourth_image');
$first_block_fifth_image = get_field('first_block_fifth_image');
$first_block_content = get_field('first_block_content');

$second_block_content = get_field('second_block_content');

$third_block_title = get_field('third_block_title');
$third_block_subtitle = get_field('third_block_subtitle');

$fourth_block_title = get_field('fourth_block_title');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section class="page-hero fitz">
    <div class="<?php echo esc_attr( $container ); ?> h-100 d-flex align-items-center">
      <h1 class="ps-md-5 text-center"><?php echo $hero_title; ?><br /><span><?php echo $hero_subtitle; ?></h1>
    </div>
    <div class="overlay"></div>
    <div class="bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);"></div>
  </section>

  <section class="fitz-first-block" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        
        <div class="col-md-6 d-md-none d-sm-block">
          <?php echo $first_block_content; ?>
        </div>

        <div class="col-md-5 ps-lg-4">
          <div class="image-box first-image red-blue max-600">
            <div class="image-container">
              <img src="<?php echo esc_url($first_block_first_image['url']); ?>" alt="<?php echo esc_attr($first_block_first_image['alt']); ?>">
            </div>
            <div class="details">
              <h6><?php echo esc_attr($first_block_first_image['alt']); ?></h6>
            </div>
          </div>
          <div class="position-relative">
            <div class="image-box second-image max-400 mt-4">
              <div class="image-container">
                <img src="<?php echo esc_url($first_block_second_image['url']); ?>" alt="<?php echo esc_attr($first_block_second_image['alt']); ?>">
              </div>
            </div>
            <div class="image-box third-image max-400 d-none d-xl-block">
              <div class="image-container">
                <img src="<?php echo esc_url($first_block_third_image['url']); ?>" alt="<?php echo esc_attr($first_block_third_image['alt']); ?>">
              </div>
            </div>
            <div class="image-box fourth-image blue-purple max-500 mt-3">
              <div class="image-container">
                <img src="<?php echo esc_url($first_block_fourth_image['url']); ?>" alt="<?php echo esc_attr($first_block_fourth_image['alt']); ?>">
              </div>
              <div class="details">
                <h6><?php echo esc_attr($first_block_fourth_image['alt']); ?></h6>
              </div>
            </div>
          </div>
          <div class="image-box fourth-image blue-green max-600 mt-4">
            <div class="image-container">
              <img src="<?php echo esc_url($first_block_fifth_image['url']); ?>" alt="<?php echo esc_attr($first_block_fifth_image['alt']); ?>">
            </div>
            <div class="details">
              <h6><?php echo esc_attr($first_block_fifth_image['alt']); ?></h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-md-block d-sm-none">
          <?php echo $first_block_content; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="fitz-second-block" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?> max-1200">
      <div class="row">
        <div class="col-12 pt-3 pb-2">
          <?php echo $second_block_content; ?>
        </div>
      </div>
    </div>
  </section>

  <?php if( have_rows('third_block_publications') ): ?>
  <section class="fitz-publications" id="sectionThree">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 mb-3 ps-4">
          <h3 class="block-title pt-2 max-600">&gt; <?php echo $third_block_title; ?></h3>
          <p><?php echo $third_block_subtitle; ?></p>
        </div>
        <?php while( have_rows('third_block_publications') ): the_row(); 
          $image = get_sub_field('image');
          $url = get_sub_field('url');
        ?>
          <div class="col-md-3 col-lg-4 d-flex align-items-center justify-content-center">
            <a href="<?php echo $url; ?>" target="_blank" class="pt-3 pb-3">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php if( have_rows('fourth_block_sections') ): ?>
  <section class="fitz-legacy" id="sectionFour">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12 lg-ps-4 md-ps-4">
          <h3 class="block-title pt-2">&gt; <?php echo $fourth_block_title; ?></h3>
        </div>
      </div>
    </div>
    <div class="<?php echo esc_attr( $container ); ?> mt-4 mb-3 sections">
      <div class="row">
      <?php while( have_rows('fourth_block_sections') ): the_row(); 
          $title = get_sub_field('title');
          $content = get_sub_field('content');
          $links = get_sub_field('links');
        ?>
        <div class="col-md-4 section mb-3 mb-md-0">
          <h3><?php echo $title; ?></h3>
          <p><?php echo $content; ?></p>
          <?php if( have_rows('links') ): ?>
          <div class="links d-flex flex-column">
            <?php while( have_rows('links') ): the_row(); 
              $link = get_sub_field('link');
            ?>
              <a class="d-block d-flex align-items-center mb-2" href="<?php echo $link['url']; ?>" target="_blank"><img class="pe-2" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon-blue.svg'; ?>" alt="Explore" /><div class="max-300"><?php echo $link['title']; ?></div></a>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

</article>