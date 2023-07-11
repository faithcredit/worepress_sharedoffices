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
class Company_Achieve extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_company_achieve';
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
        return esc_html__( 'Company Achieve', 'kodesk' );
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
            'company_achieve',
            [
                'label' => esc_html__( 'Company Achieve', 'kodesk' ),
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
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'bg_image',
            [
                'label' => __( 'Background Image', 'kodesk' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
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
                            'name' => 'link',
							'label' => esc_html__('Link', 'kodesk'),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_html__('https://your-link.com/', 'kodesk'),
							'show_external' => true,
							'default' => [
								'url' => '',
								'is_external' => true,
								'nofollow' => true,
							],
                        ],
						[
							'name' => 'icon_image',
							'label' => __( 'Icon Image', 'kodesk' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'kodesk'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
                            'name' => 'btn_title',
							'label'       => esc_html__('Button Title', 'kodesk'),
							'type'        => Controls_Manager::TEXT,
							'label_block' => true,
							'dynamic'     => [
								'active' => true,
							],
						],
                        [
                            'name' => 'btn_link',
							'label' => esc_html__('Button Link', 'kodesk'),
							'type' => Controls_Manager::URL,
							'placeholder' => esc_html__('https://your-link.com/', 'kodesk'),
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
        $allowed_tags = wp_kses_allowed_html('post'); ?>
        
        <!-- statements-section -->
        <section class="statements-section">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                </div>
                <div class="inner-container">
                    <div class="upper-box clearfix">
                        <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
                        <div class="inner-box">
                        	<?php foreach($settings['slides'] as $key => $item) { ?>
                            <div class="single-item">
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon', 'kodesk'); ?>"></div>
                                <h6><?php echo wp_kses($item['subtitle'], true); ?></h6>
                                <h3><?php echo wp_kses($item['title'], true); ?></h3>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="lower-box clearfix">
                    	<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                        <div class="single-item">
                            <p><?php echo wp_kses($item['text'], true); ?></p>
                            
                            <?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                            <a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>"><span><?php echo wp_kses( $item['btn_title'], true ); ?></span></a>
                            <?php } ?>
                        </div>
                        <?php $i++; } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- statements-section end -->
        
        <?php
    }
}