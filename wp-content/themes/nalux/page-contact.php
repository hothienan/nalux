<?php
/*
  Template Name: Contact Page Template
 */
?>
<?php get_header();
global $post;
the_post();
$id = get_the_id();
$content = get_the_content();
?>
<?php include TEMPLATEPATH . '/includes/header/header.php'; ?>
<div class="page-main">
    <div class="contact-us block" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $id ) ); ?>);">
        <div class="content">
            <div class="contain wow animate__fadeInUp" data-wow-duration=".5s">
                <h3 class="title"><?php echo pll__('CONTACT US');?>!</h3>
                <p>
                    <?php echo $content; ?>
                </p>
            </div>
        </div>
        <div class="contactForm">
            <form action="" class="form" id="makeRequest" method="post">
                <div class="send-mail-error-msg ninja-forms-response-msg ninja-forms-error-msg"></div>
                <div class="send-mail-success-msg ninja-forms-response-msg ninja-forms-success-msg"></div>
                <div class="fieldset">
                    <div class="field">
                        <div class="control">
                            <input type="text" id="name" name="name" class="input-text" placeholder="<?php echo pll__('Name'); ?>">
                            <label for="name" class="label">
                                <span><?php echo pll__('Name'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="email" id="email" name="email" class="input-text" placeholder="<?php echo pll__('Email'); ?>">
                            <label for="email" class="label">
                                <span><?php echo pll__('Email'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="text" id="city" name="city" class="input-text" placeholder="<?php echo pll__('Your City'); ?>">
                            <label for="city" class="label">
                                <span><?php echo pll__('Your City'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="tel" id="phone" name="phone" class="input-text" placeholder="<?php echo pll__('Phone Number'); ?>">
                            <label for="phone" class="label">
                                <span><?php echo pll__('Phone Number'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="field fullwidth">
                        <div class="control">
                            <textarea id="comment" name="comment" class="input-text" placeholder="<?php echo pll__('Your Comment'); ?>"></textarea>
                            <label for="comment" class="label">
                                <span><?php echo pll__('Your Comment'); ?></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="area-choices">
                    <div class="request__title"><?php echo pll__('Area'); ?> (m<sup>2</sup>)</div>
                    <div class="request__choices">
                        <label class="item">
                            <div class="label">to 50</div><input type="radio" name="radio" value="to 50"><span class="checkmark"></span>
                        </label>
                        <label class="item">
                            <div class="label">50-150</div><input type="radio" name="radio" value="50-150"><span class="checkmark"></span>
                        </label>
                        <label class="item">
                            <div class="label">150-250</div><input type="radio" name="radio" value="150-250"><span class="checkmark"></span>
                        </label>
                        <label class="item">
                            <div class="label">250-400</div><input type="radio" name="radio" value="250-400"><span class="checkmark"></span>
                        </label>
                        <label class="item">
                            <div class="label">400-600</div><input type="radio" name="radio" value="400-600"><span class="checkmark"></span>
                        </label>
                        <label class="item">
                            <div class="label">600-800</div><input type="radio" name="radio" value="600-800"><span class="checkmark"></span>
                        </label>
                        <label class="item">
                            <div class="label">800-1000</div><input type="radio" name="radio" value="800-1000"><span class="checkmark"></span>
                        </label>
                        <label class="item">
                            <div class="label">1000+</div><input type="radio" name="radio" value="1000+"><span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="actions">
                    <button class="action btn-primary contact-us-send-mail" data-label-processing='<?php echo pll__("Processing")."..."; ?>' data-label-submit='<?php echo pll__("Send Request"); ?>'>
                        <span><?php echo pll__('Send Request'); ?></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15701.730907634443!2d106.5702042!3d10.3072116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175530688ed1845%3A0xc9443e761f1e8c5b!2zQ2jhu6MgQ-G6p3UgS8OqbmggMTQ!5e0!3m2!1sen!2s!4v1673100291778!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<?php get_footer(); ?>	
