<?php
///----Blog widgets---
//Recent Posts
class Kodesk_Recent_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_Recent_Posts', /* Name */esc_html__('Kodesk Recent Posts','kodesk'), array( 'description' => esc_html__('Show the Recent Posts in blog sidebar.', 'kodesk' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget); ?>
		
		<div class="post-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="post-inner">
                <?php $query_string = 'posts_per_page='.$instance['number'];
                if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
                $this->posts($query_string); ?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Recent Posts', 'kodesk');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'kodesk'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'kodesk'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php global $post;
			while( $query->have_posts() ): $query->the_post(); ?>
			<div class="post">
                <figure class="post-thumb">
                    <?php the_post_thumbnail('kodesk_70x70'); ?>
                    <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="flaticon-link"></i></a>
                </figure>
                <span class="post-date"><?php echo get_the_date(); ?></span>
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Popular Gallery
class Kodesk_Popular_Gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_Popular_Gallery', /* Name */esc_html__('Kodesk Popular Gallery','strike'), array( 'description' => esc_html__('Show the Popular Gallery in blog sidebar', 'strike' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget); ?>
		
		<div class="instagram-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <ul class="image-list clearfix">
                <?php $args = array('post_type' => 'gallery', 'showposts'=>$instance['number']);
                if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'gallery_cat', 'field' => 'id','terms' => (array)$instance['cat']));
                $this->posts($args); ?>
            </ul>
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Popular Gallery';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'strike'); ?></label>
            <input placeholder="<?php esc_attr_e('Popular Gallery', 'strike');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'strike'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'strike'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'strike'), 'selected'=>$cat, 'taxonomy' => 'gallery_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php global $post; 
			while( $query->have_posts() ): $query->the_post(); ?>
            <li>
                <figure class="image">
                    <?php the_post_thumbnail('kodesk_80x80'); ?>
                    <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="flaticon-instagram"></i></a>
                </figure>
            </li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Subscribe Newsletter
class Kodesk_Subscribe_Us extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_Subscribe_Us', /* Name */esc_html__('Kodesk Subscribe Us','strike'), array( 'description' => esc_html__('Show the Subscribe Us in blog sidebar', 'strike' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
        <div class="subscribe-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="text">
                <p><?php echo wp_kses_post($instance['content']); ?></p>
            </div>
            <div class="subscribe-inner">
                <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" class="default-form">
                    <input type="hidden" id="uri8" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                    <div class="form-group">
                        <i class="far fa-envelope-open"></i>
                        <input type="email" name="email" placeholder="<?php esc_attr_e('Your Email...', 'strike'); ?>">
                    </div>
                    <div class="form-group message-btn">
                        <button type="submit" class="theme-btn btn-one"><span><?php esc_html_e('Subscribe', 'strike'); ?></span></button>
                    </div>
                </form>
            </div>
        </div>
        
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Subscribe Us', 'strike');
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '#';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'strike'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'strike'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'strike'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'strike');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
        
		<?php 
	}
	
}

///----Footer widgets---
//About Company V1
class Kodesk_About_Company_V1 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_About_Company_V1', /* Name */esc_html__('Kodesk About Company V1','kodesk'), array( 'description' => esc_html__('Show the About Company in footer v1.', 'kodesk' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget);?>

		<div class="logo-widget">
            <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['logo_image']); ?>" alt="<?php esc_attr('Logo', 'kodesk'); ?>" /></a></figure>
            <div class="text">
                <p><?php echo wp_kses_post($instance['content']); ?></p>
            </div>
            
            <?php if( $instance['show'] ): ?>
            <?php echo wp_kses_post(kodesk_get_social_icons2()); ?>
            <?php endif; ?>
        </div>
        
        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_image'] = strip_tags($new_instance['logo_image']);
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ($instance) ? esc_attr($instance['logo_image']) : get_template_directory_uri(). '/assets/images/logo-2.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image URL:', 'kodesk'); ?></label>
            <input placeholder="<?php esc_attr_e('Image URL', 'kodesk');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" type="text" value="<?php echo esc_attr($logo_image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'kodesk'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'kodesk'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>

		<?php
	}

}

