<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage KODESK
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Kodesk_Resizer' ) ) {
	$img_obj = new Kodesk_Resizer();
} else {
	$img_obj = array();
}

$options = kodesk_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>

	<div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
        <div class="inner-box">
        	<?php if ( has_post_thumbnail() ) { ?>
            <div class="image-box">
                <div class="category"><?php the_category(', '); ?></div>
                <figure class="image"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('kodesk_770x400'); ?></a></figure>
            </div>
            <?php } ?>
            
            <div class="lower-content">
            	<?php if ( has_post_thumbnail() ) { ?>
                <div class="option-box">
                    <div class="admin"><?php echo get_avatar( get_the_author_meta( 'ID' ), 44 ); ?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php esc_html_e('By:', 'kodesk'); ?> <?php the_author(); ?></a></div>
                    <div class="share"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="fas fa-share-alt"></i></a></div>
                </div>
                <?php } ?>
                
                <div class="text">
                    <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                </div>
                <div class="lower-box clearfix">
                    <ul class="info pull-left clearfix">
                        <li><?php echo get_the_date(); ?></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></li>
                    </ul>
                    <div class="link pull-right"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><i class="fas fa-angle-right"></i><span><?php esc_html_e('Read More', 'kodesk'); ?></span></a></div>
                </div>
            </div>
        </div>
    </div>
    
</div>