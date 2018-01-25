<?php 

/**
 * dodge page title
 */

if(!function_exists("dodge_page_title")){
	function dodge_page_title(){ ?>
		<div class="page-header">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12 text-center">
	                    <h3><?php (is_home() && is_front_page()) ? esc_html_e('Blog','dodge') : wp_title($sep = ''); ?></h3>
	                </div>
	            </div>
	        </div>
	    </div>
<?php
	}
}


/**
 * Deafult Main Menu
 */
if(!function_exists('dodge_main_menu')){
	function dodge_main_menu(){
	    echo  '<ul class="nav navbar-nav">
					<li class="menu-item"><a href="'.esc_url(home_url('/')).'">'.esc_html__( 'Home','dodge').'</a></li>
				</ul>';
	}
}

/**
 * Deafult Footer Menu
 */
if(!function_exists('dodge_footer_menu')){
	function dodge_footer_menu(){
	    echo  '<ul id="footer-menu" class="footer-menu menu">
					<li class="menu-item"><a href="'.esc_url(home_url('/')).'">'.esc_html__( 'Home','dodge').'</a></li>
				</ul>';
	}
}

/**
 * Dodge Comment list
 */
if(!function_exists('dodge_comment_list')){
	function dodge_comment_list($comment,$args,$depth){
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class('comment'); ?>>
        <div class="comment-avatar">
        	<?php  echo get_avatar( $comment,80,null,null,array('class'=>array('media-object'))); ?>
        </div>
        <div class="comment-body">
            <h5 class="comment-name"><?php print get_comment_author_link(); ?></h5>/<span class="comment-date"><?php comment_date( 'j M, Y' ); ?></span>
            <p class="comment-content"><?php comment_text(); ?></p>
            <p class="reply-btn">
            	<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=>esc_html__('REPLY','dodge') ) ) ); ?>
            </p>
        </div>
    
<?php }
}

/**
* Dodge Subscribe
*/
if(!function_exists('dodge_subscribe')){
	function dodge_subscribe(){ 
		$footer_style = get_theme_mod('footer_style');
	?>
	<?php if($footer_style == 0) : ?>
		
	<div id="subscribeform" class="subscribeform">
        <?php
    		$subscribe = get_theme_mod( 'subscribe' );
    		print do_shortcode( $subscribe, false ); 
    	 ?>
    </div> 
	<?php else: ?>
    <div class="widget subscription-widget">
	    <h4 class="widget-title"><?php esc_html_e( 'Subscribe', 'dodge' ); ?></h4>
	    <div class="widget-content">
	        <p><?php print get_theme_mod( 'subscribe_text' ); ?></p>
	        <div id="subscribeform" class="subscribeform subscribe-style-2">
	            <?php
	        		$subscribe = get_theme_mod( 'subscribe' );
	        		print do_shortcode( $subscribe, false ); 
	        	 ?>
	        </div>
	    </div>
	</div>
	<?php endif; ?> 
	
<?php
	}
}



/**
* Dodge Subscribe2
*/
if(!function_exists('dodge_subscribe2')){
	function dodge_subscribe2(){ 
	?>
    <div class="widget subscription-widget">
	    <h4 class="widget-title"><?php esc_html_e( 'Subscribe', 'dodge' ); ?></h4>
	    <div class="widget-content">
	        <p><?php print get_theme_mod( 'subscribe_text' ); ?></p>
	        <div id="subscribeform" class="subscribeform subscribe-style-2">
	            <?php
	        		$subscribe = get_theme_mod( 'subscribe' );
	        		print do_shortcode( $subscribe, false ); 
	        	 ?>
	        </div>
	    </div>
	</div>
<?php
	}
}




/**
* Dodge header
*/

