<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->library('session');
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->model('pegawai_model');
            $this->pegawai_id = $this->session->userdata('pegawai_id');
            $this->pegawai_nama = $this->session->userdata('pegawai_nama');
    }

     public function add_pegawai(){
         if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pegawai/add_pegawai');
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }

    public function update_pegawai(){
         if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pegawai/pegawai_form',$data);
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }

     public function daftar(){
         if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pegawai/daftar');
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }
    
    public function pegawai_validation(){
    	$nip = $this->input->post('pegawai_nip');
        $nama = $this->input->post('pegawai_nama');
        $alamat = $this->input->post('pegawai_alamat');
        $ttl = $this->input->post('pegawai_ttl');
        $nohp = $this->input->post('pegawai_no_hp');
        $notelp = $this->input->post('pegawai_no_telp');
        $jabatan = $this->input->post('pegawai_jabatan');
        $agama = $this->input->post('pegawai_agama');
        $status = $this->input->post('pegawai_status');
        $email = $this->input->post('pegawai_email');
        $pass = $this->input->post('pegawai_password');
        
        $this->form_validation->set_message('required', "Isian %s tidak boleh kosong");
        $this->form_validation->set_message('min_length', "%s harus lebih dari 6 karakter");
        $this->form_validation->set_message('max_length', "%s tidak boleh lebih dari 12 karakter");
        $this->form_validation->set_message('valid_email', "%s tidak valid");
        $this->form_validation->set_message('is_unique', 'NIP sudah terdaftar.');
        
        
        $this->form_validation->set_rules('pegawai_nip','NIP',
                'required|trim|valid_id|is_unique[pegawai.pegawai_nip]'
        );
        $this->form_validation->set_rules('pegawai_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('pegawai_nama', 'Nama', 'required');
        $this->form_validation->set_rules('pegawai_alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pegawai_ttl', 'TTL', 'required');
        $this->form_validation->set_rules('pegawai_no_hp', 'No. HP', 'required');
        $this->form_validation->set_rules('pegawai_no_telp', 'No. Telp', 'required');
        $this->form_validation->set_rules('pegawai_jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('pegawai_agama', 'Agama', 'required');
        $this->form_validation->set_rules('pegawai_status', 'Status', 'required');
        $this->form_validation->set_rules('pegawai_email', 'Email', 'required');
        $this->form_validation->set_rules('pegawai_cpassword', 'Confirm Password', 'required|trim|matches[pegawai_password]');
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect('pegawai/add_pegawai');
        }
        else{
            
            $this->pegawai_model->insert_pegawai($nip,$nama,$alamat,$nohp,$notelp,$ttl,$jabatan,$agama,$status,$email,$pass);
            redirect('pegawai/daftar');
        }
    }

    public function edit($id){
        $query = $this->pegawai_model->get_pegawai_from_id($id);
        $data['query'] = $query;

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pegawai/pegawai_form',$data);
            $this->load->view('template/footer');
    }

    public function update(){
        $status = $this->pegawai_model->update_pegawai();

        if($status){
            $link = site_url().'/pegawai/daftar';
            redirect($link);
        }else echo "Gagal Update";

    }

    public function delete($id){
        $query = $this->pegawai_model->delete($id);
        $data['query'] = $query;
        redirect('pegawai/daftar','refresh');    
    }

    public function profil(){
        if($this->pegawai_id)
        {
            $data["ket"] = ""; 
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pegawai/profil',$data);
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }
}