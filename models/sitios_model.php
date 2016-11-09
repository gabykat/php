<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sitios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getSitios() {
        $query = $this->db->get('sitio');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function addSitio(){
         $this->db->insert('sitio',array(
                'nombre' => $this->input->post('nnombre',TRUE),
                'descripcion' => $this->input->post('ndescripcion',TRUE),
                'categoria_id' => $this->input->post('ncategoria_id',TRUE),
                'horario' => $this->input->post('nhorario',TRUE)

             ));
    }

     public function num_sitios(){ //para la paginacion
        $number=$this->db->query('SELECT count(*) as number FROM sitios')->row()->number;
        return intval($number);
    }

    public function get_pagination ($number_per_page){
       return $this->db->get('sitios',$number_per_page, $this->uri->segment(3));
    }

}
