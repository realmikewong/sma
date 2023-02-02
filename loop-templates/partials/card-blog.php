<?php
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