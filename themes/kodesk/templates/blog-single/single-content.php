<?php
/**
 * Single Post Content Template
 *
 * @package    WordPress
 * @subpackage KODESK
 * @author     Theme Kalia
 * @version    1.0
 */
?>
<?php global $wp_query;

$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();

$gallery = get_post_meta( $page_id, 'kodesk_gallery_images', true );

$video = get_post_meta( $page_id, 'kodesk_video_url', true );


$audio_type = get_post_meta( $page_id, 'kodesk_audio_type', true );

?>


<div class="blog-detail-page">
    <?php if ( has_post_thumbnail() ) : ?>
    	<figure>
    		<?php kodesk_template_load( 'templates/blog-single/image.php', compact( 'options', 'data' ) ); ?>
    	</figure>
    <?php endif; ?>
	<div class="blog-detail-meta">
		<div class="comments-area">
			<?php if ( $options->get( 'single_post_date', true ) ) : ?>
				<span> 	
					<a href="<?php echo esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) )); ?>">
						<i class="fas fa-calendar"></i> 
						<?php echo wp_kses( get_the_date( 'F j,' ) . ' ' . get_the_date( ' Y' ), true ); ?>
					</a>
				</span>
			<?php endif; ?>
			<?php if ( $options->get( 'single_post_comments', true ) ) : ?>
				<span>
					<i class="fas fa-comment"></i>
					<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>#comments">
						<?php comments_number() ?>
					</a>
				</span>

			<?php endif; ?>
			<?php if ( $options->get( 'single_post_author', true ) ) : ?>

				<span><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e( 'By ', 'kodesk' );
						the_author_meta( 'display_name' ); ?></a></span>

			<?php endif; ?>
			<?php if ( $options->get( 'single_post_cat', true ) ) : ?>
				<span>
                <i class="fa fa-tag"></i>
                <?php the_category(); ?>
            </span>
			<?php endif; ?>

		</div>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
	<?php if ( $options->get( 'single_post_tag' ) || $options->get( 'single_social_share' ) && $options->get( 'single_post_share' ) ) : ?>
		<div class="detail-btm-meta">

			<?php if ( $options->get( 'single_post_tag' ) ) : ?>
				<?php $title = '<span>' . esc_html__( 'Tags:', 'kodesk' ) . '</span>'; ?>
				<?php the_tags( '<div class="tags">' . $title . ' ', '  ', '</div>' ); ?>

			<?php endif; ?>


			<?php if ( $options->get( 'single_social_share' ) && $options->get( 'single_post_share' ) ) : ?>
				<ul class="social-circle">
					<?php foreach ( $options->get( 'single_social_share' ) as $k => $v ) {
						if ( $v == '' ) {
							continue;
						} ?>
						<?php do_action('kodesk_social_share_output', $k ); ?>
					<?php } ?>
				</ul>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if ( $options->get( 'single_post_author_box' ) ) : ?>

		<?php kodesk_template_load( 'templates/blog-single/author_box.php', compact( 'options', 'data' ) ); ?>
	<?php endif; ?>
	<?php comments_template(); ?>
	<?php wp_link_pages( array( 'before' => '<div class="paginate-links">', 'after' => '</div>' ) ); ?>
</div>