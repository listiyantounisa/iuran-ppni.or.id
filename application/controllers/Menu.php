<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    
        
   function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('Menu_model');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}


    public function index()
    {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}else{
			$user = $this->ion_auth->user()->row();
			// echo $user->email;
			$user_groups = $this->ion_auth->get_users_groups($user->id)->result();
			$menu = $this->Menu_model->get_all();
			$data = array(
				'menu_data' => $menu,
				'title' => 'Manajemen Menu',
				'user_grup' => $user_groups,
			);
			$this->template->load('template','Menu/menu_list', $data);
		}
        
    }

    public function read($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'name' => $row->name,
			'link' => $row->link,
			'icon' => $row->icon,
			'title' => 'Manajemen Menu',
			'is_active' => $row->is_active,
			'is_parent' => $row->is_parent,
			'menu_group' => $row->menu_group,
			);
            $this->template->load('template','Menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'link' => set_value('link'),
		'title' => 'Manajemen Menu',
	    'icon' => set_value('icon'),
	    'is_active' => set_value('is_active'),
	    'is_parent' => set_value('is_parent'),
	    'menu_group' => set_value('menu_group'),
	);
        $this->template->load('template','Menu/menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'link' => $this->input->post('link',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		'is_parent' => $this->input->post('is_parent',TRUE),
		'menu_group' => $this->input->post('menu_group',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'link' => set_value('link', $row->link),
		'icon' => set_value('icon', $row->icon),
		'title' => 'Manajemen Menu',
		'is_active' => set_value('is_active', $row->is_active),
		'is_parent' => set_value('is_parent', $row->is_parent),
		'menu_group' => set_value('menu_group', $row->menu_group),
	    );
            $this->template->load('template','Menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'link' => $this->input->post('link',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		'is_parent' => $this->input->post('is_parent',TRUE),
		'menu_group' => $this->input->post('menu_group',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
	$this->form_validation->set_rules('is_parent', 'is parent', 'trim|required');
	$this->form_validation->set_rules('menu_group', 'menu group', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu.xls";
        $judul = "menu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Link");
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Active");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Parent");
	xlsWriteLabel($tablehead, $kolomhead++, "Menu Group");

	foreach ($this->Menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_active);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_parent);
	    xlsWriteNumber($tablebody, $kolombody++, $data->menu_group);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=menu.doc");

        $data = array(
            'menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('menu_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('menu_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('menu.pdf', 'D'); 
    }

}
