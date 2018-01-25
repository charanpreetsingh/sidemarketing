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
                    	<article class="no-results not-found">
	                        <header class="page-header">
								<h1 class="post-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dodge' ); ?></h1>
							</header><!-- .page-header -->
							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. May be try a search?', 'dodge' ); ?></p>

								<?php get_search_form(); ?>

							</div><!-- .page-content -->
						</article>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    get_footer();
?>
   