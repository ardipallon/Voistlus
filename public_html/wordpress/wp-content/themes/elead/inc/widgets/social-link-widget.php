<?php
/**
 * Social Media Widget
 *
 * @package Theme Palace
 * @subpackage Elead
 * @since Elead 0.1
 */

if ( ! class_exists( 'elead_Social_Link' ) ) :
	/**
	 * Social Media class.
	 *
	 * @since Elead 0.1
	 */
	class elead_Social_Link extends WP_Widget {
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'widget_social_icons',
				'description' => esc_html__( 'Enter the url only the icon will be displayed as per the links.', 'elead' ),
			);
			parent::__construct( 'widget_social_icons',esc_html__('TP : Social Link','elead'), $widget_ops );
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			// outputs the content of the widget
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$title 	= ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Stay Connected', 'elead' );

			$open_link  = ! empty( $instance['open_link'] ) ? true : false;
			$target = ( empty( $open_link ) ) ? '' : 'target=_blank';


			echo $args['before_widget'];
				if ( ! empty( $title ) ) {
					echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				}
			$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3; ?>

			<ul class="social-icons">
				<?php
				for ( $i=1; $i <= $number ; $i++ ) {
					$link = ( ! empty( $instance['link' . '-' . $i] ) ) ? $instance['link' . '-' . $i] : ''; 
					if ( ! empty( $link ) ) :
				?>
			        <li><a href="<?php echo esc_url( $link ) . '" ' . esc_attr( $target ); ?> class="icon-animation icon-hover-effect"></a></li>
				<?php endif;
				} ?>
     		</ul>
		    <div class="clear"></div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			$title     	= isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Stay Connected', 'elead' );
			$number 	= isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
			$open_link 	= isset( $instance['open_link'] ) ? $instance['open_link'] : false;
		   ?>

		   <p>
			   <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'elead' ); ?></label>
			   <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		   </p>

		   <p>
		   	<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of links to show:', 'elead' ); ?></label>
		   	<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="6" value="<?php echo absint( $number ); ?>" size="3" />
		   </p>

		   <p>
		      <label for="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>"><?php esc_html_e( 'Open in New Tab', 'elead' ); ?>:</label>
		      <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'open_link' ), 'elead' ); ?>"  <?php checked( $open_link, true ); ?> />
		    </p>

		   <?php for ( $i=1; $i <= $number; $i++ ) {
		   	$link = isset( $instance['link'. '-' . $i ] ) ? $instance['link' . '-' . $i ] : '';?>
			   <p>
			   	<label for="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>"><?php printf( esc_html__( 'Link %s :', 'elead' ), $i ); ?></label>
			   	<input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' . '-' . $i ) ); ?>" value="<?php echo esc_url( $link ); ?>"/>
			   </p>
		   <?php }?>

		   <?php
		}

		/**
		* Processing widget options on save
		*
		* @param array $new_instance The new options
		* @param array $old_instance The previous options
		*/
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
			$instance           			= $old_instance;
			$instance['title']  			= sanitize_text_field( $new_instance['title'] );
			$instance['number'] 			= absint( $new_instance['number'] );
			$instance['open_link']       	= elead_sanitize_checkbox( $new_instance['open_link'] );
			for ( $i=1; $i <= $instance['number']; $i++ ) {
				$instance['link' . '-' . $i] = esc_url( $new_instance['link' . '-' . $i] );
			}
			return $instance;
		}
	}
endif;

function elead_register_social_link_widget() {
	register_widget( 'elead_Social_Link' );
}
add_action( 'widgets_init', 'elead_register_social_link_widget' );