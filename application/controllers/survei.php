<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survei extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('html');
            $this->load->helper('form');
            $this->load->helper('text');
            $this->load->library('calendar');
            $this->load->library('image_CRUD');
            $this->load->library('form_validation');
            $this->load->database();
            //$this->load->model('survei_model');
            $this->pegawai_id = $this->session->userdata('pegawai_id');
            $this->pegawai_nama = $this->session->userdata('pegawai_nama');
    }
    
    public function make_survey(){
        if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('survei/make_survey');
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }
    public function daf_survey(){
        if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('survei/daf_survei');
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
    }
    
    public function survei_validation(){
        

        
        $this->form_validation->set_rules('id_tower', 'TOWER_ID', 'required|trim');
        $this->form_validation->set_rules('jenis_survey_id', 'JENIS_SURVEY_ID', 'required');
        $this->form_validation->set_rules('survey_alasan', 'SURVEY_ALASAN', 'required');
        $this->form_validation->set_rules('survey_tgl_rencana', 'SURVEY_TANGGAL_RENCANA', 'required');
        $this->form_validation->set_rules('survey_tgl', 'SURVEY_TANGGAL', 'required');
        $this->form_validation->set_message('is_unique', 'ID SURVEY sudah terdaftar.');
        
        if($this->form_validation->run()){
            
            $this->load->model('survei_model');
            $this->survei_model->add_survei();
            redirect('survei/daf_survey');
        }else{
            $this->make_survey();
        }
        
    }
    
    public function jadwal(){
        if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->hari();
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
   }
    
    public function jadwal_validation(){
        
        $this->form_validation->set_rules(
                                            'id_survey', 
                                            'SURVEY_ID', 
                                            'required|trim'
                );
        
        $this->form_validation->set_rules('id_tower', 'TOWER_ID', 'required|trim');
        $this->form_validation->set_rules('jenis_survey_id', 'JENIS_SURVEY_ID', 'required');
        $this->form_validation->set_rules('survey_alasan', 'SURVEY_ALASAN', 'required');
        $this->form_validation->set_rules('survey_tgl_rencana', 'SURVEY_TANGGAL_RENCANA', 'required');
        $this->form_validation->set_message('is_unique', 'ID SURVEY sudah terdaftar.');
        
        if($this->form_validation->run()){
            
            $this->load->model('survei_model');
            $this->survei_model->add_survei();
            redirect('survei/daf_survey');
        }else{
            $this->make_survey();
        }
        
    }
    
    public function kalender(){
        $data['varkal'] = $this->calendar->generate();
       
    }
    
    public function hari(){
        $tahun = 2013;
        $bulan = '12';
        $haribesar = array(13=>  site_url()."/survei/infohari/$tahun/$bulan/13");
        $data['varkal'] = $this->calendar->generate($tahun,$bulan,$haribesar);
        $this->load->view('survei/jadwal',$data);
    }


    public function infohari($tahun,$bulan,$tgl){
        $ainfohari = array(
                '20131213' => "Survey Lapangan TBN-01"
        );
        $data['infohari'] =$ainfohari[$tahun.$bulan.$tgl];
        $data['tahun'] =$tahun;
        $data['bulan'] =$bulan;
        $data['tgl'] =$tgl;
        $data['judul'] = 'Informasi Tanggal Survey';
        $this->load->view('survei/jadwal',$data);
    }
    
    function survei_foto()
	{
		$image_crud = new image_CRUD();
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_title_field('tanggal');
		$image_crud->set_table('survei_foto')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}
        
        function _example_output($output = null)
	{
            if($this->pegawai_id)
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('survei/foto.php',$output);
            $this->load->view('template/footer');
        }else{
            redirect('member');
        }
	}
	
	function foto()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
    
}