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
class Facts_Counter extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_facts_counter';
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
        return esc_html__( 'Facts Counter', 'kodesk' );
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
            'facts_counter',
            [
                'label' => esc_html__( 'Facts Counter', 'kodesk' ),
            ]
        );
		$this->add_control(
            'style',
            [
                'label'   => esc_html__('Change Style', 'kodesk'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1' => esc_html__('Style One', 'kodesk'),
                    'style2' => esc_html__('Style Two', 'kodesk'),
                ),
            ]
        );
        $this->add_control(
            'slides',
            [
                'label'   => esc_html__( 'Facts Counter', 'kodesk' ),
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
                            'name' => 'text',
                            'label' => esc_html__('Text', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'icon',
                            'label' => esc_html__('Icon', 'kodesk'),
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
        
        <?php if($settings['style'] == 'style1') { ?>
        <!-- funfact-section -->
        <section class="funfact-section centred">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php foreach($settings['slides'] as $key => $item) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                        <div class="counter-block-one wow slideInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2500" data-stop="<?php echo esc_attr($item['counter_stop']); ?>"><?php echo wp_kses($item['counter_start'], $allowed_tags); ?></span><?php if($item['counter_sign']){ ?><span><?php echo wp_kses($item['counter_sign'], $allowed_tags); ?></span><?php } ?>
                                </div>
                                <h3><?php echo wp_kses($item['title'], true); ?></h3>
                                <p><?php echo wp_kses($item['text'], true); ?></p>
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- funfact-section end -->
        
        <?php } else { ?>
        
        <!-- funfact-section -->
        <section class="funfact-section alternat-2 centred">
            <div class="outer-container">
                <div class="shape">
                    <div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-8.png'); ?>);"></div>
                    <div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-9.png'); ?>);"></div>
                    <div class="shape-3" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-10.png'); ?>);"></div>
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                    	<?php foreach($settings['slides'] as $key => $item) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="counter-block-one wow slideInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="2500" data-stop="<?php echo esc_attr($item['counter_stop']); ?>"><?php echo wp_kses($item['counter_start'], $allowed_tags); ?></span><?php if($item['counter_sign']){ ?><span><?php echo wp_kses($item['counter_sign'], $allowed_tags); ?></span><?php } ?>
                                    </div>
                                    <h3><?php echo wp_kses($item['title'], true); ?></h3>
                                	<p><?php echo wp_kses($item['text'], true); ?></p>
                                    <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- funfact-section end -->
        
        <?php } ?>
        
        <?php
    }
}
