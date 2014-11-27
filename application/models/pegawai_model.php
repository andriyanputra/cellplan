<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pegawai_model extends CI_model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_pegawai($nip,$nama,$alamat,$nohp,$notelp,$ttl,$jabatan,$agama,$status,$email,$pass){
    	
        $tgl_format = date("Y-m-d", strtotime($ttl));
        $data = array(
            'PEGAWAI_NIP' => $nip,
            'PEGAWAI_NAMA' => $nama,
            'PEGAWAI_ALAMAT' => $alamat,
            'PEGAWAI_NO_HP' => $nohp,
            'PEGAWAI_NO_TELP' => $notelp,
            'PEGAWAI_TTL' => $tgl_format,
            'PEGAWAI_JABATAN' => $jabatan,
            'PEGAWAI_AGAMA' => $agama,
            'PEGAWAI_STATUS' => $status,
            'PEGAWAI_EMAIL' => $email,
            'PEGAWAI_PASSWORD' => md5($pass),
            
       );
        $this->db->insert('pegawai', $data);
    }

    public function get_pegawai_from_id($id){
       $status = false;
       $where = array('PEGAWAI_ID' => $id);
       $this->db->select('*'); // <-- There is never any reason to write this line!
       $this->db->from('pegawai');
       $this->db->where($where);
       $this->db->order_by('PEGAWAI_ID');

       $query = $this->db->get();
            
       return $query;
    }

    public function update_pegawai(){
        $status = false;

        
        $id = $this->input->post("pegawai_id");
        $nip = $this->input->post("pegawai_nip");
        $nama = $this->input->post('pegawai_nama');
        $alamat = $this->input->post('pegawai_alamat');
        $ttl = $this->input->post('pegawai_ttl');
        $no_hp = $this->input->post('pegawai_no_hp');
        $no_telp = $this->input->post('pegawai_no_telp');
        $jabatan = $this->input->post('pegawai_jabatan');
        $agama = $this->input->post('pegawai_agama');
        $status = $this->input->post('pegawai_status');
        $email = $this->input->post('pegawai_email');
        $tgl_format = date("Y-m-d", strtotime($ttl));

        $data = array(
            'PEGAWAI_NIP' => $nip,
            'PEGAWAI_NAMA' => $nama,
            'PEGAWAI_ALAMAT' => $alamat,
            'PEGAWAI_NO_HP' => $no_hp,
            'PEGAWAI_NO_TELP' => $no_telp,
            'PEGAWAI_TTL' => $tgl_format,
            'PEGAWAI_JABATAN' => $jabatan,
            'PEGAWAI_AGAMA' => $agama,
            'PEGAWAI_STATUS' => $status,
            'PEGAWAI_EMAIL' => $email,

            );
        $where = array('PEGAWAI_ID' => $id,);

        $this->db->where($where);
        $status = $this->db->update('pegawai', $data);
        return $status;
    }

    function delete($id){
        $this->db->where('PEGAWAI_ID',$id);
        $this->db->delete('pegawai');
    }

}