if(!function_exists('dodge_header')){
    function dodge_header(){
        $navbar_style = get_theme_mod( 'navbar_style' );
        $logo = get_theme_mod( 'main_logo' );
        if($navbar_style == 0){ ?>
            <!-- Header -->
            <header id="header" class="navbar">
                <div class="container">
                    <div class="row">
                        <div class="display-flex">
                            <div class="col-md-2">
                                <div class="logowrap">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navwrap" aria-expanded="false">
                                        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'dodge' ); ?></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a href="<?php print esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php (!empty( $logo ) ? print esc_url($logo) : print get_template_directory_uri() . '/img/logo.png'); ?>" alt='<?php echo esc_html__( "logo", "dodge" ); ?>'></a>
                                </div>
                            </div>

                            <!-- Navigation / Main -->
                            <div class="col-md-8">
                                <nav id="main-navwrap" class="collapse navbar-collapse">
                                    <?php 
                                        wp_nav_menu(array(
                                            'theme_location'    => 'top',
                                            'menu_class'        => 'nav navbar-nav',
                                            'menu_id'           =>  'dodge_menu',
                                            'container'         =>  '',
                                            'fallback_cb'       =>  'dodge_main_menu',
                                        ));
                                    ?>                      
                                </nav>
                            </div>
                            <div class="col-md-2 login-btn">
                            <a href="http://202.164.49.132:4259/sidemarketing/wp-admin">Login</a>
                            </div>                            
                        </div>
                    </div>
                </div>
            </header>
    <?php 
        } else {
    ?>
            <!-- Header -->
            <header id="header" class="navbar style-2">
                <div class="container">
                    <div class="row">
                        <div class="display-flex">
                            <div class="col-md-2">
                                <div class="logowrap">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navwrap" aria-expanded="false">
                                        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'dodge' ); ?></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a href="<?php print esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php (!empty( $logo ) ? print esc_url($logo) : print get_template_directory_uri() . '/img/logo.png'); ?>" alt="<?php esc_html_e( 'logo', 'dodge' ); ?>"></a>
                                </div>
                            </div>

                            <!-- Navigation / Main -->
                            <div class="col-md-10">
                                <nav id="main-navwrap" class="collapse navbar-collapse">
                                    <?php 
                                        wp_nav_menu(array(
                                            'theme_location'    => 'top',
                                            'menu_class'        => 'nav navbar-nav',
                                            'menu_id'           =>  'dodge_menu',
                                            'container'         =>  '',
                                            'fallback_cb'       =>  'dodge_main_menu',
                                        ));
                                    ?>                         
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </header>
    <?php
        }
    }
}


