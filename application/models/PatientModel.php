<?php

class PatientModel extends CI_Model
{
    // Method to insert a new patient record into the database
    public function insertPatient($data)
    {
        // Extract the BHT number from the input data
        $BHT_num = $data['BHT_num'];

        // Check if a patient with the given BHT number already exists in the database
        $this->db->where('BHT_num', $BHT_num);
        $query = $this->db->get('patient');
        $result = $query->result();

        // If a patient with the given BHT number exists, return false
        if (count($result) > 0) {
            return false;
        } else {
            // If no patient with the given BHT number exists, insert the new patient record into the database
            $this->db->insert('patient', $data);
            // Return the ID of the newly inserted patient record
            return $this->db->insert_id();
        }
    }

    // Method to update an existing patient record
    public function updatePatient($data)
    {
        // Output the ID of the patient to be updated (for debugging purposes)
        echo $data['id'];
    }
}
