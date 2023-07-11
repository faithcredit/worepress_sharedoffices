<?php
/**
 * Blog Post Main File.
 *
 * @package KODESK
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \KODESK\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = kodesk_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else { ?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'kodesk_banner', $data );?>
<?php else:?>
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
<?php endif; ?>

<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details sec-pad">
    <div class="single-post-inner">
        <div class="auto-container">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="single-post-inner">
                <div class="post-content centred">
                    <div class="category"><?php the_category(', '); ?></div>
                    <h2><?php the_title(); ?></h2>
                    <ul class="info clearfix">
                        <li><?php echo get_the_date(); ?></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="post-banner">
            	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <div class="outer-box" style="background-image: url(<?php echo esc_url($image[0]); ?>);">
                    <div class="auto-container">
                        <div class="inner-box">
                            <div class="option-box">
                                <div class="admin"><?php echo get_avatar( get_the_author_meta( 'ID' ), 44 ); ?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php esc_html_e('By:', 'kodesk'); ?> <?php the_author(); ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            
        	<div class="row clearfix">
        	
				<?php
                    if ( $data->get( 'layout' ) == 'left' ) {
                        do_action( 'kodesk_sidebar', $data );
                    }
                ?>
                
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="thm-unit-test">
                        <div class="blog-details-content">
                            <?php the_content(); ?>
                            
                            <?php if( $options->get( 'single_post_tag' ) ): ?>
                            <div class="blog-single-tag">
                                <ul class="category-list clearfix">
                                    <li><h6><?php esc_html_e('# Posted In:', 'kodesk'); ?></h6></li>
                                    <?php the_tags( '<li>', ', </li><li> ', '</li>' ); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            
                            <?php global $post;
							$prev_post = get_previous_post();
							$next_post = get_next_post();
							if($prev_post or $next_post){ ?>
							<div class="nav-btn">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 btn-column">
                                    	<?php if (!empty($prev_post)): ?>
                                        <div class="single-btn-box prev-btn">
                                            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                                <i class="fas fa-angle-left"></i><i class="light-icon fas fa-angle-left"></i><span><?php esc_html_e( 'Prev', 'kodesk' ); ?></span>
                                                <h5><?php echo wp_kses(kodesk_trim( get_the_title($prev_post->ID), 5 ), true); ?></h5>
                                            </a>
                                        </div>
                                    	<?php endif; ?>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12 btn-column">
                                    	<?php if (!empty($next_post)): ?>
                                        <div class="single-btn-box next-btn text-right">
                                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><span><?php esc_html_e( 'Next', 'kodesk' ); ?></span>
                                                <i class="light-icon fas fa-angle-right"></i><i class="fas fa-angle-right"></i>
                                                <h5><?php echo wp_kses(kodesk_trim( get_the_title($next_post->ID), 5 ), true); ?></h5>
                                            </a>
                                        </div>
                                    	<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <?php if( $options->get( 'single_post_author_box' ) ): ?>
                            <div class="author-box">
                                <h3><?php esc_html_e('About Author', 'kodesk'); ?></h3>
                                <div class="author-content">
                                    <figure class="author-thumb"><?php echo get_avatar(get_the_author_meta('ID'), 200); ?></figure>
                                    <div class="inner">
                                        <h4><?php the_author(); ?></h4>
                                        <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Comments Area -->
                            <?php comments_template(); ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'kodesk_sidebar', $data );
                    }
                ?>
            
            </div>
        </div>
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
