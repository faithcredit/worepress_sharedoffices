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

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <div class="form-group">
        <input type="search" name="s" placeholder="<?php echo esc_attr__( 'Search....', 'kodesk' ); ?>">
        <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
    </div>
</form>
