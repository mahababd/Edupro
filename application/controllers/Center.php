<?php

/**
 * Description of Center
 *
 * @author shahed.chaklader
 * Date 14 March 2020
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends ADMIN_Controller {

    private $center_id = null;

    public function __construct() {
        parent:: __construct();
        //Load Model
        $this->load->model('Centers_model', 'center');

        $this->center_id = $this->input->get('id');
        
        //Set required JS
        $this->set_js("theme/js/centers.js");
    }

    public function index() {

        //Collection Qualification information  
        $data = $this->center->get_centers($this->center_id);

        //Set qual list to send view
        $this->set_value('data', $data);

        if ($this->center_id == null) {
            $this->set_page_title("Center Management");
            $this->load_view('admin/blocks/center/registered_centres');
        }
        else
        {
            $this->set_page_title("Center Detail");
            $this->load_view('admin/blocks/center/centre_detail');
        }
    }

    public function process() {
        if ($this->input->is_ajax_request()) {
            $this->add_new_center();
        } else {
            //$this->set_js('theme/js/centers.js');
            $this->set_page_title("Add New Center");
            $this->load_view('admin/blocks/center/add_new_center');
        }
    }

    private function add_new_center() {

        $this->load->model('Db_model', 'dbs');

        if ($this->session->userdata('user_logged_in')) {
            $data = $this->input->post('post_data', true);


            //Checking existance
            if ($this->dbs->search_exists('center', 'center_code', $data['center_code'])) {
                echo "er02";
            } else {

                $result = $this->dbs->insert('center', $data);
                echo $result;
            }
        } else {
            redirect('login');
        }
    }

}
