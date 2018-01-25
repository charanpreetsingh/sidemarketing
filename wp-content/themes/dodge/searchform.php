<?php 
/**
 * Template for displaying search forms in Dodge
 *
 * @package WordPress
 * @subpackage Dodge Theme
 * @since v1.0
 */
?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input type="search" name="s" placeholder="<?php esc_html_e('Search...', 'dodge'); ?>" value="<?php print get_search_query(); ?>">
    <input type="hidden" name="post_type" value="post">
    <button type="submit" name="searchsubmit"><i class="fa fa-search"></i></button>
</form>
