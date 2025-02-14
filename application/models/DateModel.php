<?php

class DateModel extends CI_Model
{
    // Method to insert a new date record into the database
    public function insertDate($data)
    {
        // Extract the 'disabled' date from the input data
        $disabled = $data['disabled'];
        // Check if a record with the same 'disabled' date already exists
        $this->db->where('disabled', $disabled);
        $query = $this->db->get('date');
        $result = $query->result();
      
        // If a record with the same 'disabled' date exists, return false
        if (count($result) > 0) {
            return false;
        } else {
            // If no such record exists, insert the new date record into the database
            $this->db->insert('date', $data);
            // Return the ID of the newly inserted record
            return $this->db->insert_id();
        }
    }

    // Method to update an existing date record (currently a placeholder)
    public function updatedate($data)
    {
        // Output the ID of the date to be updated (for debugging purposes)
        echo $data['id'];
    }

    // Method to retrieve all date records from the database
    public function getDates()
    {
        // Execute a query to get all records from the 'date' table
        $query = $this->db->get('date');
        // Return the result as an array of objects
        return $query->result();
    }
}
?>
