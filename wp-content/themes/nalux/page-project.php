<?php
/*
  Template Name: Project Page Template
 */
?>
<?php get_header();
global $post;
the_post();
$id = get_the_id();
$content = get_the_content();
$lang = pll_current_language('slug') == 'en' ? 'en' : 'vn';
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>
<div class="page-main">

    <div class="project-main">
        <div class="container">
            <div class="project-inner">
                <div class="items">
                    <div class="item col-01">
                        <div class="page-title">
                            <h1 class="heading-title">Dự án</h1>
                        </div>
                        <a href="project-list.html" class="project-item gradient-top">
                            <div class="photo">
                                <img src="images/project-photo-01.png" alt="">
                            </div>
                            <div class="project-name">
                                BĐS<br>nghỉ dưỡng
                            </div>
                        </a>
                    </div>
                    <div class="item col-02">
                        <a href="project-list.html" class="project-item  gradient-bottom">
                            <div class="photo">
                                <img src="images/project-photo-01.png" alt="">
                            </div>
                            <div class="project-name">
                                BĐS<br>đô thị
                            </div>
                        </a>
                        <a href="project-list.html" class="project-item  gradient-top">
                            <div class="photo">
                                <img src="images/project-photo-01.png" alt="">
                            </div>
                            <div class="project-name">
                                BĐS<br>công nghiệp
                            </div>
                        </a>
                    </div>
                    <div class="item col-03">
                        <a href="project-list.html" class="project-item  gradient-top">
                            <div class="photo">
                                <img src="images/project-photo-01.png" alt="">
                            </div>
                            <div class="project-name">
                                BĐS<br>cho thuê
                            </div>
                        </a>
                        <a href="project-list.html" class="project-item  gradient-bottom">
                            <div class="photo">
                                <img src="images/project-photo-01.png" alt="">
                            </div>
                            <div class="project-name">
                                Thương mại
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
