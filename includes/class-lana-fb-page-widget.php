<?php

/**
 * Class Lana_Fb_Page_Widget
 */
class Lana_Fb_Page_Widget extends WP_Widget{

	/**
	 * Lana Facebook Page Widget
	 * constructor
	 */
	public function __construct() {

		$widget_title       = __( 'Lana - Facebook Page', 'lana-facebook-page' );
		$widget_description = __( 'Facebook page plugin.', 'lana-facebook-page' );
		$widget_options     = array( 'description' => $widget_description );

		parent::__construct( 'lana_fb_page', $widget_title, $widget_options );
	}

	/**
	 * Output Widget HTML
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		/**
		 * Output
		 * Widget
		 */
		echo lana_fb_page_shortcode( $instance );
	}

	/**
	 * Output Widget Form
	 *
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array(
			'href'                  => '',
			'width'                 => 340,
			'height'                => 130,
			'tabs'                  => '',
			'hide_cover'            => 'false',
			'show_facepile'         => 'false',
			'small_header'          => 'false',
			'adapt_container_width' => 'true'
		) );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'href' ); ?>">
				<?php _e( 'Facebook Page URL:', 'lana-facebook-page' ); ?>
            </label>
            <input type="url" name="<?php echo $this->get_field_name( 'href' ); ?>"
                   id="<?php echo $this->get_field_id( 'href' ); ?>" class="widefat"
                   value="<?php echo esc_attr( $instance['href'] ); ?>"
                   placeholder="<?php esc_attr_e( 'The URL of the Facebook Page', 'lana-facebook-page' ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>">
				<?php _e( 'Adapt to plugin container width:', 'lana-facebook-page' ); ?>
            </label>
            <select name="<?php echo $this->get_field_name( 'adapt_container_width' ); ?>"
                    id="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>" class="widefat">
                <option value="false" <?php selected( $instance['adapt_container_width'], 'false' ); ?>>
					<?php _e( 'False', 'lana-facebook-page' ); ?>
                </option>
                <option value="true" <?php selected( $instance['adapt_container_width'], 'true' ); ?>>
					<?php _e( 'True', 'lana-facebook-page' ); ?>
                </option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'width' ); ?>">
				<?php _e( 'Width:', 'lana-facebook-page' ); ?>
            </label>
            <input type="number" name="<?php echo $this->get_field_name( 'width' ); ?>"
                   id="<?php echo $this->get_field_id( 'width' ); ?>" class="widefat"
                   value="<?php echo esc_attr( $instance['width'] ); ?>"
                   placeholder="<?php esc_attr_e( 'The pixel width of the embed (Min. 180 to Max. 500)', 'lana-facebook-page' ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>">
				<?php _e( 'Height:', 'lana-facebook-page' ); ?>
            </label>
            <input type="number" name="<?php echo $this->get_field_name( 'height' ); ?>"
                   id="<?php echo $this->get_field_id( 'height' ); ?>" class="widefat"
                   value="<?php echo esc_attr( $instance['height'] ); ?>"
                   placeholder="<?php esc_attr_e( 'The pixel height of the embed (Min. 70)', 'lana-facebook-page' ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'tabs' ); ?>">
				<?php _e( 'Tabs:', 'lana-facebook-page' ); ?>
            </label>
            <select name="<?php echo $this->get_field_name( 'tabs' ); ?>"
                    id="<?php echo $this->get_field_id( 'tabs' ); ?>" class="widefat">
                <option value="" <?php selected( $instance['tabs'], '' ); ?>>
					<?php _e( 'None', 'lana-facebook-page' ); ?>
                </option>
                <option value="timeline" <?php selected( $instance['tabs'], 'timeline' ); ?>>
					<?php _e( 'Timeline', 'lana-facebook-page' ); ?>
                </option>
                <option value="events" <?php selected( $instance['tabs'], 'events' ); ?>>
					<?php _e( 'Events', 'lana-facebook-page' ); ?>
                </option>
                <option value="messages" <?php selected( $instance['tabs'], 'messages' ); ?>>
					<?php _e( 'Messages', 'lana-facebook-page' ); ?>
                </option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'hide_cover' ); ?>">
				<?php _e( 'Hide Cover Photo:', 'lana-facebook-page' ); ?>
            </label>
            <select name="<?php echo $this->get_field_name( 'hide_cover' ); ?>"
                    id="<?php echo $this->get_field_id( 'hide_cover' ); ?>" class="widefat">
                <option value="false" <?php selected( $instance['hide_cover'], 'false' ); ?>>
					<?php _e( 'False', 'lana-facebook-page' ); ?>
                </option>
                <option value="true" <?php selected( $instance['hide_cover'], 'true' ); ?>>
					<?php _e( 'True', 'lana-facebook-page' ); ?>
                </option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'show_facepile' ); ?>">
				<?php _e( 'Show Friend\'s Faces:', 'lana-facebook-page' ); ?>
            </label>
            <select name="<?php echo $this->get_field_name( 'show_facepile' ); ?>"
                    id="<?php echo $this->get_field_id( 'show_facepile' ); ?>" class="widefat">
                <option value="false" <?php selected( $instance['show_facepile'], 'false' ); ?>>
					<?php _e( 'False', 'lana-facebook-page' ); ?>
                </option>
                <option value="true" <?php selected( $instance['show_facepile'], 'true' ); ?>>
					<?php _e( 'True', 'lana-facebook-page' ); ?>
                </option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'small_header' ); ?>">
				<?php _e( 'Use Small Header:', 'lana-facebook-page' ); ?>
            </label>
            <select name="<?php echo $this->get_field_name( 'small_header' ); ?>"
                    id="<?php echo $this->get_field_id( 'small_header' ); ?>" class="widefat">
                <option value="false" <?php selected( $instance['small_header'], 'false' ); ?>>
					<?php _e( 'False', 'lana-facebook-page' ); ?>
                </option>
                <option value="true" <?php selected( $instance['small_header'], 'true' ); ?>>
					<?php _e( 'True', 'lana-facebook-page' ); ?>
                </option>
            </select>
        </p>
		<?php
	}

	/**
	 * Update Widget Data
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array|mixed
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['href']                  = esc_url_raw( $new_instance['href'] );
		$instance['width']                 = absint( $new_instance['width'] );
		$instance['height']                = absint( $new_instance['height'] );
		$instance['tabs']                  = sanitize_text_field( $new_instance['tabs'] );
		$instance['hide_cover']            = sanitize_text_field( $new_instance['hide_cover'] );
		$instance['show_facepile']         = sanitize_text_field( $new_instance['show_facepile'] );
		$instance['small_header']          = sanitize_text_field( $new_instance['small_header'] );
		$instance['adapt_container_width'] = sanitize_text_field( $new_instance['adapt_container_width'] );

		return apply_filters( 'lana_fb_page_widget_update', $instance, $this );
	}
}