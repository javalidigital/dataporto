<?php
/*
Plugin Name: Pesquisar Relatórios
Plugin URI: http://dataporto.com
Description: Custom search form for Dataporto Portal.
Version: 1.0
Author: Javali Digital
Author URI: http://javalidigital.com.br
License: MIT
*/
?>

<?php class search_dataporto_reports extends WP_Widget {

	// constructor
	function search_dataporto_reports() {
		parent::WP_Widget(false, $name = __('Pesquisar Relat&oacute;rios', 'wp_widget_plugin') );
	}

	// widget form creation
	function form($instance) {
		// Check values
		if( $instance) {
		     $title_reports = esc_attr($instance['title_reports']);
		} else {
		     $title_reports = '';
		}
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id('title_reports'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title_reports'); ?>" name="<?php echo $this->get_field_name('title_reports'); ?>" type="text" value="<?php echo $title_reports; ?>" />
		</p>	
	
	<?php }

	// widget update
	function update($new_instance, $old_instance) {
	      $instance = $old_instance;
	      // Fields
	      $instance['title_reports'] = strip_tags($new_instance['title_reports']);      
	     return $instance;
	}	
	
	
	// widget display	
	function widget($args, $instance) {
	   extract( $args );
	   // these are the widget options
	   $title_reports = apply_filters('widget_title', $instance['title_reports']);
	   echo $before_widget;
	   // Display the widget
	   echo '<div class="widget-text wp_widget_plugin_box">';
	
	   // Check if title is set
	   if ( $title_reports ) {
	      echo $before_title . $title_reports . $after_title;
	   }?>
	   <div class="widget_search">
			<form role="search" method="get" class="search-form" action="<?php echo get_permalink( 208 ); ?>">
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
add_action('widgets_init', create_function('', 'return register_widget("search_dataporto_reports");'));
?>