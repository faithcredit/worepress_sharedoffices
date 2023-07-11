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
class Gallery_3_Column extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'kodesk_gallery_3_column';
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
        return esc_html__('Gallery 3 Column', 'kodesk');
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
     * @since  3.0.0
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
            'gallery_3_column',
            [
                'label' => esc_html__('Gallery 3 Column', 'kodesk'),
            ]
        );
        $this->add_control(
            'number',
            [
                'label'   => esc_html__('Number of post', 'kodesk'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 9,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__('Order', 'kodesk'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__('DESC', 'kodesk'),
                    'ASC'  => esc_html__('ASC', 'kodesk'),
                ),
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__('Order By', 'kodesk'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__('Date', 'kodesk'),
                    'title'      => esc_html__('Title', 'kodesk'),
                    'menu_order' => esc_html__('Menu Order', 'kodesk'),
                    'rand'       => esc_html__('Random', 'kodesk'),
                ),
            ]
        );
		$this->add_control(
            'cat_include',
            [
                'label'       => esc_html__( 'Category Include IDs', 'kodesk' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'Include categories, etc. by ID with comma separated.', 'kodesk' ),
            ]
        );
		$this->add_control(
            'cat_operator',
            [
                'label' => esc_html__('Category Operator', 'kodesk'),
                'type' => Controls_Manager::SELECT,
                'default' => 'IN',
                'options' => array(
					'IN' => esc_html__('IN', 'kodesk'),
					'NOT IN' => esc_html__('NOT IN', 'kodesk'),
				),
                'condition' => [
                    'cat_include!' => ''
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

        $paged = get_query_var('paged');
        $paged = kodesk_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

        $this->add_render_attribute('wrapper', 'class', 'templatepath-kodesk');
        $args = array(
            'post_type'      => 'gallery',
            'posts_per_page' => kodesk_set($settings, 'number'),
            'orderby'        => kodesk_set($settings, 'query_orderby'),
            'order'          => kodesk_set($settings, 'query_order'),
            'paged'          => $paged
        );
		
		//Terms
		$cat_operator = kodesk_set( $settings, 'cat_operator' );
        $terms_array = explode(",", kodesk_set( $settings, 'cat_include' ));
        if(kodesk_set( $settings, 'cat_include' ))
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'gallery_cat',
					'field' => 'id',
					'terms' => $terms_array,
					'operator' => $cat_operator
				)
			);
		
        $allowed_tags = wp_kses_allowed_html('post');
        $query = new \WP_Query($args);
        $t = '';
        $data_filtration = '';
        $data_posts = '';
        if($query->have_posts())
        {
            ob_start(); ?>

            <?php $count = 0;
            $fliteration = array();
            while($query->have_posts() ): $query->the_post();
                global $post;
                $meta = '';
                $meta1 = '';
                $post_terms = get_the_terms( get_the_id(), 'gallery_cat');
                foreach( (array)$post_terms as $pos_term )
					$fliteration[$pos_term->term_id] = $pos_term;
					$temp_category = get_the_term_list(get_the_id(), 'gallery_cat', '', ', ');

					$post_terms = wp_get_post_terms( get_the_id(), 'gallery_cat');
					$term_slug = '';
					if($post_terms)
						foreach($post_terms as $p_term)
							$term_slug .= $p_term->slug.' ';
							$post_thumbnail_id = get_post_thumbnail_id($post->ID);
							$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
							$term_list = wp_get_post_terms(get_the_id(), 'gallery_cat', array("fields" => "names")); ?>
                			
                            <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all <?php echo esc_attr($term_slug); ?>">
                                <div class="project-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><?php the_post_thumbnail('kodesk_370x280'); ?></figure>
                                        <div class="content-box">
                                            <div class="text">
                                                <h3><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                                            </div>
                                            <div class="link"><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>"><i class="fas fa-angle-double-right"></i><?php esc_html_e('Details', 'kodesk'); ?></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
			<?php endwhile; ?>

			<?php wp_reset_postdata();
			$data_posts = ob_get_contents();
			ob_end_clean();
			ob_start(); ?>

			<!-- project-style-two -->
            <section class="project-style-three">
                <div class="auto-container">
                    <div class="sortable-masonry">
                        <div class="filters">
                            <ul class="filter-tabs filter-btns clearfix centred">
                                <li class="active filter" data-role="button" data-filter=".all"><?php esc_html_e('View All', 'kodesk'); ?></li>
                                <?php foreach($fliteration as $t): ?>
                                <li class="filter" data-role="button" data-filter=".<?php echo esc_attr(kodesk_set($t, 'slug')); ?>"><?php echo wp_kses(kodesk_set($t, 'name'), true); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="items-container row clearfix">
                            <?php echo wp_kses($data_posts, true); ?>
                        </div>
                    </div>
                    
                    <!--Pagination-->
                    <div class="pagination-wrapper centred">
                    	<?php kodesk_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i>', 'prev_text' => '<i class="fas fa-angle-left"></i><i class="fas fa-angle-left"></i>')); ?>
                    </div>
                </div>
            </section>
            <!-- project-style-two end -->
        
        <?php }
    }

}
