<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
		
		if(!$this->ion_auth->in_group('admin')){
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}
		
		
    }

    public function index($group_id = NULL){
		$this->data['title'] = 'Users';
		$this->data['users_data'] = $this->ion_auth->users($group_id)->result();
		$this->template->load('template','Users/users_list', $this->data);
	}

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'ip_address' => $row->ip_address,
		'username' => $row->username,
		'password' => $row->password,
		'salt' => $row->salt,
		'email' => $row->email,
		'activation_code' => $row->activation_code,
		'forgotten_password_code' => $row->forgotten_password_code,
		'forgotten_password_time' => $row->forgotten_password_time,
		'remember_code' => $row->remember_code,
		'created_on' => $row->created_on,
		'last_login' => $row->last_login,
		'active' => $row->active,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'company' => $row->company,
		'phone' => $row->phone,
	    );
            $this->template->load('template','Users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()
	{
	  $this->data['page_title'] = 'Create user';
	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('first_name','First name','trim');
	  $this->form_validation->set_rules('last_name','Last name','trim');
	  $this->form_validation->set_rules('phone','Phone','trim');
	  $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
	  $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
	  $this->form_validation->set_rules('password','Password','required');
	  $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
	  $this->form_validation->set_rules('groups[]','Groups','required|integer');
	 
	  if($this->form_validation->run()===FALSE)
	  {
		$this->data['title'] = 'Create User';
		$this->data['groups'] = $this->ion_auth->groups()->result();
		$this->load->helper('form');
		$this->template->load('template','Users/users_form', $this->data);
	  }
	  else
	  {
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$group_ids = $this->input->post('groups');
	 
		$additional_data = array(
		  'first_name' => $this->input->post('first_name'),
		  'last_name' => $this->input->post('last_name'),
		  'phone' => $this->input->post('phone')
		);
		$this->ion_auth->register($username, $password, $email, $additional_data, $group_ids);
		$this->session->set_flashdata('message',$this->ion_auth->messages());
		redirect('users','refresh');
	  }
	}
   
	public function edit($user_id = NULL)
	{
	  $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
	  $this->data['title'] = 'Edit user';
	  $this->load->library('form_validation');
	 
	  $this->form_validation->set_rules('first_name','First name','trim');
	  $this->form_validation->set_rules('last_name','Last name','trim');
	  $this->form_validation->set_rules('phone','Phone','trim');
	  $this->form_validation->set_rules('username','Username','trim|required');
	  $this->form_validation->set_rules('email','Email','trim|required|valid_email');
	  $this->form_validation->set_rules('password','Password','min_length[6]');
	  $this->form_validation->set_rules('password_confirm','Password confirmation','matches[password]');
	  $this->form_validation->set_rules('groups[]','Groups','required|integer');
	  $this->form_validation->set_rules('user_id','User ID','trim|integer|required');
	 
	  if($this->form_validation->run() === FALSE)
	  {
		if($user = $this->ion_auth->user((int) $user_id)->row())
		{
		  $this->data['user'] = $user;
		}
		else
		{
		  $this->session->set_flashdata('message', 'The user doesn\'t exist.');
		  redirect('users', 'refresh');
		}
		$this->data['groups'] = $this->ion_auth->groups()->result();
		$this->data['usergroups'] = array();
		if($usergroups = $this->ion_auth->get_users_groups($user->id)->result())
		{
		  foreach($usergroups as $group)
		  {
			$this->data['usergroups'][] = $group->id;
		  }
		}
		$this->load->helper('form');
		$this->template->load('template','Users/users_edit_form', $this->data);
	  }
	  else
	  {
		$user_id = $this->input->post('user_id');
		$new_data = array(
		  'username' => $this->input->post('username'),
		  'email' => $this->input->post('email'),
		  'first_name' => $this->input->post('first_name'),
		  'last_name' => $this->input->post('last_name'),
		  'phone' => $this->input->post('phone')
		);
		if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');
	 
		$this->ion_auth->update($user_id, $new_data);
	 
		//Update the groups user belongs to
		$groups = $this->input->post('groups');
		if (isset($groups) && !empty($groups))
		{
		  $this->ion_auth->remove_from_group('', $user_id);
		  foreach ($groups as $group)
		  {
			$this->ion_auth->add_to_group($group, $user_id);
		  }
		}
	 
		$this->session->set_flashdata('message',$this->ion_auth->messages());
		redirect('users','refresh');
	  }
	}
    
    public function delete($user_id = NULL)
	{
	  if(is_null($user_id))
	  {
		$this->session->set_flashdata('message','There\'s no user to delete');
	  }
	  else
	  {
		$this->ion_auth->delete_user($user_id);
		$this->session->set_flashdata('message',$this->ion_auth->messages());
	  }
	  redirect('users','refresh');
	}
	
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Ip Address");
		xlsWriteLabel($tablehead, $kolomhead++, "Username");
		xlsWriteLabel($tablehead, $kolomhead++, "Password");
		xlsWriteLabel($tablehead, $kolomhead++, "Salt");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Activation Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Time");
		xlsWriteLabel($tablehead, $kolomhead++, "Remember Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Created On");
		xlsWriteLabel($tablehead, $kolomhead++, "Last Login");
		xlsWriteLabel($tablehead, $kolomhead++, "Active");
		xlsWriteLabel($tablehead, $kolomhead++, "First Name");
		xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
		xlsWriteLabel($tablehead, $kolomhead++, "Company");
		xlsWriteLabel($tablehead, $kolomhead++, "Phone");

		foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ip_address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->salt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activation_code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->forgotten_password_code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->forgotten_password_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->remember_code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->created_on);
	    xlsWriteNumber($tablebody, $kolombody++, $data->last_login);
	    xlsWriteLabel($tablebody, $kolombody++, $data->active);
	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->company);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Users_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('users_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'users_data' => $this->Users_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('users_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('users.pdf', 'D'); 
    }

}