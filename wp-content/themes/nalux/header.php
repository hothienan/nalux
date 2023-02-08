<!DOCTYPE html>
<html lang="en">
<head>    
    <?php include TEMPLATEPATH . '/includes/header/meta.php'; ?>
    <?php wp_head(); ?>
</head>
<?php
$pt = get_page_template('pagename');
global $activeMenu;
$activeMenu = array('about' => '', 'projects' => '', 'contact' => '', 'news' => '' );
if($pt) {
    $arr = explode('/', $pt);
    $page = end($arr);
    switch ($page) {
        case 'page-about.php':
            $cmsClass = 'cms-about-us';
            $activeMenu['about'] = 'active';
            break;
        case 'page-contact.php':
            $cmsClass = 'cms-contact-us';
            $activeMenu['contact'] = 'active';
            break;
        case 'page-project.php':
            $cmsClass = 'cms-project';
            $activeMenu['projects'] = 'active';
            break;
        case 'page-news.php':
            $cmsClass = 'cms-news';
            $activeMenu['news'] = 'active';
            break;
        case 'page.php':
            if(is_home()) $cmsClass = '';
            else if( $postType = get_post_type( get_the_ID() )) {
                switch ($postType) {
                    case 'post':
                        $cmsClass = 'cms-news';
                        break;
                    case 'project':
                        $cmsClass = 'cms-project';
                        break;
                    default:
                        $cmsClass = 'cms-index';
                        break;
                }
            }
            break;
        default:
            $cmsClass = '';
            break;
    }
}
?>
<body class="<?php echo $cmsClass ?>">
