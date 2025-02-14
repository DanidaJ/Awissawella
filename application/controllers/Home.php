<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

// Method to load the home page view
	public function index()
	{
		$this->load->view('pages/home_page');
	}
}