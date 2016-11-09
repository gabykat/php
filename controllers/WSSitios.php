<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class WSSitios extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function sitios_get() {
        $sitios = $this->db->get('sitio');
        $sitios = $sitios->result_array();
        $this->response($sitios);
    }

    function sitiosId_get() {
        $id = $this->get('id');

        $this->db->from('sitio')->where('id', $id);
        $sitios = $this->db->get();
        $sitios = $sitios->result();
        $this->response($sitios);
    }

    function sitiosUpdate_get() {
        $id = $this->get('id');
        $nombre = $this->get('nombre');
        $descripcion = $this->get('descripcion');
        $sitios = $tipo = $this->get('tipo');
        echo $descripcion;
        $data = array(
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'tipo' => $tipo
        );
        $sitios = $this->db->where('id', $id);
        $sitios = $this->db->update('sitio', $data);
        $this->response($sitios);
    }
}