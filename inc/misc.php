<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Allows svg to be processed through the wordpress media uploader */
function whaling_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'whaling_mime_types');

/* Here's a snippet to remove the Category: from the archive titles*/
function whaling_clean_archive_title($title) {
    return preg_replace('/^\w+: /', '', $title);
}

add_filter('get_the_archive_title', 'whaling_clean_archive_title');

/*

Adapted From
---------------------
Plugin Name: Anti-Recon
Description: Attempts to prevent recon data gathering
Author: WpCampus
Version: 0.0.1
https://github.com/gilzow/access-denied/

All credit to Paul Gilzow and WP Campus

*/


/**
 * remove generator meta
 */
add_filter('the_generator',function(){ return ''; });
remove_action( 'wp_head', 'wp_generator' );


/**
 * Removes the error message indicating an invalid user, or incorrect password for a specific user
 * @param $objUser WP_User|WP_Error
 * @return WP_Error|WP_User|null
 */
add_filter('authenticate',function($objUser){
    if(is_wp_error($objUser)){
        if(
                isset($objUser->errors['incorrect_password']) 
            ||  isset($objUser->errors['invalid_username'])
            ||  isset($objUser->errors['invalid_email'])
        ){
            $objUser = null;;
        }
    }
    return $objUser;
},99,1); 


/**
 * XMLRPC stuff
 */

// disable XML-RPC methods that require authentication
add_filter('xmlrpc_enabled','__return false');
//remove pingback support
add_filter('xmlrpc_methods', function( $aryMethods ) {
    unset( $aryMethods['pingback.ping'] );
    return $aryMethods;
});


/**
 * Removes username from the body class list.  Why does wordpress include the user name in the body class?  So you can
 * add per-user custom classes, but that seems like a very fringe case vs giving hackers all of your user names.
 *
 * @param $aryClasses array of classes to include in the body element
 * @return array filtered list of classes
 */
add_filter('body_class',function($aryClasses){
    if(is_author() && in_array('author',$aryClasses)){
        /**
         * match all classes of 'author-<username>' but not 'author-id'
         *
         * match: author-admin
         * match: author-gilzowp
         * NO match: author-5
         *
         */
        $aryUserNames = preg_grep('/^author-(?!\d+$).+$/',$aryClasses);
        if(count($aryUserNames) > 0){
            $aryClasses = array_diff($aryClasses,$aryUserNames);
        }
    }
    return $aryClasses;
},100,1);