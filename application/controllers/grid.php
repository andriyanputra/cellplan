<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grid extends CI_Controller {

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
        $this->load->view('grid/grid_view', $data);
        $this->load->view('template/footer');
            
    
    }
    public function get_desa_kec()
    {
        $id_kec = $this->input->post('kecamatan');
        $q = $this->desa_model->get_desa_from_kecamatan($id_kec);
        echo "<option value=\"0\" >Semua Desa</option>";
        foreach ($q->result() as $r){
            echo "<option value=\"$r->DESA_ID\" >$r->DESA_NAMA</option>";
        }
    }
    public function get_point_tower(){
       
                $points = array();
                $q = $this->tower_model->get_tower_point();
		
                foreach($q->result_array() as $r){//data loc buat marker
                    array_push($points, $r);
		}
		echo json_encode(array('Locations' => $points));
		exit;
        
    }
    
    

    public function get_polygon(){
        header('Access-Control-Allow-Origin: *');
        $desa_list = array();
        $p= $this->desa_model->get_desa_poly();
        
        foreach($p->result_array() as $r){//data loc buat marker
            $data_way = explode(" ", $r["DESA_GEOMETRY"]);
            $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
            $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
        
            $point_desa_list = array();
            for($i=1;$i<count($data_way);$i++)
            {
                $latlng = explode(",", $data_way[$i]);
                $lat = $latlng[0];
                $lng = $latlng[1];

                if($i==0) {//echo $latlng[1];
                    $temp1 = explode(">", $latlng[0]);
                    $lat = $temp1[4];
                }
                
                if($i==count($data_way)-1) {//echo $latlng[1];
                    $temp = explode("<", $latlng[1]);
                    $lng = $temp[0]; 
                }
                
                $data_latlng = array(
                    'LAT' => $lng,
                    'LNG' => $lat
                );
                
                array_push($point_desa_list, $data_latlng);
            }
            
            $data_per_desa = array(
                'DESA_ID' => $r["DESA_ID"],
                'DESA_NAMA' => $r["DESA_NAMA"],
                'KECAMATAN_NAMA' => $r["KECAMATAN_NAMA"],
                'KAB_KOTA' => $r["KABUPATEN_NAMA"],
                'DESA_JML_PENDUDUK' => $r["DESA_JML_PENDUDUK"],
                'DESA_AREA_KM2' => $r["DESA_AREA_KM2"],
                'DESA_POINT_LIST' => $point_desa_list,
                'COLOR' => $color
            );
            array_push($desa_list, $data_per_desa); 
        }

        echo json_encode(array('Desa' => $desa_list));
        exit;
    }
    
    
    public function get_grid_data(){
        header('Access-Control-Allow-Origin: *');
        $grid_list = array();
        $p= $this->desa_model->get_grid_poly();
        
        
        foreach($p->result_array() as $r){//data loc buat marker
            $data_way = explode(" ", $r["GRID_POLY"]);
        
            $point_grid_list = array();
            for($i=0;$i<count($data_way);$i++)
            {
                $latlng = explode(",", $data_way[$i]);
                $lat = $latlng[0];
                $lng = $latlng[1];

                if($i==0) {//echo $latlng[1];
                    $temp1 = explode(">", $latlng[0]);
                    $lat = $temp1[4];
                }
                
                if($i==count($data_way)-1) {//echo $latlng[1];
                    $temp = explode("<", $latlng[1]);
                    $lng = $temp[0]; 
                }
                
                $data_latlng = array(
                    'LAT' => $lng,
                    'LNG' => $lat
                );
                
                array_push($point_grid_list, $data_latlng);
            }
            
            $data_per_grid = array(
                'GRID_ID' => $r["GRID_ID"],
                'GRID_POINT_LIST' => $point_grid_list,
                'COLOR' => $r["GRID_COLOR"],
                'TYPE' => $r["GRID_TYPE"]
            );
            array_push($grid_list, $data_per_grid); 
        }

        echo json_encode(array('GRID' => $grid_list));
        exit;
    }
    
   
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */