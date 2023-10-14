<?php // (C) Copyright Bobbing Wide 2013, 2023

/** 
 * Define the admin options for oik Terms of Service
 */
function oik_tos_lazy_admin_menu() {
  register_setting( 'oik_tos_options', 'bw_tos', 'oik_tos_options_validate' ); 
  //add_submenu_page( $parent slug, $page_title, $menu_title, $capability, $menu_slug, $function ); 
  add_submenu_page( 'oik_menu', 'Terms of Service setup', "Terms of Service", 'manage_options', 'oik_tos', "oik_tos_options_do_page" );
}

/**
 * Validate the Terms of Service fields
 * 
 * @param $input 
 * @return $input 
 *
 * Note: Checkboxes don't need validating
 * and there's little point validating the text since we allow (X)HTML and shortcodes
 * AND if the user chooses to change a list start field to something else
 * it may not be necessary to check the list end is the right tag.
 * Of course, we're assuming the user is reasonably web savvy
 */
function oik_tos_options_validate( $input ) {
  return( $input ); 
}

/**
 * Terms of Service page
*/
function oik_tos_options_do_page() {
  $generate = bw_array_get( $_REQUEST, "_bw_tos_generate", null );
  if ( $generate ) {
    oik_tos_generate_page();
  }
  oik_menu_header( "Terms of service", "w60pc" );
  oik_box( NULL, NULL, "Terms of service or Terms and Conditions", "oik_tos_options" );
  ecolumn();
  scolumn( "w40pc" );
  oik_box( NULL, NULL, "Preview", "oik_tos_preview" );
  oik_box( NULL, NULL, "Generate", "oik_tos_generate" );
  oik_menu_footer();
  bw_flush();
}

/**
 * Display the Terms of Service options 
 */
function oik_tos_options() {
  p( "Choose the content for your Terms of service, change the text as required." );
  p( "Click on <b>Preview</b> to see how the Terms of Service will appear." );   
  
  $option = "bw_tos"; 
  $options = bw_form_start( $option, "oik_tos_options" );
  oik_require( "admin/oik-default-tos.inc", "oik-tos" );
  $options = bw_reset_options( $option, $options, "oik_default_tos", "_bw_tos_reset" ); 
  $labels = oik_tos_labels();
  bw_trace2( $options );
  
  $len = 100;
  $charsperline = 80;
  
  // bw_textarea_cb_arr( $option, "Effective from", $options, "effdate", $len, 1 );
  foreach ( $options as $key => $value ) {
    if ( substr( $key, -3 ) != "_cb" ) {
      $label = bw_array_get_dcb( $labels, $key, $key, "bw_ucfirst" );
      $rows = ceil( strlen( $value ) / $charsperline );
      bw_textarea_cb_arr( $option, $label, $options, $key, $len, $rows );  
    }  
  }
  
  etag( "table" ); 			
  //bw_tablerow( array( "", "<input type=\"submit\" name=\"ok\" value=\"Preview\" class=\"button-primary\"/>" ) ); 
  e( isubmit( "ok", __("Preview" ), null, "button-primary" ));
  
  etag( "form" );
  
  bw_flush();
}

/**
 * build the content for a text field if the checkbox is "on"  
 */
if ( !function_exists( "oik_tos_build_content" ) ) {
function oik_tos_build_content( $array, $index ) {
  $cb = bw_array_get( $array, "{$index}_cb", false );
  if ( $cb ) 
    $text = bw_array_get( $array, $index, null );
  else
    $text = null;
  if ( $text ) 
    e( $text );
}
}

/**
 * Build the Terms of Service for the selected items 
 *
 * Note: since we set options to a null string when resetting them 
 */
function oik_build_tos() {   
  $option = "bw_tos"; 
  $options = bw_recreate_options( $option );
  if ( $options !== FALSE && is_array( $options) && count( $options)) {
    foreach ( $options as $key => $value ) {
      if ( substr( $key, -1,3 ) != "_cb" ) { 
        oik_tos_build_content( $options, $key );
      }  
    }  
  }    
}

/** 
 * Display a preview of the Terms of Service
 *
 */
function oik_tos_preview() {
  oik_build_tos();  
  $page = bw_ret();
  e( apply_filters( 'the_content', $page ) );
  oik_tos_reset_form(); 
  bw_flush();
}

