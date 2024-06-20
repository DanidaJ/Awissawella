<?php
defined('BASEPATH') or exit('No direct script access allowed');

class front extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$this->load->model('FrontModel');
	}
	public function index()
	{
		$this->load->view('pages/front_page');
	}


	// localhost/Awissawella/index.php/front/book
	public function book()
	{
		$patientName = $this->input->post('patientName');
		$scanType = $this->input->post('scanType');
		$doctorName = $this->input->post('doctorName');
		$bookingTime = $this->input->post('bookingTime');

		$data = array(
			'patientName' => $patientName,
			'scanType' => $scanType,
			'doctorName' => $doctorName,
			'bookingTime' => $bookingTime
		);

		$result = $this->FrontModel->insertBooking($data);

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
		
		// send a json response
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));

		// if a record already exists with the given time slot -> return false
		// if you don't have a record -> return the id of the inserted row.

		// redirect('front');
	}
}
