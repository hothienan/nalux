<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" xml:lang="en" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" xml:lang="en" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" xml:lang="en" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" xml:lang="en" lang="en"> <!--<![endif]-->
<head>    
    <?php include TEMPLATEPATH . '/includes/header/meta.php'; ?>
    <?php wp_head(); ?>
</head>
<?php
$pt = get_page_template('pagename');
global $activeMenu;
$activeMenu = array('about' => '', 'projects' => '', 'careers' => '', 'contact' => '', 'news' => '' );
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
        case 'page-careers.php':
            $cmsClass = 'cms-careers';
            $activeMenu['careers'] = 'active';
            break;
        case 'page.php':
            if(is_home()) $cmsClass = 'cms-index';
            else if( $postType = get_post_type( get_the_ID() )) {
                switch ($postType) {
                    case 'post':
                        $cmsClass = 'cms-news';
                        break;
                    case 'project':
                        $cmsClass = 'cms-project';
                        break;
                    case 'career':
                        $cmsClass = 'cms-careers';
                        break;
                    default:
                        $cmsClass = 'cms-index';
                        break;
                }
            }
            break;
        default:
            $cmsClass = 'cms-index';
            break;
    }
}
?>
<body class="<?php echo $cmsClass ?>">
    <div class="page-wrapper">