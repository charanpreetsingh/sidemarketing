<?php 
    get_header();
?>
    <!-- Page Header -->
    <?php dodge_page_title(); ?>
    
    <div class="main">
        <!-- Blog area -->
        <div id="blog-area" class="section blog-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
						<?php 
							if(have_posts()) :

								while(have_posts()) : the_post();

									get_template_part( 'template-parts/content', get_post_format() );

									the_post_navigation( array(
										'prev_text' => esc_html__( 'Prev', 'dodge' ),
										'next_text' => esc_html__( 'Next', 'dodge' ),
										'screen_reader_text' => ' '
									) );
							   
								endwhile;

							else: 

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>
						<?php if(comments_open() || get_comments_number()) {

								comments_template();
								
							}
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
   