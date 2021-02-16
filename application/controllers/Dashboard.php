<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends ADMIN_Controller {
	private $centerid= null;
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Dashboards_model','dash');
		
		$this->centerid = $_SESSION ['user_center'];
	}

    public function index() {
		//print_r($_SESSION);
		//exit;
        $this->set_page_title("Dashboard");
		
		
		if($this->centerid>1){
			
			//echo "<pre>";
			$data=$this->dash->get_center_info($this->centerid);
			$this->set_value('data', $data);
			$this->load_view('admin/blocks/dashboard_center');
		}
		else
			$this->load_view('admin/blocks/dashboard');
    }

}