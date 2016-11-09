<?php

class Tipo_Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this ->load -> model('tipo_model');
    }
	public function getTipo()
	{
		$tu=$this->input->post('estado');
       	$resultado= $this->tipo_model->getTipo($tu);
       	echo json_encode($resultado);
	}
}
