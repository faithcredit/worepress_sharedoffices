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
class Pricing_Plan_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  2.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_pricing_plan_v2';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  2.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Pricing Plan V2', 'kodesk' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  2.0.0
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
     * @since  2.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'pricing_plan_v2',
            [
                'label' => esc_html__( 'Pricing Plan V2', 'kodesk' ),
            ]
        );
        $this->add_control(
            'price_plan',
            [
                'label'   => esc_html__( 'Pricing Plan', 'kodesk' ),
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
                            'label' => esc_html__('Text', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'features_plan',
							'label' => esc_html__('Featured Plan', 'kodesk'),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__('Show', 'kodesk'),
							'label_off' => esc_html__('Hide', 'kodesk'),
							'return_value' => 'yes',
							'default' => 'yes',
						],
						[
							'name' => 'icon_image',
							'label' => __( 'Icon Image', 'kodesk' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
						[
							'name' => 'image',
							'label' => __( 'Image', 'kodesk' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
                        [
                            'name' => 'price',
                            'label' => esc_html__('Price', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
                        ],
                        [
                            'name' => 'package_plan',
                            'label' => esc_html__('Package Plan', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'placeholder' => __( '/Month', 'kodesk' ),
                        ],
                        [
                            'name' => 'features',
                            'label' => esc_html__('Features List', 'kodesk'),
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
                            'label' => esc_html__('Button URL', 'kodesk'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => __( 'https://your-link.com', 'kodesk' ),
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
        
        <!-- pricing-style-two -->
        <section class="pricing-style-two">
            <div class="outer-container">
                <div class="row clearfix">
                    <?php foreach($settings['price_plan'] as $key => $item):
					if($item['features_plan'] == 'yes')
						$shape_image = get_template_directory_uri().'/assets/images/shape/shape-16.png';
					else
						$shape_image = get_template_directory_uri().'/assets/images/shape/shape-15.png'; ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-two <?php if($item['features_plan'] == 'yes') echo 'active-block'; ?> wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="pricing-table">
                                <div class="bg-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image']['id'])); ?>);"></div>
                                <div class="shape" style="background-image: url(<?php echo esc_url($shape_image); ?>);"></div>
                                <div class="content-box">
                                	<?php if ($item['price'] or $item['package_plan']){ ?>
                                    <div class="price"><h3><?php echo wp_kses($item['price'], $allowed_tags); ?><span><?php echo wp_kses($item['package_plan'], $allowed_tags); ?></span></h3></div>
                                    <?php } ?>
                                    <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon', 'kodesk'); ?>"></div>
                                    <h2><?php echo wp_kses($item['title'], $allowed_tags); ?></h2>
                                    <p><?php echo wp_kses($item['text'], $allowed_tags); ?></p>
                                    
                                    <?php $features_list = $item['features'];
									if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); ?>
									<ul class="feature-list clearfix">
										<?php foreach($features_list as $features): ?>
										<li><?php echo wp_kses($features, true); ?></li>
										<?php endforeach; ?>
									</ul>
									<?php } ?>
                                    
                                    <?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="theme-btn btn-one"><span><?php echo wp_kses($item['btn_title'], $allowed_tags); ?></span></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- pricing-style-two end -->
        
        <?php
    }
}
