<?php

class PatientModel extends CI_Model
{
    public function insertPatient($data)
    {
        $this->db->insert('patient', $data);
        return $this->db->insert_id();
    }

    public function updatePatient($data)
    {
        echo $data['id'];
    }
}
