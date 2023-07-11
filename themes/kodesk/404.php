<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage kodesk
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );
$error_image = $options->get( '404_background_image' );
$error_image = kodesk_set( $error_image, 'url', KODESK_URI . 'assets/images/background/error-bg.jpg' ); ?>

<?php get_header();
$data = \KODESK\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'kodesk_banner', $data );
$options = kodesk_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else { ?>

<!-- error-section -->
<section class="error-section centred">
    <div class="outer-container" style="background-image: url(<?php echo esc_url($error_image); ?>);">
        <div class="auto-container">
            <div class="content-box">
                <div class="bg-layer"></div>
                <h2><?php echo wp_kses( $options->get( 'error_404_sub_title' ), $allowed_html ) ? wp_kses( $options->get( 'error_404_sub_title' ), $allowed_html ) : esc_html_e( 'Oh -Oh!', 'kodesk' ); ?></h2>
                <h1><?php echo wp_kses( $options->get( 'error_404' ), $allowed_html ) ? wp_kses( $options->get( 'error_404' ), $allowed_html ) : esc_html_e( '404', 'kodesk' ); ?></h1>
                <h3><?php echo wp_kses( $options->get( 'error_text' ), $allowed_html ) ? wp_kses( $options->get( 'error_text' ), $allowed_html ) : esc_html_e( "Sorry We Can't Find That Page!", 'kodesk' ); ?></h3>
                <p><?php echo wp_kses( $options->get( 'error_description' ), $allowed_html ) ? wp_kses( $options->get( 'error_description' ), $allowed_html ) : esc_html_e( "We're not being able to find the page you're looking for.", 'kodesk' ); ?></p>
                
                <?php if ( $options->get('back_to_home_btn') ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-one"><span><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Back to Home', 'kodesk' ); ?></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- error-section end -->

<?php
}
get_footer(); ?>
