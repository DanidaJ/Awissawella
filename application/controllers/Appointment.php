<<?php
defined('BASEPATH') or exit('No direct script access allowed');

class appointment extends CI_Controller
{
	// Constructor to load the AppointmentModel when the controller is instantiated
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AppointmentModel');
	}

	// Method to load the appointment page view
	public function index()
	{
		$this->load->view('pages/appointment_page');
	}

	// Method to handle the booking process
	// This will be accessed via localhost/Awissawella/index.php/appointment/book
	public function book()
	{
		// Retrieve form data using POST method
		$patientName = $this->input->post('patientName');
		$scanType = $this->input->post('scanType');
		$doctorName = $this->input->post('doctorName');
		$bookingDay = $this->input->post('bookingDay');
		$bookingTime = $this->input->post('bookingTime');

		// Create an associative array with the form data
		$data = array(
			'patientName' => $patientName,
			'scanType' => $scanType,
			'doctorName' => $doctorName,
			'bookingDay' => $bookingDay,
			'bookingTime' => $bookingTime
		);

		// Attempt to insert the booking into the database using the model
		$result = $this->AppointmentModel->insertBooking($data);

		// Prepare the output message based on the result of the booking attempt
		if (!$result) {
			$output = array(
				'status' => false,
				'message' => 'Booking Failed'
			);
		} else {
			$output = array(
				'status' => true,
				'message' => 'Booking Successful'
			);
		}
		
		// Send a JSON response back to the client
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));

		// The JSON response will indicate whether the booking was successful or not.
	}
}

