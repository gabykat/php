<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
//        header('Access-Control-Allow-Origin: *');
//        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $this->load->model('Usuario_model');
    }

    function palabra_get() {
        $palabras = $this->db->get('puntosuide');
        $palabras = $palabras->result_array();
        $this->response($palabras);
    }

    function coord_get() {
        $coor = $this->db->get('puntosuide');
        $coor = $coor->result_array();
        $this->response($coor);
    }

    function validar_post() {
        $data = array(
            'usuario' => $this->input->post('usuario'),
            'clave' => $this->input->post('clave')
        );
        $usuario = $this->Usuario_model->autentificar($data);
        if ($usuario != NULL) {
            $this->response($usuario->result_array());
        } else {
            $this->response(false);
        }
    }

    function sitiosAll_get() {
        $palabras = $this->db->get('sitio');
        $sitios = $palabras->result_array();
        if (isset($palabras)) {
            $this->response($palabras->result_array());
        } else {
            $this->response("No hay ningun valor");
        }
    }

}
