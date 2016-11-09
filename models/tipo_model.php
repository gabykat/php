<?php

class Tipo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTipo($tu) {
      $tu=$this->db->get_where('tipo_usuario',array('estado'=>$tu));
      return $tu->result();

    }
}
