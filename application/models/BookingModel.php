<?php




class BookingModel extends CI_Model{







    // This method communicates with the database and get the bookings inserted.
    // SELECT * FROM booking
    public function getBookings(){
        $query = $this->db->get('booking');
        return $query->result();
    }

    // Method to filter bookings by scanType
    // Select * FROM booking WHERE scanType = $scanType
    public function getBookingsByScanType($scanType) {
        $this->db->where('scanType', $scanType);
        $query = $this->db->get('booking');
        return $query->result();
    }
}