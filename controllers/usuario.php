<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this ->load -> model('usuario_model');
        $this ->load -> library('form_validation');
    }

    public function index() {
        $result= $this->db->get('usuarios');
        $data=array ('consulta'=> $result);
        $this->load->view('usuarios', $data);
         $this->load->view('footer');

    }
    
    function administracion(){
        $this->load->view('admin');
    }
    public function agregarUsuarios(){
        $this -> form_validation -> set_rules('nusuario','usuario','required|trim');
        $this -> form_validation -> set_rules('npassword','password','required|trim]');
        //$this -> form_validation -> set_rules('npassword2','password','required|trim|matches[password]');
        $this -> form_validation -> set_rules('ntipo','id_tipo_usuario','required|trim');
        $this -> form_validation -> set_rules('nestado','estado','required|trim');
        $this -> form_validation -> set_rules('nnombre','nombre','required|trim');
        $this -> form_validation -> set_rules('napellido','apellido','required|trim');
        $this -> form_validation -> set_rules('ntelefono','telefono','required|trim');
        $this -> form_validation -> set_rules('ncorreo','correo','required|trim|valid_email');

        /*if($this-> form_validation ->run() !=FAlSE){
            $this->usuario_model->add_user();
            $data=array('mensaje'=>'el usuario se registro correctamente');
            $this->load->view('usuarios',$data);
        }else{
            $this->load->view('admin');
        }*/

        if($this -> form_validation -> run() == FALSE){
            //ERROR
             $this->load->view('admin');
        }else{
            //OK
                $this->usuario_model->add_user();
                $data=array('mensaje'=>'el usuario se registro correctamente');
                $this->load->view('usuarios',$data);
        }
    }

    function very_user($user){
        $variable=$this->usuario_model->very($user,'usuario');
        if($variable==true){
            return false;
        }else{
            return true;
        }
    }
    function very_correo($correo){
        $variable=$this->usuario_model->very($correo,'correo');
        if($variable==true){
            return false;
        }else{
            return true;
        }
    }
}
