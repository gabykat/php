<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coordenadas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this ->load -> model('coordenadas_model');
        $this ->load -> library('form_validation');
    }

    public function index() {
        $result= $this->db->get('coordenada');
        $data=array ('consulta'=> $result);
        $this->load->view('coordenadas', $data);
    }

     //gaby
     public function AgregarCoordenadas(){
        $this -> form_validation -> set_rules('nposx','posx','required|trim');
        $this -> form_validation -> set_rules('nposx','posy','required|trim');
        $this -> form_validation -> set_rules('nposx','posz','required|trim');
        $this -> form_validation -> set_rules('nsitio','sitio_id','required|trim');

        if($this -> form_validation -> run() == FALSE){
        	//ERROR
  			 $this->load->view('admin');
        }else{
        	//OK
                $this->coordenadas_model->addCoordenadas();
                $data=array('mensaje'=>'la coordenadas se registro correctamente');
                $this->load->view('coordenadas',$data);
        }
    }
}