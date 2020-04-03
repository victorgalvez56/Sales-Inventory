<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cajas extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Ventas_model");
		$this->load->model("Cajas_model");

	}	

	public function index(){
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("buscar")) {
			$cajas = $this->Cajas_model->getCajasbyDate($fechainicio,$fechafin);
		}
		else{
			$cajas = $this->Cajas_model->getCajas();
		}
		$data = array(
			'permisos' => $this->permisos,
			"cajas" => $cajas,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin,
		);
		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$idCaja = $idUltimaCaja->id_caja;
		$idCajaAbierta = $idUltimaCaja->caja_abierta;
		$idresponsable = $idUltimaCaja->responsable;

		if($idresponsable==$this->session->userdata("nombre")){
			$dataaside = array(

				"validacion" => $this->$idCajaAbierta = $idUltimaCaja->caja_abierta,
				"validacionusuario" =>'1',

			);

		}else{

			$dataaside = array(

			"validacion" => $this->$idCajaAbierta = $idUltimaCaja->caja_abierta,
			"validacionusuario" =>'0',

			);
		}

	


		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$dataaside);
		$this->load->view("admin/reportes/cajas",$data);
		$this->load->view("layouts/footer");
	}
}