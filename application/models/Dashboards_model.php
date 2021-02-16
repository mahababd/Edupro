<?php

/**
 * Description of auth
 * * @author shahed.chaklader
 * Create Date: 13 march 2020
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboards_model extends CI_Model
{
	private $center_id = null;
	private $data_json= array();

    //put your code here
	
	private function get_center(){
		$this->db->select('*');
        $this->db->from('center');
        
        if($this->center_id!=null){
            $this->db->where('id',$this->center_id);
        }
        $res = $this->db->get();
        
            
        if ($res->num_rows() > 0) {
            $data = $res->result();
            array_push($this->data_json, array('center'=>$data[0]));
        }
        
	}
	
	private function get_learners(){
		$this->db->select('*');
        $this->db->from('learners');
        
        if($this->center_id!=null){
            $this->db->where('center_id',$this->center_id);
        }
        $res = $this->db->get();
        
            
        if ($res->num_rows() > 0) {
            $data = $res->result();
            array_push($this->data_json, array('learners'=>$data));
        }
        
	}
	
	private function get_quals(){
		//$this->db->select('*');
        //$this->db->from('learners');
        
        if($this->center_id!=null){
           $res= $this->db->query('SELECT * FROM adm_qualification q left join adm_center_qual_map q1 on q.id = q1.qual_id where q1.center_id = '.$this->center_id);
        }
        //$res = $this->db->get();
        
            
        if ($res->num_rows() > 0) {
            $data = $res->result();
            array_push($this->data_json, array('quals'=>$data));
        }
        
	}

    public function get_center_info($id = null)
    {
        $this->center_id = $id;
		$this->get_center();
		$this->get_learners();
		$this->get_quals();
		
		return json_encode($this->data_json);
		
    }
	
}

