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
class Mixit_Gallery extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_mixit_gallery';
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
        return esc_html__( 'Mixit Gallery', 'kodesk' );
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
        return 'eicon-library-open';
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
            'mixit_gallery',
            [
                'label' => esc_html__( 'Mixit Gallery', 'kodesk' ),
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
            'btn_title',
            [
                'label'       => __( 'Button Title', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => __( 'Button URL', 'kodesk' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'kodesk' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'gallery',
            [
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
						[
							'name' => 'col',
							'label'   => esc_html__( 'Column Grid', 'kodesk' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'col-lg-3',
							'options' => array(
								'col-lg-3'      => esc_html__( '4 Col Grid', 'kodesk' ),
								'col-lg-4' => esc_html__( '3 Col Grid', 'kodesk' ),
								'col-lg-6'       => esc_html__( '2 Col Grid', 'kodesk' ),
								'col-lg-12'       => esc_html__( '1 Col Grid', 'kodesk' ),
							),
						],
						[
                            'name' => 'img',
                            'label' => esc_html__('Gallery Image', 'kodesk'),
                            'type' => Controls_Manager::MEDIA,
                            'default' => ['url' => Utils::get_placeholder_image_src(),],
                        ],
						[
                            'name' => 'b_title',
                            'label' => esc_html__('Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'btn_titles',
                            'label' => esc_html__('Button Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_links',
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
						[
							'name' => 'cols',
							'label'   => esc_html__( 'Column Grid', 'kodesk' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'col-lg-3',
							'options' => array(
								'col-lg-3'      => esc_html__( '4 Col Grid', 'kodesk' ),
								'col-lg-4' => esc_html__( '3 Col Grid', 'kodesk' ),
								'col-lg-6'       => esc_html__( '2 Col Grid', 'kodesk' ),
								'col-lg-12'       => esc_html__( '1 Col Grid', 'kodesk' ),
							),
						],
						[
                            'name' => 'img1',
                            'label' => esc_html__('Gallery Image', 'kodesk'),
                            'type' => Controls_Manager::MEDIA,
                            'default' => ['url' => Utils::get_placeholder_image_src(),],
                        ],
						[
                            'name' => 'title1',
                            'label' => esc_html__('Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_title1',
                            'label' => esc_html__('Button Title', 'kodesk'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_link1',
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
        
        <!-- project-section -->
        <section class="project-section sec-pad">
            <?php if( $settings['subtitle'] || $settings['title'] || $settings['btn_link']['url']){?>
            <div class="auto-container">
                <div class="sec-title">
                    <h6><?php echo wp_kses($settings['subtitle'], $allowed_tags); ?></h6>
                    <h2><?php echo wp_kses($settings['title'], $allowed_tags); ?></h2>
                    
                    <?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                    <div class="btn-box">
                        <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn btn-one"><span><?php echo wp_kses( $settings['btn_title'], true ); ?></span></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <div class="outer-container">
                <div class="sortable-masonry">
                    <div class="items-container row clearfix">
                        <?php foreach($settings['gallery'] as $key => $item): ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 masonry-item small-column clearfix">
                            <div class="double-block">
                                <div class="row clearfix">
                                    <?php if( $item[ 'img' ]['id'] ):?>
                                    <div class="<?php echo esc_attr( $item[ 'col' ] );?> col-md-12 col-sm-12 small-column">
                                        <div class="project-block-one">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="<?php echo esc_url( wp_get_attachment_url( $item[ 'img' ][ 'id' ] ) );?>" alt="<?php esc_attr_e( 'Gallery Image', 'kodesk' );?>"></figure>
                                                <div class="content-box">
                                                    <div class="text">
                                                        <h3><a href="<?php echo esc_url($item['btn_links']['url']); ?>"><?php echo wp_kses( $item[ 'b_title' ], true );?></a></h3>
                                                    </div>
                                                    <div class="link"><a href="<?php echo esc_url($item['btn_links']['url']); ?>"><i class="fas fa-angle-double-right"></i><?php echo wp_kses( $item[ 'btn_titles' ], true );?></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    
                                    <?php if( $item[ 'img1' ]['id'] ):?>
                                    <div class="<?php echo esc_attr( $item[ 'cols' ] );?> col-md-12 col-sm-12 small-column">
                                        <div class="project-block-one">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="<?php echo esc_url( wp_get_attachment_url( $item[ 'img1' ][ 'id' ] ) );?>" alt="<?php esc_attr_e( 'Gallery Image', 'kodesk' );?>"></figure>
                                                <div class="content-box">
                                                    <div class="text">
                                                        <h3><a href="<?php echo esc_url($item['btn_link1']['url']); ?>"><?php echo wp_kses( $item[ 'title1' ], true );?></a></h3>
                                                    </div>
                                                    <div class="link"><a href="<?php echo esc_url($item['btn_link1']['url']); ?>"><i class="fas fa-angle-double-right"></i><?php echo wp_kses( $item[ 'btn_title1' ], true );?></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- project-section end -->
        
        <?php
    }
}
