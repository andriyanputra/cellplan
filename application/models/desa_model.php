<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class desa_model extends CI_model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function update_id_tower($id_tower, $id_penyedia){
        $data = array(
            'PENYEDIA_ID' => $id_penyedia,
        );
        $this->db->where('TOWER_ID',$id_tower);
        $this->db->update('tower', $data);
    }
    
    public function insert_pemilik_tower($nama, $jenis){
       
        $data = array(
            'PENYEDIA_NAMA' => $nama,
            'PENYEDIA_TYPE'=> $jenis,
        );
        $this->db->insert('master_penyedia', $data);
    
    }

    public function cek_pemilik_tower($nama_pemilik){
        $query = $this->db->get_where('master_penyedia', array('PENYEDIA_NAMA '=> $nama_pemilik),1);
        if ($query->num_rows() > 0)   return $query->row();
        else return FALSE;
    }

    public function get_pengguna_tower(){
        $query = $this->db->get('master_pengguna');
        return $query;
    }
    
    public function get_pemilik_tower(){
        $query = "SELECT * , count( t.tower_id ) AS JUMLAH
                    FROM tower t, master_penyedia mp
                    WHERE t.penyedia_id = mp.penyedia_id
                    GROUP BY t.penyedia_id";
        return $this->db->query($query);
    }

    public function get_desa_poly(){
       $query = $this->db->query('select * from desa d, kecamatan kc, kabupaten kb where d.kecamatan_id = kc.kecamatan_id and kc.kabupaten_id = kb.kabupaten_id');
       //$query = $this->db->get('desa');
       return $query;
    }
    
    public function get_grid_poly(){
       //$query = $this->db->query('select * from grid where grid_d = 1');
       $query = $this->db->get('grid');
       return $query;
    }
    
    
    
    public function get_tower_from_id($id_tower){
       $this->db->where('TOWER_ID',$id_tower);
       $query = $this->db->get('tower');
       return $query;
    }
    
    public function get_all_kecamatan(){
       $query = $this->db->get('kecamatan');
       return $query;
    }
    
    public function get_desa_from_kecamatan($id_kec){
        $this->db->where('KECAMATAN_ID',$id_kec);
        $query = $this->db->get('desa');
       return $query;
    }

//    public function get_id_desa($des_nama){
//        $query = $this->db->get_where('desa', array('DESA_NAMA'=> $des_nama),1);
//        if ($query->num_rows() > 0)   return $query->row();
//        else return FALSE;
//    }
//    
//    public function update_id_desa($id_tower, $id_desa){
//        $data = array(
//            'DESA_ID' => $id_desa,
//        );
//        $this->db->where('TOWER_ID',$id_tower);
//        $this->db->update('tower', $data);
//    }
//    
//    public function get_id_kecamatan($kec){
//        $query = $this->db->get_where('kecamatan', array('KECAMATAN_NAMA '=> $kec),1);
//        if ($query->num_rows() > 0)   return $query->row();
//        else return FALSE;
//    }
    
//    public function update_id_kecamatan($id_desa, $id_kec){
//        $data = array(
//            'KECAMATAN_ID' => $id_kec,
//        );
//        $this->db->where('DESA_ID',$id_desa);
//        $this->db->update('desa', $data);
//    }

    public function insert_data($id_penyedia,$side_id,$site_address,$map_address,$lat,$lng,$jns_jln,$site_type,$type,$height,$u_tanah,$l_tanah,$remark){
        
        $data = array(
            'PENYEDIA_ID' => $nama,
            'DESA_ID' => 1,
            'TOWER_SIDE_ID' => $side_id,
            'TOWER_SITE_ADDRESS' => $site_address,
            'TOWER_MAP_ADDRESS' => $map_address,
            'TOWER_LNG' => $lat,
            'TOWER_LAT' => $lng,
            'TOWER_JENIS_JALAN' => $jns_jln,
            'TOWER_SITE_TYPE' => $site_type,
            'TOWER_TYPE' => $type,
            'TOWER_HEIGHT' => $height,
            'TOWER_UKURAN_TANAH' => $u_tanah,
            'TOWER_LUAS_TANAH' => $l_tanah,
            'TOWER_REMARK' => $remark,
            
       );
        $this->db->insert('tower', $data);
    }
    
    
    
}