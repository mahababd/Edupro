<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author shahed.chaklader
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class auth extends CI_Model
{

    //put your code here

    public function check_user_by_email_pass($em = null, $pass = null)
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('user_name', $em);
        $this->db->where('user_pass', md5($pass));
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $user = $res->result();
            return $user[0];
        }
        return false;
    }

    public function get_permission_by_role_id($role_id)
    {
        $this->db->select('*');
        $this->db->from('role');
        $this->db->where('role_id', $role_id);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $role = $res->result();
            //var_dump($role);
            //exit;
            return $role[0]->privilage_id;
        }
        return false;
    }

    public function userstatus($user_id)
    {

        $this->db->select('user_status');
        $this->db->from('user');
        $this->db->where('userid', $user_id);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $user = $res->result();
            //var_dump($role);
            //exit;
            return $user[0]->user_status;
        }

        return false;
    }

    public function rolestatus($role_id)
    {

        $this->db->select('role_status');
        $this->db->from('role');
        $this->db->where('role_id', $role_id);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $role = $res->result();
            //var_dump($role);
            //exit;
            return $role[0]->role_status;
        }
        
        return false;

    }
    public function get_role_rank_by_role_id($role_id){
        $this->db->select('role_rank');
        $this->db->from('role');
        $this->db->where('role_id', $role_id);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $role = $res->result();
            //var_dump($role);
           // exit;
            return $role[0]->role_rank;
        }
        return false;
    }

    //GET all controller and associative method name form privilege table
    public function get_controller_by_priv_id($priv_id)
    {
        $this->db->select('privilege');
        $this->db->from('privilege');
        $this->db->where_in('privilege_id', explode(",", $priv_id));
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $privilege = array();
            foreach ($res->result() as $priv) {
                array_push($privilege, $priv->privilege);
            }
            return implode(",", $privilege);
        }

        return false;

    }

}
