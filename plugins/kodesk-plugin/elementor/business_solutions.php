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
class Business_Solutions extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_business_solutions';
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
        return esc_html__( 'Business Solutions', 'kodesk' );
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
            'image_tab',
            [
                'label' => esc_html__( 'Images', 'kodesk' ),
            ]
        );
        $this->add_control(
            'top_image',
            [
                'label' => __( 'Top Image', 'kodesk' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
        $this->add_control(
            'bottom_image',
            [
                'label' => __( 'Bottom Image', 'kodesk' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		 $this->add_control(
            'right_image',
            [
                'label' => __( 'Right Image', 'kodesk' ),
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
            'circle_text',
            [
                'label'       => __( 'Circle Text', 'kodesk' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();
		
		//Business Solutions
		$this->start_controls_section(
            'business_solutions',
            [
                'label' => esc_html__( 'Business Solutions', 'kodesk' ),
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
            'text',
            [
                'label'       => __( 'Text', 'kodesk' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'slides',
            [
                'label'   => esc_html__( 'Features', 'kodesk' ),
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
                            'name' => 'text',
                            'label' => esc_html__('Title', 'kodesk'),
                            'type' => Controls_Manager::TEXTAREA,
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
        
        <!-- about-style-three -->
        <section class="about-style-three">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <div class="curve-text">
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon', 'kodesk'); ?>"></div>
                                <span class="curved-circle rotate-me"><?php echo wp_kses( $settings['circle_text'], true ); ?></span>
                            </div>
                            <div class="pattern-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-20.png'); ?>);"></div>
                            <figure class="image image-1 wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="<?php echo esc_url(wp_get_attachment_url($settings['top_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                            <figure class="image image-2 wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="<?php echo esc_url(wp_get_attachment_url($settings['right_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                            <figure class="image image-3  wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="<?php echo esc_url(wp_get_attachment_url($settings['bottom_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                                <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                            </div>
                            <div class="text">
                                <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                            </div>
                            <div class="inner-box">
                            	<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                                <div class="single-item">
                                    <h3><?php echo wp_kses($item['title'], true); ?></h3>
                                    <p><?php echo wp_kses($item['text'], true); ?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-three end -->
        
        <?php
    }
}
