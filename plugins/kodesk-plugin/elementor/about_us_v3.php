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
class About_Us_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  3.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_about_us_v3';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  3.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'About Us V3', 'kodesk' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  3.0.0
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
     * @since  3.0.0
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
     * @since  3.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'facts_tab',
            [
                'label' => esc_html__( 'Facts Counter', 'kodesk' ),
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
							'name' => 'icon_image',
							'label' => __( 'Icon Image', 'kodesk' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
						[
                            'name' => 'counter_start',
                            'label' => esc_html__('Counter Start', 'kodesk'),
                            'type' => Controls_Manager::NUMBER,
                            'default' => 0,
                        ],
                        [
                            'name' => 'counter_stop',
                            'label' => esc_html__('Counter Stop', 'kodesk'),
                            'type' => Controls_Manager::NUMBER,
                        ],
						[
                            'name' => 'counter_sign',
                            'label' => esc_html__('Counter Sign', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
                        ],
                    ],
            ]
        );
        $this->end_controls_section();
		
		//About Us
		$this->start_controls_section(
            'about_us_tab',
            [
                'label' => esc_html__( 'About Us', 'kodesk' ),
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
            'bold_text',
            [
                'label'       => __( 'Bold Text', 'kodesk' ),
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
            'author_image',
            [
                'label' => __( 'Author Image', 'kodesk' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'social_icon',
            [
				'label' => esc_html__('Select Social Icon', 'aundri'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => get_fontawesome_icons(),
			]
        );
		$this->add_control(
            'social_link',
            [
				'label' => esc_html__('Social URL', 'kodesk'),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com/', 'kodesk'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
        );
		$this->add_control(
            'author_name',
            [
                'label'       => __( 'Author Name', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'designation',
            [
                'label'       => __( 'Designation', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
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
        
        <!-- about-style-two -->
        <section class="about-style-two">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>"></figure>
                            <?php $i=1; foreach($settings['slides'] as $key => $item) {
							if($i==1){ ?>
                            <div class="text text-1 wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon', 'kodesk'); ?>"></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2500" data-stop="<?php echo esc_attr($item['counter_stop']); ?>"><?php echo wp_kses($item['counter_start'], $allowed_tags); ?></span><?php if($item['counter_sign']){ ?><span><?php echo wp_kses($item['counter_sign'], $allowed_tags); ?></span><?php } ?>
                                </div>
                                <h6><?php echo wp_kses($item['title'], true); ?></h6>
                            </div>
                            <?php } else { ?>
							<div class="text text-2 wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon', 'kodesk'); ?>"></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2500" data-stop="<?php echo esc_attr($item['counter_stop']); ?>"><?php echo wp_kses($item['counter_start'], $allowed_tags); ?></span><?php if($item['counter_sign']){ ?><span><?php echo wp_kses($item['counter_sign'], $allowed_tags); ?></span><?php } ?>
                                </div>
                                <h6><?php echo wp_kses($item['title'], true); ?></h6>
                            </div>
							<?php } $i++; } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                                <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                            </div>
                            <div class="text">
                                <h3><?php echo wp_kses( $settings['bold_text'], true ); ?></h3>
                                <?php echo wp_kses( $settings['text'], true ); ?>
                            </div>
                            <div class="author-box">
                                <figure class="thumb-box">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['author_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'kodesk'); ?>">
                                    
                                    <?php if($settings['social_icon'] and $settings['social_link']['url']){ ?>
                                    <a href="<?php echo esc_url($settings['social_link']['url']); ?>" class="link"><i class="<?php echo esc_attr($settings['social_icon']); ?>"></i></a>
                                    <?php } ?>
                                </figure>
                                <h3><?php echo wp_kses( $settings['author_name'], true ); ?></h3>
                                <span class="designation"><?php echo wp_kses( $settings['designation'], true ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-two end -->
        
        <?php
    }
}
