<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

global $wp_query;
$post = $wp_query->post;
$author_id = $post->post_author;
$author_name = get_the_author_meta( 'display_name', $author_id);
$categories = get_the_category(); 
$category = strtolower($categories[0]->cat_name);
$categoryClassname = strtolower(get_the_category()[0]->name);
$tags = get_the_tags();

/** get post id **/
$post_id = get_the_ID();

/** Content for Initiative Posts **/
$header_subtitle = get_field('header_subtitle');
$mini_header_content = get_field('mini_header_content');
$post_type = get_field('post_type', $post_id);
$featured_post = get_field('featured_post');

/** Custom image for the hero section **/
$hero_background_image = get_field('hero_background_image');

?>

<div class="wrapper" id="single-wrapper">


<!-- If the post is type Initiative, show this section -->
  
<?php if(get_field('post_type', $post_id) == 'initiative') { ?>
    <section class="blog-hero dark">
    <div class="<?php echo esc_attr( $container ); ?> max-900">
    <div class="post-header d-flex align-items-center justify-content-between mb-3">
      <a href="javascript:history.go(-1)" class="back">
      <svg xmlns="http://www.w3.org/2000/svg" width="15.844" height="16.672" viewBox="0 0 15.844 16.672">
      <g id="Icon_feather-arrow-left" data-name="Icon feather-arrow-left" transform="translate(-6.5 -6.086)">
        <path id="Path_81" data-name="Path 81" d="M21.344,18H7.5" transform="translate(0 -3.578)" fill="none" stroke="#0f125c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        <path id="Path_82" data-name="Path 82" d="M14.422,21.344,7.5,14.422,14.422,7.5" fill="none" stroke="#0f125c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
      </g>
      </svg>
        Back
      </a>
      <div class="share-icons">
        <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
      </div>
    </div>

    <div class="post-details-wrapper">
      <div class="details d-flex align-items-center">
      <!-- category and date -->
		    <?php echo get_the_category()[0]->name; ?>
          <img src="<?php echo get_stylesheet_directory_uri() . '/images/post-types/post-icon-' . $categoryClassname . '.svg'; ?>" alt="" />
        <?php echo get_the_date(); ?>    
      </div>
    </div>
      <h1 class="blog-hero dark"><?php echo the_title(); ?></h1>
      <div class="header-subtitle"><?php echo $header_subtitle; ?></div>
      <div class="mini-header"><p><?php echo $mini_header_content; ?></div></p> <!-- need to style this correctly -->
    </div>
    </section>
<?php } ?>

  <section class="blog-article">
    <!-- start here -->
  
    <div class="<?php echo esc_attr( $container ); ?> max-900">
      <div class="row">
        <div class="col-12 ">
        
        <!-- if the post is type Regular, use this for the header -->

        <?php if(get_field('post_type', $post_id) == 'regular') { ?>
          <div class="post-header d-flex align-items-center justify-content-between mb-3">
            <a href="javascript:history.go(-1)" class="back">
              <svg xmlns="http://www.w3.org/2000/svg" width="15.844" height="16.672" viewBox="0 0 15.844 16.672">
                <g id="Icon_feather-arrow-left" data-name="Icon feather-arrow-left" transform="translate(-6.5 -6.086)">
                  <path id="Path_81" data-name="Path 81" d="M21.344,18H7.5" transform="translate(0 -3.578)" fill="none" stroke="#0f125c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                  <path id="Path_82" data-name="Path 82" d="M14.422,21.344,7.5,14.422,14.422,7.5" fill="none" stroke="#0f125c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </g>
              </svg>
              Back
            </a>
            <div class="share-icons">
              <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
            </div>
          </div>
          <div class="post-details-wrapper">
            <div class="details d-flex align-items-center">
        <!-- category and date -->
				<?php echo get_the_category()[0]->name; ?>
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/post-types/post-icon-' . $categoryClassname . '.svg'; ?>" alt="" />
                <?php echo get_the_date(); ?>              
              
            </div>
          </div>
          <h1 class="mt-2"><?php echo the_title(); ?></h1> 
                  	    
          	<?php } ?>

          <!-- Article content starts here -->
          
          <div class="content"><?php echo the_content(); ?></div>
          
          <!-- end of article content --> 
          
  <div class="appears-container">
          <h5 class="tag-title mt-4">Appears In</h5>
  </div>
          
          
          <ul class="tags d-flex align-items-center">
            <?php
              foreach ($tags as $tag) {
                echo '<li><a href="' . get_tag_link( $tag ) .'">' . $tag->name . '</a></li>';
              }
            ?>
          </ul>

          <div class="contact-form mt-4">
            <h2 class="mb-4 pt-3 text-center">Have A Question?</h2>
            <?php echo do_shortcode('[contact-form-7 id="833" title="Blog Post Contact Form"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
	
</div><!-- #single-wrapper -->

<?php
get_footer();
