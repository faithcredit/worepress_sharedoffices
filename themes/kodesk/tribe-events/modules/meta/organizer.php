<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-organizer info-block">
	<h3 class="tribe-events-single-section-title"><?php echo tribe_get_organizer_label( ! $multiple ); ?></h3>
	<ul class="list">
		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?>
			<li style="display:none;"><span class="icon flaticon-people-2"></span><?php // This element is just to make sure we have a valid HTML ?>
			<span class="tribe-organizer">
				<?php esc_html_e('Name: ', 'kodesk'); echo tribe_get_organizer_link( $organizer ) ?>
			</span>
			</li>
			<?php
		}

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?>
				<li><span class="icon flaticon-telephone"></span>
					<?php esc_html_e( 'Phone: ', 'kodesk' ) ?>
				<span class="tribe-organizer-tel">
					<?php echo esc_html( $phone ); ?>
				</span>
				</li>
				<?php
			}//end if

			if ( ! empty( $email ) ) {
				?>
				<li><span class="icon flaticon-note"></span>
					<?php esc_html_e( 'Email: ', 'kodesk' ) ?>
				<span class="tribe-organizer-email">
					<?php echo esc_html( $email ); ?>
				</span>
				</li>
				<?php
			}//end if

			if ( ! empty( $website ) ) {
				?>
				<li><span class="icon flaticon-internet"></span>
					<?php esc_html_e( 'Website: ', 'kodesk' ) ?>
				<span class="tribe-organizer-url">
					<?php echo balanceTags($website); ?>
				</span>
				</li>
				<?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>
	</ul>
</div>
