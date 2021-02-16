<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('sci_insert_db')) {

    function sci_insert_db($table, $data)
    {
        $ci =& get_instance();

        //print_r($data);

        $data = json_decode($data, true);
        $ci->db->insert($table, $data);

        if ($ci->db->affected_rows() < 1) {
            return false;
        } else {
            return $ci->db->insert_id();
        }

    }

}

if (!function_exists('sci_update_db')) {

    function sci_update_db($table, $data, $where = array())
    {
        $ci =& get_instance();

        //$data = json_decode($data, true);

        $ci->db->set('update_date', 'NOW()', FALSE);
        $ci->db->where($where);
        $ci->db->update($table, $data);
        if ($ci->db->affected_rows() < 1) {
            return false;
        } else {
            return true;
        }

    }

}

if (!function_exists('sci_delete_db')) {

    function sci_delete_db($table, $where = array())
    {
        $ci =& get_instance();
        $ci->db->where($where);
        $ci->db->delete($table);
        if ($ci->db->affected_rows() < 1) {
            return false;
        } else {
            return true;
        }
    }

}

if (!function_exists('sci_select_db')) {

    function sci_select_db($table, $where, $select = '*')
    {
        $ci =& get_instance();
        // $ci->load->database();

        $ci->db->select($select);
        $ci->db->from($table);
        $ci->db->where($where);

        $query = $ci->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}