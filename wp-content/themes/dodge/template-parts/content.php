<?php if(is_single()) : ?>
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
    <span class="sticky"><?php (is_sticky() ? esc_html_e( 'Featured', 'dodge' ) : ''); ?></span>
    <?php if(has_post_thumbnail()) : ?>
    <div class="thumb">
        <?php the_post_thumbnail( 'blog-thumbnai' ); ?>
    </div>
    <?php endif; ?>
    <div class="post-header">
        <h3 class="post-title"><?php the_title(); ?></h3>
        <p class="postmeta"><?php esc_html_e( 'By', 'dodge' ); ?> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a>/<span class="date"><?php the_time( 'j M, Y' ); ?></span>/<span class="comment-count"><?php comments_number( 'No Comments', 'One Comments', '% Comments'); ?></span> 
        <?php $blog_cat = get_theme_mod( 'blog_cat'); 
            if($blog_cat != 1) : ?>
            <span class="cat"><?php the_category( ', ' ); ?></span>
        <?php endif; ?>
        </p>
    </div>
    
    <div class="post-content">
       <?php the_content(); ?>
    </div>
    <?php 
        wp_link_pages( array(
            'nextpagelink'                  => esc_html__( 'prev page', 'dodge' ),
            'previouspagelink'              => esc_html__( 'next page', 'dodge' ),
        ) );
    ?>
    <div class="post-footer">
        <div class="row">
            <div class="col-sm-4">
                <div class="share-icons">
                    <span class="share-icon"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/share?url=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="fa fa-twitter"></i></a>
                    <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="fa fa-pinterest-p"></i></a>
                    <a href="https://plus.google.com/share?url=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
            <div class="col-sm-8">
            <?php if(has_tag()) : ?>
                <div class="tags">
                    <span class="tags-icon"><i class="fa fa-tags" aria-hidden="true"></i></span>
                    <?php
                        if(get_the_tag_list()) {
                            print get_the_tag_list('', ', ');
                        }
                    ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</article> 

<?php else: ?>
<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
    <span class="sticky"><?php (is_sticky() ? esc_html_e( 'Featured', 'dodge' ) : ''); ?></span>
    <?php if(has_post_thumbnail()) : ?>
    <div class="thumb">
        <?php the_post_thumbnail( 'blog-thumbnail' ); ?>
    </div>
    <?php endif; ?>
    <div class="post-header">
        <h3 class="post-title"><?php the_title(); ?></h3>
        <p class="postmeta"><?php esc_html_e( 'By', 'dodge' ); ?> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a>/<span class="date"><?php the_time( 'j M, Y' ); ?></span>/<span class="comment-count"><?php comments_number( 'No Comments', 'One Comments', '% Comments'); ?></span></p>
    </div>
    <div class="post-content">
        <p><?php print wp_trim_words( get_the_content(), 40, '...' ); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn more-btn"><?php esc_html_e( 'Read More', 'dodge' ); ?></a>
    </div>
</article>

<?php endif; ?>