function oik_tos_reset_form() {

  bw_form( );
  //$reset = "<input type=\"submit\" name=\"_bw_tos_reset\" value=\"Reset to defaults\" class=\"button-secondary\"/>";
  $reset = isubmit( "_bw_tos_reset", __( "Reset to defaults", "oik-tos" ), null, "button-secondary" );
  e ( $reset );
  etag( "form" );
}

/**
 * Terms of service select menu
 */
function oik_tos_select_menu() { 
  oik_require( "bw_metadata.inc" );
  $menus = wp_get_nav_menus( $args = array() );
  $terms = bw_term_array( $menus );
  $terms[0] = "none";
  
  $auto_add = get_option( 'nav_menu_options' );
  $auto_add = bw_array_get( $auto_add, "auto_add", 0 );
  $auto_add = bw_array_get( $auto_add, 0, 0 );
  
  if ( $auto_add ) {
    bw_tablerow( array("&nbsp;", "The new page will be added to menu: " . $terms[$auto_add] ) );
  } else { 
    bw_select( "bw_nav_menu", "Add to menu", $auto_add, array( '#options' => $terms) );
  }
  return( $menus );
}

/**
 * Generate the Terms of Service page
 */ 
function oik_tos_generate_page() {
  bw_flush();
  oik_build_tos();
  $page = bw_ret();
  if ( $page ) {
    $title = bw_array_get_dcb( $_REQUEST, "bw_tos_title", "Terms of Service", "oik-tos" ); 
    $page_id = _bw_create_page( $title, "page", $page );
    
    $menu = bw_array_get( $_REQUEST, "bw_nav_menu", null );    
    if ( $menu > 0 ) {
       oik_require( "includes/oik-menus.inc" );
       bw_insert_menu_item( $title, $menu, $page_id, 0 );
    }
    sdiv( "updated", "message" );
    sp();
    e( "Page created:" );
    e( "&nbsp;" . $title . "&nbsp;" );
    alink( null, get_permalink( $page_id ), "View page" );
    ep();
    ediv();
  } else {
    sdiv( "error", "message" ); 
    p( "Please select some checkboxes and <b>Preview</b> the result before choosing <b>Generate page</b>" );
    ediv();
  }
}

/**
 * Create the generate Terms of Service form 
 */
function oik_tos_generate() {
  e( '<form method="post" action="" class="inline">' ); 
  stag( 'table class="form-table"' );
  bw_textfield( "bw_tos_title", 30, "Page title", "Terms of Service" );
  oik_tos_menu_selector();
  bw_tablerow( array( "", "<input type=\"submit\" name=\"_bw_tos_generate\" value=\"Generate page\" class=\"button-primary\"/>") ); 
  etag( "table" ); 			
  etag( "form" );
}

if ( !function_exists( "_bw_create_page" ) ) {
function _bw_create_page( $page, $post_type="page", $content=null ) {
  // p( "Creating $post_type: $page" );
  $post = array( 'post_type' => $post_type
               , 'post_status' => 'publish'
               , 'post_title' => $page
               , 'comment_status' => 'closed'
               );
  if ( $content ) {
    $post['post_content'] = $content;
  } else {   
    $post['post_content'] = bw_create_content( $page );
  }  
  $post_id = wp_insert_post( $post, TRUE );
  bw_trace2( $post_id );
  return( $post_id );
}
}  

/**
 * 
 */
function oik_tos_menu_selector() {
  oik_require( "bw_metadata.inc" );
  $menus = wp_get_nav_menus( $args = array() );
  $terms = bw_term_array( $menus );
  $terms[0] = "none";
  
  $auto_add = get_option( 'nav_menu_options' );
  $auto_add = bw_array_get( $auto_add, "auto_add", 0 );
  $auto_add = bw_array_get( $auto_add, 0, 0 );
  
  if ( $auto_add ) {
    bw_tablerow( array("&nbsp;", "The new page will be added to menu: " . $terms[$auto_add] ) );
  } else { 
    bw_select( "bw_nav_menu", "Add to menu", $auto_add, array( '#options' => $terms) );
  }
  return( $menus );
}




