<?php

class BookingModel extends CI_Model{

    // Method to retrieve all bookings from the database
    // Executes: SELECT * FROM booking
    public function getBookings(){
        // Execute a query to get all records from the 'booking' table
        $query = $this->db->get('booking');
        // Return the result as an array of objects
        return $query->result();
    }

    // Method to retrieve bookings filtered by scan type
    // Executes: SELECT * FROM booking WHERE scanType = $scanType
    public function getBookingsByScanType($scanType) {
        // Add a 'WHERE' condition to filter records by the provided scan type
        $this->db->where('scanType', $scanType);
        // Execute a query to get the filtered records from the 'booking' table
        $query = $this->db->get('booking');
        // Return the result as an array of objects
        return $query->result();
    }

    // Method to retrieve bookings filtered by doctor's name
    // Executes: SELECT * FROM booking WHERE doctorName = $doctorName
    public function getBookingsByDoctorName($doctorName) {
        // Add a 'WHERE' condition to filter records by the provided doctor's name
        $this->db->where('doctorName', $doctorName);
        // Execute a query to get the filtered records from the 'booking' table
        $query = $this->db->get('booking');
        // Return the result as an array of objects
        return $query->result();
    }

    // Method to retrieve bookings filtered by booking day
    // Executes: SELECT * FROM booking WHERE bookingDay = $bookingDay
    public function getBookingsByBookingDay($bookingDay) {
        // Add a 'WHERE' condition to filter records by the provided booking day
        $this->db->where('bookingDay', $bookingDay);
        // Execute a query to get the filtered records from the 'booking' table
        $query = $this->db->get('booking');
        // Return the result as an array of objects
        return $query->result();
    }
}

?>
