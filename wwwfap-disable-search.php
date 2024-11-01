<?php
/*
Plugin Name: wwwFap Disable Search
Description: Plugin to disable the search feature on your WordPress site.
Version: 1.0.1
Author: wwwFap
Author URI: https://adultswag.com/ 
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: wwwfap-disable-search

This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
General Public License version 2, as published by the Free Software Foundation. You may NOT assume 
that you can use any other version of the GPL.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function wwwfap_disable_search( $query, $error = true ) {
 
if ( is_search() ) {
$query->is_search = false;
$query->query_vars['s'] = false;
$query->query['s'] = false;
 
// to error
if ( $error == true )
$query->is_404 = true;
}
}
 
add_action( 'parse_query', 'wwwfap_disable_search' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
