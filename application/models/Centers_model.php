<?php

/**
 * Description of auth
 * * @author shahed.chaklader
 * Create Date: 13 march 2020
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Centers_model extends CI_Model
{

    //put your code here

    public function get_centers($id = null)
    {
        $this->db->select('*');
        $this->db->from('center');
        
        if($id!=null){
            $this->db->where('id',$id);
        }
        $res = $this->db->get();
        
            
        if ($res->num_rows() > 0) {
            $data = $res->result();
            return $data;
        }
        return false;
    }
}

