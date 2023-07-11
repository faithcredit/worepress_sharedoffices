<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.2.4
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $post;
$event_id = get_the_ID();

$data = \KODESK\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'blog-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = kodesk_WSH()->option();

$event_thumbnail_id = get_post_thumbnail_id($event_id);
$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);

$start_datetime = tribe_get_start_date( $event_id );
$end_datetime = tribe_get_end_date( $event_id );

$start_date = tribe_get_start_date($event_id, null, false, 'd' );
$end_date = tribe_get_end_date($event_id, null, false, 'd M, Y' );

$start_time = tribe_get_start_time ( $event_id, 'h:i A' );
$end_time = tribe_get_end_time ( $event_id, 'h:i A' );

$location = get_option('location'); 
$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();

?>

<!-- Page Title -->
<section class="page-title centred">
    <div class="outer-container" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <div class="title">
                    <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <?php echo kodesk_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- events-details -->
<section class="events-details">
    <div class="auto-container">
        <div class="events-details-content">
            <figure class="image-box"><?php echo tribe_event_featured_image( $event_id, 'full', false ); ?></figure>
            <div class="text">
                <?php the_content(); ?>
            </div>
            <div class="two-column">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <?php if( !empty( tribe_get_venue( $event_id ) ) ):?>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <h4><?php esc_html_e( 'Location', 'kodesk' );?></h4>
                                        <div class="info-inner">
                                            <ul class="info clearfix">
                                                <li><i class="far fa-map"></i><?php echo tribe_get_venue( $event_id ); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
								<?php endif;?>
                                
                                <?php if( !empty( $start_date ) || !empty( $start_time ) ):?>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <h4><?php esc_html_e( 'Date & Time', 'kodesk' );?></h4>
                                        <div class="info-inner">
                                            <ul class="info clearfix">
                                                <li><i class="far fa-calendar"></i><?php echo wp_kses( $start_date, true );?></li>
                                                <li><i class="far fa-clock"></i><?php echo wp_kses( $start_time, true );?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>
                                <?php if( !empty( $phone ) || !empty( $email ) ):?>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <h4><?php esc_html_e( 'Get In Touch', 'kodesk' );?></h4>
                                        <div class="info-inner">
                                            <ul class="info clearfix">
                                                <li><i class="fas fa-phone"></i><a href="tel:<?php echo phone_number( $phone );?>"><?php echo wp_kses( $phone, true ); ?></a></li>
                                                <li><i class="far fa-envelope"></i><a href="mailto:<?php echo esc_url( $email );?>"><?php echo wp_kses( $email, true ); ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>
                                <?php
									foreach ( $organizer_ids as $organizer ) {
									if ( ! $organizer ) {
										continue;
									}
								?>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <h4><?php esc_html_e( 'Organizer', 'kodesk' );?></h4>
                                        <div class="info-inner">
                                            <ul class="info clearfix">
                                                <li><i class="far fa-user"></i><?php esc_html_e('Name: ', 'kodesk'); echo tribe_get_organizer_link( $organizer ) ?></li>
                                            </ul>
                                            <?php echo wp_kses( kodesk_get_social_icons3(), true); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
							</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <div class="map-inner">
                            <?php echo do_shortcode( get_post_meta( get_the_id(), 'g_map', true ) );?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="share-option centred">
                <h3><?php esc_html_e('Share With Others', 'kodesk'); ?></h3>
                <?php echo wp_kses(kodesk_share_us_events(get_the_id(), $post->post_name ), true); ?>
            </div>
        </div>
    </div>
</section>
<!-- events-details end -->
