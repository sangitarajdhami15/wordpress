<?php
/**
 * Functions Load
 *
 * @package     WordPress
 * @subpackage  SMOF
 * @since       1.4.0
 * @author      Syamil MJ
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

require( ADMIN_PATH . 'functions/functions.filters.php' );
require( ADMIN_PATH . 'functions/functions.interface.php' );
require( ADMIN_PATH . 'functions/functions.options.php' );
require( ADMIN_PATH . 'functions/functions.admin.php' );