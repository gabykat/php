<?php

/**
 * 
 */
class Home extends CI_Controller {

public function index() {
$data = array(//'title' => 'UideARs', 'mensaje' => 'Bienvenido a mi Sitio Web con CODEIGNITER'// 
);

$this->load->view("home");


    }

}
