<?php

/**
 * Description of auth
 * * @author shahed.chaklader
 * Create Date: 13 march 2020
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Learners_model extends CI_Model {

    //put your code here

    public function get_learners($id = null, $center_id = null) {
        $this->db->select('*');
        $this->db->from('learners');

        if ($id != null) {
            $this->db->where('id', $id);
        }
		
		if ($center_id != null)
		{
			 $this->db->where('center_id', $center_id);	
		}
		
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $data = $res->result();
            return $data;
        }
        return false;
    }

    public function remove_learner_by_id($id) {

        $this->db->trans_start();

        //delete learner
        $this->db->where('id', $id);
        $this->db->delete('learners');
        $this->db->trans_complete();
        
        //echo $this->db->last_query();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }else{
            return true;
        }
    }
}   