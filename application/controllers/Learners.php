<?php

/**
 * Description of Center
 *
 * @author shahed.chaklader
 * Date 14 March 2020
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Learners extends ADMIN_Controller {

    private $learnerID = null;

    public function __construct() {
        parent:: __construct();
        $this->learnerID = $this->input->get('id');
        
        //Set required JS
        $this->set_js("theme/js/learners.js");
        
    }

    public function index() {

        $learner_id = $this->qualid = $this->input->get('id');

        //Load Model
        $this->load->model('Learners_model', 'learner');
		
		//Get center iD from session
		$centre = $this->get_user_center()>1?$this->get_user_center():null;

        //Collection learner information  
        $data = $this->learner->get_learners($this->learnerID, $centre);

        //send data to view
        $this->set_value('data', $data);


        if ($this->learnerID == null) {
            $this->set_page_title("Registered Learner");
            $this->load_view('admin/blocks/learner/registered_learners');
        } else {
            $this->set_value('data', $data[0]);
            
            $quals = $this->get_qual_by_learner($this->learnerID,false);
            $this->set_value('quals', $quals);
            
            $this->set_page_title("Learner Profile");
            $this->load_view('admin/blocks/learner/learner_detail');
        }
    }

    public function add_new() {
        if ($this->input->is_ajax_request()) {
            $this->add_new_learner();
        } else {
            //$this->set_js('theme/js/learners.js');
            $this->set_page_title("Add new Learner");
            $this->load_view('admin/blocks/learner/add_new');
        }
    }

    private function add_new_learner() {

        $this->load->model('Db_model', 'dbs');

        if ($this->session->userdata('user_logged_in')) {
            $learner_data = $this->input->post('learner_data', true);
			
			
			//Get center iD from session
			$learner_data['center_id'] = $this->get_user_center()>1?$this->get_user_center():null;
			
            //var_dump($learner_data); 
            $result = $this->dbs->insert('adm_learners', $learner_data);

            echo $result;
        } else {
            redirect('login');
        }
    }

    public function assign_qualification() {
        if ($this->input->is_ajax_request()) {

            $learner_id = $this->input->post('learner_id');

            $assign = $this->get_qual_by_learner($learner_id);
            echo '{"qual":' . $this->load_qual_for_assing() . ',';

            if ($assign) {
                echo '"assign":' . $assign . '}';
            } else {
                echo '"assign":""}';
            }
        } else {
            $this->load->model('Db_model', 'dbs');
            $this->set_page_title("Assign Qualification");
            $this->load_view('admin/blocks/learner/add_new');
        }
    }

    private function load_qual_for_assing($learner_id = null, $center_id = null) {
        $this->load->model('Qualifications_model', 'qual');

        $result = $this->qual->get_qualification();

        return json_encode($result);
    }

    private function get_qual_by_learner($learner_id = null,$json=true) {
        $this->load->model('Qualifications_model', 'qual');

        $result = $this->qual->get_qualification_detail_by_learner($learner_id, $json);

        return $result;
    }

    public function assign_qualification_save() {

        if ($this->input->is_ajax_request()) {
            $post_data = $this->input->post('post_data');

            $learner_id = $post_data['learner_id'];
            $assigned_qual = $post_data['qual_list'];

            $this->load->model('Qualifications_model', 'qual');

            $result = $this->qual->save_quallification_by_learner($learner_id, $assigned_qual);

            echo $result;
        }
    }
    
    public function remove() {
        
        $learner_id = $this->input->post('learner_id');
        
        $this->load->model('Learners_model', 'lm');
        
        echo $this->lm->remove_learner_by_id($learner_id);
    }

}
