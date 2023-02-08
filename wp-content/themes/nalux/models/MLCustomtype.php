<?php
class MLCustomtype {

    public $slug;
    public $code;
    public $name;
    public $menu_name;
    public $show_ui = true;
    public $show_in_menu = true;
    public $menu_position = null;
    public $taxonomies = array();
    public $has_archive = true;
    public $supports = array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' );


    function __construct() {

    }

    public function register() {
        add_action( 'init', array($this,'register_content_type' ));
    }

    function register_content_type() {
        $labels = array(
            'name' => $this->name,
            'singular_name' => $this->name,
            'add_new' => 'Add New',
            'add_new_item' => 'Add New '.$this->name,
            'edit_item' => 'Edit '.$this->name,
            'new_item' => 'New '.$this->name,
            'all_items' => 'All '.$this->name,
            'view_item' => 'View '.$this->name,
            'search_items' => 'Search '.$this->name,
            'not_found' =>  'No data found',
            'not_found_in_trash' => 'No data found in Trash',
            'parent_item_colon' => '',
            'menu_name' => $this->name
        );

        $code = (empty($this->code)) ? $this->slug : $this->code;
        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => $this->show_ui,
            'show_in_menu' => $this->show_in_menu,
            'query_var' => true,
            'rewrite' => array( 'slug' => $code ),
            'capability_type' => 'post',
            'has_archive' => $this->has_archive,
            'hierarchical' => true,
            'menu_position' => null,
            'show_in_rest' => true,
            'taxonomies'          => $this->taxonomies,
            'supports' => $this->supports
        );
        flush_rewrite_rules( false );
        register_post_type( $this->slug, $args );
    }
}

?>