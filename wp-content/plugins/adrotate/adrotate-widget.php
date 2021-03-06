<?php
/* ------------------------------------------------------------------------------------
*  COPYRIGHT AND TRADEMARK NOTICE
*  Copyright 2008-2015 AJdG Solutions (Arnan de Gans). All Rights Reserved.
*  ADROTATE is a trademark of Arnan de Gans.

*  COPYRIGHT NOTICES AND ALL THE COMMENTS SHOULD REMAIN INTACT.
*  By using this code you agree to indemnify Arnan de Gans from any
*  liability that might arise from it's use.
------------------------------------------------------------------------------------ */

/*-------------------------------------------------------------
 Name:      adrotate_widget

 Purpose:   Unlimited widgets for the sidebar
 Receive:   -none-
 Return:    -none-
 Since:		0.8
-------------------------------------------------------------*/
class adrotate_widgets extends WP_Widget {

	/*-------------------------------------------------------------
	 Purpose:   Construct the widget
	-------------------------------------------------------------*/
	function adrotate_widgets() {

        parent::WP_Widget(false, 'AdRotate', array('description' => "Show unlimited ads in the sidebar."));	

	}

	/*-------------------------------------------------------------
	 Purpose:   Display the widget
	-------------------------------------------------------------*/
	function widget($args, $instance) {
		global $adrotate_config, $blog_id;

		extract($args);
        $title = apply_filters('widget_title', $instance['title']);
		if(empty($instance['adid'])) $instance['adid'] = 0;
		if(empty($instance['siteid'])) $instance['siteid'] = $blog_id;

		echo $before_widget;
		if($title) {
			echo $before_title . $title . $after_title;
		}
		
		if($adrotate_config['widgetalign'] == 'Y') echo '<ul><li>';
		if($adrotate_config['w3caching'] == 'Y') echo '<!-- mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
		
		if($instance['type'] == "single") {
			if($adrotate_config['supercache'] == "Y") echo '<!--mfunc echo adrotate_ad('.$instance['adid'].', true, 0, 0, '.$instance['siteid'].') -->';
			echo adrotate_ad($instance['adid'], true, 0, 0, 0);
			if($adrotate_config['supercache'] == "Y") echo '<!--/mfunc-->';
		}

		if($instance['type'] == "group") {
			if($adrotate_config['supercache'] == "Y") echo '<!--mfunc echo adrotate_group('.$instance['adid'].', 0, 0, '.$instance['siteid'].') -->';
			echo adrotate_group($instance['adid'], 0, 0, 0);
			if($adrotate_config['supercache'] == "Y") echo '<!--/mfunc-->';
		}
		
		if($adrotate_config['w3caching'] == 'Y') echo '<!-- /mfunc -->';
		if($adrotate_config['widgetalign'] == 'Y') echo '</li></ul>';
		
		echo $after_widget;

	}

	/*-------------------------------------------------------------
	 Purpose:   Save the widget options per instance
	-------------------------------------------------------------*/
	function update($new_instance, $old_instance) {
		$new_instance['title'] = strip_tags($new_instance['title']);
		$new_instance['description'] = strip_tags($new_instance['description']);
		$new_instance['type'] = strip_tags($new_instance['type']);
		
		//Try and preserve pre-fix widget IDs
		if(isset($new_instance['id']) and $new_instance['adid'] < 1) {
			$new_instance['adid'] = $new_instance['id'];
		} else {
			$new_instance['adid'] = strip_tags($new_instance['adid']);
		}
		$new_instance['siteid'] = strip_tags($new_instance['siteid']);

		$instance = wp_parse_args($new_instance, $old_instance);

		return $instance;

	}

	/*-------------------------------------------------------------
	 Purpose:   Display the widget options for admins
	-------------------------------------------------------------*/
	function form($instance) {
		global $blog_id;

		$defaults = array();
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$title = $description = $type = $adid = '';
		extract($instance);
		$title = esc_attr( $title );
		$description = esc_attr( $description );
		$type = esc_attr( $type );

		//Try and preserve pre-fix widget IDs
		if(isset($id) and $adid < 1) {
			$adid = esc_attr( $id );
		} else {
			$adid = esc_attr( $adid );
		}
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title (optional):', 'adrotate' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			<br />
			<small><?php _e( 'HTML will be stripped out.', 'adrotate' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Description (optional):', 'adrotate' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php echo $description; ?>" />
			<br />
			<small><?php _e( 'What is this widget used for? (Not parsed, HTML will be stripped out.)', 'adrotate' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>"><?php _e( 'Type:', 'adrotate' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" class="postform">
			    <option value="single" <?php if($type == "single") { echo 'selected'; } ?>><?php _e( 'Single Ad - Use Ad ID', 'adrotate' ); ?></option>
		        <option value="group" <?php if($type == "group") { echo 'selected'; } ?>><?php _e( 'Group of Ads - Use group ID', 'adrotate' ); ?></option>
			</select>
			<br />
			<small><?php _e( 'Choose what you want to use this widget for', 'adrotate' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('adid'); ?>"><?php _e( 'ID:', 'adrotate' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('adid'); ?>" name="<?php echo $this->get_field_name('adid'); ?>" type="text" value="<?php echo $adid; ?>" />
			<br />
			<small><?php _e( 'Fill in the ID of the type you want to display!', 'adrotate' ); ?></small>
		</p>
		<input id="<?php echo $this->get_field_id('siteid'); ?>" name="<?php echo $this->get_field_name('siteid'); ?>" type="hidden" value="<?php echo $blog_id; ?>" />
<?php
	}

}
?>