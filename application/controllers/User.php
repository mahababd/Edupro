<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* * ************************************************* */
// Filename: user.php
// Created By:     Evana Yasmin 
// Change history:
//      
// @copyright   Copyright (c) 2018 - 2019, SCI.
// @copyright   Copyright (c) 2018 - 2019, National Institute of Population Research and Training (NIPORT)
// @license An open source application
// @Version     1.0
// Function list: adduser,userlist,profile,update,delete,pic_upload,details_edit,details_edit,
// change_pass,change_password,user_change_password
/* * ************************************************* */

/**
 * AMS Asset user Controller Class
 *
 * This method demonstrates the user CRUD operation of AMS.
 */
class user extends ADMIN_Controller {

    //put your code here

    function __construct() {
        parent::__construct();


        $this->load->model('user_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
        $this->load->model('Centers_model', 'center_model', TRUE);

        $this->load->library('encrypt');
        $this->load->library('session');

        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->set_js("theme/js/user.js");
        $this->set_js("theme/js/learners.js");
    }

    public function index() {
        $this->set_page_title('User');
        $this->set_page_sub_title('control panel');
    }

    /**
     * This function generates the user creation form.
     */
    public function adduser() {
        if ($this->input->post('form_submit') != 200) {
            $this->set_page_title(load_message('ADD_NEW_USER'));
            $this->set_page_sub_title('');
            $result = $this->role_model->rolelists();
            $center = $this->center_model->get_centers();


            $this->set_value('role_list', $result);
            $this->set_value('center_list', $center);
            //$this->set_value('dept_list', $dept_list);
            
            
            $this->load_view('admin/user/user_create');
        }
        else{
            $user_email=$this->input->post('user_email');
            $user_pass=$this->input->post('user_pass');
            $user_role=$this->input->post('user_role');
            $user_nicename=$this->input->post('user_nicename');
            
            $this->insert_user($user_email, $user_pass, $user_role, $user_nicename);
        }
    }

    public function insert_user($user_email, $user_pass, $user_role, $user_nicename) {
        $this->user_model->credential_create($user_email, $user_pass, $user_role, $user_nicename);
    }

    /**
     * This function retrieves the userlist from database.
     */
    public function userlist() {
        $this->set_page_title(load_message('USER_LIST'));
        $this->set_page_sub_title('');
        $this->set_js('dist/js/jsonmap.js');
        $this->set_js('dist/js/sci/project.js');
        $this->set_js('dist/js/asset_script.js');
        $this->set_js('dist/js/global_script.js');
        $this->set_js('dist/js/general_script.js');

        $result = $this->user_model->userlist();
        //var_dump($result);
        $this->set_value('user_list', $result);
        $this->load_view('admin_lte/user/user_list');
    }

    /**
     * This function retrieves the user details of a user and display it on modal.
     */
    public function profile() {
        $this->set_page_title(load_message('USER_PROFILE'));
        $this->set_page_sub_title('');
        $this->set_js('dist/js/jsonmap.js');
        $this->set_js('dist/js/sci/project.js');
        $this->set_js('dist/js/asset_script.js');
        $this->set_js('dist/js/global_script.js');
        $this->set_js('dist/js/general_script.js');


        $this->load_view('admin/user/profile');
    }

    public function settings() {
        $this->set_page_title('User Settings');
        $this->load_view('admin/user/settings');
    }

    /**
     * This function updates the user details of a user.
     */
    public function update() {
        $this->set_js('dist/js/jsonmap.js');
        if ($this->input->is_ajax_request()) {
            //echo"got it!";

            $jsondata = $this->input->post('jsondata', true);
            $json_output = json_decode($jsondata, true);

            //echo $json_output['updateid'] ;
            // echo $json_output['user_name'] ;

            $result = $this->user_model->get_other_username($json_output['user_name'], $json_output['updateid']);

            if ($result == true) /* Username already exist */ {
                echo $this->lang->line('USER_NAME_ALREADY_TAKEN');
            } else /*             * ******Username unique: Update registered user*********** */ {
                //echo"Not duplicate!";
                $a = array("employee_id" => empty($json_output['employee_id']) ? null : $json_output['employee_id'],
                    'user_name' => filter_var($json_output['user_name'], FILTER_SANITIZE_STRING),
                    'user_email' => filter_var($json_output['user_email'], FILTER_SANITIZE_STRING),
                    'user_role' => filter_var($json_output['user_role'], FILTER_SANITIZE_STRING),
                    'user_nicename' => filter_var($json_output['user_nicename'], FILTER_SANITIZE_STRING),
                    'posting_center' => filter_var($json_output['posting_center'], FILTER_SANITIZE_STRING)
                );

                $json = json_encode($a, true);
                $json = json_decode($json, true);
                $result = sci_update_db('login', $json, ['id' => $json_output['updateid']]);
                if ($result <> false) {
                    //echo"update";

                    $b = array('fullname' => filter_var($json_output['fullname'], FILTER_SANITIZE_STRING),
                        'designation' => filter_var($json_output['designation'], FILTER_SANITIZE_STRING),
                        'department' => filter_var($json_output['department'], FILTER_SANITIZE_STRING),
                        'phone' => filter_var($json_output['phone'], FILTER_SANITIZE_STRING),
                        'mobile' => filter_var($json_output['mobile'], FILTER_SANITIZE_STRING),
                        'posting_district' => filter_var($json_output['posting_district'], FILTER_SANITIZE_STRING),
                        'posting_upazella' => filter_var($json_output['posting_upazella'], FILTER_SANITIZE_STRING),
                        'posting_village' => filter_var($json_output['posting_village'], FILTER_SANITIZE_STRING),
                        'posting_postcode' => filter_var($json_output['posting_postcode'], FILTER_SANITIZE_STRING),
                        'hr_id' => filter_var($json_output['hr_id'], FILTER_SANITIZE_STRING),
                        'national_id' => filter_var($json_output['national_id'], FILTER_SANITIZE_STRING),
                        'user_status' => $json_output['user_status'],
                    );

                    $profile_json = json_encode($b, true);
                    $profile_json = json_decode($profile_json, true);

                    $res = sci_update_db('user', $profile_json, ['userid' => $json_output['updateid']]);
                    if ($res <> false) {
                        /*                         * ** Audit Log *** */
                        $action_name = "User Update";
                        log_create($action_name, json_encode($profile_json, true));
                        /*                         * ** Audit log end here **** */

                        echo $this->lang->line('UPDATE');
                    }
                } else {
                    echo "Sorry! Not updated.";
                }
            }
        } else {
            exit('No direct script access allowed');
        }
    }

    /**
     * This function deletes the existing user from database.
     */
    public function delete() {
        if ($this->input->is_ajax_request()) {
            $db_userid = $this->input->post('user_id', true);
            $result = $this->user_model->user_delete($db_userid);
            if ($result <> false) {
                /*                 * ** Audit Log *** */
                $action_name = "User Delete";
                log_create($action_name, $db_userid);
                /*                 * ** Audit log end here **** */
                echo $this->lang->line('DELETE');
            }
        } else {
            exit('No direct script access allowed');
        }
    }

    /**
     * This function uploads the profile picture of a user.
     */
    public function pic_upload() {
        $config['upload_path'] = 'theme/dist/img/user/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024 * 10;
        $config['max_width'] = 1024 * 10;
        $config['max_height'] = 768 * 10;
        $config['overwrite'] = true;
        $config['file_name'] = $this->session->userdata('user_db_id') . '.jpg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userImage')) {
            $error = array('type' => 'error', 'error' => $this->upload->display_errors());
            // set text compatible IE7, IE8
            header('Content-type: text/plain');
            // set json non IE
            header('Content-type: application/json');

            echo json_encode($error);
        } else {
            $data = array('type' => 'success', 'upload_data' => $this->upload->data());
            // set text compatible IE7, IE8
            header('Content-type: text/plain');
            // set json non IE
            header('Content-type: application/json');

            echo json_encode($data);
        }
    }

    /**
     * This function updates the detail information of a user.
     */
    public function details_edit() {
        $jsondata = json_decode($this->input->post('jsondata', true), true);
        $user_id = $jsondata["update_id"];
        $user_email = $jsondata["user_email"];
        unset($jsondata["update_id"]);
        unset($jsondata["user_email"]);
        $nice_name = $jsondata["fullname"];
        $result = sci_update_db('fams_user', $jsondata, ['userid' => $user_id]);
        $result2 = sci_update_db('fams_login', ['user_email' => $user_email, 'user_nicename' => $nice_name], ['id' => $user_id]);
        if ($result <> false) {

            /*             * ** Audit Log *** */
            $action_name = "User Details Edit";
            log_create($action_name, json_encode($jsondata, true));
            /*             * ** Audit log end here **** */

            echo '{"status": "success", "message": "' . $this->lang->line('USER_UPDATE') . '"}';
        } else {
            echo '{"status": "error", "message": "' . $this->lang->line('ERROR_USER_UPDATE') . '"}';
        }
    }

    /**
     * This function updates/changes the existing user password of a user.
     */
    public function change_pass() {
        $jsondata = json_decode($this->input->post('jsondata', true), true);
        $user_id = $jsondata["update_id"];
        $current_pass = $jsondata["current_pass"];
        $new_pass = $jsondata["new_pass"];
        $confirm_pass = $jsondata["confirm_pass"];
        if ($new_pass == $confirm_pass) {
            $available = $this->user_model->get_userby_id_pass($user_id, $current_pass);
            if ($available) {
                $result = sci_update_db('login', ['user_pass' => md5($new_pass)], ['id' => $user_id]);
                if ($result) {

                    /*                     * ** Audit Log *** */
                    $action_name = "User Password Edit";
                    log_create($action_name, json_encode($jsondata, true));
                    /*                     * ** Audit log end here **** */
                    echo '{"status": "success", "message": "Password successfully changed"}';
                }
            } else {
                echo '{"status": "error", "message": "Please provide correct current password"}';
            }
        } else {
            echo '{"status": "error", "message": "New password is mismatch"}';
        }
    }

    /**
     * This function generates the change password form of a user.
     */
    public function change_password() {
        $this->set_page_title('Change Password');
        $this->set_page_sub_title('');
        $this->set_js('dist/js/jsonmap.js');
        $this->set_js('dist/js/sci/project.js');
        $this->set_js('dist/js/global_script.js');
        $result = $this->user_model->userlist();

        $this->set_value('user_list', $result);
        $this->load_view('admin_lte/user/user_change_password');
    }

    /**
     * This function updates/changes the existing user password of a user.
     */
    public function user_change_password() {
        $jsondata = json_decode($this->input->post('jsondata', true), true);
        $id = $jsondata["id"];
        $new_pass = $jsondata["new_pass"];
        $confirm_pass = $jsondata["confirm_pass"];
        if ($new_pass == $confirm_pass) {
            $result = sci_update_db('login', ['user_pass' => md5($new_pass)], ['id' => $id]);
            if ($result) {

                /*                 * ** Audit Log *** */
                $action_name = "User Password Edit";
                log_create($action_name, json_encode($jsondata, true));
                /*                 * ** Audit log end here **** */
                echo '{"status": "success", "message": "Password successfully changed"}';
            }
        } else {
            echo '{"status": "error", "message": "New password is mismatch"}';
        }
    }

}
