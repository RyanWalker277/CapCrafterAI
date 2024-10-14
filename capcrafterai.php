<?php
function capcrafterai_enqueue_assets() {
    wp_enqueue_style('capcrafterai-style', plugin_dir_url(__FILE__) . 'assets/style.css');
    wp_enqueue_script('capcrafterai-script', plugin_dir_url(__FILE__) . 'assets/script.js', array('jquery'), null, true);
    wp_localize_script('capcrafterai-script', 'capcrafterai_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('admin_enqueue_scripts', 'capcrafterai_enqueue_assets');

include_once plugin_dir_path(__FILE__) . 'includes/metabox.php';
include_once plugin_dir_path(__FILE__) . 'includes/api-handler.php';
include_once plugin_dir_path(__FILE__) . 'includes/settings.php';