<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rekom_model extends CI_Model{

	 function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_rekom($id,$tanggal,$status,$ket){
        
        $tgl_format = date("Y-m-d", strtotime($tanggal));
        $data = array(
            'TOWER_ID' => $id,
            'SUREK_STATUS' => $status,
            'SUREK_TANGGAL' => $tgl_format,
            'SUREK_KETERANGAN' => $ket
       );
       $this->db->insert('surat_rekomendasi', $data);
    }

	function get_all()
    {
        return $this->db->get('surat_rekomendasi');         
    }    
}