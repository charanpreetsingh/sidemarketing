<?php 
    get_header();
?>
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php if ( have_posts() ) : ?>
                        <header class="page-archive">
                            <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                        </header><!-- .page-header -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
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
                                endwhile;
								the_posts_pagination(array(
									'prev_text'             => esc_html__('&laquo;', 'dodge'),
									'next_text'             => esc_html__('&raquo;', 'dodge'),
									'mid_size'              => 2,
									'screen_reader_text'    => ' '
								));
                            else: 
                                get_template_part( 'template-parts/content', 'none' );
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
   