//Popular Post
class Kodesk_Popular_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_Popular_Post', /* Name */esc_html__('Kodesk Popular Post','kodesk'), array( 'description' => esc_html__('Show the Popular Post in footer v1.', 'kodesk' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget); ?>
		
		<div class="post-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="post-inner">
                <?php $query_string = 'posts_per_page='.$instance['number'];
				if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
				$this->posts($query_string); ?>
            </div>
            
            <?php if ($instance['btn_link'] and $instance['btn_title']){ ?>
            <div class="link-btn">
                <a href="<?php echo esc_url($instance['btn_link']); ?>"><span><?php echo wp_kses_post($instance['btn_title']); ?></span></a>
            </div>
            <?php } ?>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Popular Post', 'kodesk');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		$btn_title = ( $instance ) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ( $instance ) ? esc_attr($instance['btn_link']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'kodesk'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'kodesk'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr( $btn_title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post();
			?>
			<div class="post">
                <figure class="post-thumb">
                    <?php the_post_thumbnail('kodesk_70x70'); ?>
                    <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="flaticon-link"></i></a>
                </figure>
                <span class="post-date"><?php echo get_the_date(); ?></span>
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php echo wp_trim_words( get_the_title(), 3, '...' ); ?></a></h5>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----Footer widgets v2---
//About Company V2
class Kodesk_About_Company_V2 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_About_Company_V2', /* Name */esc_html__('Kodesk About Company V2', 'kodesk'), array( 'description' => esc_html__('Show the About Company V2 in footer v2', 'kodesk' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
      		
			<div class="logo-widget">
                <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['logo_image']); ?>" alt="<?php esc_attr('Logo', 'kodesk'); ?>" /></a></figure>
                
                <?php if($instance['hq_title'] or $instance['hq_address']) { ?>
                <div class="single-info">
                    <h5><?php echo wp_kses_post($instance['hq_title']); ?></h5>
                    <p><?php echo wp_kses_post($instance['hq_address']); ?></p>
                </div>
                <?php } ?>
                
                <?php if($instance['contact_title'] or $instance['email_address'] or $instance['phone_number']) { ?>
                <div class="single-info">
                    <h5><?php echo wp_kses_post($instance['contact_title']); ?></h5>
                    <p><a href="mailto:<?php echo sanitize_email( $instance['email_address'] ); ?>"><?php echo sanitize_email( $instance['email_address'] ); ?></a><br /><a href="tel:<?php echo esc_attr(phone_number($instance['phone_number'])); ?>"><?php echo wp_kses( $instance['phone_number'], true ); ?></a></p>
                </div>
                <?php } ?>
                
                <?php if( $instance['show'] ): ?>
				<?php echo wp_kses_post(kodesk_get_social_icons2()); ?>
                <?php endif; ?>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_image'] = strip_tags($new_instance['logo_image']);
		$instance['hq_title'] = $new_instance['hq_title'];
		$instance['hq_address'] = $new_instance['hq_address'];
		$instance['contact_title'] = $new_instance['contact_title'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['phone_number'] = $new_instance['phone_number'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_image = ($instance) ? esc_attr($instance['logo_image']) : get_template_directory_uri(). '/assets/images/logo-4.png';
		$hq_title = ($instance) ? esc_attr($instance['hq_title']) : '';
		$hq_address = ($instance) ? esc_attr($instance['hq_address']) : '';
		$contact_title = ($instance) ? esc_attr($instance['contact_title']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$phone_number = ($instance) ? esc_attr($instance['phone_number']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image URL:', 'kodesk'); ?></label>
            <input placeholder="<?php esc_attr_e('Image URL', 'kodesk');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" type="text" value="<?php echo esc_attr($logo_image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hq_title')); ?>"><?php esc_html_e('Headquarters Title:', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('hq_title')); ?>" name="<?php echo esc_attr($this->get_field_name('hq_title')); ?>" type="text" value="<?php echo esc_attr($hq_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hq_address')); ?>"><?php esc_html_e('Headquarters Address:', 'kodesk'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('hq_address')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('hq_address')); ?>" value="<?php echo esc_attr($hq_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_title')); ?>"><?php esc_html_e('Contact Title:', 'kodesk'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('contact_title')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_title')); ?>" value="<?php echo esc_attr($contact_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_number')); ?>"><?php esc_html_e('Phone Number:', 'kodesk'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('phone_number')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_number')); ?>" value="<?php echo esc_attr($phone_number); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'kodesk'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
               
		<?php 
	}
}

//List Space
class Kodesk_List_Space extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_List_Space', /* Name */esc_html__('Kodesk List Space','kodesk'), array( 'description' => esc_html__('Show the List Space in footer v2.', 'kodesk' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget);?>

		<div class="list-widget">
            <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-19.png'); ?>);"></div>
            <div class="icon-box"><img src="<?php echo esc_url($instance['icon_image']); ?>" alt="<?php esc_attr('Icon', 'kodesk'); ?>"></div>
            <div class="text">
                <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                <p><?php echo wp_kses_post($instance['content']); ?></p>
            </div>
            
            <?php if ($instance['btn_link'] and $instance['btn_title']){ ?>
            <div class="link-btn">
                <a href="<?php echo esc_url($instance['btn_link']); ?>" class="theme-btn btn-one"><span><?php echo wp_kses_post($instance['btn_title']); ?></span></a>
            </div>
            <?php } ?>
        </div>
        
        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['icon_image'] = strip_tags($new_instance['icon_image']);
		$instance['title'] = $new_instance['title'];
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$icon_image = ($instance) ? esc_attr($instance['icon_image']) : get_template_directory_uri(). '/assets/images/icons/icon-40.png';
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon_image')); ?>"><?php esc_html_e('Icon Image URL:', 'kodesk'); ?></label>
            <input placeholder="<?php esc_attr_e('Icon Image URL', 'kodesk');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('icon_image')); ?>" name="<?php echo esc_attr($this->get_field_name('icon_image')); ?>" type="text" value="<?php echo esc_attr($icon_image); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'kodesk'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr( $btn_title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
        </p>

		<?php
	}
}

///----Workspaces widgets v2---
//Advance Search
class Kodesk_Advance_Search extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Kodesk_Advance_Search', /* Name */esc_html__('Kodesk Advance Search','kodesk'), array( 'description' => esc_html__('Show the Advance Search in workspaces sidebar.', 'kodesk' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses_post($before_widget);?>

		<div class="search-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
            <div class="text">
                <p><?php echo wp_kses_post($instance['content']); ?></p>
            </div>
            <?php if(!empty( $instance['embed_form'] )):?>
                <div class="default-form">
                	<?php echo do_shortcode( $instance['embed_form'] );?>
                </div>
            <?php endif;?>
        </div>
        
        <?php

		echo wp_kses_post($after_widget);
	}


	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['content'] = $new_instance['content'];
		$instance['embed_form'] = $new_instance['embed_form'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Looking For?', 'kodesk');
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$embed_form = ($instance) ? esc_attr($instance['embed_form']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'kodesk'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'kodesk'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('embed_form')); ?>"><?php esc_html_e('Contact Form 7 Embed Shortcode', 'kodesk'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('embed_form')); ?>" name="<?php echo esc_attr($this->get_field_name('embed_form')); ?>" ><?php echo wp_kses_post($embed_form); ?></textarea>
        </p>

		<?php
	}
}
