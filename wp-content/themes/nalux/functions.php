<?php
include_once TEMPLATEPATH . '/bootstrap.php';


function init_session()
{
    $is_ses = session_id();
    if (empty($is_ses)) {
        session_start();
    }
}

/**
 * Function for detecting mobile and tablet deveice
 * @return boolean
 */
function isMobileBrowser()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    return (preg_match('/iPad;|PlayBook;/', $useragent) || preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) ? true : false;
}

/**
 * Function for custom polylang swticher
 * @return string
 */
function custom_polylang_langswitcher() {
    $output = '';
    if ( function_exists( 'pll_the_languages' ) ) {
        $args   = [
            'show_flags' => 0,
            'show_names' => 0,
            'echo'       => 0,
            'display_names_as' => 'slug'
        ];

        $output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
    }

    return $output;
}

/**
 * Function for Preventing Deleting from POST/PAGE
 * @param $postid
 */
function hook_delete_post( $postid ){
    // We check if the global post type isn't ours and just return
    global $post_type, $post, $unDeletePosts;

    foreach ($unDeletePosts as $postType => $postList){
        if ( $post_type == $postType && in_array($post->ID, $postList) ) {
            echo "This is system article.  You can not delete it!";
            exit;
        }
    }
    return;
}
function unDeletePostIDs ($args){
    global $unDeletePosts;
    $unDeletePosts = $args;
    add_action( 'before_delete_post', 'hook_delete_post' );
    add_action( 'wp_trash_post', 'hook_delete_post' );
}
unDeletePostIDs(array('page' => array(96)));

add_shortcode('polylang_langswitcher', 'custom_polylang_langswitcher');

$ML_Models_Init = new ML_Models_Init();
$ML_Models_Init->init();
$ML_Models_Data = new ML_Models_Data();
$ML_Models_Data->init();

add_action('widgets_init', 'ml_widgets_init_topmenu');
function ml_widgets_init_topmenu()
{

    register_sidebar(array(
        'name' => 'Top Menu',
        'id' => 'nalux-top-menu',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}
add_action('widgets_init', 'ml_widgets_init_followus');
function ml_widgets_init_followus()
{

    register_sidebar(array(
        'name' => 'Follow US Menu',
        'id' => 'nalux-follow-us',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('widgets_init', 'ml_widgets_init_about_us');
function ml_widgets_init_about_us()
{

    register_sidebar(array(
        'name' => 'About Us',
        'id' => 'nalux-about-us',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('widgets_init', 'ml_widgets_init_maps');
function ml_widgets_init_maps()
{

    register_sidebar(array(
        'name' => 'Google Maps',
        'id' => 'nalux-maps',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_theme_support( 'post-thumbnails' );
?>