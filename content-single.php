<?php
/**
 * @package ZincyLite
 */
?>
<?php
$cat_event = get_theme_mod('zincy_lite_event');
$feature_image_settings = get_theme_mod('zincy_lite_details_feature_image');
$author_date_settings = get_theme_mod('zincy_lite_details_date_author');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if($feature_image_settings == '1'): ?>
        <div class="post_image">
            <?php 
            if(has_post_thumbnail()){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'large', false ); 
                ?>  
                <img src="<?php echo esc_url( $image[0] ); ?>" alt="" />
                <?php
            }
            ?>
        </div>
    <?php endif; ?>        
    <?php if($author_date_settings == '1'): ?>
        <div class="entry-meta">
          <?php zincy_lite_posted_on(); ?>
      </div><!-- .entry-meta -->
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

    <footer class="entry-footer">
      <?php edit_post_link( __( 'Edit', 'zincy-lite' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
