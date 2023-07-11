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
class Slider_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_slider_v1';
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
        return esc_html__( 'Slider V1', 'kodesk' );
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
            'slider_v1',
            [
                'label' => esc_html__( 'Slider V1', 'kodesk' ),
            ]
        );
        $this->add_control(
            'slides',
            [
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
						[
                            'name' => 'style',
							'label'   => esc_html__('Content Alignment', 'kodesk'),
							'type'    => Controls_Manager::SELECT,
							'default' => 'right',
							'options' => array(
								'left' => esc_html__('Left', 'kodesk'),
								'right' => esc_html__('Right', 'kodesk'),
							),
						],
                        [
                            'name' => 'bg_image',
                            'label' => esc_html__('Background Image', 'kodesk'),
                            'type' => Controls_Manager::MEDIA,
                            'default' => ['url' => Utils::get_placeholder_image_src(),],
                        ],
                        [
                            'name' => 'subtitle',
                            'label' => esc_html__('Sub Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'text',
                            'label' => esc_html__('Text', 'kodesk'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
                        [
                            'name' => 'btn_title',
                            'label' => esc_html__('Button Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'kodesk'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => __( 'https://your-link.com/', 'kodesk' ),
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
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
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
        
        <!-- banner-section -->
        <section class="banner-section centred">
            <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                <?php foreach($settings['slides'] as $key => $item): ?>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>)"></div>
                    <div class="auto-container">
                        <div class="row clearfix">
                           <div class="col-xl-6 col-lg-6 col-md-12 content-column <?php if ($item['style'] == 'right') echo 'offset-xl-6'; ?>">
                               <div class="content-inner">
                                    <div class="text">
                                        <h1><?php echo wp_kses($item['subtitle'], true); ?></h1>
                                        <h3><?php echo wp_kses($item['title'], true); ?></h3>
                                        <p><?php echo wp_kses($item['text'], true); ?></p>
                                        
                                        <?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                        <div class="btn-box">
                                            <a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>" class="theme-btn btn-one"><span><?php echo wp_kses($item['btn_title'], true); ?></span></a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div> 
                           </div> 
                        </div> 
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- banner-section end -->
        
        <?php
    }
}
