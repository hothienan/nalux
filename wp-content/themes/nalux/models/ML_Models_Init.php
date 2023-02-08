<?php
include_once(TEMPLATEPATH. "/models/MLCustomtype.php"); /* regis content types */
class ML_Models_Init{
	
	function __construct() {
	
    }	
	
	public function init(){
		$this->ptProject();
		$this->ptOurStaff();
		$this->ptAwards();
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
}
?>