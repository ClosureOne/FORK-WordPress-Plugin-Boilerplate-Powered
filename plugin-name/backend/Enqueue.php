<?php

/**
 * Plugin_Name
 *
 * @package   Plugin_Name
 * @author    {{author_name}} <{{author_email}}>
 * @copyright {{author_copyright}}
 * @license   {{author_license}}
 * @link      {{author_url}}
 */
namespace Plugin_Name\Backend;

use \Plugin_Name\Engine;

/**
 * This class contain the Enqueue stuff for the backend
 */
class Enqueue extends Engine\Admin_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
            return;
		}

		// WPBPGen{{#if admin-assets_admin-page && admin-assets_settings-css && admin-assets_admin-css}}
		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		// {{/if}}
		// WPBPGen{{#if admin-assets_admin-page && admin-assets_settings-js && admin-assets_admin-js}}
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		// {{/if}}
	}


	// WPBPGen{{#if admin-assets_admin-page && admin-assets_settings-css && admin-assets_admin-css}}
	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since {{plugin_version}}
	 *
	 * @return mixed Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {
		$screen = get_current_screen();
		// WPBPGen{{#if admin-assets_settings-css}}
		if ( !is_null( $screen ) && $screen->id === 'toplevel_page_plugin-name' ) {
			wp_enqueue_style( PN_TEXTDOMAIN . '-settings-styles', plugins_url( 'assets/css/settings.css', PN_PLUGIN_ABSOLUTE ), array( 'dashicons' ), PN_VERSION );
		}

		// {{/if}}
		// WPBPGen{{#if admin-assets_admin-css}}
		wp_enqueue_style( PN_TEXTDOMAIN . '-admin-styles', plugins_url( 'assets/css/admin.css', PN_PLUGIN_ABSOLUTE ), array( 'dashicons' ), PN_VERSION );
		// {{/if}}
	}

	// {{/if}}
	// WPBPGen{{#if admin-assets_admin-page && admin-assets_settings-js && admin-assets_admin-js}}
	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since {{plugin_version}}
	 *
	 * @return mixed Return early if no settings page is registered.
	 */
	public function enqueue_admin_scripts() {
		// WPBPGen{{#if admin-assets_settings-js}}
		$screen = get_current_screen();
        if ( !is_null( $screen ) && $screen->id === 'toplevel_page_plugin-name' ) {
            wp_enqueue_script( PN_TEXTDOMAIN . '-settings-script', plugins_url( 'assets/js/settings.js', PN_PLUGIN_ABSOLUTE ), array( 'jquery', 'jquery-ui-tabs' ), PN_VERSION, false );
        }

		// {{/if}}
		// WPBPGen{{#if admin-assets_admin-js}}
		wp_enqueue_script( PN_TEXTDOMAIN . '-admin-script', plugins_url( 'assets/js/admin.js', PN_PLUGIN_ABSOLUTE ), array( 'jquery' ), PN_VERSION, false );
		// {{/if}}
	}

	// {{/if}}
}