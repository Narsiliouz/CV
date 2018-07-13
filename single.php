<?php
/**
 * The Template for displaying all single posts.
 *
 * @package ZincyLite
 */

get_header();
$post_class = get_post_meta( $post -> ID, 'zincy_lite_sidebar_layout', true );
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

					<?php get_template_part( 'content', 'single' ); ?>

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