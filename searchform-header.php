<?php
/**
 * The template for displaying search forms.
 *
 * @package ZincyLite
 */
?>
<div class="search-box">
    <i class="fa fa-search"></i>
    <div class="zincy-search">
        <div class="close-icon">&times;</div>
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
            <label>
                <span class="screen-reader-text"><?php echo  __( 'Search for:', 'zincy-lite' ) ?></span>
                <input type="search" title="<?php echo __( 'Search for:', 'zincy-lite' ); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search content...', 'zincy-lite' );?>" class="search-field" />
            </label>
            <input type="submit" value="<?php echo __( 'Search', 'zincy-lite' ); ?>" class="search-submit" />
        </form>
    </div>
</div> 
