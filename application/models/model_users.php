<?php

class Model_users extends CI_Model{
    
    function __construct(){
		parent::__construct();
		$this->load->database();
	}
    
    public function add_pegawai(){
        
        $tgl_format = date("Y-m-d", strtotime($tanggal));
        $data = array(
            'pegawai_nip' => $this->input->post('pegawai_nip'),
            'pegawai_password' => md5($this->input->post('pegawai_password')),
            'pegawai_nama' => $this->input->post('pegawai_nama'),
            'pegawai_alamat' => $this->input->post('pegawai_alamat'),
            'pegawai_no_hp' => $this->input->post('pegawai_no_hp'),
            'pegawai_no_telp' => $this->input->post('pegawai_no_telp'),
            'pegawai_ttl' => $this->input->post('pegawai_ttl'),
            'pegawai_jabatan' => $this->input->post('pegawai_jabatan'),
            'pegawai_agama' => $this->input->post('pegawai_agama'),
            'pegawai_email' => $this->input->post('pegawai_email'),
            'pegawai_status' => $this->input->post('pegawai_status')
        );
        
        $query = $this->db->insert('PEGAWAI',$data);
        if($query){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function gpass(){
        $data = array(
            
            'pegawai_password' => md5($this->input->post('pegawai_password'))
            );
        $query = $this->db->update('PEGAWAI',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    function readfilter(){
        $namafield = $this->input->post("namafield");
        $valfilter = $this->input->post("valfilter");
        return array("namafield"=>$namafield,"valfilter"=>$valfilter);
    }
    
    function getfilteredrec($data){
        //$this->db->like($data["namafield"],$data["valfilter"]);
        return $this->db->get("PEGAWAI");
    }
    
    public function getrecord($data){
	$this->db->where($data);
        return $this->db->get("PEGAWAI");
    }
    
    function defpass(){
        $nip=array(
                "name"=>"PEGAWAI_ID"
		,"id"=>"PEGAWAI_ID"
		,"maxlength"=>"20"
		,"size"=>"20"
		,"value"=>""
		
	);
        
        $pass=array(
		"name"=>"PEGAWAI_PASSWORD"
		,"id"=>"PEGAWAI_PASSWORD"
		,"maxlength"=>"50"
		,"size"=>"35"
		,"value"=>""
		
	);
        
        //End definisi
	$apegawai = array();
	$apegawai["PEGAWAI_ID"] = $nip;
	$apegawai["PEGAWAI_PASSWORD"] = $pass;
        return $apegawai;
    }
    
    function defform(){
        //definisi elemen form untuk data teman
	$nip=array(
                "name"=>"PEGAWAI_ID"
		,"id"=>"PEGAWAI_ID"
		,"maxlength"=>"20"
		,"size"=>"20"
		,"value"=>""
		
	);
	$nama=array(
		"name"=>"PEGAWAI_NAMA"
		,"id"=>"PEGAWAI_NAMA"
		,"maxlength"=>"50"
		,"size"=>"35"
		,"value"=>""
		
	);
	$alamat=array(
                "name"=>"PEGAWAI_ALAMAT"
		,"id"=>"PEGAWAI_ALAMAT"
		,"maxlength"=>"15"
		,"size"=>"35"
		,"value"=>""
		
	);
	$nohp=array(
                "name"=>"PEGAWAI_NO_HP"
		,"id"=>"PEGAWAI_NO_HP"
		,"maxlength"=>"15"
		,"size"=>"35"
		,"value"=>""
		
	);
	$notelp=array(
                "name"=>"PEGAWAI_NO_TELP"
		,"id"=>"PEGAWAI_NO_TELP"
		,"maxlength"=>"15"
		,"size"=>"35"
		,"value"=>""
		
	);
	$ttl=array(
                "name"=>"PEGAWAI_TTL"
		,"id"=>"PEGAWAI_TTL"
		,"maxlength"=>"15"
		,"size"=>"35"
		,"value"=>""
		
	);
	$jabatan=array(
                "name"=>"PEGAWAI_JABATAN"
		,"id"=>"PEGAWAI_JABATAN"
		,"maxlength"=>"15"
		,"size"=>"35"
		,"value"=>""
		
	);
	$agama=array(
		"name"=>"PEGAWAI_AGAMA"
		,"id"=>"PEGAWAI_AGAMA"
		,"maxlength"=>"35"
		,"size"=>"35"
		,"value"=>""
		
	);
	$status=array(
		"name"=>"PEGAWAI_STATUS"
		,"id"=>"PEGAWAI_STATUS"
		,"maxlength"=>"35"
		,"size"=>"35"
		,"value"=>""
		
	);
	
        //End definisi
	$apegawai = array();
	$apegawai["PEGAWAI_ID"] = $nip;
	$apegawai["PEGAWAI_NAMA"] = $nama;
	$apegawai["PEGAWAI_ALAMAT"] = $alamat;
	$apegawai["PEGAWAI_NO_HP"] = $nohp;
	$apegawai["PEGAWAI_NO_TELP"] = $notelp;
	$apegawai["PEGAWAI_TTL"] = $ttl;
	$apegawai["PEGAWAI_JABATAN"] = $jabatan;
	$apegawai["PEGAWAI_AGAMA"] = $agama;
	$apegawai["PEGAWAI_STATUS"] = $status;
	return $apegawai;
	}
        
        function readinput(){
			$apegawai = array();
			$apegawai["PEGAWAI_ID"] = $this->input->post("PEGAWAI_ID");
			$apegawai["PEGAWAI_NAMA"] = $this->input->post("PEGAWAI_NAMA");
			$apegawai["PEGAWAI_ALAMAT"] = $this->input->post("PEGAWAI_ALAMAT");
			$apegawai["PEGAWAI_NO_HP"] = $this->input->post("PEGAWAI_NO_HP");
			$apegawai["PEGAWAI_NO_TELP"] = $this->input->post("PEGAWAI_NO_TELP");
			$apegawai["PEGAWAI_TTL"] = $this->input->post("PEGAWAI_TTL");
			$apegawai["PEGAWAI_JABATAN"] = $this->input->post("PEGAWAI_JABATAN");
			$apegawai["PEGAWAI_AGAMA"] = $this->input->post("PEGAWAI_AGAMA");
			$apegawai["PEGAWAI_STATUS"] = $this->input->post("PEGAWAI_STATUS");
			return $apegawai;
	}
        
        function readpass(){
            $apegawai = array();
            $apegawai["PEGAWAI_ID"] = $this->input->post("PEGAWAI_ID");
            $apegawai['PEGAWAI_PASSWORD'] = md5($this->input->post("PEGAWAI_PASSWORD"));
            return $apegawai;
        }
        
        function updatepass($adata){
			$this->db->where("PEGAWAI_ID",$adata["PEGAWAI_ID"]);
			$this->db->update("PEGAWAI", $adata);
			return(($this->db->affected_rows()>0)?TRUE:FALSE);
	}
        
        function updaterec($adata){
			$this->db->where("PEGAWAI_ID",$adata["PEGAWAI_ID"]);
			$this->db->update("PEGAWAI",$adata);
			return(($this->db->affected_rows()>0)?TRUE:FALSE);
	}
        
        function deleterec($adata){
			$this->db->where("PEGAWAI_ID",$adata["PEGAWAI_ID"]);
			$this->db->delete("PEGAWAI");
			return(($this->db->affected_rows()>0)?TRUE:FALSE);
	}
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
