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

$ids = array();

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <section class="blog-featured-post empty" id="emptyFeaturedHeroPost"></section>

  <section class="filter-menu-block">
    <div class="<?php echo esc_attr( $container ); ?> max-1400">
      <div class="row">
        <div class="col">
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
            <ul class="categories" id="categoriesList" data-active-category="opinion">
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

  <?php 
    $posts_args = array(
      'posts_per_page'   => 9,
      'post_type'        => 'post',
      'orderby'          => 'date',
      'order'            => 'DESC',
      'post__not_in'     => $ids,
      'category_name'    => 'opinion',
      // 'tax_query'        => $queryList,
      'paged'            => 1,
    );
    
    $posts_query = new WP_Query( $posts_args );

    if ($posts_query->have_posts()):
  ?>
  <section class="all-stories blog-section">
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

</article>