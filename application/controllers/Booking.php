<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookingModel');
    }

    public function index()
    {
        $data['bookings'] = $this->BookingModel->getBookings();
        $this->load->view('pages/booking_view', $data);
    }

    // Expose filtering part as a json array
    public function filteredBookings() {
        $scanType = $this->input->get('scanType');

        if ($scanType == 'all') {
            $data['bookings'] = $this->BookingModel->getBookings();
        } else {
            $data['bookings'] = $this->BookingModel->getBookingsByScanType($scanType);
        }
        
        $json_data = json_encode($data);
        $this->output->set_content_type('application/json')
                        ->set_output($json_data);
    }
}