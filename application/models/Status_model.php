<?php
    class Status_model extends CI_Model{
        function printStatus(){
            $query =$this->db->get('status');
            if($query->num_rows() >=1){
                return $query;
            }
        }
        function turnVoting(){
            $data = array(
               'id' => 1,
               'active' => 1
            );
            $this->db->where('id', 1);
            $this->db->update('status', $data);
            return 1;
        }
        function killVoting(){
            $data = array(
               'id' => 1,
               'active' => 0
            );
            $this->db->where('id', 1);
            $this->db->update('status', $data); 
            return 1;
        }
        function turnRequests(){
            $data = array(
               'id' => 2,
               'active' => 1
            );
            $this->db->where('id', 2);
            $this->db->update('status', $data);
            return 1;
        }
        function killRequests(){
            $data = array(
               'id' => 2,
               'active' => 0
            );
            $this->db->where('id', 2);
            $this->db->update('status', $data); 
            return 1;
        }
    }

?>

