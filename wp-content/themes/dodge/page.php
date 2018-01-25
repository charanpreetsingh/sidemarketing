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
                    <div class="col-md-12">
                            <?php 
                                if(have_posts()) :

                                    while(have_posts()) : the_post();

                                        the_content();
                                   
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
                </div>
            </div>
        </div>
    </div>
<?php 
    get_footer();
?>
   