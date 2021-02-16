<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/****************************************************/
// Filename: role_model.php
// Created By:     Evana Yasmin 
// Change history:
//      
// @copyright   Copyright (c) 2018 - 2019, SCI.
// @copyright   Copyright (c) 2018 - 2019, National Institute of Population Research and Training (NIPORT)
// @license An open source application
// @Version     1.0
// Function list: rolelist,rolelists,privilegelist,role_create,
// role_delete,role_update,role_details,
/****************************************************/

 /**
 * AMS Role Model Class
 */
class role_model extends CI_Model
{

    function __construct()
    {
        parent:: __construct();
        $this->load->database();

    }

    //******Get User role from role table************
    function rolelist()
    {
        $this->db->order_by('role_rank', 'ASC');
        $query = $this->db->get('role');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //******Get User role from role table************
    function rolelists()
    {
        $this->db->order_by('role_rank', 'ASC');
        $this->db->where('role_rank >=', $this->session->userdata('user_role_rank'));
        $query = $this->db->get('role');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //******Get role privilege from privilege table************
    function privilegelist()
    {
        $this->db->order_by('privilege.privilege', 'ASC');
        $query = $this->db->get_where('privilege', array('privilege_status' => 1));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    /***********Create New Role****************/
    function role_create($role_name,$role_rank, $check_string)
    {
        $data = array(
            'role_id' => NULL,
            'role_name' => $role_name,
            'role_rank' => $role_rank,
            'privilage_id' => $check_string,
            'role_status' => 1
        );
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->insert('role', $data);
        return true;
    }

    /**********Role Delete*************/
    function role_delete($db_roleid)
    {
        $this->db->where('role_id', $db_roleid);
        $this->db->delete('role');
    }

    /**********Role Update*************/
    function role_update($db_roleid, $role_name,$role_rank, $privilage_id, $role_status)
    {
        $updateData = array(
            'role_name' => $role_name,
            'role_rank' => $role_rank,
            'privilage_id' => $privilage_id,
            'role_status' => $role_status,
        );
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->where('role_id', $db_roleid);
        $query = $this->db->update('role', $updateData);
        return $query;
    }

    /***********Role Details************/
    function role_details($db_roleid)
    {
        $this->db->where('role_id', $db_roleid);
        $query = $this->db->get('role');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }
}