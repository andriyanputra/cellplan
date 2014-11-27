<?php

class Survei_model extends CI_Model{
    
    //private $primary_key='pegawai_id';
    //private $table_name='PEGAWAI';
    function __construct(){
		parent::__construct();
		$this->load->database();
	} 
public function add_survei(){
        $tgl1 = date("Y-m-d", strtotime($this->input->post('survey_tgl_rencana')));
        $tgl2 = date("Y-m-d", strtotime($this->input->post('survey_tgl')));
        $data = array(
            
            'TOWER_ID' => $this->input->post('id_tower'),
            'JENIS_SURVEY_ID' => $this->input->post('jenis_survey_id'),
            'SURVEY_ALASAN' => $this->input->post('survey_alasan'),
            'SURVEY_TANGGAL_RENCANA' => $tgl1,
            'SURVEY_TANGGAL' => $tgl2,
        );
        
        $query = $this->db->insert('SURVEI',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
}
?>