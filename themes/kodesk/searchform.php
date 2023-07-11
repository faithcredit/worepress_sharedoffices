<?php
/**
 * Search Form template
 *
 * @package KODESK
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-widget">
    <div class="search-inner">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
            <div class="form-group">
                <input type="search" name="s" placeholder="<?php echo esc_attr__( 'Keyword...', 'kodesk' ); ?>">
                <button type="submit"><i class="flaticon-magnifiying-glass"></i></button>
            </div>
        </form>
    </div>
</div>
