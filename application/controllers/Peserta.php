<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peserta_model');
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
        $this->load->helper('rupiah');
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
    }

    public function index()
    {
        $peserta = $this->Peserta_model->get_all();

        $data = array(
            'peserta_data' => $peserta
        );

        $this->template->load('template','peserta/peserta_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_peserta' => $row->id_peserta,
		'nama_peserta' => $row->nama_peserta,
		'no_ktp' => $row->no_ktp,
		'no_anggota' => $row->no_anggota,
		'tanggal_terdaftar' => $row->tanggal_terdaftar,
		'komisariat' => $row->komisariat,
	    );
            $this->template->load('template','peserta/peserta_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }
	
	public function pembayaran($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
			'action' => site_url('peserta/pembayaran_action'),
		'id_peserta' => $row->id_peserta,
		'nama_peserta' => $row->nama_peserta,
		'no_ktp' => $row->no_ktp,
		'no_anggota' => $row->no_anggota,
		'tanggal_terdaftar' => $row->tanggal_terdaftar,
		'komisariat' => $row->komisariat,
	    );
            $this->template->load('template','peserta/peserta_pembayaran', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }
	
	public function detail_pembayaran($id) 
    {
        $row = $this->Peserta_model->get_by_id_join($id);
		$idpeserta = $this->uri->segment(3);
        $detail2013 = $this->Pembayaran_model->get_by_id2013($idpeserta);
        $detail2014 = $this->Pembayaran_model->get_by_id2014($idpeserta);
        $detail2015 = $this->Pembayaran_model->get_by_id2015($idpeserta);
        $detail2016 = $this->Pembayaran_model->get_by_id2016($idpeserta);
        $detail2017 = $this->Pembayaran_model->get_by_id2017($idpeserta);
        if ($row) {
            $data = array(
			'action' => site_url('peserta/pembayaran_action'),
			'id_peserta' => $row->id_peserta,
			'nama_peserta' => $row->nama_peserta,
			'no_ktp' => $row->no_ktp,
			'no_anggota' => $row->no_anggota,
			'tanggal_terdaftar' => $row->tanggal_terdaftar,
			'komisariat' => $row->komisariat,
			'detail_pembayaran2013_data' => $detail2013,
			'detail_pembayaran2014_data' => $detail2014,
			'detail_pembayaran2015_data' => $detail2015,
			'detail_pembayaran2016_data' => $detail2016,
			'detail_pembayaran2017_data' => $detail2017,
			);
            $this->template->load('template','peserta/detail_pembayaran', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peserta/create_action'),
	    'id_peserta' => set_value('id_peserta'),
	    'nama_peserta' => set_value('nama_peserta'),
	    'no_ktp' => set_value('no_ktp'),
	    'no_anggota' => set_value('no_anggota'),
	    'tanggal_terdaftar' => set_value('tanggal_terdaftar'),
	    'komisariat' => set_value('komisariat'),
	);
        $this->template->load('template','peserta/peserta_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_peserta' => $this->input->post('nama_peserta',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'no_anggota' => $this->input->post('no_anggota',TRUE),
		'tanggal_terdaftar' => $this->input->post('tanggal_terdaftar',TRUE),
		'komisariat' => $this->input->post('komisariat',TRUE),
	    );

            $this->Peserta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('peserta'));
        }
    }
	
	 public function pembayaran_action() 
    {
        $idp = set_value('id_peserta');
       
            $data = array(
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
            'status_transfer_dpd' => set_value('status_transfer_dpd'),
            'status_transfer_dpk' => set_value('status_transfer_dpk'),
            'tanggal_bayar' => set_value('tanggal_bayar'),
			);

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('peserta/detail_pembayaran/'.$idp));
        
    }

     public function update_status_dpp($id) 
    {
        $ref = $this->uri->segment(3);
        $data = array(
            'status_transfer_dpp' => 1,
        );

            $this->Pembayaran_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peserta/pembayaran/'));
    }

    public function update_status_dpw($id) 
    {
        $ref = $this->uri->segment(3);
        $data = array(
            'status_transfer_dpw' => 1,
        );

            $this->Pembayaran_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peserta/detail_pembayaran/'.$ref));
    }
    
    public function update($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peserta/update_action'),
		'id_peserta' => set_value('id_peserta', $row->id_peserta),
		'nama_peserta' => set_value('nama_peserta', $row->nama_peserta),
		'no_ktp' => set_value('no_ktp', $row->no_ktp),
		'no_anggota' => set_value('no_anggota', $row->no_anggota),
		'tanggal_terdaftar' => set_value('tanggal_terdaftar', $row->tanggal_terdaftar),
		'komisariat' => set_value('komisariat', $row->komisariat),
	    );
            $this->template->load('template','peserta/peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peserta', TRUE));
        } else {
            $data = array(
		'nama_peserta' => $this->input->post('nama_peserta',TRUE),
		'no_ktp' => $this->input->post('no_ktp',TRUE),
		'no_anggota' => $this->input->post('no_anggota',TRUE),
		'tanggal_terdaftar' => $this->input->post('tanggal_terdaftar',TRUE),
		'komisariat' => $this->input->post('komisariat',TRUE),
	    );

            $this->Peserta_model->update($this->input->post('id_peserta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peserta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $this->Peserta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peserta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim|required');
	$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required');
	$this->form_validation->set_rules('no_anggota', 'no anggota', 'trim|required');
	$this->form_validation->set_rules('tanggal_terdaftar', 'tanggal terdaftar', 'trim|required');
	$this->form_validation->set_rules('komisariat', 'komisariat', 'trim|required');

	$this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Peserta.php */
/* Location: ./application/controllers/Peserta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-09 08:28:10 */
/* http://harviacode.com */