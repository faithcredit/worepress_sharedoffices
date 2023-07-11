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
class Features extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_features';
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
        return esc_html__( 'Features', 'kodesk' );
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
            'features',
            [
                'label' => esc_html__( 'Features', 'kodesk' ),
            ]
        );
		$this->add_control(
            'style',
            [
                'label'   => esc_html__('Style', 'kodesk'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1' => esc_html__('Style One', 'kodesk'),
                    'style2' => esc_html__('Style Two', 'kodesk'),
                ),
            ]
        );
		$this->add_control(
            'img',
            [
                'label' => __( 'Feature Image', 'kodesk' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
              'features_col', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['f_title' => esc_html__('Awards Winner', 'kodesk')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'symbol',
                    			'label' => esc_html__('Symbol', 'kodesk'),
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'f_title',
                    			'label' => esc_html__('Title', 'kodesk'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title', 'kodesk')
                			],
            			],
            	    'title_field' => '{{f_title}}',
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
							'name' => 'cols',
							'label'   => esc_html__( 'Column Grid', 'kodesk' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'col-lg-2',
							'options' => array(
								'col-lg-2'       => esc_html__( '5 Col Grid', 'kodesk' ),
								'col-lg-3'      => esc_html__( '4 Col Grid', 'kodesk' ),
								'col-lg-4' => esc_html__( '3 Col Grid', 'kodesk' ),
								'col-lg-6'       => esc_html__( '2 Col Grid', 'kodesk' ),
							),
						],
						[
                            'name' => 'title',
                            'label' => esc_html__('Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'link_title',
                            'label' => esc_html__('Link Title', 'kodesk'),
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
        
        <!-- amenities-section -->
        <section class="amenities-section centred <?php if($settings['style'] == 'style2') echo 'alternat-2'; ?>">
            <div class="outer-container">
                <div class="line-box">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                </div>
                
                <div class="pointers-block">
                    <?php if( $settings[ 'img' ]['id'] ):?>
                    	<figure class="pointer-image"><img src="<?php echo esc_url( wp_get_attachment_url( $settings[ 'img' ][ 'id' ] ) );?>" alt="<?php esc_attr_e( 'Feature Image', 'kodesk' );?>"></figure>
                    <?php else:?>
                    	<figure class="pointer-image"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/resource/pointer-img-1.jpg" alt="<?php esc_attr_e( 'Feature Image', 'kodesk' );?>"></figure>
                    <?php endif;?>
                    <div class="pointer-inner">
                        <?php foreach($settings['features_col'] as $key => $item) { ?>
                        <div class="single-pointer">
                            <span><?php echo wp_kses( $item[ 'symbol' ], true );?></span>
                            <h5><?php echo wp_kses( $item[ 'f_title' ], true );?></h5>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="inner-content">
                    <div class="row clearfix">
                    	<?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                        <div class="col-md-6 col-sm-12 single-column <?php echo esc_attr( $item[ 'cols' ] );?>">
                            <div class="single-item">
                            	<?php if ($item['icon_image']['id']){ ?>
                                <div class="inner-box">
                                	<?php if ($item['icon_image']['id']){ ?>
                                    <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_html_e('Icon', 'kodesk'); ?>"></div>
                                    <?php } ?>
                                    <h3><?php echo wp_kses($item['title'], true); ?></h3>
                                    <p><?php echo wp_kses($item['text'], true); ?></p>
                                </div>
                                <?php } elseif ($item['link_title'] and $item['link']['url']) { ?>
                                <div class="inner-box">
                                    <div class="link-box">
                                        <div class="link"><a href="<?php echo esc_url($item['link']['url']); ?>"><i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a></div>
                                        <h5><a href="<?php echo esc_url($item['link']['url']); ?>"><?php echo wp_kses($item['link_title'], true); ?></a></h5>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <?php if( $item['title'] || $item['text'] ){?>
                                <div class="text">
                                    <div class="inner">
                                        <h2><?php echo wp_kses($item['title'], true); ?></h2>
                                        <h3><?php echo wp_kses($item['text'], true); ?></h3>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- amenities-section end -->
        
        <?php
    }
}
