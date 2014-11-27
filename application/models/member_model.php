<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_data(){
        $query = "select * from pegawai";
        return $this->db->query($query);
    }
    
    public function cek_login($user, $pass){
        $pass_ = md5($pass);
        $query = $this->db->get_where('pegawai', array('PEGAWAI_NIP '=> $user,'PEGAWAI_PASSWORD'=> $pass_),1);
        if ($query->num_rows() > 0)  return $query->row();
        else return FALSE;
    }


//    public function insert_data($nama, $pwd, $username, $address, $phone, $email){
//        //$query = "insert into pegawai(id_pegawai, nama_pegawai, alamat_pegawai, no_telepon) values ($id,$nama, $alamat, $telp)";
//        //$this->db->query($query);
//        $data = array(
//            'MEMBER_NAME' => $nama,
//            'MEMBER_PASSWORD'=> md5($pwd),
//            'MEMBER_USERNAME'=> $username,
//            'MEMBER_AKSES'=> "0",
//            'MEMBER_ADDRESS'=> $address,
//            'MEMBER_PHONE'=> $phone,
//            'MEMBER_EMAIL'=> $email,
//       );
//        $this->db->insert('member', $data);
//    }
//    
//    public function update_data($id, $nama, $user, $addr, $phone, $email){
//        $data = array(
//            'MEMBER_NAME' => $nama,
//            'MEMBER_USERNAME'=> $user,
//            'MEMBER_ADDRESS'=> $addr,
//            'MEMBER_PHONE'=> $phone,
//            'MEMBER_EMAIL'=> $email,
//        );
//        $this->db->where('MEMBER_ID',$id);
//        $this->db->update('member', $data);
//    }
//    
//    public function del_data($id){
//        $this->db->where('MEMBER_ID', $id);
//        $this->db->delete('member');
//    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
