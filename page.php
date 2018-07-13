<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ZincyLite
 */
get_header();
global $post;
if(is_front_page()){
	$post_id = get_option('page_on_front');
}else{
	$post_id = $post->ID;
}
$post_class = get_post_meta( $post_id, 'zincy_lite_sidebar_layout', true );
wp_reset_query();
?>
<header class="entry-header">
	<div class="zl-wrapper">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</div>
</header><!-- .entry-header -->
<div class="zl-wrapper">
	<?php 
	if ($post_class=='both-sidebar') { ?>
	<div id="primary-wrap" class="clearfix"> 
		<?php }
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php 
		get_sidebar('left'); 

		if ($post_class=='both-sidebar') { ?>
	</div> 
	<?php }

	get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
