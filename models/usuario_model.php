<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getPalabras() {
        $query = $this->db->get('ci_cirujano');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
function autentificar($data) {
//        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $data['usuario']);
        $this->db->where('password', $data['clave']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return NULL;
        }
    }
    function getPalabrasLike($p) {
//        $this->db->select('*');
        $this->db->from('ci_cirujano');
        $this->db->like('palabra', $p);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function crearPalabra($data) {
        $this->db->insert('ci_cirujano', array('palabra' => $data['palabra'], 'concepto' => $data['concepto'], 'valor' => $data['valor']));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizarPalabra($id, $data) {
//        $this->db->from('ci_cirujano');
        $this->db->where('id', $id);
        return $this->db->update('ci_cirujano', $data);
    }

     public function add_user(){
        $this->db->insert('usuarios',array(
            'usuario'=>$this->input->post('nusuario',TRUE),
            'password'=>$this->input->post('npassword',TRUE),
            'id_tipo_usuario'=>$this->input->post('ntipo',TRUE),
            'estado'=>$this->input->post('nestado',TRUE),
            'nombre'=>$this->input->post('nnombre',TRUE),
            'apellido'=>$this->input->post('napellido',TRUE),
            'telefono'=>$this->input->post('ntelefono',TRUE),
            'correo'=>$this->input->post('ncorreo',TRUE)

             ));
    }
    
    public function getUsuarios() {
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
     public function very($variable,$campo){
        $consulta=$this->db->get_where('usuarios',array($campo =>$variable));
        if($consulta->num_rows()>1){
        //ya existte el usuario
            return true;
        }else{
            return false;
        }
    }

}
