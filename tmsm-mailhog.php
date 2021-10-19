<?php
/*
	Plugin Name: TMSM Mailhog
    Plugin URI:        https://www.github.com/thermesmarins/tmsm-mailhog/
	Description: Sends email with Mailhog in a local environment with Lando.
	Version: 1.0.0
	Author: Nicolas Mollet
    Author URI:        https://www.github.com/nicomollet/
	Text Domain: tmsm-mailhog
	Domain Path: /languages
    License:           GNU General Public License v3.0
    License URI:       http://www.gnu.org/licenses/gpl-3.0.html
    Requires PHP:      7.3
	WC requires at least: 5.0
	WC tested up to: 5.6
    Github Plugin URI: https://github.com/thermesmarins/tmsm-mailhog/
    Github Branch:     master
*/


/**
 * Tmsm_Mailhog class
 */
if ( ! class_exists( 'Tmsm_Mailhog' ) ) {

	class Tmsm_Mailhog {

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action('phpmailer_init', array($this, 'mailhog_phpmailer_configuration' ), 1000, 1);

		}

		/**
		 * @param PHPMailer\PHPMailer\PHPMailer $phpmailer
		 */
		function mailhog_phpmailer_configuration(PHPMailer\PHPMailer\PHPMailer $phpmailer){
			$phpmailer->isSMTP();
			$phpmailer->Host = 'mailhog';
			$phpmailer->Port = 1025;
		}


		/**
		* Gets the absolute plugin path without a trailing slash, e.g.
		* /path/to/wp-content/plugins/plugin-directory
		*
		* @return string plugin path
		*/
		public function get_plugin_path() {
			if ( isset( $this->plugin_path ) ) {
				return $this->plugin_path;
			}

			return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
		}
	}

}

/**
 * Register this class globally
 */
$GLOBALS['Tmsm_Mailhog'] = new Tmsm_Mailhog();
