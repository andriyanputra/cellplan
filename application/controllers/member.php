<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->library('session');
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->model('desa_model');
            $this->load->model('member_model');
            $this->load->model('tower_model');
            
            $this->pegawai_id = $this->session->userdata('pegawai_id');
            $this->pegawai_nama = $this->session->userdata('pegawai_nama');
    }
    
    public function index()
    {   
        if($this->pegawai_id){
            redirect("grid");
        }
        $this->login();
    }

    public function logout(){
        if($this->pegawai_id)
        {
            $this->session->sess_destroy();
        }
        redirect("member");
   }
    
    public function login()
    {
            $user = $this->input->post('user');
            $pass = $this->input->post('pass');

            $this->form_validation->set_message('required', "Isian %s tidak boleh kosong");

            $this->form_validation->set_rules('user', 'Username', 'trim|required');
            $this->form_validation->set_rules('pass', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE)
            {
                
                $data["ket"] = ""; 
                $this->load->view('template/header');
                $this->load->view('member/login', $data);
                $this->load->view('template/footer');
            }else
		{
                    $data_member = $this->member_model->cek_login($user, $pass);
                    
                    if($data_member){
                        $this->session->set_userdata('pegawai_id',$data_member->PEGAWAI_ID);
                        $this->session->set_userdata('pegawai_nama',$data_member->PEGAWAI_NAMA);
                        $data["ket"] = "sukses login $data_member->PEGAWAI_NAMA";
                        redirect('grid');
                    }
                    else {
                        $data["ket"] = "username password tidak valid";
                        $this->load->view('template/header');
                        $this->load->view('member/login', $data);
                        $this->load->view('template/footer');
                    }
                }
    
    }
    
   /*     public function daf_pegawai(){
         if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pegawai/daf_pegawai');
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
    
    public function daftar_validation(){
        
        $this->form_validation->set_rules(
            'pegawai_nip', 
            'NIP', 
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
        
        $this->form_validation->set_message('is_unique', 'NIP sudah terdaftar.');
        
        if($this->form_validation->run()){
            
            $this->load->model('model_users');
            $this->model_users->add_pegawai();
            redirect('member/daf_pegawai');
        }else{
            
            $this->daftar();
        }
        
    }*/
    
    
    
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */