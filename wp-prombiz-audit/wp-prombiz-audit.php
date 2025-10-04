<?php
/*
Plugin Name: WP PromBiz Audit
Description: Auditor dashboard. One-field audit runner.
Version: 0.1.0
Author: PromBiz
Text Domain: wp-prombiz-audit
*/
defined('ABSPATH') || exit;

define('WP_PBA_PATH', __DIR__);
define('WP_PBA_URL',  plugin_dir_url(__FILE__));

// автозагрузка всех PHP из /src
function wp_pba_autoload_dir($dir){
  $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
  foreach ($it as $f) {
    if ($f->isFile() && substr($f->getFilename(), -4) === '.php') require_once $f->getPathname();
  }
}
if (is_dir(__DIR__.'/src')) wp_pba_autoload_dir(__DIR__.'/src');

add_action('admin_menu', function () {
  add_menu_page('PromBiz Audit','PromBiz Audit','manage_options','wp-pba', function () {
    echo '<div class="wrap"><h1>PromBiz Audit</h1><div id="wp-pba-app"></div></div>';
  });
});
