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

// $activecategories = ['video'];
// $queryList = ['relation' => 'OR'];

// foreach ($activecategories as $category) {
//   $queryList[] = array(
//       'taxonomy' => 'category',
//       'field'    => 'slug',
//       'terms'    => array( $category ),
//   );
// }

// $ = get_field('');

$featured_hero_post_args = array(
  'posts_per_page'   => 1,
  'post_type'        => 'post',
  'orderby'          => 'date',
  'order'            => 'DESC',
  'category_name'    => 'video',
  // 'tax_query'        => $queryList,
  'meta_query'       => array(
    array(
      'key'     => 'featured_hero_post',
      'value'   => '1',
    )
  )
);

$featuerd_hero_post_query = new WP_Query( $featured_hero_post_args );

$featured_posts_args = array(
  'posts_per_page'   => 3,
  'post_type'        => 'post',
  'orderby'          => 'date',
  'order'            => 'DESC',
  'category_name'    => 'video',
  // 'tax_query'        => $queryList,
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

  <?php if ($featuerd_hero_post_query->have_posts()): ?>
    <?php 
      while ($featuerd_hero_post_query->have_posts()): 
      $featuerd_hero_post_query->the_post();
      $hero_background_image = get_field('hero_background_image');
      $ids[] = get_the_ID();
    ?>
    <section class="blog-featured-post bg-image cover" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);" id="featuredHeroPost" data-blog-id="<?php echo get_the_ID(); ?>">
      <div class="<?php echo esc_attr( $container ); ?> max-1400">
        <div class="row">
          <div class="col-12">
            <div class="blog-info d-flex align-items-center">
              <?php echo get_the_category()[0]->name; ?>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15.004" height="42.438" viewBox="0 0 15.004 42.438">
                <defs>
                  <linearGradient id="linear-gradient" x1="0.5" x2="1" y2="0.5" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#fff" stop-opacity="0.686"/>
                    <stop offset="1" stop-color="#fff" stop-opacity="0.902"/>
                  </linearGradient>
                </defs>
                <path id="DIamond" d="M2396.93,955l-15,16.649v25.789l15-13.465Z" transform="translate(-2381.926 -955)" opacity="0.54" fill="url(#linear-gradient)"/>
              </svg>
              <?php echo the_date(); ?>
            </div>
            <h1 class="mt-2"><?php echo the_title(); ?></h1>
            <div class="content max-1000"><?php the_excerpt(); ?></div>
            <a class="external-link mt-2" href="<?php echo the_permalink(); ?>"><img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/external-link-icon-white.svg'; ?>" alt="Explore" /> Explore</a>
          </div>
        </div>
      </div>
    </section>
    <?php endwhile; wp_reset_postdata(); ?>
  <?php else: ?>
    <section class="blog-featured-post empty" id="featuredEmptyHeroPost"></section>
  <?php endif; ?>

  <section class="blog-featured-post empty backup" id="emptyFeaturedHeroPost"></section>

  <section class="filter-menu-block">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col ps-lg-3 pe-lg-3">
          <div class="filter-menu" id="filterMenu">
            <div class="search-field-container">
              <?php echo do_shortcode('[ivory-search id="1020" title="Default Search Form"]'); ?>
              <!-- <input type="text" placeholder="Search">
              <div class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.854" height="20.854" viewBox="0 0 19.854 20.854">
                  <g transform="translate(-1126 -820)">
                    <g transform="translate(1126 820)" fill="none" stroke="#707070" stroke-width="1">
                      <circle cx="8.5" cy="8.5" r="8.5" stroke="none"/>
                      <circle cx="8.5" cy="8.5" r="8" fill="none"/>
                    </g>
                    <line x1="6" y1="6" transform="translate(1139.5 834.5)" fill="none" stroke="#707070" stroke-width="1"/>
                  </g>
                </svg>
              </div> -->
            </div>
            <ul class="categories" id="categoriesList" data-active-category="video">
              <li data-category="all"><a href="<?php echo get_permalink(77); ?>" id="allPostsFilter">All</a></li>
              <?php foreach($categories as $category) {
                echo '<li data-category="' .  $category->slug . '"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
              }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if ($featuerd_posts_query->have_posts()): ?>
  <section class="featured-insights-and-news blog-section" id="featuredPosts">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col ps-lg-3">
          <div class="blog-section-title d-flex align-items-center">
            <img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-purple-bullet.svg'; ?>" alt="" />
            <h2>Featured Courses + Webinars</h2>
          </div>
        </div>
      </div>
      <div class="row mt-3 ps-lg-2">
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
      'posts_per_page'   => 9,
      'post_type'        => 'post',
      'orderby'          => 'date',
      'order'            => 'DESC',
      'post__not_in'     => $ids,
      'category_name'    => 'video',
      // 'tax_query'        => $queryList,
      'paged'            => 1,
    );
    
    $posts_query = new WP_Query( $posts_args );

    if ($posts_query->have_posts()):
  ?>
  <section class="all-stories blog-section">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col-12 ps-lg-3 pe-lg-3">
          <div class="blog-section-title d-flex align-items-center">
            <img class="pe-1" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-blue-bullet.svg'; ?>" alt="" />
            <h2>All Stories</h2>
          </div>
        </div>
      </div>
      <div class="row mt-3 ps-2 pe-2" id="blogPostList">
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

</article>