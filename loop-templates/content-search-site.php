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
$categories = get_categories();

$featured_posts_args = array(
  'posts_per_page'   => 3,
  'post_type'        => 'post',
  'orderby'          => 'date',
  'order'            => 'DESC',
  'meta_query' => array(
    array(
      'key'     => 'featured_post',
      'value'   => '1',
    )
  )
);

$featuerd_posts_query = new WP_Query( $featured_posts_args );

$ids = array();

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <section class="page-hero search">
    <div class="container max-1400">
      <div class="row">
        <div class="col-12">
          <h3>Search the Alliance</h3>
          <?php echo do_shortcode('[ivory-search id="1020" title="Default Search Form"]'); ?>
        </div>
      </div>
    </div>
  </section>

  <?php if ($featuerd_posts_query->have_posts()): ?>
  <section class="featured-insights-and-news blog-section search-site" id="featuredPosts">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12 mb-3 border-bottom">
          <h3>Looking for Something?</h3>
          <p class="mb-0">Find news, reports, webinars, case studies, interviews, and more by using the search bar, above.</p>
          <p>Or, browse featured content below.</p>
        </div>
        <div class="col">
          <div class="blog-section-title d-flex align-items-center">
            <img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-purple-bullet.svg'; ?>" alt="" />
            <h2>Featured Insights + News</h2>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <?php 
          $count = 0;
          while ($featuerd_posts_query->have_posts()): 
          $featuerd_posts_query->the_post();
          $ids[] = get_the_ID();
          $categoryClassname = strtolower(get_the_category()[0]->name);
        ?>
        <?php if ($count === 0): ?>
        <div class="col-md-6">
          <div class="post-box h-100 <?php echo $categoryClassname; ?>" data-blog-id="<?php echo get_the_ID(); ?>">
            <a href="<?php echo the_permalink(); ?>">
              <?php if (has_post_thumbnail( $post->ID ) ): 
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
              ?>
              <div class="image-box red-orange">
                <div class="image-container">
                  <img src="<?php echo $image[0]; ?>" alt="">
                </div>
              </div>
              <?php endif; ?>
              <div class="post-details-wrapper">
                <div class="details d-flex align-items-center">
                  <?php echo get_the_category()[0]->name; ?>
                  <img src="<?php echo get_stylesheet_directory_uri() . '/images/post-types/post-icon-' . $categoryClassname . '.svg'; ?>" alt="" />
                  <?php echo get_the_date(); ?>
                </div>
                <h3 class="mt-2"><?php echo the_title(); ?></h3>
                <div class="content max-1000"><?php the_excerpt(); ?></div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-6 mt-2 mt-md-0">
        <?php elseif ($count === 1): ?>
          <div class="post-box" data-blog-id="<?php echo get_the_ID(); ?>">
            <a href="<?php echo the_permalink(); ?>">
              <div class="post-details-wrapper">
                <div class="details d-flex align-items-center">
                  <?php echo get_the_category()[0]->name; ?>
                  <img src="<?php echo get_stylesheet_directory_uri() . '/images/post-types/post-icon-' . $categoryClassname . '.svg'; ?>" alt="" />
                  <?php echo get_the_date(); ?>
                </div>
                <h3 class="mt-2"><?php echo the_title(); ?></h3>
                <div class="content max-1000"><?php the_excerpt(); ?></div>
              </div>
            </a>
          </div>
        <?php else: ?>
          <div class="post-box mt-2" data-blog-id="<?php echo get_the_ID(); ?>">
            <a href="<?php echo the_permalink(); ?>">
              <div class="post-details-wrapper">
                <div class="details d-flex align-items-center">
                  <?php echo get_the_category()[0]->name; ?>
                  <img src="<?php echo get_stylesheet_directory_uri() . '/images/post-types/post-icon-' . $categoryClassname . '.svg'; ?>" alt="" />
                  <?php echo get_the_date(); ?>
                </div>
                <h3 class="mt-2"><?php echo the_title(); ?></h3>
                <div class="content max-1000"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></div>
              </div>
            </a>
          </div>
        </div>
        <?php endif; ?>
        <?php $count++; endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php 
    $posts_args = array(
      'posts_per_page'   => 3,
      'post_type'        => 'post',
      'orderby'          => 'date',
      'order'            => 'DESC',
      'post__not_in'     => $ids,
      'paged'            => 1,
    );
    
    $posts_query = new WP_Query( $posts_args );

    if ($posts_query->have_posts()):
  ?>
  <section class="all-stories blog-section" id="allStories">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12">
          <div class="blog-section-title d-flex align-items-center">
            <img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-blue-bullet.svg'; ?>" alt="" />
            <h2>All Stories</h2>
          </div>
        </div>
      </div>
      <div class="row mt-3" id="blogPostList">
        <?php 
          while ($posts_query->have_posts()): 
          $posts_query->the_post();
          $categoryClassname = strtolower(get_the_category()[0]->name);
        ?>
        <div class="col-md-6 col-lg-4 mb-3">
          <div class="post-box h-100 <?php echo $categoryClassname; ?>" data-blog-id="<?php echo get_the_ID(); ?>">
            <a href="<?php echo the_permalink(); ?>">
              <?php if (has_post_thumbnail( $post->ID ) ): 
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
              ?>
              <div class="image-box red-orange">
                <div class="image-container">
                  <img src="<?php echo $image[0]; ?>" alt="">
                </div>
              </div>
              <?php endif; ?>
              <div class="post-details-wrapper">
                <div class="details d-flex align-items-center">
                  <?php echo get_the_category()[0]->name; ?>
                  <img src="<?php echo get_stylesheet_directory_uri() . '/images/post-types/post-icon-' . $categoryClassname . '.svg'; ?>" alt="" />
                  <?php echo get_the_date(); ?>
                </div>
                <h3 class="mt-2"><?php echo the_title(); ?></h3>
                <div class="content max-1000"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></div>
              </div>
            </a>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section id="loadMoreContainer" class="pt-1">
    <div class="<?php echo esc_attr( $container ); ?> max-1300">
      <div class="section-footer-link d-flex justify-content-center">
        <button id="load-more" class="btn btn-primary" data-type="blog">Show More</button>
      </div>
    </div>
  </section>

  <section class="search-cta search-site-cta">
    <div class="container max-1400">
      <div class="row border-top pt-3">
        <div class="col-12 text-center">
            Have Search Feedback?<br />
            <a href="mailto:info@socialmission.org">Let us know what you think.</a>
        </div>
      </div>
    </div>
  </section>

</article>