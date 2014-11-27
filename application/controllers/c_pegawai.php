<?php
	class C_pegawai extends CI_Controller{

		function __construct(){
                    parent::__construct();
                    $this->load->library('session');
                    $this->load->helper(array("html","form","url","text"));
                    $this->load->model("model_users","tabel");
                    $this->load->library('form_validation');
                    $this->pegawai_id = $this->session->userdata('pegawai_id');
                    $this->pegawai_nama = $this->session->userdata('pegawai_nama');
		}
                
      function findrecto($aksi="Update"){
          $data["aksi"] = $aksi;
			    $data["judulapp"] = "Find data to $aksi!";
			    $data["scriptaksi"] = "c_pegawai/showrecto/$aksi";
                      if($this->pegawai_id)
                        {
                        $this->load->view('template/header');
                        $this->load->view('template/sidebar');
			$this->load->view("pegawai/pegawai_getnip",$data);
                        $this->load->view('template/footer');
                     }else{
                         redirect('member');
                     }
		}
                
                /*function findpass($aksi="Update Password"){
			$data["aksi"] = $aksi;
			$data["judulapp"] = "Find data to $aksi!";
			$data["scriptaksi"] = "c_pegawai/showpass/$aksi";
                      if($this->pegawai_id)
                        {
                        $this->load->view('template/header');
                        $this->load->view('template/sidebar');
			$this->load->view("pegawai/pegawai_getnip",$data);
                        $this->load->view('template/footer');
                     }else{
                         redirect('member');
                     }
		}*/
                
                function showrecto($aksi="Update"){
			$data["PEGAWAI_ID"] = $this->input->post("PEGAWAI_ID");
			$jrow = 0;
			if(!empty($data["PEGAWAI_ID"])){
				$hslquery = $this->tabel->getrecord($data);
				$jrow = $hslquery->num_rows();
			}
			if($jrow > 0){
				$data = $this->tabel->defform();
				$row = $hslquery->row_array(0);
				$data["PEGAWAI_ID"]["value"] = $row["PEGAWAI_ID"];
				$data["PEGAWAI_NAMA"]["value"] = $row["PEGAWAI_NAMA"];
				$data["PEGAWAI_ALAMAT"]["value"] = $row["PEGAWAI_ALAMAT"];
				$data["PEGAWAI_NO_HP"]["value"] = $row["PEGAWAI_NO_HP"];
				$data["PEGAWAI_NO_TELP"]["value"] = $row["PEGAWAI_NO_TELP"];
				$data["PEGAWAI_TTL"]["value"] = $row["PEGAWAI_TTL"];
				$data["PEGAWAI_JABATAN"]["value"] = $row["PEGAWAI_JABATAN"];
				$data["PEGAWAI_AGAMA"]["value"] = $row["PEGAWAI_AGAMA"];
				$data["PEGAWAI_STATUS"]["value"] = $row["PEGAWAI_STATUS"];
				$data["judulapp"] = "$aksi Data";
				$data["aksi"] = $aksi;
				$data["scriptaksi"] = "c_pegawai/$aksi"."data";
                          if($this->pegawai_id)
                            {
                                $this->load->view('template/header');
                                $this->load->view('template/sidebar');
				$this->load->view("pegawai/pegawai_form",$data);
                                $this->load->view('template/footer');
                         }else{
                             redirect('member');
                         }
			}else{
				$this->findrecto($aksi);
			}
		}
                
                /*function showpass($aksi="Update Password"){
                    $data["PEGAWAI_ID"] = $this->input->post("PEGAWAI_ID");
			$jrow = 0;
			if(!empty($data["PEGAWAI_ID"])){
				$hslquery = $this->tabel->getrecord($data);
				$jrow = $hslquery->num_rows();
			}
			if($jrow > 0){
				$data = $this->tabel->defpass();
				$row = $hslquery->row_array(0);
				$data["PEGAWAI_ID"]["value"] = $row["PEGAWAI_ID"];
				$data["PEGAWAI_PASSWORD"]["value"] = $row["PEGAWAI_PASSWORD"];
				$data["judulapp"] = "$aksi Data";
				$data["aksi"] = $aksi;
				$data["scriptaksi"] = "c_pegawai/$aksi"."data";
                          if($this->pegawai_id)
                            {
                                $this->load->view('template/header');
                                $this->load->view('template/sidebar');
				$this->load->view("pegawai/pegawai_pass",$data);
                                $this->load->view('template/footer');
                         }else{
                             redirect('member');
                         }
			}else{
				$this->findrecto($aksi);
			}
                }*/
                
                function updatedata(){
			$data["adata"] = $this->tabel->readinput(); 
			$data["hslquery"] = $this->tabel->updaterec($data["adata"]);
			$data["judulapp"] = "Update Data";
			$data["message"] = ($data["hslquery"])?"Berhasil diupdate!":"Gagal diupdate!";
                     if($this->pegawai_id)
                        {
                        $this->load->view('template/header');
                        $this->load->view('template/sidebar');
			$this->load->view("pegawai/pegawai_message",$data);
                        $this->load->view('template/footer');
                    }else{
                        redirect('member');
                    }
		}
                
                //public function pass_validation(){

                //    $this->form_validation->set_rules('pegawai_password', 'Password', 'required|trim');
                //    $this->form_validation->set_rules('pegawai_cpassword', 'Confirm Password', 'required|trim|matches[pegawai_password]');

                //    if($this->form_validation->run()){

                //        $this->load->model('model_users');
                //        $this->model_users->gpass();
                //        redirect('member/daf_pegawai');
                //    }else{
                        
                //        redirect('member');
                 //   }
                //}
                
                /*public function updatepassdata(){
                   $data["adata"] = $this->tabel->readpass(); 
			$data["hslquery"] = $this->tabel->updatepass($data["adata"]);
			$data["judulapp"] = "Update Password";
			$data["message"] = ($data["hslquery"])?"Password berhasil diupdate!":"Password gagal diupdate!";
                     if($this->pegawai_id)
                        {
                        $this->load->view('template/header');
                        $this->load->view('template/sidebar');
			$this->load->view("pegawai/gpassword",$data);
                        $this->load->view('template/footer');
                    }else{
                        redirect('member');
                    }
                }*/
                
                function deletedata(){
			$data["adata"] = $this->tabel->readinput();
			$data["hslquery"] = $this->tabel->deleterec($data["adata"]);
			$data["judulapp"] = "Delete Data";
			$data["message"] = ($data["hslquery"])?"Berhasil didelete!":"Gagal didelete!";
                        
                     if($this->pegawai_id)
                     {
                        $this->load->view('template/header');
                        $this->load->view('template/sidebar');
			                  $this->load->view("pegawai/pegawai_message", $data);
                        $this->load->view('template/footer');
                    }else{
                        redirect('member');
                    }     
		}
}