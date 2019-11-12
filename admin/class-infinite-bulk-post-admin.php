<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://fanaticpixel.com
 * @since      1.0.0
 *
 * @package    Infinite_Bulk_Post
 * @subpackage Infinite_Bulk_Post/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Infinite_Bulk_Post
 * @subpackage Infinite_Bulk_Post/admin
 * @author     Fanatic Pixel <dev@fanaticpixel.com>
 */
class Infinite_Bulk_Post_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Infinite_Bulk_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Infinite_Bulk_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/infinite-bulk-post-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Infinite_Bulk_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Infinite_Bulk_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/infinite-bulk-post-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'jQuery-repeater', plugin_dir_url( __FILE__ ) . 'js/repeater.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_head(){
		global $pagenow;

		$post_type = 'post';

		if(isset($_GET['post_type'])){
			$post_type = $_GET['post_type'];
		}

		if ( $pagenow == 'edit.php' && (in_array($post_type, ['page', 'post']) ) ) :

			include_once plugin_dir_path( dirname( __FILE__ ) ).'/admin/partials/infinite-bulkpost-template.php';
			?>
			<script type="text/javascript">
				var is_bulk_loaded = true;
				var post_type = "<?php echo ucfirst($post_type) ?>s";
				var bulk_btn_html = '<a href="#" class="page-title-action add-bulk-post">Add Bulk '+post_type+'</a>';
			</script>
			<?php

		else: ?>
			<script type="text/javascript">
				var is_bulk_loaded = false;
			</script>
			<?php
		endif;
	}

	public function verify_bulk_nonce(){
		global $wpdb;
		$table_name = $wpdb->prefix . "posts";
		if ( ! isset( $_POST['infinite-bulk-add-field'] ) || ! wp_verify_nonce( $_POST['infinite-bulk-add-field'], 'infinite-bulk-add-action' ) ) { return; }

		foreach($_POST['add-buld'] as $single_arr){
			 $value = $single_arr['title'];
			$post_id = wp_insert_post( array(
                    'post_status' => 'publish',
                    'post_type' => $_POST['type'],
                    'post_title' => $value,
                ) );
		}
	}

}
