<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' ); ?>

<!-- Appears in section to display the name of the tag -->
<section class="blog-featured-post bg-image cover mt-4 d-flex align-items-center">
  <div class="<?php echo esc_attr( $container ); ?> max-1400">
    <div class="row">
      <div class="col-12 ps-lg-3 pt-3">
        <h1>Appears In: &ldquo;<?php echo get_the_tags()[0]->name; ?>&rdquo;</h1>
      </div>
    </div>
  </div>
</section>

<!-- starting the code for the loop -->
<div class="blog-post ps-3 pe-3">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <section style="padding-bottom: 0;">
    <div class="container mt-2">
      <div style="border-bottom: solid 1px #eee;padding-bottom: 50px;">
        <div class="row">

          <div class="col-lg-5 d-none d-lg-block">
            <?php echo get_the_post_thumbnail(); ?>
          </div>

          <div class="col-lg-7 col-sm-12">
            <h3><?php echo the_title(); ?></h3>
            <p><?php echo single_tag_title(); ?> &#x2022 <?php echo get_the_date(); ?></p>
            <div class="d-block d-sm-block d-lg-none sm-screen">
              <?php echo get_the_post_thumbnail(); ?>
            </div>
            <div class="content copy">
              <?php echo wp_trim_words(get_the_excerpt(), 80); ?>
              <p style="margin-bottom: 0;margin-top: 20px;text-align: right;"><a href="<?php echo the_permalink(); ?>">Read More ></a></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <?php endwhile; else : ?>
  <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
</div>
<!-- end of code for the loop -->

<?php get_footer(); ?>










