<?php
/**
Plugin Name: oik-tos
Depends: oik base plugin
Plugin URI: http://www.oik-plugins.com/oik-plugins/oik-tos
Description: Generate a Terms of service or Terms and Conditions page for use on your website
Version: 0.2.0
Author: bobbingwide
Author URI: http://www.bobbingwide.com/about-bobbing-wide
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

    Copyright 2012,2013,2023 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/
add_action( "oik_admin_menu", "oik_tos_admin_menu" );

function oik_tos_admin_menu() {
  oik_require( "admin/oik-tos.php", "oik-tos" );
  oik_tos_lazy_admin_menu( __FILE__ );
}

/* This code will produce a message when oik-tos is activated but oik isn't */
add_action( "admin_notices", "oik_tos_activation" );
/**
*/ 
function oik_tos_activation() {
  static $plugin_basename = null;
  if ( !$plugin_basename ) {
    $plugin_basename = plugin_basename(__FILE__);
    add_action( "after_plugin_row_" . $plugin_basename, __FUNCTION__ );   
    require_once( "admin/oik-activation.php" );
  }  
  $depends = "oik:2.0.1";
  oik_plugin_lazy_activation( __FILE__, $depends, "oik_plugin_plugin_inactive" );
}




