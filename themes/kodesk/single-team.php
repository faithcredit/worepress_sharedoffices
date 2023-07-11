<?php get_header();
$data = \KODESK\Includes\Classes\Common::instance()->data('single-team')->get(); ?>

<!-- Page Title -->
<section class="page-title p_relative" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
    <div class="auto-container">
        <div class="content-box p_relative pt_170 pb_170">
            <h1 class="d_block fs_40 lh_50 color_white fw_exbold color-white"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
            <ul class="bread-crumb p_absolute r_0 b_0 d_iblock pl_30 pr_30 bg-white clearfix pt_4 pb_4">
            	<?php echo kodesk_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title -->

<?php while (have_posts()) : the_post(); ?>

<!-- team-details -->
<section class="team-details p_relative pt_120 pb_120">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                <div class="image-box p_relative d_block mr_20">
                    <div class="image p_relative d_block b_radius_10 mb_25"><?php the_post_thumbnail('kodesk_370x470'); ?></div>
                    <ul class="info clearfix">
                    	<?php if (get_post_meta( get_the_id(), 'phone_number', true )){ ?>
                        <li class="p_relative d_block mb_2 fs_18 lh_30"><span class="fw_medium"><?php esc_html_e('Tel:', 'kodesk'); ?></span> <a href="tel:<?php echo esc_attr(phone_number(get_post_meta( get_the_id(), 'phone_number', true ))); ?>" class="hov_color"><?php echo wp_kses(get_post_meta( get_the_id(), 'phone_number', true ), true); ?></a></li>
                        <?php } ?>
                        
                        <?php if (get_post_meta( get_the_id(), 'email_address', true )){ ?>
                        <li class="p_relative d_block mb_2 fs_18 lh_30"><span class="fw_medium"><?php esc_html_e('Email:', 'kodesk'); ?></span> <a href="mailto:<?php echo sanitize_email(get_post_meta( get_the_id(), 'email_address', true )); ?>" class="hov_color"><?php echo sanitize_email(get_post_meta( get_the_id(), 'email_address', true )); ?></a></li>
                        <?php } ?>
                        
                        <?php if (get_post_meta( get_the_id(), 'address', true )){ ?>
                        <li class="p_relative d_block fs_18 lh_30"><span class="fw_medium"><?php esc_html_e('Add:', 'kodesk'); ?></span> <?php echo wp_kses(get_post_meta( get_the_id(), 'address', true ), true); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                <div class="content-box p_relative d_block ml_20">
                    <div class="text p_relative d_block mb_60">
                        <h2 class="d_block fs_30 lh_40 fw_bold mb_3"><?php the_title(); ?></h2>
                        <span class="designation p_relative d_block fs_15 lh_26 mb_25"><?php echo get_post_meta( get_the_id(), 'designation', true ); ?></span>
                        <div class="text">
                        	<?php the_content(); ?>
                        </div>
                    </div>
                    
                    <?php $icons = get_post_meta( get_the_id(), 'social_profile', true );
                    if ( ! empty( $icons ) ) : ?>
                    <!-- Social Box -->
                    <div class="social-box p_relative d_block mb_65">
                        <h3 class="fs_22 lh_30 fw_medium mb_12"><?php esc_html_e('Follow Me On:', 'kodesk'); ?></h3>
                        <ul class="social-links clearfix">
                        	<?php foreach ( $icons as $h_icon ) :
								$header_social_icons = json_decode( urldecode( kodesk_set( $h_icon, 'data' ) ) );
								if ( kodesk_set( $header_social_icons, 'enable' ) == '' ) {
									continue;
								}
								$icon_class = explode( '-', kodesk_set( $header_social_icons, 'icon' ) );
							?>
                            <li class="p_relative d_iblock float_left mr_10"><a href="<?php echo kodesk_set( $header_social_icons, 'url' ); ?>" class="d_block fs_14 b_radius_50 centred" style="background-color:<?php echo kodesk_set( $header_social_icons, 'background' ); ?>; color: <?php echo kodesk_set( $header_social_icons, 'color' ); ?>" target="_blank"><i class="fab <?php echo esc_attr( kodesk_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    <div class="skills-box p_relative d_block mb_65">
                        <h3 class="fs_22 lh_30 fw_bold mb_6">Skills:</h3>
                        <div class="progress-inner p_relative d_block mb_40">
                            <div class="progress-box p_relative d_block mb_20">
                                <h5 class="d_block fs_18 lh_30 fw_bold blue-color mb_5">Analysis</h5>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="93%"></div>
                                    <div class="count-text p_absolute r_0 b_10 fs_14 fw_medium">93%</div>
                                </div>
                            </div>
                            <div class="progress-box p_relative d_block mb_20">
                                <h5 class="d_block fs_18 lh_30 fw_bold blue-color mb_5">SEO Audit</h5>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="69%"></div>
                                    <div class="count-text p_absolute r_0 b_10 fs_14 fw_medium">69%</div>
                                </div>
                            </div>
                            <div class="progress-box p_relative d_block">
                                <h5 class="d_block fs_18 lh_30 fw_bold blue-color mb_5">Optimization</h5>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="90%"></div>
                                    <div class="count-text p_absolute r_0 b_10 fs_14 fw_medium">90%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-inner">
                        <h3 class="fs_22 lh_30 fw_bold mb_35">Contact Me</h3>
                        <form action="team-details.html" method="post" class="default-form">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="form-group p_relative d_block mb_30">
                                        <input type="text" name="name" placeholder="Your name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="form-group p_relative d_block mb_30">
                                        <input type="email" name="email" placeholder="Your Email" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                    <div class="form-group p_relative d_block mb_30">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                    <div class="form-group message-btn p_relative d_block mb-0">
                                        <button type="submit" class="theme-btn btn-two"><span>Send Message</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team-details end -->
        
        
        
        
        
        
        
        
        <!-- Team Detail Section -->
<section class="team-single-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- Image Column -->
            <div class="image-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <?php the_post_thumbnail('kodesk_300x350'); ?>
                    </div>
                </div>
            </div>
            
            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <h2><?php the_title(); ?> <span class="category"><?php echo get_post_meta( get_the_id(), 'designation', true ); ?></span></h2>
                    <ul class="post-meta">
                        <li><span class="icon flaticon-email-1"></span> <a href="mailto:<?php echo sanitize_email(get_post_meta( get_the_id(), 'email_address', true )); ?>"><?php echo sanitize_email(get_post_meta( get_the_id(), 'email_address', true )); ?></a></li>
                        <li><span class="icon flaticon-call"></span> <a href="tel:<?php echo esc_attr(phone_number(get_post_meta( get_the_id(), 'phone_number', true ))); ?>"><?php echo wp_kses(get_post_meta( get_the_id(), 'phone_number', true ), true); ?></a></li>
                        <li><span class="icon fa fa-whatsapp"></span> <a href="tel:https://wa.me/<?php echo esc_attr(phone_number(get_post_meta( get_the_id(), 'whatsapp', true ))); ?>"><?php echo wp_kses(get_post_meta( get_the_id(), 'whatsapp', true ), true); ?></a></li>
                    </ul>
                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php $features_list = get_post_meta( get_the_id(), 'features', true );
					if(!empty($features_list)){
					$features_list = explode("\n", ($features_list)); ?>
                    <div class="row clearfix">
                        <div class="column col-lg-12 col-md-12 col-sm-12">
                            <ul class="list-style-three">
                                <?php foreach($features_list as $features): ?>
								<li><?php echo wp_kses($features, true); ?></li>
								<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php $icons = get_post_meta( get_the_id(), 'social_profile', true );
                    if ( ! empty( $icons ) ) : ?>
                    <!-- Social Box -->
                    <ul class="social-icon-one">
                    	<?php foreach ( $icons as $h_icon ) :
							$header_social_icons = json_decode( urldecode( kodesk_set( $h_icon, 'data' ) ) );
							if ( kodesk_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', kodesk_set( $header_social_icons, 'icon' ) );
                        ?>
                        <li><a href="<?php echo kodesk_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo kodesk_set( $header_social_icons, 'background' ); ?>; color: <?php echo kodesk_set( $header_social_icons, 'color' ); ?>" class="fa <?php echo esc_attr( kodesk_set( $header_social_icons, 'icon' ) ); ?>" target="_blank"></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Team Detail Section -->

<?php endwhile; ?>

<?php get_footer(); ?>