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

$avatar = get_field('avatar');
// $role = get_field('role');
$job_title = get_field('job_title');
$twitter = get_field('twitter');
$instagram = get_field('instagram');
$email = get_field('email');
$fallback = get_field('fallback', 'option');
$linkedin = get_field('linkedin');
$job_title = get_field('job_title');
$member_category = get_field('member_category');
$phone = get_field('phone');
$team_member_bio = get_field('team_member_bio');
$team_member_website = get_field('team_member_website');

?>

<div class="wrapper" id="single-wrapper">
  <section class="team-member nav-margin">
    <div class="<?php echo esc_attr( $container ); ?> max-1000">
      <div class="row">
      
<!-- hero column 1 -->
        <div class="col-md-4" data-aos="fade-right">
          <!-- the image -->     
        	<div class="image-container">
            <img src="<?php echo esc_url($avatar['url']); ?>" width="446" alt="<?php echo esc_attr($avatar['alt']); ?>">
          </div>    
        </div>
      
<!-- hero column 2 -->
        <div class="col-md-8" data-aos="fade-left">
          <h1 class="mt-2 mb-2"><?php echo get_the_title(); ?></h1>
          <h3 class="mb-1"><?php echo $job_title; ?></h3>
        </div>

<!-- team member bio as designed full-width -->
        <div class="mt-3 mb-3">
          <?php the_content(); ?>
        </div>   
         
<!-- get in touch -->
        <div class="row">
          <div class="col-lg-6 offset-lg-6">
            <h4>Get in touch</h4>
              <ul class="social-icons list-unstyled d-flex align-items-center mb-1">
                <?php if ($linkedin) : ?><li class=""><a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li><?php endif;?>
                <?php if ($phone) : ?><li class=""><a href="<?php echo esc_url($phone); ?>" target="_blank" rel="noopener" aria-label="Phone"><i class="fa fa-phone"></i></a></li><?php endif;?>
                <?php if ($email) : ?><li class=""><a href="<?php echo esc_url($email); ?>" target="_blank" rel="noopener" aria-label="Email"><i class="fa fa-envelope"></i></a></li><?php endif;?>
                <?php if ($team_member_website) : ?><li class=""><a href="<?php echo esc_url($team_member_website); ?>" target="_blank" rel="noopener" aria-label="Website"><i class="fa fa-globe"></i></a></li><?php endif;?>
              </ul>
          </div>
        </div>

      </div>
    </div>
  </section>
</div><!-- #single-wrapper -->

<?php
get_footer();
