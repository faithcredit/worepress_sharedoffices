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
class Our_Locations extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_our_locations';
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
        return esc_html__( 'Our Locations', 'kodesk' );
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
            'our_locations',
            [
                'label' => esc_html__( 'Our Locations', 'kodesk' ),
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
            'slides',
            [
                'label'   => esc_html__( 'Our Locations', 'kodesk' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
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
							'name' => 'image',
							'label' => __( 'Image', 'kodesk' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
						[
							'name' => 'address',
							'label'       => __( 'Address', 'kodesk' ),
							'type'        => Controls_Manager::TEXT,
							'label_block' => true,
							'dynamic'     => [
								'active' => true,
							],
						],
						[
							'name' => 'phone_number',
							'label'       => __( 'Phone Number', 'kodesk' ),
							'type'        => Controls_Manager::TEXT,
							'label_block' => true,
							'dynamic'     => [
								'active' => true,
							],
						],
						[
							'name' => 'email_address',
							'label'       => __( 'Email Address', 'kodesk' ),
							'type'        => Controls_Manager::TEXT,
							'label_block' => true,
							'dynamic'     => [
								'active' => true,
							],
						],
						[
							'name' => 'google_map',
							'label'       => __( 'Google Map Link', 'kodesk' ),
							'type'        => Controls_Manager::TEXT,
							'label_block' => true,
							'dynamic'     => [
								'active' => true,
							],
						],
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
        $allowed_tags = wp_kses_allowed_html('post'); ?>
        
        <!-- location-section -->
        <section class="location-section">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                    <?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                    <div class="single-item">
                        <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                        <div class="lower-content">
                            <h3><?php echo wp_kses( $item['title'], true ); ?></h3>
                            <ul class="info clearfix">
                            	<?php if($item['address']){ ?>
                                <li><span><?php esc_html_e('Add', 'kodesk'); ?>&nbsp;&nbsp;:</span><?php echo wp_kses( $item['address'], true ); ?></li>
                                <?php } ?>
                                
                                <?php if($item['phone_number']){ ?>
                                <li><span><?php esc_html_e('Mob', 'kodesk'); ?>&nbsp;&nbsp;:</span><a href="tel:<?php echo esc_attr(phone_number($item['phone_number'])); ?>"><?php echo wp_kses( $item['phone_number'], true ); ?></a></li>
                                <?php } ?>
                                
                                <?php if($item['email_address']){ ?>
                                <li><span><?php esc_html_e('Mail', 'kodesk'); ?>&nbsp;&nbsp;:</span><a href="mailto:<?php echo sanitize_email( $item['email_address'] ); ?>"><?php echo sanitize_email( $item['email_address'] ); ?></a></li>
                                <?php } ?>
                            </ul>
                            
                            <?php if ($item['google_map']){ ?>
                            <div class="google-map">
                                <a href="<?php echo esc_url( $item['google_map'] ); ?>" target="_blank"><i class="light-icon fas fa-angle-right"></i><i class="fas fa-angle-right"></i><span><?php esc_html_e('Google Map', 'kodesk'); ?></span></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php $i++; } ?>
                </div>
            </div>
        </section>
        <!-- location-section end -->
        
        <?php
    }
}
