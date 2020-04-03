<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descuentos extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Descuentos_model");
		$this->load->model("Usuarios_model");
		$this->load->model("Cajas_model");

	}

	
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'descuentos' => $this->Descuentos_model->getDescuentos(), 
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
		$this->load->view("admin/descuentos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
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
		$this->load->view("admin/descuentos/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-6 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$motivo = $this->input->post("motivo_desc");
		$monto = $this->input->post("monto_desc");


		$DatosUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$IdAperturaCajaAbierta = $DatosUltimaCaja->id_caja;

		$this->form_validation->set_rules("motivo_desc","Motivo","required");
		$this->form_validation->set_rules("monto_desc","Monto","required|numeric");

		if ($this->form_validation->run()) {
			$data  = array(
				'motivo_desc' => $motivo, 
				'fecha_desc' =>$nuevafecha,
				'monto_desc' => $monto,
				'id_caja'   => $IdAperturaCajaAbierta,
				'estado_desc' => "1"
			);

			if ($this->Descuentos_model->save($data)) {
				redirect(base_url()."administrador/descuentos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."administrador/descuentos/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	

	public function edit($id){
		$data  = array(
			'descuento' => $this->Descuentos_model->getDescuento($id), 
		);

		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$idresponsable = $idUltimaCaja->responsable;		
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
	



	}

	public function update(){

		$iddescuento = $this->input->post("iddescuento");
		$motivo = $this->input->post("motivo_desc");
		$monto = $this->input->post("monto_desc");


		$this->form_validation->set_rules("monto_desc","Monto","required|numeric");		
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'motivo_desc' => $motivo, 
				'monto_desc' => $monto,
			);

			if ($this->Descuentos_model->update($iddescuento,$data)) {
				redirect(base_url()."administrador/descuentos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."administrador/descuentos/edit/".$idCategoria);
			}
		}else{
			$this->edit($iddescuento);
		}

	}

	public function view($id){
		$data  = array(
			'descuento' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado_desc' => "0", 
		);
		$this->Categorias_model->update($id,$data);
		echo "administrador/descuentos";
	}
}
