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
class Events_V1 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kodesk_events_v1';
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
		return esc_html__( 'Events V1', 'kodesk' );
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
			'events_v1',
			[
				'label' => esc_html__( 'Events V1', 'kodesk' ),
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
		$this->add_control(
              'event_tab', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
					'default' => 
						[
                			['block_title' => esc_html__('Employee Activities', 'kodesk')],
                			['block_title' => esc_html__('Launch Parties', 'kodesk')],
							['block_title' => esc_html__('Skill-Share Hours', 'kodesk')],
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
								'default' => 4,
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
							  'options' => get_categories_list('tribe_events_cat')
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
		
		<!-- events-section -->
        <section class="events-section">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-14.png'); ?>);"></div>
                <div class="pattern-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-14.png'); ?>);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6><?php echo wp_kses($settings['subtitle'], true); ?></h6>
                    <h2><?php echo wp_kses($settings['title'], true); ?></h2>
                </div>
                <div class="inner-content tabs-box">
                    <div class="upper-box clearfix centred">
                        <ul class="tab-btns list tab-buttons clearfix p_relative d_iblock">
                        	<?php $i=1; foreach($settings['event_tab'] as $key => $item):?>
							<li class="tab-btn <?php if($i == 1) echo 'active-btn'; ?>" data-tab="#tab-<?php echo esc_attr($i); ?>"><?php if($i==1){ ?><i class="flaticon-menu"></i><?php } ?> <?php echo wp_kses($item['block_title'], true); ?></li>
							<?php $i++; endforeach; ?>
                        </ul>
                        
                        <?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                        <div class="link"><a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><span><?php echo wp_kses( $settings['btn_title'], true ); ?></span></a></div>
                        <?php } ?>
                    </div>
                    <div class="tabs-content">
                    	<?php $j=1; foreach($settings['event_tab'] as $keys => $item):
							$paged = kodesk_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
							$this->add_render_attribute( 'wrapper', 'class', 'templatepath-kodesk' );
							$args = array(
								'post_type'      => 'tribe_events',
								'posts_per_page' => kodesk_set( $item, 'query_number' ),
								'orderby'        => kodesk_set( $item, 'query_orderby' ),
								'order'          => kodesk_set( $item, 'query_order' ),
								'paged'          => $paged
							);
							if ( kodesk_set( $item, 'query_exclude' ) ) {
								$item['query_exclude'] = explode( ',', $item['query_exclude'] );
								$args['post__not_in']      = kodesk_set( $item, 'query_exclude' );
							}
							if( kodesk_set( $item, 'query_category' ) ) $args['tribe_events_cat'] = kodesk_set( $item, 'query_category' );
							$query = new \WP_Query( $args );
						if ( $query->have_posts()):	
						?>
                        <div class="tab <?php if($j == 1) echo 'active-tab'; ?>" id="tab-<?php echo esc_attr($j); ?>">
                            <div class="table-outer">
                                <table class="events-table">
                                    <tbody>
                                        <?php global $post; $count = 0; $i = 1;
										while ( $query->have_posts() ) : $query->the_post();
										$term_list = wp_get_post_terms(get_the_id(), 'tribe_events_cat', array("fields" => "names")); ?>
                                        <tr>
                                            <td>
                                                <div class="date-box">
                                                    <h3><?php echo get_the_date('jS'); ?></h3>
                                                    <span><?php echo get_the_date('F, Y'); ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="topic-box">
                                                    <h5><?php esc_html_e('Topic:', 'kodesk'); ?></h5>
                                                    <h4><?php the_title(); ?></h4>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="venue-box">
                                                    <span><?php esc_html_e('Venue:', 'kodesk'); ?></span>
                                                    <h5><?php echo tribe_get_venue( $post->ID ); ?></h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="link">
                                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $count++; $i++; endwhile;?>
                                    </tbody>    
                                </table>
                            </div>
                        </div>
                        <?php $j++; endif; endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- events-section end -->
        
		<?php 
	}

}
