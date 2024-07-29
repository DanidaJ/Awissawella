<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date extends CI_Controller {

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
        $this->load->model('DateModel');
    }


	public function index()
	{
		$data['dates'] = $this->DateModel->getDates();
		$this->load->view('pages/filterDate_view',$data);
	}


	public function addDate()
    {
        $disabled = $this->input->post('disabled');

        $data = array(
            'disabled' => $disabled,
            
        );

        $result = $this->DateModel->insertDate($data);
    }

	public function showDates() {
        $disabled = $this->input->get('disabled');

            $data['dates'] = $this->DateModel->getDates();
        
        $json_dates = json_encode($data);
        $this->output->set_content_type('application/json')
                        ->set_output($json_dates);

}
}