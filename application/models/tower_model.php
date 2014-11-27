<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tower_model extends CI_model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_pengguna_tower_from_id($id_tower){
       $q = "SELECT * FROM penggunaan_tower pgt, master_pengguna mp WHERE pgt.tower_id =$id_tower and pgt.pengguna_id = mp.pengguna_id";
       return $this->db->query($q);
    }
    
    
    
    public function insert_penggunaan_tower($id_tower,$id_pengguna,$tanggal,$tinggi){
        
        $tgl_format = date("Y-m-d", strtotime($tanggal));
        $data = array(
            'TOWER_ID' => $id_tower,
            'PENGGUNA_ID' => $id_pengguna,
            'PENGGUNAAN_TOWER_TANGGAL' => $tgl_format,
            'KETINGGIAN_ANTENA' => $tinggi
       );
       $this->db->insert('penggunaan_tower', $data);
    }
    
    public function get_transaksi_registrasi($id_tower){
       $q = "SELECT *
            FROM registrasi_tower rt, master_penyedia mp, tower t, pegawai p, master_status_tower ms
            WHERE rt.tower_id = t.tower_id
            AND rt.penyedia_id = mp.penyedia_id
            AND rt.pegawai_id = p.pegawai_id
            AND t.tower_status = ms.status_tower_id and t.tower_id=$id_tower";
       return $this->db->query($q);
    }
    
    public function get_transaksi_status($id_tower){
       $q = "SELECT *
            FROM tower t, transaksi_status_tower ts, master_status_tower ms, pegawai p
            WHERE t.tower_id = ts.tower_id
            AND p.pegawai_id = ts.pegawai_id
            AND ts.STATUS_TOWER_ID = ms.STATUS_TOWER_ID
            AND ts.tower_id = $id_tower
            ";
       
       return $this->db->query($q);
    }
    
    public function insert_transaksi_registrasi($id_tower,$pegawai_id,$id_perusahaan){
        $data = array(
            'PENYEDIA_ID' => $id_perusahaan,
            'TOWER_ID' => $id_tower,
            'PEGAWAI_ID' => $pegawai_id,
            'REGISTRASI_TANGGAL' => date("Y-m-d H:i:s")
        );
        $this->db->insert('registrasi_tower', $data);
    }
    
    public function insert_perubahan_status_tower($id_tower,$pegawai_id,$status_tower){
        $data = array(
            'STATUS_TOWER_ID' => $status_tower,
            'TOWER_ID' => $id_tower,
            'PEGAWAI_ID' => $pegawai_id,
            'TRANSAKSI_STATUS_TIME' => date("Y-m-d H:i:s")
        );
        $this->db->insert('transaksi_status_tower', $data);
    }

    public function insert_tower($status_tower,$id_penyedia,$id_desa,$side_id,$site_address,$map_address,$lat,$lng,$jns_jln,$site_type,$type,$height,$u_tanah,$l_tanah,$remark){
        
        $data = array(
            'TOWER_STATUS' => $status_tower,
            'PENYEDIA_ID' => $id_penyedia,
            'DESA_ID' => $id_desa,
            'TOWER_SIDE_ID' => $side_id,
            'TOWER_SITE_ADDRESS' => $site_address,
            'TOWER_MAP_ADDRESS' => $map_address,
            'TOWER_LAT' => $lat,
            'TOWER_LNG' => $lng,
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
    
    public function update_tower($tower_id, $id_penyedia,$id_desa,$side_id,$site_address,$map_address,$lat,$lng,$jns_jln,$site_type,$type,$height,$u_tanah,$l_tanah,$remark){
        
        $data = array(
            'PENYEDIA_ID' => $id_penyedia,
            'DESA_ID' => $id_desa,
            'TOWER_SIDE_ID' => $side_id,
            'TOWER_SITE_ADDRESS' => $site_address,
            'TOWER_MAP_ADDRESS' => $map_address,
            'TOWER_LAT' => $lat,
            'TOWER_LNG' => $lng,
            'TOWER_JENIS_JALAN' => $jns_jln,
            'TOWER_SITE_TYPE' => $site_type,
            'TOWER_TYPE' => $type,
            'TOWER_HEIGHT' => $height,
            'TOWER_UKURAN_TANAH' => $u_tanah,
            'TOWER_LUAS_TANAH' => $l_tanah,
            'TOWER_REMARK' => $remark,
            
       );
        $this->db->where('TOWER_ID',$tower_id);
        $this->db->update('tower', $data);
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
    
    public function get_tower_point(){
       $query = $this->db->query('select * 
        from tower t, desa d, kecamatan k, master_status_tower m, master_penyedia p
        where t.desa_id = d.desa_id and d.kecamatan_id = k.kecamatan_id and t.tower_status = m.status_tower_id and p.penyedia_id = t.penyedia_id
        order by tower_id
        ');
       //$query = $this->db->get('tower');
       return $query;
    }
    
    
    public function get_tower_from_id($id_tower){
       $q = "select * 
            from tower t, desa d, kecamatan k, master_status_tower m, master_penyedia p
            where t.desa_id = d.desa_id and d.kecamatan_id = k.kecamatan_id and t.tower_status = m.status_tower_id and p.penyedia_id = t.penyedia_id
            and t.tower_id = $id_tower
        ";
       $query = $this->db->query($q);
       return $query;
    }
    
    
    
    
    
}