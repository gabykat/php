<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this ->load -> model('sitios_model');
        $this ->load -> library('form_validation');
    }

    public function index() {
        $this->load->view('sitios');
    }

     //gaby
     public function AgregarSitios(){
        $this -> form_validation -> set_rules('ncategoria_id','categoria_id','required|trim');
        $this -> form_validation -> set_rules('ndescripcion','descripcion','required|trim');
        $this -> form_validation -> set_rules('nnombre','nombre','required|trim');
        $this -> form_validation -> set_rules('nhorario','horario','required|trim');

        if($this -> form_validation -> run() == FALSE){
        	//ERROR
  			 $this->load->view('sitios');
        }else{
        	//OK
                $this->sitios_model->addSitio();
                $data=array('mensaje'=>'el sitio se registro correctamente');
                $this->load->view('admin',$data);
        }
    }

    //
}
