<?php
/**
 * Footer Template  File
 *
 * @package KODESK
 * @author  Theme Kalia
 * @version 1.0
 */

$options = kodesk_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' ); ?>

	<!-- main-footer -->
    <section class="main-footer">
        <div class="auto-container">
        	<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
            <div class="widget-section">
                <div class="row clearfix">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
            <?php } ?>
            
            <div class="footer-bottom">
                <div class="inner-box clearfix">
                    <div class="copyright pull-left">
                        <p><?php echo wp_kses( $options->get( 'copyright_text', '&copy; 2023 - Shared Offices | All Rights Reserved.' ), true ); ?></p>
                    </div>
                    
                    <?php if( $options->get('show_footer_menu_v1') ) { ?>
                    <ul class="footer-nav clearfix pull-right">
                        <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
							'container_class'=>'navbar-collapse collapse navbar-right',
							'menu_class'=>'nav navbar-nav',
							'fallback_cb'=>false,
							'items_wrap' => '%3$s',
							'container'=>false,
							'depth'=>'3',
							'walker'=> new Bootstrap_walker()
						) ); ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- main-footer end -->
    