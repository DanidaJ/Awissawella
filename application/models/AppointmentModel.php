<?php

class AppointmentModel extends CI_Model
{
    // Method to insert a new booking into the database
    public function insertBooking($data)
    {
        // Extract booking day and time from the input data
        $bookingDay = $data['bookingDay'];
        $bookingTime = $data['bookingTime'];

        // Check if a booking already exists for the given day and time
        $this->db->where('bookingDay', $bookingDay);
        $this->db->where('bookingTime', $bookingTime);
        $query = $this->db->get('booking');
        $result = $query->result();

        // If a booking exists, return false indicating the time slot is not available
        if (count($result) > 0) {
            return false;
        } else {
            // If no booking exists, insert the new booking into the database
            $this->db->insert('booking', $data);
            // Return the ID of the newly inserted booking
            return $this->db->insert_id();
        }
    }

    // Method to update an existing booking
    public function updateBooking($data)
    {
        // Output the ID of the booking to be updated (for debugging purposes)
        echo $data['id'];
    }
}


