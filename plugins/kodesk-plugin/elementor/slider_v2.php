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
class Slider_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  2.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_slider_v2';
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
        return esc_html__( 'Slider V2', 'kodesk' );
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
            'slider_v2',
            [
                'label' => esc_html__( 'Slider V2', 'kodesk' ),
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
        $this->end_controls_section();
		
		//Workspaces
		$this->start_controls_section(
            'workspaces_tab',
            [
                'label' => esc_html__( 'Workspaces', 'kodesk' ),
            ]
        );
		$this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'kodesk' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 2,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__( 'Order By', 'kodesk' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'kodesk' ),
                    'title'      => esc_html__( 'Title', 'kodesk' ),
                    'menu_order' => esc_html__( 'Menu Order', 'kodesk' ),
                    'rand'       => esc_html__( 'Random', 'kodesk' ),
                ),
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__( 'Order', 'kodesk' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'kodesk' ),
                    'ASC'  => esc_html__( 'ASC', 'kodesk' ),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'kodesk'),
                'options' => get_categories_list('workspace_cat'),
            ]
        );
		$this->add_control(
            'btn_title1',
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
            'btn_link1',
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
        
		$paged = kodesk_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-kodesk' );
        $args = array(
            'post_type'      => 'workspace',
            'posts_per_page' => kodesk_set( $settings, 'query_number' ),
            'orderby'        => kodesk_set( $settings, 'query_orderby' ),
            'order'          => kodesk_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( kodesk_set( $settings, 'query_category' ) ) $args['workspace_cat'] = kodesk_set( $settings, 'query_category' );
        $query = new \WP_Query( $args ); ?>
        
        <!-- banner-style-two -->
        <section class="banner-style-two">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
            <div class="outer-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <h5><?php echo wp_kses($settings['subtitle'], true); ?></h5>
                            <h2><?php echo wp_kses($settings['title'], true); ?></h2>
                            <p><?php echo wp_kses($settings['text'], true); ?></p>
                            
                            <?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn btn-three"><span><?php echo wp_kses( $settings['btn_title'], true ); ?></span></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php if ( $query->have_posts() ) { ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-content clearfix">
                            <div class="shape rotate-me" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-4.png'); ?>);"></div>
                            <div class="inner clearfix">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 workspaces-block">
                                        <div class="workspaces-block-two">
                                        	<?php $i=1; while ( $query->have_posts() ) : $query->the_post();
											if($i==1) { ?>
                                            <div class="inner-box">
                                                <div class="upper-box">
                                                    <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="text"><i class="flaticon-pointer-inside-a-circle"></i><?php echo wp_kses(get_post_meta( get_the_id(), 'address', true ), true); ?></div>
                                                </div>
                                                <div class="image-box">
                                                    <span class="category"><?php echo wp_kses(get_post_meta( get_the_id(), 'feature_tag', true ), true); ?></span>
                                                    <div class="view-btn"><a href="assets/images/resource/workspaces-4.jpg" class="lightbox-image"><i class="flaticon-photo-camera"></i></a></div>
                                                    <figure class="image"><?php the_post_thumbnail('kodesk_310x180'); ?></figure>
                                                </div>
                                                <div class="lower-content">
                                                    <ul class="feature-list clearfix">
                                                    	<?php $square_feet = get_post_meta( get_the_id(), 'square_feet', true );
														if($square_feet){ ?>
                                                        <li>
                                                            <i class="flaticon-select"></i>
                                                            <h6><?php esc_html_e('Total Area', 'kodesk'); ?></h6>
                                                            <span><?php echo wp_kses($square_feet, true); ?></span>
                                                        </li>
                                                        <?php } ?>
                                                        
                                                    	<?php $users = get_post_meta( get_the_id(), 'users', true );
														if($users){ ?>
                                                        <li>
                                                            <i class="flaticon-user"></i>
                                                            <h6><?php esc_html_e('Capacity', 'kodesk'); ?></h6>
                                                            <span><?php echo wp_kses($users, true); ?></span>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="lower-box clearfix">
                                                        <div class="text"><?php echo wp_kses(get_post_meta( get_the_id(), 'price_package', true ), true); ?></div>
                                                        <div class="link"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><i class="fas fa-angle-right"></i><span><?php esc_html_e('Read More', 'kodesk'); ?></span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } $i++; endwhile; ?>
                                            
                                            <?php if($settings['btn_link1']['url'] and $settings['btn_title1']) { ?>
                                            <div class="more-btn text-right">
                                                <a href="<?php echo esc_url( $settings['btn_link1']['url'] ); ?>"><span><?php echo wp_kses( $settings['btn_title1'], true ); ?></span></a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                    <?php $i=1; while ( $query->have_posts() ) : $query->the_post();
									if($i==2) { ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 workspaces-block">
                                        <div class="workspaces-block-two">
                                            <div class="inner-box">
                                                <div class="upper-box">
                                                    <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="text"><i class="flaticon-pointer-inside-a-circle"></i><?php echo wp_kses(get_post_meta( get_the_id(), 'address', true ), true); ?></div>
                                                </div>
                                                <div class="image-box">
                                                    <span class="category"><?php echo wp_kses(get_post_meta( get_the_id(), 'feature_tag', true ), true); ?></span>
                                                    <div class="view-btn"><a href="assets/images/resource/workspaces-5.jpg" class="lightbox-image"><i class="flaticon-photo-camera"></i></a></div>
                                                    <figure class="image"><?php the_post_thumbnail('kodesk_310x180'); ?></figure>
                                                </div>
                                                <div class="lower-content">
                                                    <ul class="feature-list clearfix">
                                                        <?php $square_feet = get_post_meta( get_the_id(), 'square_feet', true );
														if($square_feet){ ?>
                                                        <li>
                                                            <i class="flaticon-select"></i>
                                                            <h6><?php esc_html_e('Total Area', 'kodesk'); ?></h6>
                                                            <span><?php echo wp_kses($square_feet, true); ?></span>
                                                        </li>
                                                        <?php } ?>
                                                        
                                                    	<?php $users = get_post_meta( get_the_id(), 'users', true );
														if($users){ ?>
                                                        <li>
                                                            <i class="flaticon-user"></i>
                                                            <h6><?php esc_html_e('Capacity', 'kodesk'); ?></h6>
                                                            <span><?php echo wp_kses($users, true); ?></span>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="lower-box clearfix">
                                                        <div class="text"><?php echo wp_kses(get_post_meta( get_the_id(), 'price_package', true ), true); ?></div>
                                                        <div class="link"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><i class="fas fa-angle-right"></i><span><?php esc_html_e('Read More', 'kodesk'); ?></span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } $i++; endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
					wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <!-- banner-style-two end -->
        
        <?php
    }
}
