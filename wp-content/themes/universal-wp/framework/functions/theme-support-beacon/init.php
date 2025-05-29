<?php ! defined( 'ABSPATH' ) AND exit( 'Forbidden!' );

/*! ===================================
 *  Author: Egor Dankov
 *  -----------------------------------
 *  DankovThemes
 *  =================================== */


/**
 * Tell support module which admin page belongs to theme
 */
add_filter( 'dt/theme_support/is_theme_page', 'ph_theme_support_is_theme_page_filter', 10, 2 );
function ph_theme_support_is_theme_page_filter( $is_theme_page, $page ) {
	return true;
}


/**
 * HelpScout integration class
 */
class PheromoneTheme_Support_Beacon {

	protected $admin_page_hook = null;


	/**
	 * PheromoneTheme_Support_Beacon constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_beacon' ) );
		add_action( 'admin_menu', array( $this, 'setup_admin_page' ), 1000 );
	}


	/**
	 * Process plugin menu args through filters
	 */
	private function get_menu_args() {
		// set default values
		$default_values = array(
			'parent_slug' => 'themes.php',
			'page_title'  => esc_html__( 'Theme Support', 'pheromone' ),
			'menu_title'  => esc_html__( 'Theme Support', 'pheromone' ),
			'capability'  => 'manage_options',
			'menu_slug'   => 'support-module'
		);

		// filter them and return
		return wp_parse_args( apply_filters( 'dt/theme_support/menu_attributes', array() ), $default_values );
	}


	/**
	 * Add link to this module to admin menu
	 */
	public function setup_admin_page() {
		$v = $this->get_menu_args();

		$this->admin_page_hook = add_submenu_page(
			$v['parent_slug'],
			$v['page_title'],
			$v['menu_title'],
			$v['capability'],
			$v['menu_slug'],
			array( $this, 'render_admin_page' )
		);
	}


	/**
	 * Diphlays admin page of this module
	 */
	public function render_admin_page() {
		include dirname( __FILE__ ) . '/admin-page.php';
	}


	/**
	 * Enqueues HelpScout beacon code to all theme admin pages
	 *
	 * @param $hook
	 */
	public function enqueue_beacon( $hook ) {
		// don't place beacon code to non-theme admin pages
		$is_theme_page = apply_filters( 'dt/theme_support/is_theme_page', false, $hook );
		if ( $this->admin_page_hook !== $hook && ! $is_theme_page ) {
			return;
		}

		// load beacon script
		wp_enqueue_script(
			'dt-support-beacon',
			get_theme_file_uri( 'framework/functions/theme-support-beacon/beacon.js' ),
			array( 'jquery' ),
			null,
			true
		);

		// provide user & site data for the script
		$user = wp_get_current_user();
		if ( trim( $user->user_firstname ) && trim( $user->user_lastname ) ) {
			$user_name = sprintf( '%s %s', $user->user_firstname, $user->user_lastname );
		}

		wp_localize_script(
			'dt-support-beacon',
			'DT_BEACON_DATA',
			array(
				'user_name'       => isset( $user_name ) ? $user_name : null,
				'user_email'      => $user->user_email,
				'site_url'        => site_url(),
				'site_wp_version' => get_bloginfo( 'version' ),
				'theme_name'      => basename( get_template_directory() ),
				'theme_version'   => wp_get_theme( get_template() )->get( 'Version' ),
			)
		);
	}

}

new PheromoneTheme_Support_Beacon();