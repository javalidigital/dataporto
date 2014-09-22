<?php
/*
Plugin Name: Pesquisar Notícias
Plugin URI: http://dataporto.com
Description: Custom search form for Dataporto Portal.
Version: 1.0
Author: Javali Digital
Author URI: http://javalidigital.com.br
License: MIT
*/

class search_dataporto_news extends WP_Widget {

	// constructor
	function search_dataporto_news() {
		parent::WP_Widget(false, $name = __('Pesquisar Not&iacute;cias', 'wp_widget_plugin') );
	}

	// widget form creation
	function form($instance) {
		// Check values
		if( $instance) {
		     $title = esc_attr($instance['title']);
		} else {
		     $title = '';
		}
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>	
	
	<?php }

	// widget update
	function update($new_instance, $old_instance) {
	      $instance = $old_instance;
	      // Fields
	      $instance['title'] = strip_tags($new_instance['title']);      
	     return $instance;
	}	
	
	
	// widget display	
	function widget($args, $instance) {
	   extract( $args );
	   // these are the widget options
	   $title = apply_filters('widget_title', $instance['title']);
	   echo $before_widget;
	   // Display the widget
	   echo '<div class="widget-text wp_widget_plugin_box">';
	
	   // Check if title is set
	   if ( $title ) {
	      echo $before_title . $title . $after_title;
	   }?>
	   <div class="widget_search">
			<form role="search" method="get" class="search-form" action="<?php echo get_permalink( 163 ); ?>">
				<label>
					<span class="screen-reader-text">Pesquisar</span>
					<input type="search" class="search-field" placeholder="Palavra-chave" value="" name="swpquery" title="Palavra-chave">
				</label>
				<input type="submit" class="search-submit" value="Pesquisar">
			</form>
		</div>
	<?php {
	   echo '</div>';
	   echo $after_widget;
	}
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("search_dataporto_news");'));
?>