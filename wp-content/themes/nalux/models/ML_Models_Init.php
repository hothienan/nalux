<?php
include_once(TEMPLATEPATH. "/models/MLCustomtype.php"); /* regis content types */
class ML_Models_Init{
	public $taxName = 'project-group';
    public $labels = array(
        'name' => 'Các nhóm dự án',
        'singular' => 'Nhóm dự án',
        'menu_name' => 'Nhóm dự án'
    );
    public $postType = 'project';
	function __construct() {
	
    }	
	
	public function init(){
		$this->ptProject();
		$this->ptOurStaff();
		$this->ptAwards();
		$this->projectTaxonomy();
	}
	
	private function ptProject(){
	
		$TDARCHCustomType = new MLCustomtype();
		$TDARCHCustomType->slug = 'project';
		$TDARCHCustomType->code = 'project';
		$TDARCHCustomType->name = 'Dự án';
		$TDARCHCustomType->menu_name = 'Project';
		$TDARCHCustomType->has_archive = false;
		$TDARCHCustomType->show_in_menu = true;
		$TDARCHCustomType->taxonomies = array( 'category' );
        $TDARCHCustomType->supports = array('title',"editor","thumbnail", "author", "excerpt", "revisions", "custom-fields");
		$TDARCHCustomType->register();
		
	}

	private function ptAwards(){

		$TDARCHCustomType = new MLCustomtype();
		$TDARCHCustomType->slug = 'award';
		$TDARCHCustomType->code = 'award';
		$TDARCHCustomType->name = 'Giải thưởng';
		$TDARCHCustomType->menu_name = 'Awards';
		$TDARCHCustomType->show_in_menu = true;
        $TDARCHCustomType->taxonomies = array( 'category' );
		$TDARCHCustomType->supports = array('title',"editor","thumbnail");
		$TDARCHCustomType->register();

	}

	private function ptOurStaff(){

		$TDARCHCustomType = new MLCustomtype();
		$TDARCHCustomType->slug = 'staff';
		$TDARCHCustomType->code = 'staff';
		$TDARCHCustomType->name = 'Đội ngũ';
		$TDARCHCustomType->menu_name = 'Our Staff';
		$TDARCHCustomType->show_in_menu = true;
		$TDARCHCustomType->supports = array('title',"editor","thumbnail");
		$TDARCHCustomType->register();

	}

	function register_taxonomy_type(){
        $args = array(
            'labels'                     => $this->labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_rest'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'query_var' => true,
        );
            register_taxonomy($this->taxName, $this->postType, $args);
    }

    private function projectTaxonomy(){
        add_action( 'init', array($this,'register_taxonomy_type' ));
    }
}
?>