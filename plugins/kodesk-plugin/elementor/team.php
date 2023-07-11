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
class Team extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_team';
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
        return esc_html__( 'Team', 'kodesk' );
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
            'team',
            [
                'label' => esc_html__( 'Team', 'kodesk' ),
            ]
        );
		$this->add_control(
            'style',
            [
                'label'   => esc_html__('Top Extra Space', 'kodesk'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => array(
                    'no' => esc_html__('No', 'kodesk'),
                    'yes' => esc_html__('Yes', 'kodesk'),
                ),
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
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'kodesk' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
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
                'options' => get_categories_list('team_cat')
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
            'post_type'      => 'team',
            'posts_per_page' => kodesk_set( $settings, 'query_number' ),
            'orderby'        => kodesk_set( $settings, 'query_orderby' ),
            'order'          => kodesk_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( kodesk_set( $settings, 'query_category' ) ) $args['team_cat'] = kodesk_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- team-section -->
        <section class="team-section <?php if ($settings['style'] == 'yes') echo 'about-page'; ?>">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6><?php echo wp_kses( $settings['subtitle'], true ); ?></h6>
                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                </div>
                <div class="row clearfix">
                    <?php while($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><?php the_post_thumbnail('kodesk_370x520'); ?></figure>
                                <div class="content-box">
                                    <div class="text">
                                        <h2><?php the_title(); ?></h2>
                                        <span class="designation">- <?php echo wp_kses(get_post_meta( get_the_id(), 'designation', true ), true); ?></span>
                                    </div>
                                    <div class="lower-content clearfix">
                                    	<?php $signature = get_post_meta( get_the_id(), 'signature', true ); ?>
                                        <figure class="signature pull-left"><img src="<?php echo esc_url(wp_get_attachment_url($signature['id'])); ?>" alt="<?php esc_attr_e('Signature', 'kodesk'); ?>"></figure>
                                        <ul class="list pull-right">
                                        	<?php $icons = get_post_meta( get_the_id(), 'social_profile', true );
												if ( ! empty( $icons ) ) :
											?>
                                            <li class="share-option">
                                                <a href="javascript:;" class="share-icon"><i class="fas fa-share-alt"></i></a>
                                                <ul class="share-links clearfix">
                                                	<?php foreach ( $icons as $h_icon ) :
													$header_social_icons = json_decode( urldecode( kodesk_set( $h_icon, 'data' ) ) );
													if ( kodesk_set( $header_social_icons, 'enable' ) == '' ) {
														continue;
													}
													$icon_class = explode( '-', kodesk_set( $header_social_icons, 'icon' ) ); ?>
													<li><a href="<?php echo kodesk_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo kodesk_set( $header_social_icons, 'background' ); ?>; color: <?php echo kodesk_set( $header_social_icons, 'color' ); ?>" target="_blank"><i class="fab <?php echo esc_attr( kodesk_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
													<?php endforeach; ?>
                                                </ul>
                                            </li>
                                            <?php endif; ?>
                                            <?php if (get_post_meta( get_the_id(), 'phone_number', true )){ ?>
                                            <li><a href="tel:<?php echo esc_attr(phone_number(get_post_meta( get_the_id(), 'phone_number', true ))); ?>"><i class="fas fa-phone"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- team-section end -->
        
        <?php }

        wp_reset_postdata();
    }
}
