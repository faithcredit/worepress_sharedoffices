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
class Our_Centers_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kodesk_our_centers_v1';
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
		return esc_html__( 'Our Centers V1', 'kodesk' );
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
			'our_centers_v1',
			[
				'label' => esc_html__( 'Our Centers V1', 'kodesk' ),
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
              'location_tab', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
					'default' => 
						[
                			['block_title' => esc_html__('Office Space', 'kodesk')],
                			['block_title' => esc_html__('Private Space', 'kodesk')],
                			['block_title' => esc_html__('Open Space', 'kodesk')],
							['block_title' => esc_html__('Meeting Rooms', 'kodesk')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Button Title', 'kodesk'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Button Title', 'kodesk')
                			],
							[
								'name' => 'query_number',
								'label'   => esc_html__( 'Number of post', 'kodesk' ),
								'type'    => Controls_Manager::NUMBER,
								'default' => 3,
								'min'     => 1,
								'max'     => 100,
								'step'    => 1,
							],
							[
								'name' => 'query_orderby',
								'label'   => esc_html__( 'Order By', 'kodesk' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'date',
								'options' => array(
									'date'       => esc_html__( 'Date', 'kodesk' ),
									'title'      => esc_html__( 'Title', 'kodesk' ),
									'menu_order' => esc_html__( 'Menu Order', 'kodesk' ),
									'rand'       => esc_html__( 'Random', 'kodesk' ),
								),
							],
							[
								'name' => 'query_order',
								'label'   => esc_html__( 'Order', 'kodesk' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'ASC',
								'options' => array(
									'DESC' => esc_html__( 'DESC', 'kodesk' ),
									'ASC'  => esc_html__( 'ASC', 'kodesk' ),
								),
							],
							[
							  'name' => 'query_category',
							  'type' => Controls_Manager::SELECT,
							  'label' => esc_html__('Category', 'kodesk'),
							  'options' => get_categories_list('location_cat')
							],
						],
					'title_field' => '{{block_title}}',
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
		
		<!-- ourcenters-section -->
        <section class="ourcenters-section">
            <div class="project-tab">
                <div class="auto-container">
                    <div class="sec-title centred">
                        <h6><?php echo wp_kses($settings['subtitle'], true); ?></h6>
                        <h2><?php echo wp_kses($settings['title'], true); ?></h2>
                    </div>
                    <div class="tab-btn-box centred">
                        <div class="tab-btns product-tab-btns clearfix">
                            <div class="row clearfix">
                            	<?php $i=1; foreach($settings['location_tab'] as $key => $item):?>
                                <div class="col-lg-3 col-md-6 col-sm-12 btn-column">
                                    <div class="p-tab-btn <?php if($i == 1) echo 'active-btn'; ?>" data-tab="#tab-<?php echo esc_attr($i); ?>">
                                        <h5><?php echo wp_kses($item['block_title'], true); ?></h5>
                                    </div>
                                </div>
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="outer-container">
                    <div class="p-tabs-content">
                        <?php $j=1; foreach($settings['location_tab'] as $keys => $item):
						
							$paged = kodesk_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
							$this->add_render_attribute( 'wrapper', 'class', 'templatepath-kodesk' );
							$args = array(
								'post_type'      => 'location',
								'posts_per_page' => kodesk_set( $item, 'query_number' ),
								'orderby'        => kodesk_set( $item, 'query_orderby' ),
								'order'          => kodesk_set( $item, 'query_order' ),
								'paged'          => $paged
							);
							if ( kodesk_set( $item, 'query_exclude' ) ) {
								$item['query_exclude'] = explode( ',', $item['query_exclude'] );
								$args['post__not_in']      = kodesk_set( $item, 'query_exclude' );
							}
							if( kodesk_set( $item, 'query_category' ) ) $args['location_cat'] = kodesk_set( $item, 'query_category' );
							$query = new \WP_Query( $args );
						if ( $query->have_posts()):	
						?>
                        <div class="p-tab <?php if($j == 1) echo 'active-tab'; ?>" id="tab-<?php echo esc_attr($j); ?>">
                            <div class="three-item-carousel owl-carousel owl-theme owl-dots-none">
                                <?php while ( $query->have_posts() ) : $query->the_post();
		 						$term_list = wp_get_post_terms(get_the_id(), 'location_cat', array("fields" => "names")); ?>
                                <div class="center-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><?php the_post_thumbnail('kodesk_540x540'); ?></figure>
                                        <div class="content-box">
                                            <div class="icon-box"><i class="<?php echo esc_attr(get_post_meta( get_the_id(), 'location_icon', true )); ?>"></i></div>
                                            <h3><?php the_title(); ?></h3>
                                            <span><?php echo wp_kses(get_post_meta( get_the_id(), 'spaces', true ), true); ?></span>
                                            <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><i class="fas fa-angle-right"></i><?php esc_html_e('Book a Tour', 'kodesk'); ?></a>
                                        </div>
                                        <div class="text"><h2><?php esc_html_e('Read More', 'kodesk'); ?></h2></div>
                                    </div>
                                </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                        <?php $j++; endif; endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- ourcenters-section end -->
        
		<?php 
	}

}
