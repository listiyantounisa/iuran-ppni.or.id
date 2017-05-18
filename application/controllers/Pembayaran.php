<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
    }

    public function index()
    {
        $pembayaran = $this->Pembayaran_model->get_all();

        $data = array(
            'pembayaran_data' => $pembayaran
        );

        $this->template->load('template','pembayaran/pembayaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembayaran' => $row->id_pembayaran,
		'id_peserta' => $row->id_peserta,
		'tahun_pembayaran' => $row->tahun_pembayaran,
		'iuran_anggota' => $row->iuran_anggota,
		'uang_pangkal' => $row->uang_pangkal,
		'cetak_kta' => $row->cetak_kta,
		'icn' => $row->icn,
		'rekomendasi' => $row->rekomendasi,
		'kontribusi_gedung' => $row->kontribusi_gedung,
		'status_transfer_dpw' => $row->status_transfer_dpw,
		'status_transfer_dpp' => $row->status_transfer_dpp,
	    );
            $this->template->load('template','pembayaran/pembayaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
	    'id_pembayaran' => set_value('id_pembayaran'),
	    'id_peserta' => set_value('id_peserta'),
	    'tahun_pembayaran' => set_value('tahun_pembayaran'),
	    'iuran_anggota' => set_value('iuran_anggota'),
	    'uang_pangkal' => set_value('uang_pangkal'),
	    'cetak_kta' => set_value('cetak_kta'),
	    'icn' => set_value('icn'),
	    'rekomendasi' => set_value('rekomendasi'),
	    'kontribusi_gedung' => set_value('kontribusi_gedung'),
	    'status_transfer_dpw' => set_value('status_transfer_dpw'),
	    'status_transfer_dpp' => set_value('status_transfer_dpp'),
	);
        $this->template->load('template','pembayaran/pembayaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_peserta' => $this->input->post('id_peserta',TRUE),
		'tahun_pembayaran' => $this->input->post('tahun_pembayaran',TRUE),
		'iuran_anggota' => $this->input->post('iuran_anggota',TRUE),
		'uang_pangkal' => $this->input->post('uang_pangkal',TRUE),
		'cetak_kta' => $this->input->post('cetak_kta',TRUE),
		'icn' => $this->input->post('icn',TRUE),
		'rekomendasi' => $this->input->post('rekomendasi',TRUE),
		'kontribusi_gedung' => $this->input->post('kontribusi_gedung',TRUE),
		'status_transfer_dpw' => $this->input->post('status_transfer_dpw',TRUE),
		'status_transfer_dpp' => $this->input->post('status_transfer_dpp',TRUE),
	    );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
		'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
		'id_peserta' => set_value('id_peserta', $row->id_peserta),
		'tahun_pembayaran' => set_value('tahun_pembayaran', $row->tahun_pembayaran),
		'iuran_anggota' => set_value('iuran_anggota', $row->iuran_anggota),
		'uang_pangkal' => set_value('uang_pangkal', $row->uang_pangkal),
		'cetak_kta' => set_value('cetak_kta', $row->cetak_kta),
		'icn' => set_value('icn', $row->icn),
		'rekomendasi' => set_value('rekomendasi', $row->rekomendasi),
		'kontribusi_gedung' => set_value('kontribusi_gedung', $row->kontribusi_gedung),
		'status_transfer_dpw' => set_value('status_transfer_dpw', $row->status_transfer_dpw),
		'status_transfer_dpp' => set_value('status_transfer_dpp', $row->status_transfer_dpp),
	    );
            $this->template->load('template','pembayaran/pembayaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
		'id_peserta' => $this->input->post('id_peserta',TRUE),
		'tahun_pembayaran' => $this->input->post('tahun_pembayaran',TRUE),
		'iuran_anggota' => $this->input->post('iuran_anggota',TRUE),
		'uang_pangkal' => $this->input->post('uang_pangkal',TRUE),
		'cetak_kta' => $this->input->post('cetak_kta',TRUE),
		'icn' => $this->input->post('icn',TRUE),
		'rekomendasi' => $this->input->post('rekomendasi',TRUE),
		'kontribusi_gedung' => $this->input->post('kontribusi_gedung',TRUE),
		'status_transfer_dpw' => $this->input->post('status_transfer_dpw',TRUE),
		'status_transfer_dpp' => $this->input->post('status_transfer_dpp',TRUE),
	    );

            $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required');
	$this->form_validation->set_rules('tahun_pembayaran', 'tahun pembayaran', 'trim|required');
	$this->form_validation->set_rules('iuran_anggota', 'iuran anggota', 'trim|required');
	$this->form_validation->set_rules('uang_pangkal', 'uang pangkal', 'trim|required');
	$this->form_validation->set_rules('cetak_kta', 'cetak kta', 'trim|required');
	$this->form_validation->set_rules('icn', 'icn', 'trim|required');
	$this->form_validation->set_rules('rekomendasi', 'rekomendasi', 'trim|required');
	$this->form_validation->set_rules('kontribusi_gedung', 'kontribusi gedung', 'trim|required');
	$this->form_validation->set_rules('status_transfer_dpw', 'status transfer dpw', 'trim|required');
	$this->form_validation->set_rules('status_transfer_dpp', 'status transfer dpp', 'trim|required');

	$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-09 08:28:19 */
/* http://harviacode.com */