/**
* Dodge footer
*/
if(!function_exists('dodge_footer')){
	function dodge_footer(){ 
        $footer_style = get_theme_mod('footer_style');
		$footer_logo = get_theme_mod('footer_logo');
		$footer_text = get_theme_mod('footer_text');

	if($footer_style == 0){
     ?>
    <footer>
        <div class="upper-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                    <?php if(!empty($footer_logo)) : ?>
                        <div class="logowrap">
                            <a href="#" class="logo"><img src="<?php print esc_url($footer_logo); ?>" alt="<?php esc_html_e( 'logo', 'dodge' ); ?>"></a>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($footer_text)) : ?>
                        <p class="footer-about"><?php print esc_html($footer_text); ?></p>
                    <?php endif; ?>

                        <?php dodge_subscribe(); ?>                       
                        <div class="socials">
							<?php 
								$facebook = get_theme_mod( 'facebook' );
								$twitter = get_theme_mod( 'twitter' );
								$google_plus = get_theme_mod( 'google_plus' );
								$pinterest = get_theme_mod( 'pinterest' );
								$linkedin = get_theme_mod( 'linkedin' );
							?>
							<?php 
							if(!empty($facebook)){
								print '<a href="'.esc_url($facebook).'" class="social"><i class="fa fa-facebook"></i></a>';
							}
							if(!empty($twitter)){
								print '<a href="'.esc_url($twitter).'" class="social"><i class="fa fa-twitter"></i></a>';
							}
							if(!empty($google_plus)){
								print '<a href="'.esc_url($google_plus).'" class="social"><i class="fa fa-google-plus"></i></a>';
							}
							if(!empty($pinterest)){
								print '<a href="'.esc_url($pinterest).'" class="social"><i class="fa fa-pinterest"></i></a>';
							}
							if(!empty($linkedin)){
								print '<a href="'.esc_url($linkedin).'" class="social"><i class="fa fa-linkedin"></i></a>';
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        
        
        <div class="lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <?php
                    	$copyright = get_theme_mod( 'copyright_text' ); 
                    	if(!empty($copyright)){
                    		print '<p class="copyright">'.esc_html($copyright).'</p>';
                    	}else {
                    		print '<p class="copyright">'.esc_html__( '&copy; 2017 Dodge App theme, All rights reserved', 'dodge' ).'</p>';
                    	}
                    ?>
                    </div>
                    <div class="col-md-6">
                        <?php 
                             wp_nav_menu(array(
                                'theme_location'    => 'bottom',
                                'menu_class'        => 'footer-menu menu',
                                'menu_id'           =>  'footer_menu',
                                'container'         =>  '',
                                'fallback_cb'       =>  'dodge_footer_menu',
                            )); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

	<?php } else { ?>

    <footer class="style-2">
        <div class="upper-footer">
            <div class="container">
                <div class="row">
                    <div class="footer-widgets">
                    	<div class="col-md-3 col-sm-6 heightFix">
                            <div class="widget about-widget">
                           	<?php if(!empty($footer_logo)) : ?>
                                <a href="<?php print esc_url( home_url('/') ); ?>" class="logo"><img src="<?php print esc_url($footer_logo);  ?>" alt="<?php esc_html_e('logo', 'dodge'); ?>"></a>
                            <?php endif; ?>
							<?php if(!empty($footer_text)) : ?>
                                <p><?php print esc_html($footer_text); ?></p>
                            <?php endif; ?>
                            </div>
                        </div>
                       <?php
                            if(is_active_sidebar( 'footer-sidebar' )) {
                                dynamic_sidebar( 'footer-sidebar' );
                            }
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <?php dodge_subscribe(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer copyright -->
        <div class="lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php 
                             wp_nav_menu(array(
                                'theme_location'    => 'bottom',
                                'menu_class'        => 'footer-menu menu',
                                'menu_id'           =>  'footer_menu',
                                'container'         =>  '',
                                'fallback_cb'       =>  'dodge_footer_menu',
                            )); 
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
	                    	$copyright = get_theme_mod( 'copyright_text' ); 
	                    	if(!empty($copyright)){
	                    		print '<p class="copyright">'.esc_html($copyright).'</p>';
	                    	}else {
	                    		print '<p class="copyright">'.esc_html__( '&copy; 2017 Dodge App Template, All rights reserved', 'dodge' ).'</p>';
	                    	}
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php	} 
	}
}

if(!function_exists('dodge_footer_second')){
	function dodge_footer_second(){
		$footer_logo = get_theme_mod('main_footer_logo');
		$footer_text = get_theme_mod('footer_text');
		?>
		<footer class="style-2">
			<div class="upper-footer">
				<div class="container">
					<div class="row">
						<div class="footer-widgets">
							<div class="col-md-3 col-sm-6 heightFix">
								<div class="widget about-widget">
								<?php if(!empty($footer_logo)) : ?>
									<a href="<?php print esc_url( home_url('/') ); ?>" class="logo"><img src="<?php print esc_url($footer_logo);  ?>" alt="<?php esc_html_e('logo', 'dodge'); ?>"></a>
								<?php endif; ?>
								<?php if(!empty($footer_text)) : ?>
									<p><?php print esc_html($footer_text); ?></p>
								<?php endif; ?>
								</div>
							</div>
						   <?php
								if(is_active_sidebar( 'footer-sidebar' )) {
									dynamic_sidebar( 'footer-sidebar' );
								}
							?>
							<div class="col-md-3 col-sm-6">
								<?php dodge_subscribe2(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Footer copyright -->
			<div class="lower-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<?php 
								 wp_nav_menu(array(
									'theme_location'    => 'bottom',
									'menu_class'        => 'footer-menu menu',
									'menu_id'           =>  'footer_menu',
									'container'         =>  '',
									'fallback_cb'       =>  'dodge_footer_menu',
								)); 
							?>
						</div>
						<div class="col-md-6">
							<?php
								$copyright = get_theme_mod( 'copyright_text' ); 
								if(!empty($copyright)){
									print '<p class="copyright">'.esc_html($copyright).'</p>';
								}else {
									print '<p class="copyright">'.esc_html__( '&copy; 2017 Dodge App Template, All rights reserved', 'dodge' ).'</p>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
}


/**
* Require external file	
*/
if(file_exists(get_template_directory() . '/inc/dodge_customizer.php')){
	require_once get_template_directory() . '/inc/dodge_customizer.php';
}
if(file_exists(get_template_directory() . '/inc/class-tgm-plugin-activation.php')){
	require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
}
if(file_exists(get_template_directory() . '/inc/dodge_add_plugin.php')){
	require_once get_template_directory() . '/inc/dodge_add_plugin.php';
}
