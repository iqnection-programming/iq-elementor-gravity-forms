<?php

/**
 * Gravity Forms Styles for Elementor
 *
 * @package           IQElementorGravityForms
 * @author:           IQnection
 * @copyright         2022 IQnection
 * @license:          GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Elementor Gravity Forms
 * Description:       Provides global style settings for Gravity Forms
 * Version:           1.0.1
 * Requires at least: 5.3
 * Requires PHP:      7.1
 * Author:            IQnection
 * Author URI:        https://www.iqnection.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       iq-elementor-gravity-forms
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

define( 'IQ_ELEMENTOR_GRAVITY_FORMS_VERSION', '1.0.1' );

require_once(__DIR__.'/updates/check-requirements.php');
require_once (__DIR__.'/updates/update.php');

if (!function_exists('load_iq_gravity_forms_style_settings')) {
	function load_iq_gravity_forms_style_settings($manager) {
		require_once(__DIR__.'/Kits/Documents/Tabs/iq-gravity-forms-styles.php');
		$manager->register_tab( 'iq-theme-style-gravity-forms', IQElementorGravityForms\Kits\Documents\Tabs\IQ_Gravity_Forms_Styles::class );
	}
	add_action('elementor/kit/register_tabs', 'load_iq_gravity_forms_style_settings');
}
