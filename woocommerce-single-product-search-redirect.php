<?php
/**
 * Plugin Name: Woocommerce Single Product Search Redirect
 * Description: Manage yourself whether to redirect on product page or not if search query returns only 1 search.
 * Version: 1.1
 * Author: Prashant Patel
 * Author URI: http://prashantpatel.in
 */



if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
 
add_filter('plugin_action_links', 'single_product_search_redirect_action_links', 10, 2);
function single_product_search_redirect_action_links($links, $file) {
    static $this_plugin;
 
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
 
    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-settings&tab=products&section=display">Settings</a>';
        array_unshift($links, $settings_link);
    }
 
    return $links;
}


/**
 * Check if WooCommerce is active
 *
 * Add Settings And Front Hooks
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_filter('woocommerce_product_settings', 'wspsr_woocommerce_product_settings');
    add_action('init', 'init_wspsr_search_redirect');
}

/*
 * Display Option in Admin to Manage Single Search Redirect
 * Woocommerce -> Settings -> Products -> Shop & Product Pages
 */
function wspsr_woocommerce_product_settings($settings){

    $settings[] = array(
        'title' => __( 'Single Result on Search Page Behaviour', 'woocommerce' ),
        'type' 	=> 'title',
        'desc' 	=> __( 'Choose Whether you want to Prevent or Allow Redirect if Search page have single result.' ),
        'id' 	=> 'single_product_search_option_display'
    );
    $settings[] = array(
        'title'         => __( 'Single Result in Search Behaviour', 'woocommerce' ),
        'desc'          => __( 'Prevent Redirect to Detail page on single result on search pages.', 'woocommerce' ),
        'id'            => 'woocommerce_prevent_single_product_search_redirect',
        'default'       => 'no',
        'type'          => 'checkbox',
        'checkboxgroup' => 'start'
    );

    $settings[] = array(
        'type' 	=> 'sectionend',
        'id' 	=> 'single_product_search_option_display'
    );

    return $settings;
}


/*
 * On Init, Check Setting for Prevent Search Redirect and Apply Filter.
 */
function init_wspsr_search_redirect(){
    $prevent_search = get_option('woocommerce_prevent_single_product_search_redirect');
    if($prevent_search && $prevent_search == 'yes'){
        add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );
    }
}