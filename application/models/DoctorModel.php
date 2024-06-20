<?php

class DoctorModel extends CI_Model
{
    public function insertDoctor($data)
    {
        $this->db->insert('doctor', $data);
        return $this->db->insert_id();
    }

    public function updateDoctor($data)
    {
        echo $data['id'];
    }
}
