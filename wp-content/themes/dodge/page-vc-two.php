<?php
/*
* Template Name: VC Page Two
*
* @package WordPress
* @subpackage Dodge Theme
* @since v1.0
*/ 
    get_header();
?>
	<div class="main-content default-padding">
		<div class="container">
			<?php
				if(have_posts()) : 
					while( have_posts() ) : the_post();
						the_content();
					endwhile;
				else: 
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
		</div>
	</div>
<?php
    get_footer('two');
?>
