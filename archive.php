<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ZincyLite
 */
get_header();
?>

<?php if ( have_posts() ) : ?>
	<header class="page-header">
		<div class="zl-wrapper">
			<h1 class="page-title">
				<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
					single_tag_title();

				elseif ( is_author() ) :
					printf( __( 'Author: %s', 'zincy-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'zincy-lite' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'zincy-lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'zincy-lite' ) ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'zincy-lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'zincy-lite' ) ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'zincy-lite' );

				elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
					_e( 'Galleries', 'zincy-lite');

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'zincy-lite');

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'zincy-lite' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'zincy-lite' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'zincy-lite' );

				elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
					_e( 'Statuses', 'zincy-lite' );

				elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
					_e( 'Audios', 'zincy-lite' );

				elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
					_e( 'Chats', 'zincy-lite' );

				else :
					_e( 'Archives', 'zincy-lite' );

				endif;
				?>
			</h1>
			<?php
		// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
			?>
		</div>
	</header><!-- .page-header -->
	<div class="zl-wrapper">
		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php /* Start the Loop */ ?>
				<?php
				while ( have_posts() ) : the_post();?>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content' );
					?>

				<?php endwhile; ?>

				<?php zincy_lite_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
