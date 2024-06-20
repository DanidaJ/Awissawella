<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PatientModel');
    }

    // localhost/Awissawella/index.php/Login
    public function index()
    {
        $this->load->view('pages/login_view');
    }

    // localhost/Awissawella/index.php/Loging/signup
    public function signup()
    {
        $name = $this->input->post('patient_name');
        $phonenumber = $this->input->post('patient_number');
        $email = $this->input->post('patient_email');

        $data = array(
            'name' => $name,
            'phoneNumber' => $phonenumber,
            'email' => $email
        );

        $result = $this->PatientModel->insertPatient($data);
    }
}
