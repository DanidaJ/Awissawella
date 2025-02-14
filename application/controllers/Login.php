<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    // Constructor to load the PatientModel when the controller is instantiated
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PatientModel');
    }

    // Method to load the login view
    // This will be accessed via localhost/Awissawella/index.php/Login
    public function index()
    {
        $this->load->view('pages/login_view');
    }

    // Method to handle the signup process for a new patient
    // This will be accessed via localhost/Awissawella/index.php/Login/signup
    public function signup()
    {
        // Retrieve form data using POST method
        $patient_name = $this->input->post('patient_name');
        $phonenumber = $this->input->post('patient_number');
        $email = $this->input->post('patient_email');
        $BHT_num = $this->input->post('BHT_num');
        $ward_clinic = $this->input->post('ward_clinic');

        // Create an associative array with the form data
        $data = array(
            'patient_name' => $patient_name,
            'phoneNumber' => $phonenumber,
            'email' => $email,
            'BHT_num' => $BHT_num,
            'ward_clinic' => $ward_clinic
        );

        // Attempt to insert the patient data into the database using the model
        $result = $this->PatientModel->insertPatient($data);

        // Prepare the output message based on the result of the signup attempt
        if (!$result) {
            $output = array(
                'status' => false,
                'message' => 'Adding Failed'
            );
        } else {
            $output = array(
                'status' => true,
                'message' => 'Adding Successful'
            );
        }
        
        // Send a JSON response back to the client
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));

        // The JSON response will indicate whether the signup was successful or not.
        // If a record already exists with the given BHT number, it returns false.
        // If the insertion is successful, it returns the ID of the inserted row.

        // Optionally, you can redirect to another page (like an appointment page)
        // redirect('appointment');
    }
}
