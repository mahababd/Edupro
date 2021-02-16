<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trainers extends ADMIN_Controller {

    public function index() {
        $this->set_page_title("Approved Qualification");
		$this->load_view('admin/blocks/qualification/approved_qualification');
    }
	
	 public function index() {
        $this->set_page_title("Approved Qualification");
		$this->load_view('admin/blocks/qualification/approved_qualification');
    }

}
