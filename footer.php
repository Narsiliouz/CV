<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ZincyLite
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php 
	if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) ) : ?>
	<div id="top-footer">
		<div class="zl-wrapper">
			<div class="footer1 footer">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer2 footer">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php endif; ?>	
			</div>

			<div class="clearfix hide"></div>

			<div class="footer3 footer">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer4 footer">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>


<div id="bottom-footer">
	<div class="zl-wrapper">
		<h1 class="site-info">
			<a href="<?php echo esc_url('http://wordpress.org/'); ?>"><?php _e( 'Free WordPress Theme', 'zincy-lite' ); ?></a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url('http://8degreethemes.com/');?>" title="zincy Themes" target="_blank"><span style='color:#31353c'><?php echo __( 'Zincy' , 'zincy-lite' ) ?></span> <span style='color:#3c90be'><?php echo __( 'lite' , 'zincy-lite' ) ?></span></a>
		</h1><!-- .site-info -->

		<div class="copyright">
			<a href="<?php echo home_url(); ?>">
				<?php
				$copyright = get_theme_mod('footer_text' , 'Themes By: 8Degree Themes');
				if($copyright!=''){
					?>
					<span class="copyright-inner">
						<?php  echo $copyright; ?>
					</span>
					<?php
				}else{
					echo bloginfo('name');  
				}    
				?>
			</a>
		</div>
	</div>
</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<div id="zltop"><i class="fa fa-arrow-circle-up"></i></div>
<?php wp_footer(); ?>
</body>
</html>