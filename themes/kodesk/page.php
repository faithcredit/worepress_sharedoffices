<?php
/**
 * Default Template Main File.
 *
 * @package KODESK
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
$data  = \KODESK\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
?>

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
<?php endif;?>

<!-- sidebar-page-container -->
<section class="sidebar-page-container sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
		
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'kodesk_sidebar', $data );
				}
            ?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="blog-classic-content">
                    <div class="thm-unit-test">
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'kodesk' ),
                            'after'  => '</div>',
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                    </div>
            	</div>
            </div>
            <?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'kodesk_sidebar', $data );
				}
            ?>
        
        </div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>
