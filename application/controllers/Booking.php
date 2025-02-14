<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    // Constructor to load the BookingModel when the controller is instantiated
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookingModel');
    }

    // Method to load the booking view with all bookings
    // This will be accessed via localhost/Awissawella/index.php/Booking
    public function index()
    {
        // Retrieve all bookings from the model
        $data['bookings'] = $this->BookingModel->getBookings();
        // Load the view and pass the bookings data to it
        $this->load->view('pages/booking_view', $data);
    }

    // Method to filter bookings by scan type and return as JSON
    // This will be accessed via localhost/Awissawella/index.php/Booking/filteredBookings
    public function filteredBookings() {
        // Get the 'scanType' parameter from the GET request
        $scanType = $this->input->get('scanType');

        // If 'scanType' is 'all', retrieve all bookings
        // Otherwise, filter bookings by the provided scan type
        if ($scanType == 'all') {
            $data['bookings'] = $this->BookingModel->getBookings();
        } else {
            $data['bookings'] = $this->BookingModel->getBookingsByScanType($scanType);
        }
        
        // Encode the bookings data as JSON and set the response content type
        $json_data = json_encode($data);
        $this->output->set_content_type('application/json')
                    ->set_output($json_data);
    }

    // Method to filter bookings by doctor name and return as JSON
    // This will be accessed via localhost/Awissawella/index.php/Booking/filteredBookings1
    public function filteredBookings1() {
        // Get the 'doctorName' parameter from the GET request
        $doctorName = $this->input->get('doctorName');

        // If 'doctorName' is 'all', retrieve all bookings
        // Otherwise, filter bookings by the provided doctor name
        if ($doctorName == 'all') {
            $data['bookings'] = $this->BookingModel->getBookings();
        } else {
            $data['bookings'] = $this->BookingModel->getBookingsByDoctorName($doctorName);
        }
        
        // Encode the bookings data as JSON and set the response content type
        $json_data = json_encode($data);
        $this->output->set_content_type('application/json')
                    ->set_output($json_data);
    }

    // Method to filter bookings by booking day and return as JSON
    // This will be accessed via localhost/Awissawella/index.php/Booking/filteredBookings2
    public function filteredBookings2() {
        // Get the 'bookingDay' parameter from the GET request
        $bookingDay = $this->input->get('bookingDay');

        // If 'bookingDay' is 'all', retrieve all bookings
        // Otherwise, filter bookings by the provided booking day
        if ($bookingDay == 'all') {
            $data['bookings'] = $this->BookingModel->getBookings();
        } else {
            $data['bookings'] = $this->BookingModel->getBookingsByBookingDay($bookingDay);
        }
        
        // Encode the bookings data as JSON and set the response content type
        $json_data = json_encode($data);
        $this->output->set_content_type('application/json')
                    ->set_output($json_data);
    }
}

