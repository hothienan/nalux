<?php

function ml_enqueue_script()
{
    wp_enqueue_script('nalux-jquery-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), null, true);
    wp_enqueue_script('nalux-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

function ml_enqueue_style()
{
    wp_enqueue_style('nalux-styles-main', get_template_directory_uri() . '/assets/css/style.css', array(), null, "all");
}

add_action('wp_enqueue_scripts', 'ml_enqueue_script', 0);
add_action('wp_enqueue_scripts', 'ml_enqueue_style',0);

function addStringTranslation() {
    $file = get_template_directory_uri() . '/assets/translate/string.txt';
    $handle = fopen($file, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $arr = explode(':', $line);
            if(count($arr) == 2) pll_register_string(trim($arr[0]),  trim($arr[1]), 'Nalux');
        }
        fclose($handle);
    }
}
add_action('init', 'addStringTranslation', 0);
?>