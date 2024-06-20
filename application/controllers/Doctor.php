<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

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
        $this->load->model('DoctorModel');
    }


	public function index()
	{
		$this->load->view('pages/doctor_view');
	}


	public function addDoctor()
    {
        $doctor_name = $this->input->post('doctor_name');
        $doctor_phonenumber = $this->input->post('doctor_number');
        $doctor_email = $this->input->post('doctor_email');

        $data = array(
            'doctor_name' => $doctor_name,
            'doctor_phoneNumber' => $doctor_phonenumber,
            'doctor_email' => $doctor_email
        );

        $result = $this->DoctorModel->insertDoctor($data);
    }

}