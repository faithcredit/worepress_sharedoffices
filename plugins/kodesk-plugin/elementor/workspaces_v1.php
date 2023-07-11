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
class Workspaces_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_workspaces_v1';
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
        return esc_html__( 'Workspaces V1', 'kodesk' );
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
            'workspaces_v1',
            [
                'label' => esc_html__( 'Workspaces V1', 'kodesk' ),
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'kodesk' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 4,
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
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- workspace-section -->
        <section class="workspace-section">
            <div class="outer-container">
                <div class="row clearfix">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="inner-box">
                            	<?php $icon_image = get_post_meta( get_the_id(), 'icon_image', true ); ?>
                                <div class="icon-box"><img src="<?php echo esc_url(wp_get_attachment_url($icon_image['id']));?>" alt="<?php esc_attr_e('Icon Image', 'kodesk'); ?>"></div>
                                <div class="inner">
                                    <span><?php echo wp_kses(get_post_meta( get_the_id(), 'price_package', true ), true); ?></span>
                                    <h3><?php the_title(); ?></h3>
                                    <div class="user"><i class="far fa-user"></i><?php echo wp_kses(get_post_meta( get_the_id(), 'users', true ), true); ?></div>
                                    <div class="link"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><i class="fas fa-angle-right"></i><span><?php esc_html_e('Read More', 'kodesk'); ?></span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- workspace-section end -->
        
        <?php }

        wp_reset_postdata();
    }
}