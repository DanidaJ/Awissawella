<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

    // Constructor to load the DoctorModel when the controller is instantiated
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DoctorModel');
    }

    // Method to load the doctor view
    // This will be accessed via localhost/Awissawella/index.php/Doctor
    public function index()
    {
        $this->load->view('pages/doctor_view');
    }

    // Method to handle the addition of a new doctor
    // This will be accessed via localhost/Awissawella/index.php/Doctor/addDoctor
    public function addDoctor()
    {
        // Retrieve form data using POST method
        $doctor_name = $this->input->post('doctor_name');
        $doctor_phonenumber = $this->input->post('doctor_phonenumber');
        $doctor_email = $this->input->post('doctor_email');
        $doctor_age = $this->input->post('doctor_age');
        $doctor_NIC = $this->input->post('doctor_NIC');

        // Create an associative array with the form data
        $data = array(
            'doctor_name' => $doctor_name,
            'doctor_phoneNumber' => $doctor_phonenumber,
            'doctor_email' => $doctor_email,
            'doctor_age' => $doctor_age,
            'doctor_NIC' => $doctor_NIC
        );

        // Attempt to insert the doctor data into the database using the model
        $result = $this->DoctorModel->insertDoctor($data);

        // Prepare the output message based on the result of the addDoctor attempt
        if (!$result) {
            $output = array(
                'status' => false,
                'message' => 'Doctor Adding Failed'
            );
        } else {
            $output = array(
                'status' => true,
                'message' => 'Doctor Adding Successful'
            );
        }
        
        // Send a JSON response back to the client
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));

        // The JSON response will indicate whether the addition of the doctor was successful or not.
        // If a doctor with the given NIC already exists, it returns false.
        // If the insertion is successful, it returns the ID of the inserted row.

        // Optionally, you can redirect to another page (like the doctor list or view page)
        // redirect('doctor');
    }
}
