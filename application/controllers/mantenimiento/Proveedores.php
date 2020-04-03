<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Proveedores_model");
		$this->load->model("Cajas_model");
	}

	
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'proveedores' => $this->Proveedores_model->getProveedores(), 
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
		$this->load->view("admin/proveedores/list",$data);
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
		$this->load->view("admin/proveedores/add");
		$this->load->view("layouts/footer");
	}

	public function store(){



		$nombre = $this->input->post("nombre_prov");
		$descripcion = $this->input->post("descripcion_prov");

		$data  = array(
			'nombre_prov' => $nombre, 
			'descripcion_prov' => $descripcion,
			'estado_prov' => "1"
		);

		if ($this->Proveedores_model->save($data)) {
			redirect(base_url()."mantenimiento/proveedores");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/proveedores/add");
		}
	}

	public function edit($id){
		$data  = array(
			'proveedor' => $this->Proveedores_model->getProveedor($id), 
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
		$this->load->view("admin/proveedores/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idProveedor = $this->input->post("idProveedor");
		$nombre = $this->input->post("nombre_prov");
		$descripcion = $this->input->post("descripcion_prov");

		$data = array(
			'nombre_prov' => $nombre, 
			'descripcion_prov' => $descripcion,
		);

		if ($this->Proveedores_model->update($idProveedor,$data)) {
			redirect(base_url()."mantenimiento/proveedores");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/proveedores/edit/".$idProveedor);
		}
	}

	public function view($id){
		$data  = array(
			'proveedor' => $this->Proveedores_model->getProveedor($id), 
		);
		$this->load->view("admin/proveedores/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado_prov' => "0", 
		);
		$this->Proveedores_model->update($id,$data);
		echo "mantenimiento/proveedores";
	}
}
