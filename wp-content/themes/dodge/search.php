<?php 
    get_header();
?>
    <!-- Page Header -->
    <?php dodge_page_title(); ?>
    
    <div class="main">
        <!-- Blog area -->
        <div id="blog-area" class="section blog-area section-padding search">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
						<?php  //echo $post_type = $_GET['post_type'];
							if(have_posts()) :

								while(have_posts()) : the_post();

									get_template_part( 'template-parts/content', get_post_format() );
							   
								endwhile;
								
								the_posts_pagination(array(
									'prev_text'             => esc_html__('&laquo;', 'dodge'),
									'next_text'             => esc_html__('&raquo;', 'dodge'),
									'mid_size'              => 2,
									'screen_reader_text'    => ' '
								));
								
							else:  ?>

							   <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dodge' ); ?></p>

							<?php 
								get_search_form();

							endif;
						?>
                    </div>
					<div class="col-lg-offset-1 col-lg-3 col-md-4 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    get_footer();
?>
   