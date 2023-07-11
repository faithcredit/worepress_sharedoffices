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
class Workspaces_Details extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_workspaces_details';
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
        return esc_html__( 'Workspaces Details', 'kodesk' );
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
            'gallery_tab',
            [
                'label' => esc_html__( 'Image Gallery', 'kodesk' ),
            ]
        );
		$this->add_control(
			'image_gallery',
			[
				'label' => __( 'Images', 'kodesk' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		
        $this->end_controls_section();
		
		//Workspaces Details
		$this->start_controls_section(
            'workspaces_details',
            [
                'label' => esc_html__( 'Workspaces Details', 'kodesk' ),
            ]
        );
		$this->add_control(
            'address',
            [
                'label'       => __( 'Address', 'kodesk' ),
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
            'price',
            [
                'label'       => __( 'Price', 'kodesk' ),
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
        $this->end_controls_section();
		
		//Surroundings
		$this->start_controls_section(
            'surroundings_tab',
            [
                'label' => esc_html__( 'Surroundings', 'kodesk' ),
            ]
        );
		$this->add_control(
            'title2',
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
            'text2',
            [
                'label'       => __( 'Text', 'kodesk' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'features',
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
							'name' => 'icon',
							'label' => esc_html__('Select Icon', 'kodesk'),
							'type' => Controls_Manager::SELECT2,
							'label_block' => true,
							'options' => get_fontawesome_icons(),
						],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'kodesk'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
                    ],
            ]
        );
        $this->end_controls_section();
		
		//Advanced Amenities
		$this->start_controls_section(
            'advanced_amenities_tab',
            [
                'label' => esc_html__( 'Advanced Amenities', 'kodesk' ),
            ]
        );
		$this->add_control(
            'title3',
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
            'text3',
            [
                'label'       => __( 'Text', 'kodesk' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'features3',
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
                    ],
            ]
        );
        $this->end_controls_section();
		
		//Membership Plan
		$this->start_controls_section(
            'membership_plan_tab',
            [
                'label' => esc_html__( 'Membership Plan', 'kodesk' ),
            ]
        );
		$this->add_control(
            'title4',
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
            'features4',
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
                            'label' => esc_html__('Text', 'kodesk'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
                            'name' => 'price',
                            'label' => esc_html__('Price', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
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
		
		//Google Map
		$this->start_controls_section(
			'google_map_tab',
			[
				'label' => esc_html__( 'Google Map', 'kodesk' ),
			]
		);
		$this->add_control(
			'google_map_iframe',
			[
				'label'       => __( 'Google Map Iframe', 'kodesk' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
			]
		);
		$this->end_controls_section();
		
		//Sidebar
		$this->start_controls_section(
            'sidebar_tab',
            [
                'label' => esc_html__( 'Sidebar', 'kodesk' ),
            ]
        );
		$this->add_control(
			'sidebar',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'manzil' ),
				'separate' => 'before',
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => kodesk_get_sidebars(),
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
        
        <!-- workspaces-details -->
        <section class="workspaces-details">
            <div class="carousel-outer">
                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                    <?php foreach ( $settings['image_gallery'] as $image ) { ?>
                    <div class="single-item">
                        <figure class="image-box"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php esc_attr_e('Awesome Image', 'kodesk'); ?>"></figure>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="auto-container">
                <div class="workspaces-details-content">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                            <div class="default-sidebar workspaces-sidebar">
                                <?php dynamic_sidebar( $settings['sidebar'] ); ?>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                            <div class="details-content-box">
                                <div class="content-one">
                                	<?php if ($settings['address']){ ?>
                                    <div class="text"><i class="flaticon-pointer-inside-a-circle"></i><?php echo wp_kses( $settings['address'], true ); ?></div>
                                    <?php } ?>
                                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                                    <div class="price"><?php echo wp_kses( $settings['price'], true ); ?></div>
                                    <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                                </div>
                                <div class="content-two">
                                    <h3><?php echo wp_kses( $settings['title2'], true ); ?></h3>
                                    <p><?php echo wp_kses( $settings['text2'], true ); ?></p>
                                    
                                    <?php if($settings['features']){ ?>
                                    <ul class="feature-list clearfix">
                                    	<?php foreach($settings['features'] as $key => $item) { ?>
                                        <li>
                                            <div class="icon"><i class="<?php echo esc_attr($item['icon']); ?>"></i></div>
                                            <h3><?php echo wp_kses( $item['title'], true ); ?></h3>
                                            <p><?php echo wp_kses( $item['text'], true ); ?></p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </div>
                                <div class="content-three">
                                    <h3><?php echo wp_kses( $settings['title3'], true ); ?></h3>
                                    <p><?php echo wp_kses( $settings['text3'], true ); ?></p>
                                    
                                    <?php if($settings['features3']){ ?>
                                    <ul class="feature-list clearfix">
                                        <?php foreach($settings['features3'] as $key => $item) { ?>
                                        <li>
                                            <div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                                            <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </div>
                                
                                <?php if($settings['features4']){ ?>
                                <div class="content-four">
                                    <h3><?php echo wp_kses( $settings['title4'], true ); ?></h3>
                                    <div class="tabs-box">
                                        <ul class="tab-btns list tab-buttons clearfix">
                                        	<?php $i=1; foreach($settings['features4'] as $key => $item) { ?>
                                            <li class="tab-btn <?php if ($i==1) echo 'active-btn'; ?>" data-tab="#tab-<?php echo esc_attr($i); ?>"><?php echo wp_kses( $item['title'], true ); ?></li>
                                            <?php $i++; } ?>
                                        </ul>
                                        <div class="tabs-content">
                                            <?php $i=1; foreach($settings['features4'] as $key => $item) { ?>
                                            <div class="tab <?php if ($i==1) echo 'active-tab'; ?>" id="tab-<?php echo esc_attr($i); ?>">
                                                <div class="inner-box">
                                                    <p><?php echo wp_kses( $item['text'], true ); ?></p>
                                                    <div class="lower-box clearfix">
                                                        <h5><?php echo wp_kses( $item['price'], true ); ?></h5>
                                                        <a href="<?php echo esc_url($item['btn_link']['url']); ?>"><i class="fas fa-angle-right"></i><span><?php echo wp_kses( $item['btn_title'], true ); ?></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++; } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <?php if ($settings['google_map_iframe']){ ?>
                                <div class="content-five">
                                    <div class="map-inner">
                                        <?php echo do_shortcode($settings['google_map_iframe']); ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- workspaces-details end -->
        
        <?php
    }
}
