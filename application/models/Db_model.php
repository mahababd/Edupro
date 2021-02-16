<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Db
 *
 * @author shahed.chaklader
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Db_model extends CI_Model {

    public function insert($table, $data) {
        $this->db->trans_start();
        $this->db->insert($table, $data);
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
           return true;
        }
    }
    
    
    public function search_exists($table,$column,$val){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $val);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            return true;
        }
        return false;
    }

}
