<?php
	/*
	* Template Name: No Sidebar
	*/ 
    get_header();
?>
    <!-- Page Header -->
    <?php dodge_page_title(); ?>
    
    <div class="main-content">
        <div class="container">
            <div class="row">
				<div class="col-sm-12">
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
        </div>
    </div>
<?php
    get_footer();
?>
   