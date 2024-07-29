<?php

class DateModel extends CI_Model
{
    public function insertDate($data)
    {
        $this->db->insert('date', $data);
        return $this->db->insert_id();
    }

    public function updatedate($data)
    {
        echo $data['id'];
    }

    public function getDates(){
        $query = $this->db->get('date');
        return $query->result();
    }
}
