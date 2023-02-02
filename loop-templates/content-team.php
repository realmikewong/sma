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

$bottom_block_content = get_field('bottom_block_content');

$team_list_args = array(
  'posts_per_page'   => -1,
  'post_type'     => 'team_members',
  'order'         => 'DES',
  'orderby'       => 'title',
  'meta_query' => array(
    array(
      'key'     => 'member_category',
      'value'   => 'team',
      'compare' => 'LIKE'
    )
  )
);

$team_list_query = new WP_Query( $team_list_args );

$board_list_args = array(
  'posts_per_page'   => -1,
  'post_type'     => 'team_members',
  'order'         => 'DES',
  'orderby'       => 'title',
  'meta_query' => array(
    array(
      'key'     => 'member_category',
      'value'   => 'board',
      'compare' => 'LIKE'
    )
  )
);

$board_list_query = new WP_Query( $board_list_args );

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

  <?php if( $team_list_query->have_posts() ): ?>
  <section class="our-team-list pb-0 ps-lg-3 pe-lg-3" id="sectionOne">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <h3 class="block-title mb-4">&gt; Our Team</h3>
        <?php while ( $team_list_query->have_posts() ) : $team_list_query->the_post(); 
          $image = get_the_post_thumbnail_url( get_the_ID(), 'square' );
          $job_title = get_field('job_title');
		      $bio_url = get_permalink(get_the_ID());
        ?>
		  <div class="col-md-4 col-lg-3 mb-3"> 
		    <a href= <?php echo $bio_url; ?>>
          <div class="bio-image bg-image cover" style="background-image: url(<?php echo $image; ?>);"></div>
          <h3 class="mt-2"><?php the_title(); ?></h3>
		      <h6><?php echo $job_title; ?></h6>
			  </a>
      </div> 
	
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; wp_reset_query(); ?>

  <?php if( $board_list_query->have_posts() ): ?>
  <section class="our-team-list pb-0 ps-lg-3 pe-lg-3" id="sectionTwo">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="row">
        <div class="col-12">
          <div class="our-team-block-title top-bar mb-4">
            <h2>Board of Directors</h2>
          </div> 
        </div>
        <?php while ( $board_list_query->have_posts() ) : $board_list_query->the_post(); 
          $image = get_the_post_thumbnail_url( get_the_ID(), 'square' );
          $job_title = get_field('job_title');
          $board_member_url = get_permalink(get_the_ID());
        ?>
        <div class="col-md-4 col-lg-3 mb-3">
          <a href= <?php echo $board_member_url; ?>>
            <div class="bio-image bg-image cover" style="background-image: url(<?php echo $image; ?>);"></div>
            <h3 class="mt-2"><?php the_title(); ?></h3>
            <h6><?php echo $job_title; ?></h6>
          </a>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="radial-bg"></div>
  </section>
  <?php endif; wp_reset_query(); ?>

  <?php if( have_rows('content_list_blocks') ): ?>
  <section class="our-team-content-blocks" id="sectionThree">
    <div class="<?php echo esc_attr( $container ); ?>">
      <?php 
        $total = count(get_field('content_list_blocks'));
        $count = 1;
        while( have_rows('content_list_blocks') ): the_row();
        $title = get_sub_field('title');
        $list = get_sub_field('list');
        $two_column = get_sub_field('two_column');
      ?>
      <div class="row <?php if ($count === $total): echo 'last'; endif; ?>">
        <div class="col-12 ps-lg-4">
          <div class="our-team-block-title mb-4 <?php if ($count === 1): echo 'last'; endif; ?> <?php if ($count === $total): echo 'last'; endif; ?>">
            <h2><?php echo $title; ?></h2>
          </div> 
          <div class="content-wrapper max-1000 mb-5 ms-auto me-auto <?php if ($two_column): echo 'two-column'; endif; ?>">
            <?php echo $list; ?>
          </div>
          <?php if ($count === $total): ?>
          <div class="bottom-content mb-4"><?php echo $bottom_block_content; ?></div>
          <div class="overlay"></div>
          <?php endif; ?>
        </div>
      </div>
      <?php $count++; endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

</article>