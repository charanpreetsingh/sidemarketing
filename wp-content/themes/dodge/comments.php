<?php
    if(post_password_required()){
        return;
    }
?>
<div class="comments-area">
    <h3 class="comment-title"><?php comments_number( esc_html__( 'No Comments', 'dodge' ), esc_html__( 'One Comments', 'dodge' ), esc_html__( 'Comments (%)', 'dodge' ) ); ?></h3>
    <ul class="comments">
   	<?php 
   		if( number_format_i18n(get_comments_number()) > 0) {
	   		wp_list_comments( array(
	   			'style'			=> 'ul',
	   			'callback'		=> 'dodge_comment_list',
	   			'short_ping'	=> true
	   		) );
   		}
   	?>
    </ul>
</div>    
    <?php the_comments_navigation(); ?>
<!-- Comments Form -->
<?php 
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ($req ? " aria-required='true' " : '');
    $required_text = ' ';
    $args = array(
        'class_form'    => 'send-comment',
        'title_reply'   => esc_html__( 'Post A Comment', 'dodge' ),
        'submit_button' => '<button type="submit" class="btn btn-default-arrow btn-blue">'.esc_html__( 'Submit Comment', 'dodge' ).'</button>',
        'comment_field' => '<div class="form-group">
                                <textarea name="comment" placeholder="'.esc_html__( 'Comment', 'dodge' ).'" '.$aria_req.' rows="10"></textarea> 
                            </div>',
        'fields'        => apply_filters( 'comment_form_default_fields', array(
            'author'    => '<div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="author" value="'.esc_attr( $commenter['comment_author'] ).'" '.$aria_req.' placeholder="'.esc_html__( 'Name *', 'dodge' ).'">
                                    </div>',
                    'email'     => '<div class="col-md-6">
                                        <input type="email" name="email" value="'.esc_attr( $commenter['comment_author_email'] ).'" '.$aria_req.' placeholder="'.esc_html__( 'Email *', 'dodge' ).'">
                                    </div>
                                </div>
                            </div>'
        )),
        'label_submit'  => esc_html__( 'SUBMIT', 'dodge' ),
    );
    comment_form( $args );
?>
