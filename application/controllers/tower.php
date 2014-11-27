<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tower extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->library('session');
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->model('desa_model');
            $this->load->model('tower_model');
            $this->load->model('member_model');
            $this->pegawai_id = $this->session->userdata('pegawai_id');
            $this->pegawai_nama = $this->session->userdata('pegawai_nama');
            
            if(!$this->pegawai_id)
            {
                redirect('member');
            }
    }
    
    public function index()
    {
        $data["ket"] = ""; 
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tower/tower_view', $data);
        $this->load->view('template/footer');
    
    }
    
    public function list_tower()
    {
        $data["ket"] = ""; 
        $data["list_tower"] = $this->tower_model->get_tower_point();
        
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tower/tower_list', $data);
        $this->load->view('template/footer');
    
    }
    
    public function list_pemilik()
    {
        $data["ket"] = ""; 
        $data["list_pemilik"] = $this->desa_model->get_pemilik_tower();
//        $q = $this->desa_model->get_pemilik_tower();
//        foreach ($q->result() as $r) {
//            if(!$this->desa_model->cek_pemilik_tower($r->TOWER_PEMILIK)){
//                $this->desa_model->insert_pemilik_tower($r->TOWER_PEMILIK,$r->TOWER_JENIS_PEMILIK);
//            }
//        }
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tower/tower_pemilik', $data);
        $this->load->view('template/footer');
    
    }
    
    public function list_pengguna()
    {
        $data["ket"] = ""; 
        $data["list_pengguna"] = $this->tower_model->get_pengguna_tower();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tower/tower_pengguna', $data);
        $this->load->view('template/footer');
    
    }
    
    public function registration()
    {
        $data["ket"] = ""; 
        $data["list_pemilik"] = $this->tower_model->get_pemilik_tower();
        $data["list_kecamatan"] = $this->desa_model->get_all_kecamatan();
        
        
        $id_perusahaan = $this->input->post('id_perusahaan');
        $id_desa = $this->input->post('id_desa');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $side_id= $this->input->post('side_id');
        $site_addr = $this->input->post('site_addr');
        $map_addr = $this->input->post('map_addr');
        $jalan = $this->input->post('jalan');
        $site_type = $this->input->post('site_type');
        $type = $this->input->post('type');
        $height= $this->input->post('height');
        $ukuran = $this->input->post('ukuran');
        $luas= $this->input->post('luas');
        $remark= $this->input->post('remark');
        
        $this->form_validation->set_message('required', "Isian %s tidak boleh kosong");
        $this->form_validation->set_message('min_length', "%s harus lebih dari 6 karakter");
        $this->form_validation->set_message('max_length', "%s tidak boleh lebih dari 12 karakter");
        $this->form_validation->set_message('valid_email', "%s tidak valid");
        
        
        $this->form_validation->set_rules('side_id', 'Side ID', 'trim|required');
        $this->form_validation->set_rules('id_perusahaan', 'Penyedia Tower', 'trim|required');
        $this->form_validation->set_rules('id_desa', 'Desa', 'trim|required');
        
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('lng', 'Longitude', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $data["ket"] = "";
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('tower/tower_reg', $data);
            $this->load->view('template/footer');
        }
        else{
            $status_tower = 1;
            $this->tower_model->insert_tower($status_tower,$id_perusahaan,$id_desa,$side_id,$site_addr,$map_addr,$lat,$lng,$jalan,$site_type,$type,$height,$ukuran,$luas,$remark);
            $id_last_tower = $this->db->insert_id();
            $this->tower_model->insert_transaksi_registrasi($id_last_tower, $this->pegawai_id,$id_perusahaan);
            $this->tower_model->insert_perubahan_status_tower($id_last_tower,$this->pegawai_id,$status_tower);
            
            redirect('tower/edit/'.$id_last_tower);
        }
        
        
    
    }
    
    public function tambah_pengguna($id_tower)
    {
        $tanggal = $this->input->post('tanggal');
        $tinggi = $this->input->post('tinggi');
        $id_pengguna = $this->input->post('id_pengguna');
        
        $this->form_validation->set_message('required', "Isian %s tidak boleh kosong");
        $this->form_validation->set_message('min_length', "%s harus lebih dari 6 karakter");
        $this->form_validation->set_message('max_length', "%s tidak boleh lebih dari 12 karakter");
        $this->form_validation->set_message('valid_email', "%s tidak valid");
        
        
        $this->form_validation->set_rules('id_pengguna', 'Pengguna', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect('tower/edit/'.$id_tower);
        }
        else{
            
            $this->tower_model->insert_penggunaan_tower($id_tower,$id_pengguna,$tanggal,$tinggi);
            redirect('tower/edit/'.$id_tower);
        }
    }
    
    public function edit($id_tower)
    {
        
        $data["ket"] = ""; 
        $data["list_pengguna"] = $this->tower_model->get_pengguna_tower();
        $data["list_pemilik"] = $this->tower_model->get_pemilik_tower();
        $data["detail_tower"] = $this->tower_model->get_tower_from_id($id_tower);
        $data_tower = $this->tower_model->get_tower_from_id($id_tower);
        
        $data["list_kecamatan"] = $this->desa_model->get_all_kecamatan();
        $data["list_penggunaan"] = $this->tower_model->get_pengguna_tower_from_id($id_tower);
        $data["data_transaksi_pendaftaran"] = $this->tower_model->get_transaksi_registrasi($id_tower);
        $data["data_transaksi_status"] = $this->tower_model->get_transaksi_status($id_tower);
        
        
        $id_perusahaan = $this->input->post('id_perusahaan');
        $id_desa = $this->input->post('id_desa');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $side_id= $this->input->post('side_id');
        $site_addr = $this->input->post('site_addr');
        $map_addr = $this->input->post('map_addr');
        $jalan = $this->input->post('jalan');
        $site_type = $this->input->post('site_type');
        $type = $this->input->post('type');
        $height= $this->input->post('height');
        $ukuran = $this->input->post('ukuran');
        $luas= $this->input->post('luas');
        $remark= $this->input->post('remark');
        
        $res_tower = $data_tower->result_array();
        
        $id_dess =  $res_tower[0]["DESA_ID"];
        $data["list_desa"] = $this->desa_model->get_desa_from_kecamatan($id_dess);
        
        $this->form_validation->set_message('required', "Isian %s tidak boleh kosong");
        $this->form_validation->set_message('min_length', "%s harus lebih dari 6 karakter");
        $this->form_validation->set_message('max_length', "%s tidak boleh lebih dari 12 karakter");
        $this->form_validation->set_message('valid_email', "%s tidak valid");
        
        
        $this->form_validation->set_rules('side_id', 'Side ID', 'trim|required');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('lng', 'Longitude', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('tower/tower_edit', $data);
            $this->load->view('template/footer');
        }
        else{
            
            $this->tower_model->update_tower($id_tower,$id_perusahaan,$id_desa,$side_id,$site_addr,$map_addr,$lat,$lng,$jalan,$site_type,$type,$height,$ukuran,$luas,$remark);
            redirect('tower/edit/'.$id_tower);
        }
    }
    
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */