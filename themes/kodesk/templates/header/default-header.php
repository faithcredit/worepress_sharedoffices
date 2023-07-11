<?php
$options = kodesk_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Logo
$light_logo = $options->get( 'light_logo_v1' );
$light_logo_dimension = $options->get( 'light_logo_dimension_v1' );

//Dark Logo
$dark_logo = $options->get( 'dark_logo_v1' );
$dark_logo_dimension = $options->get( 'dark_logo_dimension_v1' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

<div class="boxed_wrapper">
	
	<?php if( $options->get( 'theme_preloader' ) ):?>
	<!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                </div>  
            </div>
        </div>
    </div>
    <!-- preloader end -->
	<?php endif; ?>

	<!-- main header -->
    <header class="main-header">
    	<?php if( $options->get('show_top_bar_v1') ) { ?>
        <!-- header-top -->
        <div class="header-top">
            <div class="top-inner clearfix">
                <div class="top-left pull-left clearfix">
                	<?php if( $options->get('show_social_media_v1') ):
					$icons = $options->get( 'social_media_v1' );
					if ( ! empty( $icons ) ) : ?>
                    <ul class="social-links clearfix">
                    	<?php foreach ( $icons as $h_icon ) :
						$header_social_icons = json_decode( urldecode( kodesk_set( $h_icon, 'data' ) ) );
						if ( kodesk_set( $header_social_icons, 'enable' ) == '' ) {
							continue;
						}
						$icon_class = explode( '-', kodesk_set( $header_social_icons, 'icon' ) ); ?>
						<li><a href="<?php echo esc_url(kodesk_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(kodesk_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(kodesk_set( $header_social_icons, 'color' )); ?>" target="_blank"><i class="fab <?php echo esc_attr( kodesk_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
						<?php endforeach; ?>
                    </ul>
                    <?php endif; endif; ?>
                    <ul class="info clearfix">
                    	<?php if( $options->get('show_working_hours_v1') ) { ?>
                        <li><i class="flaticon-wall-clock"></i><?php echo wp_kses($options->get('working_hours_v1'), $allowed_html); ?></li>
                        <?php } ?>
                        
                        <?php if( $options->get('show_phone_number_v1') ) { ?>
                        <li><i class="flaticon-phone"></i><a href="tel:<?php echo esc_attr(phone_number($options->get('phone_number_v1'))); ?>"><?php echo wp_kses($options->get('phone_number_v1'), $allowed_html); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="right-column pull-right clearfix">
                    <ul class="other-links clearfix">
                    	<?php if( $options->get('show_request_btn_v1') ) { ?>
                        <li><i class="flaticon-link-interface-symbol"></i><a href="<?php echo esc_url($options->get('request_btn_link_v1')); ?>"><?php echo wp_kses($options->get('request_btn_title_v1'), $allowed_html); ?></a></li>
                        <?php } ?>
                        
                        <?php if( $options->get('show_reviews_btn_v1') ) { ?>
                        <li><a href="<?php echo esc_url($options->get('reviews_btn_link_v1')); ?>"><?php echo wp_kses($options->get('reviews_btn_title_v1'), $allowed_html); ?></a></li>
                        <?php } ?>
                        
                        <?php if( $options->get('show_add_space_btn_v1') ) { ?>
                        <li><a href="<?php echo esc_url($options->get('add_space_btn_link_v1')); ?>"><?php echo wp_kses($options->get('add_space_btn_title_v1'), $allowed_html); ?></a></li>
                        <?php } ?>
                    </ul>
                    
                    
                    <ul class="othre-options clearfix">
                        <li><i class="flaticon-login"></i><a href="#">Sign Up</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <?php } ?>
        
        <!-- header-lower -->
        <div class="header-lower">
            <div class="outer-box">
            	<?php if( $options->get('show_sidebar_info_v1') ) { ?>
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                    <div class="menu-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/menu-icon.svg'); ?>" alt="<?php esc_attr_e('icon', 'kodesk'); ?>"></div>
                    <span><?php esc_html_e('Menu', 'kodesk'); ?></span>
                </div>
                <?php } ?>
                
                <div class="logo-box pull-left">
                    <figure class="logo"><?php echo kodesk_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
									'container_class'=>'navbar-collapse collapse navbar-right',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false,
									'items_wrap' => '%3$s',
									'container'=>false,
									'depth'=>'3',
									'walker'=> new Bootstrap_walker()
								) ); ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <?php if( $options->get('show_search_v1') ) { ?>
                <div class="search-box-outer">
                    <div class="dropdown">
                        <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php esc_html_e('Search', 'kodesk'); ?><i class="flaticon-magnifiying-glass"></i></button>
                        <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                            <div class="form-container">
                                <?php echo get_template_part('searchform1'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="outer-box">
                <div class="logo-box pull-left">
                    <figure class="logo"><?php echo kodesk_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></figure>
                </div>
                <div class="menu-area pull-left clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                
                <?php if( $options->get('show_search_v1') ) { ?>
                <div class="search-box-outer">
                    <div class="dropdown">
                        <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php esc_html_e('Search', 'kodesk'); ?><i class="flaticon-magnifiying-glass"></i></button>
                        <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">
                            <div class="form-container">
                                <?php echo get_template_part('searchform1'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </header>
    <!-- main-header end -->
	
    <?php if( $options->get('show_sidebar_info_v1') ) { ?>
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><?php echo kodesk_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4><?php echo wp_kses($options->get('sidebar_contact_title_v1'), $allowed_html); ?></h4>
                <ul>
                	<?php if( $options->get('sidebar_address_v1') ) { ?>
                    <li><?php echo wp_kses($options->get('sidebar_address_v1'), $allowed_html); ?></li>
                    <?php } ?>
                    
                    <?php if( $options->get('sidebar_phone_number_v1') ) { ?>
                    <li><a href="tel:<?php echo esc_attr(phone_number($options->get('sidebar_phone_number_v1'))); ?>"><?php echo wp_kses($options->get('sidebar_phone_number_v1'), $allowed_html); ?></a></li>
                    <?php } ?>
                    
                    <?php if( $options->get('sidebar_email_address_v1') ) { ?>
                    <li><a href="mailto:<?php echo sanitize_email($options->get('sidebar_email_address_v1')); ?>"><?php echo sanitize_email($options->get('sidebar_email_address_v1')); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            
            <?php if( $options->get('show_sidebar_social_media_v1') ):
			$icons = $options->get( 'sidebar_social_media_v1' );
			if ( ! empty( $icons ) ) : ?>
            <div class="social-links">
                <ul class="clearfix">
                	<?php foreach ( $icons as $h_icon ) :
					$header_social_icons = json_decode( urldecode( kodesk_set( $h_icon, 'data' ) ) );
					if ( kodesk_set( $header_social_icons, 'enable' ) == '' ) {
						continue;
					}
					$icon_class = explode( '-', kodesk_set( $header_social_icons, 'icon' ) ); ?>
					<li><a href="<?php echo esc_url(kodesk_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(kodesk_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(kodesk_set( $header_social_icons, 'color' )); ?>" target="_blank"><span class="fab <?php echo esc_attr( kodesk_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
					<?php endforeach; ?>
                </ul>
            </div>
            <?php endif; endif; ?>
        </nav>
    </div><!-- End Mobile Menu -->
    <?php } ?>
    