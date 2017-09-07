<?php

/*
  Plugin Name: BirchPress Scheduler Business Plus
  Plugin URI: http://www.birchpress.com
  Description: An appointment booking and online scheduling plugin that allows service businesses to take online bookings.
  Version: 2.9.39.BP
  Author: BirchPress
  Author URI: http://www.birchpress.com
  License: GPLv2
 */

if ( defined( 'ABSPATH' ) && ! function_exists( 'birchschedule_main' ) ) {

	function birchschedule_main() {

		if ( version_compare( PHP_VERSION, '7.0.0' ) >= 0 ) {
			require_once 'lib/sabre4/autoload.php';
		} else {
			require_once 'lib/vendor/autoload.php';
		}
		require_once 'loader.php';

		birchschedule_load( array(
				'plugin_file_path' => __FILE__,
				'product_version' => '2.9.39.BP',
				'product_name' => 'BirchPress Scheduler Business Plus',
				'product_code' => 'birchschedule',
				'global_name' => 'birchschedule'
			) );
	}

	birchschedule_main();
}
