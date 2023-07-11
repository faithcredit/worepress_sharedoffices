<?php get_header();
$data = \KODESK\Includes\Classes\Common::instance()->data('single-gallery')->get(); ?>

<!-- Page Title -->
<section class="page-title centred">
    <div class="outer-container" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <div class="title">
                    <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <?php echo kodesk_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->

<?php while (have_posts()) : the_post(); ?>

<!-- project-details -->
<section class="project-details">
    <div class="auto-container">
        <div class="project-details-content">
            <div class="upper-image">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    	<?php $left_image = get_post_meta( get_the_id(), 'left_image', true ); ?>
                        <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($left_image['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'kodesk'); ?>"></figure>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    	<?php $right_image = get_post_meta( get_the_id(), 'right_image', true ); ?>
                        <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($right_image['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'kodesk'); ?>"></figure>
                    </div>
                </div>
            </div>
            <div class="project-info">
                <ul class="list clearfix">
                	<?php if (get_post_meta( get_the_id(), 'client', true )){ ?>
                    <li>
                        <div class="icon-box"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/icon-52.png'); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                        <h6><?php esc_html_e('Client', 'kodesk'); ?></h6>
                        <p><?php echo wp_kses(get_post_meta( get_the_id(), 'client', true ), true); ?></p>
                    </li>
                    <?php } ?>
                    
                    <?php if (get_post_meta( get_the_id(), 'date', true )){ ?>
                    <li>
                        <div class="icon-box"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/icon-53.png'); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                        <h6><?php esc_html_e('Date', 'kodesk'); ?></h6>
                        <p><?php echo wp_kses(get_post_meta( get_the_id(), 'date', true ), true); ?></p>
                    </li>
                    <?php } ?>
                    
                    <?php if (get_post_meta( get_the_id(), 'category', true )){ ?>
                    <li>
                        <div class="icon-box"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/icon-54.png'); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                        <h6><?php esc_html_e('Category', 'kodesk'); ?></h6>
                        <p><?php echo wp_kses(get_post_meta( get_the_id(), 'category', true ), true); ?></p>
                    </li>
                    <?php } ?>
                    
                    <?php if (get_post_meta( get_the_id(), 'location', true )){ ?>
                    <li>
                        <div class="icon-box"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/icon-55.png'); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                        <h6><?php esc_html_e('Location', 'kodesk'); ?></h6>
                        <p><?php echo wp_kses(get_post_meta( get_the_id(), 'location', true ), true); ?></p>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="text">
                <?php the_content(); ?>
            </div>
            
            <?php global $post;
			$prev_post = get_previous_post();
			$next_post = get_next_post();
			if($prev_post or $next_post){ ?>
            <div class="nav-btn">
            	<?php if($prev_post and $next_post){ ?>
                <div class="nav-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/icons/menu-icon.png'); ?>" alt="<?php esc_attr_e('Icon', 'kodesk'); ?>"></div>
                <?php } ?>
                
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-6 col-sm-12 btn-column">
                		<?php if (!empty($prev_post)): ?>
                        <div class="single-btn-box prev-btn">
                            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="fas fa-angle-left"></i><i class="light-icon fas fa-angle-left"></i><span><?php esc_html_e( 'Prev', 'kodesk' ); ?></span></a>
                            <h5><?php echo wp_kses(kodesk_trim( get_the_title($prev_post->ID), 5 ), true); ?></h5>
                        </div>
                    	<?php endif; ?>
                    </div>
                                
                    <div class="col-lg-5 col-md-6 col-sm-12 btn-column offset-lg-2">
						<?php if (!empty($next_post)): ?>
                        <div class="single-btn-box next-btn text-right">
                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><span><?php esc_html_e( 'Next', 'kodesk' ); ?></span><i class="light-icon fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a>
                            <h5><?php echo wp_kses(kodesk_trim( get_the_title($next_post->ID), 5 ), true); ?></h5>
                        </div>
                    	<?php endif; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <?php $customTaxonomyTerms = wp_get_object_terms( $post->ID, 'gallery_cat', array('fields' => 'ids') );
			$args = array(
				'post_type' => 'gallery',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'gallery_cat',
						'field' => 'id',
						'terms' => $customTaxonomyTerms
					)
				),
				'post__not_in' => array ($post->ID),
			);
			
			//the query
			$relatedPosts = new WP_Query( $args );
			
			//loop through query
			if($relatedPosts->have_posts()){ ?>
			<div class="related-project">
                <div class="title-text">
                    <h2><?php esc_html_e('Related Projects', 'kodesk'); ?></h2>
                </div>
                <div class="row clearfix">
					<?php while($relatedPosts->have_posts()){
                    $relatedPosts->the_post(); ?>
                	<div class="col-lg-4 col-md-6 col-sm-12 project-block">
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
                	<?php } ?>
				</div>
            </div>
			<?php }
			wp_reset_postdata(); ?>
            
        </div>
    </div>
</section>
<!-- project-details end -->

<?php endwhile; ?>

<?php get_footer(); ?>