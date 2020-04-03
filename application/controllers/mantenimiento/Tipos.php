<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Tipos_model");
		$this->load->model("Cajas_model");
	}

	
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'tipos' => $this->Tipos_model->getTipos(), 
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
		$this->load->view("admin/tipos/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){
		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$idCaja = $idUltimaCaja->id_caja;
		$idCajaAbierta = $idUltimaCaja->caja_abierta;
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
		$this->load->view("admin/tipos/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombre = $this->input->post("nombre_tipo");
		
		$this->form_validation -> set_rules("nombre_tipo","Nombre","required|is_unique[tipo_codigo.nombre_tipo]");

		if($this->form_validation->run()){

			$data  = array(
				'nombre_tipo' => $nombre, 
				'estado_tipo' => "1"
			);

			if ($this->Tipos_model->save($data)) {
				redirect(base_url()."mantenimiento/tipos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/tipos/add");
			}

		}else{
			$this->add();
		}

	}

	public function edit($id){
		$data  = array(
			'tipo' => $this->Tipos_model->getTipo($id), 
		);
		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$idCaja = $idUltimaCaja->id_caja;
		$idCajaAbierta = $idUltimaCaja->caja_abierta;
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
		$this->load->view("admin/tipos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){

		$idTipo = $this->input->post("idTipo");
		$nombre = $this->input->post("nombre_tipo");

		$tipoactual = $this->Tipos_model->getTipo($idTipo);

		if ($nombre == $tipoactual->nombre_tipo) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[tipo_codigo.nombre_tipo]";

		}


		$this->form_validation->set_rules("nombre_tipo","Nombre","required".$is_unique);
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre_tipo' => $nombre, 
			);

			if ($this->Tipos_model->update($idTipo,$data)) {
				redirect(base_url()."mantenimiento/tipos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/tipos/edit/".$idTipo);
			}
		}else{
			$this->edit($idTipo);
		}

	}

	public function view($id){ $data  = array( 'tipo' =>
	$this->Tipos_model->getTipo($id),  );
	$this->load->view("admin/tipos/view",$data); }

	public function delete($id){
		$data  = array(
			'estado_tipo' => "0", 
		);
		$this->Tipos_model->update($id,$data);
		echo "mantenimiento/tipos
		";
	}
}
