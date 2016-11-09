<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coordenadas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCoordenadas() {
        $query = $this->db->get('coordenada');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function addCoordenadas(){
         $this->db->insert('coordenada',array(
                'posx' => $this->input->post('nposx',TRUE),
                'posy' => $this->input->post('nposy',TRUE),
                'posz' => $this->input->post('nposz',TRUE),
                'sitio_id' => $this->input->post('nsitio',TRUE),
             ));
    }

}
