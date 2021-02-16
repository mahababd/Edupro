<?php

/**
 * Description of auth
 * * @author shahed.chaklader
 * Create Date: 13 march 2020
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Qualifications_model extends CI_Model {

    //put your code here

    public function get_qualification($id = null, $center_id = null) {
        $this->db->select('*');
        $this->db->from('qualification');

        if ($id != null) {
            $this->db->where('id', $id);
			$res = $this->db->get();
        }
		else{
			
			$qry = 'SELECT * FROM adm_qualification q left join adm_center_qual_map q1 on q.id = q1.qual_id ';
			
			if($center_id != null)
			{
				$qry .= "where q1.center_id = "	.$center_id;	
			}
			
			$res= $this->db->query($qry);
			
		}

        if ($res->num_rows() > 0) {
            $data = $res->result();
            return $data;
        }
        return false;
    }

    public function get_qualification_by_learner($learner_id = null, $json = false) {
        $this->db->select('*');
        $this->db->from('learners_qualification_map');

        if ($learner_id != null) {
            $this->db->where('learners_id', $learner_id);
        }
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $data = $res->result();

            if ($json) {
                return json_encode($data);
            }

            return $data;
        }
        return false;
    }
    
    
    public function get_qualification_detail_by_learner($learner_id = null, $json = false) {
        $this->db->select('*');
        $this->db->from('learners_qualification_map lqm');
        $this->db->join('qualification q', 'q.id = lqm.qual_id');
        $this->db->join('status s', 's.status_id = lqm.status');

        if ($learner_id != null) {
            $this->db->where('lqm.learners_id', $learner_id);
        }
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            $data = $res->result();

            if ($json) {
                return json_encode($data);
            }

            return $data;
        }
        return false;
    }
    
    
    public function save_quallification_by_learner($learner_id, $qual_data) {
        $table = "learners_qualification_map";
        //var_dump($qual_data);
               
        $this->db->trans_start();
        
        $this->db->where('learners_id', $learner_id);
        $this->db->where('status', 1);
        $this->db->delete($table); 
        
        if(is_array($qual_data)){
            foreach($qual_data as $qual){
                
                $data = array(
                    "learners_id" => $learner_id,
                    "qual_id" => $qual
                );
                
                $this->db->insert($table, $data);
            }
        }
        
        
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
           return true;
        }
    }
    
    

}
