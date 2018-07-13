<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ZincyLite
 */
?>
<?php
$feature_image_settings = get_theme_mod('zincy_lite_details_feature_image');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if($feature_image_settings == '1'): ?>
		<div class="feature-image-page">
			<?php 
			if( has_post_thumbnail() ){
				the_post_thumbnail('large'); 
			} 
			?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'zincy-lite' ),
			'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php edit_post_link( __( 'Edit', 'zincy-lite' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->