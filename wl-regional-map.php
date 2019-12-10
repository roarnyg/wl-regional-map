<?php
/*
Plugin Name: WL Regional Map
Description: Display a map of a norwegian region using a shortcode [wl-regional-map region=<name> {action=<js-function-name>}]
Author: wphostingdev, webloeft,iverok
Author URI: https://www.webloeft.no
Version: 1.0
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action('init', function () {
    wp_enqueue_style('wl-regional-map', plugins_url( 'css/wl-regional-map.css', __FILE__ ), array(), filemtime( plugin_dir_path( __FILE__ ) . 'css/wl-regional-map.css'));
    wp_register_script('wl-regional-map', plugins_url( 'js/wl-regional-map.js', __FILE__ ), array('jquery'), filemtime( plugin_dir_path( __FILE__ ) . 'js/wl-regional-map.js'));
    wp_localize_script('wl-regional-map', 'WLRegionalMapSettings',
                    array(
                    ));
    wp_enqueue_script('wl-regional-map');
});


add_shortcode("wl_regional_map", function ($atts,$content="",$tag="") {
  $args = shortcode_atts(array('region'=>'','action'=>''),$atts);
  $region = sanitize_title($args['region']);
  $action = sanitize_title($args['action']);
  if (!$region) return __("<i>Cannot display map - no region passed</i>", 'wl-regional-map');

ob_start();
?>
<div class="nor-map" itemprop="text" data-action="<?php echo esc_attr($action);?>">
 <?php include(dirname(__FILE__)) . "/$region/{$region}.php"; ?>
</div>
<?php
return ob_get_clean();
});
