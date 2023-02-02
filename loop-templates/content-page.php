<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( is_front_page() ) :
	get_template_part( 'loop-templates/content', 'home' ); 
	elseif ( is_page ('about') ):
		get_template_part( 'loop-templates/content', 'about' );
	elseif ( is_page ('our-team') ):
		get_template_part( 'loop-templates/content', 'team' );
	elseif ( is_page ('history') ):
		get_template_part( 'loop-templates/content', 'history' );		
	elseif ( is_page ('founder-dr-fitzhugh-mullan') ):
		get_template_part( 'loop-templates/content', 'fitz' );
	elseif ( is_page ('for-students') ):
		get_template_part( 'loop-templates/content', 'students' );	
	elseif ( is_page ('for-educators-administrators') ):
		get_template_part( 'loop-templates/content', 'educators' );	
	elseif ( is_page ('become-an-ally') ):
		get_template_part( 'loop-templates/content', 'ally' );
	elseif ( is_page ('giving') ):
		get_template_part( 'loop-templates/content', 'giving' );
	elseif ( is_page ('join-the-movement') ):
		get_template_part( 'loop-templates/content', 'join' );
	elseif ( is_page ('research-narratives') ):
		get_template_part( 'loop-templates/content', 'research-narratives' );
	elseif ( is_page ('news-media') ):
		get_template_part( 'loop-templates/content', 'news-media' );
	elseif ( is_page ('insights') ):
		get_template_part( 'loop-templates/content', 'insights' );			
	elseif ( is_page ('sma-courses-webinars') ):
		get_template_part( 'loop-templates/content', 'sma-courses-webinars' );			
	elseif ( is_page ('social-mission-resources') ):
		get_template_part( 'loop-templates/content', 'resources' );
	elseif ( is_page ('structural-racism-resources') ):
		get_template_part( 'loop-templates/content', 'resources' );
	elseif ( is_page ('conferences') ):
		get_template_part( 'loop-templates/content', 'conferences' );
	elseif ( is_page ('research') ):
		get_template_part( 'loop-templates/content', 'research' );
	elseif ( is_page ('search') ):
		get_template_part( 'loop-templates/content', 'search-site' );		
	elseif ( is_page ('contact') ):
		get_template_part( 'loop-templates/content', 'contact' );
	else : get_template_part( 'loop-templates/content', '404' ); ?>
<?php endif; ?>


