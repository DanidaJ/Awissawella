<?php

class DoctorModel extends CI_Model
{
    // Method to insert a new doctor record into the database
    public function insertDoctor($data)
    {
        // Extract the doctor's NIC (National Identity Card) number from the input data
        $doctor_NIC = $data['doctor_NIC'];

        // Check if a doctor with the given NIC number already exists in the database
        $this->db->where('doctor_NIC', $doctor_NIC);
        $query = $this->db->get('doctor');
        $result = $query->result();

        // If a doctor with the given NIC number exists, return false indicating that the NIC is not available
        if (count($result) > 0) {
            return false;
        } else {
            // If no doctor with the given NIC number exists, insert the new doctor record into the database
            $this->db->insert('doctor', $data);
            // Return the ID of the newly inserted doctor record
            return $this->db->insert_id();
        }
    }

    // Method to update an existing doctor record
    public function updateDoctor($data)
    {
        // Output the ID of the doctor to be updated (for debugging purposes)
        echo $data['id'];
    }
}
