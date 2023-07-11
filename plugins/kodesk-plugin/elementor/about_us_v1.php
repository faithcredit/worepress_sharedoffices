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
class About_Us_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_about_us_v1';
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
        return esc_html__( 'About Us V1', 'kodesk' );
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
            'about_us_v1',
            [
                'label' => esc_html__( 'About Us V1', 'kodesk' ),
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
                            'name' => 'btn_title',
							'label'       => esc_html__('Button Title', 'kodesk'),
							'type'        => Controls_Manager::TEXT,
							'label_block' => true,
							'dynamic'     => [
								'active' => true,
							],
						],
                        [
                            'name' => 'btn_url',
							'label' => esc_html__('Button URL', 'kodesk'),
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
        
        <!-- about-section -->
        <section class="about-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_1">
                            <div class="image-box">
                                <div class="image-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-1.png'); ?>);"></div>
                                <figure class="iamge image-1"><img src="<?php echo esc_url(wp_get_attachment_url($settings['top_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                                <figure class="iamge image-2"><img src="<?php echo esc_url(wp_get_attachment_url($settings['bottom_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                                <div class="curve-text">
                                    <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon Image', 'kodesk'); ?>"></div>
                                    <span class="curved-circle rotate-me"><?php echo wp_kses( $settings['circle_text'], true ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                                </div>
                                
                                <?php $features_list = $settings['text'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); ?>
                                <div class="text">
                                    <?php foreach($features_list as $features): ?>
                                    <p><?php echo wp_kses($features, true); ?></p>
                                    <?php endforeach; ?>
                                </div>
                                <?php } ?>
                                
                                <div class="inner-box">
                                	<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                                    <div class="single-item">
                                        <h4><span><?php echo wp_kses($i, true); ?></span><?php echo wp_kses($item['title'], true); ?></h4>
                                        <div class="link"><a href="<?php echo esc_url($item['btn_url']['url']); ?>"><i class="fas fa-angle-right"></i><span><?php echo wp_kses($item['btn_title'], true); ?></span></a></div>
                                    </div>
                                    <?php $i++; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->
        
        <?php
    }
}
