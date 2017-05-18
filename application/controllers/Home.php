<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index(){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}else{
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$data = array(
				'title' => 'Dashboard',
				'user' => $this->data,
			);
			$this->template->load('template','Home/index', $data);
		}
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
}