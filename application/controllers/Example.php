<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Example extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

    public function index(){
		$data = array(
			'title' => 'Contoh Example',
		);
		$this->template->load('template','example/profile', $data);
    }
	
	public function form_general(){
		$data = array(
			'title' => 'Contoh General Form',
		);
		$this->template->load('template','example/form_general', $data);
    }
	
	public function form_advanced(){
		$data = array(
			'title' => 'Contoh Advanced Form',
		);
		$this->template->load('template','example/form_advanced', $data);
    }
	
	public function editor(){
		$data = array(
			'title' => 'Contoh Form Editor',
		);
		$this->template->load('template','example/editor', $data);
    }
	
	public function table(){
		$data = array(
			'title' => 'Contoh Table',
		);
		$this->template->load('template','example/table', $data);
    }
	
	public function contoh(){
		$data = array(
			'title' => 'Contoh Table',
		);
		$this->template->load('template','example/table_contoh', $data);
    }
	
	public function contoh2(){
		$data = array(
			'title' => 'Contoh Table',
		);
		$this->template->load('template','example/table_contoh2', $data);
    }
}