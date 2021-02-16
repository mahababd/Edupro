<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Qualification extends ADMIN_Controller {
    
    private $qualid = null;

    public function index() {
        
        $this->qualid = $this->input->get('qualid');

        //Load Model
        $this->load->model('Qualifications_model','qual');
		
		//Get center iD from session
		$centre = $this->get_user_center()>1?$this->get_user_center():null;
        
        //Collection Qualification information  
        $qual = $this->qual->get_qualification($this->qualid,$centre);
		
		

        //Set qual list to send view
        $this->set_value('qual_list',$qual);
        
        
        //Managing View

        if($this->qualid== null){
            $this->set_page_title("Approved Qualification");
            $this->load_view('admin/blocks/qualification/approved_qualification');
        }else{
            $this->set_page_title("Approved Qualification");
            $this->load_view('admin/blocks/qualification/approved_qualification_detail');
        }
        
        
		
    }
    
}
