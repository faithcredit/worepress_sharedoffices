<?php namespace KODESKPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Contact_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_contact_us';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Contact Us', 'kodesk' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-briefcase';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'kodesk' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'contact_us',
            [
                'label' => esc_html__( 'Contact Us', 'kodesk' ),
            ]
        );
		$this->add_control(
            'image',
            [
                'label' => __( 'Image', 'kodesk' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'icon_image',
            [
                'label' => __( 'Icon Image', 'kodesk' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'hq_title',
            [
                'label'       => __( 'Headquarters Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'hq_address',
            [
                'label'       => __( 'Headquarters Address', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'google_map',
            [
                'label'       => __( 'Google Map Link', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'subtitle',
            [
                'label'       => __( 'Sub Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'cf7_shortocde',
            [
                'label' => esc_html__('Select Contact Form 7', 'kodesk'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => get_contact_form_7_list(),
            ]
        );
        $this->end_controls_section();
		
		//Get Free Consultation
        $this->start_controls_section(
            'contact_info_tab',
            [
                'label' => esc_html__( 'Contact Info', 'kodesk' ),
            ]
        );
		$this->add_control(
            'phone_title',
            [
                'label'       => __( 'Phone Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'phone_number',
            [
                'label'       => __( 'Phone Number', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'email_title',
            [
                'label'       => __( 'Email Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'email_address',
            [
                'label'       => __( 'Email Address', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'working_hour_title',
            [
                'label'       => __( 'Working Hours Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'working_hours',
            [
                'label'       => __( 'Working Hours', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'social_media_title',
            [
                'label'       => __( 'Social Media Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'social_media',
            [
                'label'   => esc_html__( 'Social Media', 'kodesk' ),
                'type' => Controls_Manager::REPEATER,
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
							
                        ],
						[
                            'name' => 'social_link',
							'label' => __( 'Social Link', 'kodesk' ),
							'type' => Controls_Manager::URL,
							'placeholder' => __( 'https://your-link.com/', 'kodesk' ),
							'show_external' => true,
							'default' => [
								'url' => '',
								'is_external' => true,
								'nofollow' => true,
							],
						]
                    ],
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
        
        <!-- contact-section -->
        <section class="contact-section">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-23.png'); ?>);"></div>
            <div class="auto-container">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                        <div class="text">
                        	<?php if ($settings['icon_image']['id']){ ?>
                            <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon', 'kodesk'); ?>"></div>
                            <?php } ?>
                            
                            <h3><?php echo wp_kses( $settings['hq_title'], true ); ?></h3>
                            <p><?php echo wp_kses( $settings['hq_address'], true ); ?></p>
                            
                            <?php if ($settings['google_map']){ ?>
                            <a href="<?php echo esc_url( $settings['google_map'] ); ?>" target="_blank"><i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i><span><?php esc_html_e('Google Map', 'kodesk'); ?></span></a>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-inner">
                        <div class="sec-title">
                            <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                            <h3><?php echo wp_kses( $settings['title'], true ); ?></h3>
                        </div>
                        
                        <?php if($settings['cf7_shortocde']){ ?>
                        <div id="contact-form" class="default-form"> 
                        	<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="info-inner centred">
                    <div class="row clearfix">
                    	<?php if($settings['phone_title'] and $settings['phone_number']){ ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-phone"></i></div>
                                <h3><?php echo wp_kses( $settings['phone_title'], true ); ?></h3>
                                <p><a href="tel:<?php echo esc_attr(phone_number($settings['phone_number'])); ?>"><?php echo wp_kses( $settings['phone_number'], true ); ?></a></p>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php if($settings['email_title'] and $settings['email_address']){ ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-envelope"></i></div>
                                <h3><?php echo wp_kses( $settings['email_title'], true ); ?></h3>
                                <p><a href="mailto:<?php echo sanitize_email( $settings['email_address'] ); ?>"><?php echo sanitize_email( $settings['email_address'] ); ?></a></p>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php if($settings['working_hour_title'] and $settings['working_hours']){ ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-wall-clock"></i></div>
                                <h3><?php echo wp_kses( $settings['working_hour_title'], true ); ?></h3>
                                <p><?php echo wp_kses( $settings['working_hours'], true ); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php if($settings['social_media_title'] and $settings['social_media']){ ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-share"></i></div>
                                <h3><?php echo wp_kses( $settings['social_media_title'], true ); ?></h3>
                                <p>
                                	<?php foreach($settings['social_media'] as $key => $item) { ?>
                                	<a href="<?php echo esc_url( $item['social_link']['url'] ); ?>"><?php echo wp_kses( $item['title'], true ); ?></a>,
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->
        
        <?php
    }
}
