<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
		$this->load->model("Cajas_model");
		$this->load->model("Backend_model");
		$this->load->model("Productos_model");
	}


	public function index()
	{
		
		$data = array(

			"cantCodigos" => $this->Backend_model->rowCountCodigos(),
			"cantProductos" => $this->Backend_model->rowCountProductos(),
			"cantUsuarios" => $this->Backend_model->rowCountUsuarios(),
			"cantCajas" => $this->Backend_model->rowCountCajas(),
			"cantprodAbast" => $this->Backend_model->getCantProductoAbastecer(),
			"productos" => $this->Backend_model->getProductoAbastecer(),
			'years' => $this->Cajas_model->years(),


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
		$this->load->view("admin/dashboard",$data);
		$this->load->view("layouts/footer");

	}

	public function getData(){
		$year = $this->input->post("year");
		$resultados = $this->Cajas_model->montos($year);
		echo json_encode($resultados);
	}

}
