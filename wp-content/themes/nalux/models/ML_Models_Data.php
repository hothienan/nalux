<?php

class ML_Models_Data
{


    public $isSearch;


    function __construct()
    {
        $this->init();
    }

    public function init()
    {
        add_action('wp_ajax_nopriv_contactUsSendMail_Ajax', array($this, 'contactUsSendMail_Ajax'));
        add_action('wp_ajax_contactUsSendMail_Ajax', array($this, 'contactUsSendMail_Ajax'));
        
        add_action('wp_ajax_nopriv_projectCategoryFilter_Ajax', array($this, 'projectCategoryFilter_Ajax'));
        add_action('wp_ajax_projectCategoryFilter_Ajax', array($this, 'projectCategoryFilter_Ajax'));
    }

    /**
     * Ajax process and send email for coffee list, using for both send email to me and send email to mercanta
     * Submit button will have data-act for sending case, email-to-me or email-to-mercanta
     * @return [JSON]
     * Noted: This AJAX function is using for some these features:
     * - User not logged in
     *     + Send email to me
     *     + Send email to mercanta
     * - User logged in
     *     + Request samples
     *     + Order Enquiry
     */
    function contactUsSendMail_Ajax()
    {
        parse_str($_POST['data'], $data);

        if (!$data || !is_array($data)) die();

        $error = 0;
        $fields_not_required = array('comment');
        foreach ($data as $key => $value) {
            if (in_array($key, $fields_not_required)) continue;
            if (empty($value)) {
                $error = 1;
                break;
            }
        }
        if ($error == 1) {
            $message = pll__("Please ensure all required fields are completed.");
        } else if (isset($data['phone']) && !preg_match('/^[0-9\-_\+\.\(\)\s]+$/i', $data['phone'])) {
            $error = 1;
            $message = pll__("Please ensure you entered a valid phone number.");
        } else if (!preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', $data['email'])) {
            $error = 1;
            $message = pll__("Please ensure you entered a valid email address.");
        }

        if ($error === 1) {
            die(json_encode(array('code' => '0', 'message' => $message)));
        }

        
        /**
         * Prepare data for sending email using email template in folder "includes/email-templates"
         */
        $send_mail_success_msg = get_option("send_mail_success_msg");
        if (empty($send_mail_success_msg)) $send_mail_success_msg = pll__("Your email has been sent successful!");
        $emailData = $data;

        $emailData['mail_from'] = get_option('mail_from');
        $emailData['mail_to'] = get_option('mail_to');

        /**
         * Data for send email to me
         */
        $emailData['subject'] = pll__('You have the New Request');
        $emailData['content'] = get_option("jwp_coffee_list_send_mail_content");
        $emailContent = $this->getEmailTemplate('email-to-nalux', $emailData);


//        Sending email
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $list_cc_email = get_option("list_cc_email");
        if (!empty($list_cc_email)) {
            $headers[] = 'Cc: ' . $list_cc_email;
        }
        $send_mail_result = wp_mail($emailData['mail_to'], $emailData['subject'], $emailContent, $headers);
        if ($send_mail_result) {
            die(json_encode(array('code' => '1', 'message' => $send_mail_success_msg)));
        } else {
            die(json_encode(array('code' => '0', 'message' => pll__('Send mail error, please checking your mail server again.'))));
        }

    }

    function getEmailTemplate($email_template, $data)
    {

        if (!$data || !is_array($data)) return '';
        @extract($data);

        $real_file_path = realpath(dirname(__FILE__)) . '/../includes/email-templates/email-to-tdarch.phtml';
        if ( !file_exists($real_file_path)) {
            return '';
        }
        ob_start();
        include($real_file_path);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    
    function projectCategoryFilter_Ajax () {
        $catFilter = $_POST['data'];
        if ($catFilter == 'all') {
            $tax_query = array();
        }
        else {
            $tax_query = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms' => $catFilter
                ));
        }
        $args = array(
            'post_type' => 'project',
            'tax_query' => $tax_query,
            'post_status' => 'publish',
            'lang' => pll_current_language('slug'),
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $index = 1;
        $loop = new WP_Query( $args );
        $projectCount = $loop->found_posts;
        $seeMores = '';
        if ($projectCount > 7) {
            $seeMores = '<div class="project-linkmore">
                <a href="#" class="more"><span>' . pll__("SEE MORE PROJECTS") . '</span></a>
            </div>';
        }
        $real_file_path = realpath(dirname(__FILE__)) . '/../includes/ajax-templates/project-category-filter.phtml';
        if ( !file_exists($real_file_path)) {
            return '';
        }
        ob_start();
        include($real_file_path);
        $content = ob_get_contents();
        ob_end_clean();
        if(empty($content)) die(json_encode(array('code' => '0', 'message' => pll__('There is no project!'))));
        else die(json_encode(array('code' => '1', 'message' => $content, 'seemore' => $seeMores)));
    }
    
}
