<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekom extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->library('session');
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->model('rekom_model');
            $this->load->library('fpdf');
            $this->pegawai_id = $this->session->userdata('pegawai_id');
            $this->pegawai_nama = $this->session->userdata('pegawai_nama');
    }

     public function add_rekom(){
         if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('rekom/add_rekom');
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }
    
    public function rekom_validation(){
    	$id_tower = $this->input->post('id');
        $tanggal = $this->input->post('tgl');
        $status = $this->input->post('status');
        $ket = $this->input->post('ket');
        
        $this->form_validation->set_message('required', "Isian %s tidak boleh kosong");
        $this->form_validation->set_message('min_length', "%s harus lebih dari 6 karakter");
        $this->form_validation->set_message('max_length', "%s tidak boleh lebih dari 12 karakter");
        $this->form_validation->set_message('valid_email', "%s tidak valid");
        
        
        $this->form_validation->set_rules('id', 'Tower ID', 'trim|required');
        $this->form_validation->set_rules('tgl', 'Tanggal Registrasi', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect('rekom/add_rekom');
        }
        else{
            
            $this->rekom_model->insert_rekom($id_tower,$tanggal,$status,$ket);
            redirect('rekom/daftar');
        }
    }

    public function daftar(){
    	 if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('rekom/daftar');
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }

    public function cetak_pdf(){           
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        // Load model "karyawan_model"
        $this->load->model('rekom_model');
        $data['surek'] = $this->rekom_model->get_all();
        
        // Load view "pdf_report" untuk menampilkan hasilnya        
		$this->load->view('rekom/pdf_report', $data);
	}

    
}