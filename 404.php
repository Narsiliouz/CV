<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package zincyLite
 */

get_header(); ?>
<header class="page-header">
	<div class="zl-wrapper">
		<h1 class="entry-title"><?php _e( '404 Error!', 'zincy-lite' ); ?></h1>
	</div>
</header>
<div class="zl-wrapper">
	<main id="main" class="site-main">

		<section class="error-404 not-found">
			<header>
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'zincy-lite' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location.', 'zincy-lite' ); ?></p>
			</div><!-- .page-content -->
			
			<div class="number404">
				<?php _e('404' , 'zincy-lite' ); ?> 
				<span><?php _e('error' , 'zincy-lite' ); ?></span>   
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div>
<?php get_footer(); ?>