<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* * ************************************************* */
// Filename: user_model.php
// Created By:     Evana Yasmin 
// Change history:
//      
// @copyright   Copyright (c) 2018 - 2019, SCI.
// @copyright   Copyright (c) 2018 - 2019, National Institute of Population Research and Training (NIPORT)
// @license An open source application
// @Version     1.0
// Function list: get_username,get_other_username,profile,approval_list,
// userlist,UserRegistration,credential_create,get_last_userid,user_details,
// credential_update,personal_update,posting_update,user_delete,user_department,
// requisition_flow_next,transfer_flow_next,get_userby_id_pass,get_persons_by_office_id
//
/* * ************************************************* */

/**
 * AMS Asset user Model Class
 */
class user_model extends CI_Model {

    function __construct() {
        parent:: __construct();
        $this->load->database();
    }

    /*     * *********** User name exists checking ************** */

    function get_username($username) {

        $query = $this->db->get_where('login', array('user_name' => $username));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ***********User name except own exists checking************** */

    function get_other_username($username, $userid) {

        $this->db->select('*');
        $this->db->from('login');

        $this->db->where('user_name =', $username);
        $this->db->where("id !=", $userid);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //******Get User Profile Data from user table************
    function profile($userid) {

        //$query = $this->db->query("select * from fams_user where userid=$userid");

        $query = $this->db->get_where('fams_user', array('userid' => $userid));
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*     * ************ Approval User List  ************** */

    function approval_list() {

        $this->db->select('a.employee_id,a.user_email,b.*');
        $this->db->from('fams_login a, fams_user b, fams_role c');
        $this->db->where('a.id = b.userid');
        $this->db->where('c.role_id = a.user_role');
        $this->db->where('a.posting_center', $this->session->userdata('user_center'));

        $this->db->where('c.role_name != "SYSTEM_ADMIN"');
        //$this->db->where('c.role_name == "NIPORT_ADMIN"');
        //$this->db->where('c.role_name == "RTC_ADMIN"');
        $this->db->where('c.role_name != "INSPECTOR"');
        $this->db->where('c.role_name != "RTC_STORE_KEEPER"');
        $this->db->where('c.role_name != "NIPORT_STORE_KEEPER"');


        $query = $this->db->get();
        //echo $this->db->last_query();
        //exit();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*     * *************Get Active userlist****************** */

    function userlist() {

        //if (get_user_role_name() != 'SYSTEM_ADMIN' && get_user_role_name() != 'DEVELOPER') {
        if (get_user_role_name() != 'DEVELOPER') {
            $this->db->order_by('fullname', 'asc'); // or 'DESC'
            $this->db->select('a.employee_id,a.user_email,a.posting_center,a.user_name,b.*');
            $this->db->from('fams_login a, fams_user b, fams_role c');
            $this->db->where('a.id = b.userid');
            $this->db->where('c.role_id = a.user_role');
            $this->db->where('a.posting_center', $this->session->userdata('user_center'));
            //$this->db->where('c.role_name != "SYSTEM_ADMIN"');
            $this->db->where('c.role_name != "DEVELOPER"');
        } else if (get_user_role_name() == 'DEVELOPER') {// or 'DESC'
            $this->db->select('a.employee_id,a.user_email,a.posting_center,a.user_name,b.*');
            $this->db->from('fams_login a, fams_user b');
            $this->db->where('a.id = b.userid');
            $this->db->order_by('fullname', 'asc');
        } else {
            $this->db->order_by('fullname', 'asc'); // or 'DESC'
            $this->db->select('a.employee_id,a.user_email,a.posting_center,a.user_name,b.*');
            $this->db->from('fams_login a, fams_user b, fams_role c');
            $this->db->where('a.id = b.userid');
            $this->db->where('c.role_id = a.user_role');
            //$this->db->where('a.posting_center', $this->session->userdata('user_center'));
            $this->db->where('c.role_name != "DEVELOPER"');
        }
        //$this->db->where('r.permissions = u.permissions');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*     * *************User Registration************** */

    public function UserRegistration($max_id, $fullname, $designation, $department, $phone, $mobile, $district, $upazella, $village, $postcode, $hrid, $national_id) {
        $data = array(
            'profileid' => NULL,
            'userid' => $max_id,
            'fullname' => $fullname,
            'designation' => $designation,
            'department' => $department,
            'phone' => $phone,
            'mobile' => $mobile,
            'posting_district' => $district,
            'posting_upazella' => $upazella,
            'posting_village' => $village,
            'posting_postcode' => $postcode,
            'hr_id' => $hrid,
            'national_id' => $national_id,
            'user_status' => 1
        );
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->insert('fams_user', $data);
        return true;
    }

    /*     * ********* new User Create ************ */

    public function credential_create($user_email, $user_pass, $user_role, $user_nicename) {
        $this->db->set('user_name', $user_email);
        $this->db->set('user_email', $user_email);
        $this->db->set('user_pass', md5($user_pass));
        $this->db->set('user_role', $user_role);
        $this->db->set('user_nicename', $user_nicename);

        $this->db->trans_start();
        $this->db->insert('login');
        $user_id = $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            
            $this->db->set('userid', $user_id);
            $this->db->set('fullname', $user_nicename);
            $this->db->set('department', '1');

            $this->db->trans_start();
            $this->db->insert('user');
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                return TRUE;
            }
        }
    }

    /*     * **************get last userid****************** */

    function get_last_userid() {
        $this->db->select_max('id');
        //$query = $this->db->query("select max(id) max_id from fams_login");
        $query = $this->db->get('fams_login');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*     * *********** Profile Details of a User ***************** */

    function user_details($db_userid) {

        $this->db->select('a.*,b.*,c.*,d.*');
        $this->db->from('fams_login a, fams_user b, fams_role c, fams_office d');
        $this->db->where('a.id = b.userid');
        $this->db->where('a.user_role = c.role_id');
        $this->db->where('a.posting_center = d.office_id');
        $this->db->where('a.id =' . $db_userid);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*     * ********* Credential Update *********** */

    function credential_update($db_userid, $employee_id, $user_name, $email, $nicename, $user_role, $posting_center) {
        //echo $posting_center;
        $updateData = array(
            'employee_id' => $employee_id,
            'user_name' => $user_name,
            'user_email' => $email,
            'user_role' => $user_role,
            'user_nicename' => $nicename,
            'posting_center' => $posting_center,
        );
        $this->db->where('id', $db_userid);
        $this->db->update('fams_login', $updateData);
    }

    /*     * ********* Personal Update *********** */

    function personal_update($db_userid, $fullname, $hr_id, $national_id, $designation, $department, $phone, $mobile, $user_status) {
        $updateData = array(
            'fullname' => $fullname,
            'designation' => $designation,
            'department' => $department,
            'phone' => $phone,
            'mobile' => $mobile,
            'user_status' => $user_status,
            'hr_id' => $hr_id,
            'national_id' => $national_id,
        );
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->where('userid', $db_userid);
        $this->db->update('fams_user', $updateData);
    }

    /*     * ********* Posting Update *********** */

    function posting_update($db_userid, $district, $upazella, $village, $postcode) {
        $updateData = array(
            'posting_district' => $district,
            'posting_upazella' => $upazella,
            'posting_village' => $village,
            'posting_postcode' => $postcode,
        );
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->where('userid', $db_userid);
        $this->db->update('fams_user', $updateData);
    }

    /*     * **********User Delete************** */

    function user_delete($db_userid) {
        $this->db->where('userid', $db_userid);
        $this->db->delete('fams_user');
        $this->db->where('id', $db_userid);
        $query = $this->db->delete('fams_login');
        return $query;
    }

    /*     * ********** Get user Department ************** */

    function user_department($user_id) {
        $this->db->select('department');
        $this->db->from('fams_user');
        $this->db->where('userid', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*     * *********** requisition flow administrator id *************** */

    function requisition_flow_next($office_id, $dept_id, $step = null) {
        if ($office_id == 1) {
            $this->db->select('*');
            $this->db->from('fams_requisition_flow');
            $this->db->where('department_id ', $dept_id);
            $this->db->where('step', $step);
            $query = $this->db->get();
            return $query->result();
        } else {
            if ($step == 1) {
                $user_role = 4;
            } else {
                $user_role = 5;
            }
            $this->db->select('id');
            $this->db->from('fams_login');
            $this->db->where('posting_center', $office_id);
            $this->db->where('user_role', $user_role);
            $query = $this->db->get();
            return $query->result();
        }
    }

    /*     * *********** requisition transfer flow administrator id *************** */

    function transfer_flow_next($step) {
        $this->db->select('*');
        $this->db->from('fams_transfer_flow');
        $this->db->where('step', $step);
        $query = $this->db->get();
        return $query->result();
    }

    /*     * *********** Get user by user id and password *************** */

    function get_userby_id_pass($id, $pass) {
        $pass = md5($pass);
        $query = $this->db->get_where('login', array('id' => $id, 'user_pass' => $pass));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * *********** Get person by office id*************** */

    function get_persons_by_office_id($office_id = null) {
        $this->db->select('fams_user.userid, fams_user.fullname , fams_user.designation ');
        $this->db->from('fams_login');
        $this->db->where('posting_center', $office_id);
        $this->db->join('fams_user', 'fams_user.userid = fams_login.id', 'left');
        $this->db->order_by('fullname', 'asc');
        $query = $this->db->get();

        if ($query->num_rows > 0) {
            return $query->result();
        }

        return false;
    }

}

?>
