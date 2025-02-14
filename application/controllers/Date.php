<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date extends CI_Controller {

    // Constructor to load the DateModel when the controller is instantiated
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DateModel');
    }

    // Method to load the view with all dates
    // This will be accessed via localhost/your_project/index.php/Date
    public function index()
    {
        // Retrieve all date records from the model
        $data['dates'] = $this->DateModel->getDates();
        // Load the view and pass the dates data to it
        $this->load->view('pages/filterDate_view', $data);
    }

    // Method to add a new date record
    // This will be accessed via localhost/your_project/index.php/Date/addDate
    public function addDate()
    {
        // Retrieve the 'disabled' date from the POST request
        $disabled = $this->input->post('disabled');

        // Prepare data for insertion into the database
        $data = array(
            'disabled' => $disabled,
        );

        // Attempt to insert the date record using the model
        $result = $this->DateModel->insertDate($data);

        // Prepare the output message based on the result of the addDate attempt
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

        // Encode the output message as JSON and set the response content type
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));

        // Optionally, you can redirect to another page (like the appointment list or view page)
        // redirect('appointment');
    }

    // Method to show all dates as JSON
    // This will be accessed via localhost/your_project/index.php/Date/showDates
    public function showDates() {
        // Retrieve all date records from the model
        $data['dates'] = $this->DateModel->getDates();
        
        // Encode the dates data as JSON and set the response content type
        $json_dates = json_encode($data);
        $this->output->set_content_type('application/json')
                    ->set_output($json_dates);
    }
}
