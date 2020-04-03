<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Permisos_model");
		$this->load->model("Usuarios_model");
		$this->load->model("Cajas_model");
	}

	public function index(){
		$data  = array(
			'permisos' => $this->permisos,
			'permisos2' => $this->Permisos_model->getPermisos(), 
		);
		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$idresponsable = $idUltimaCaja->responsable;
		$idCaja = $idUltimaCaja->id_caja;
		$idCajaAbierta = $idUltimaCaja->caja_abierta;



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
		$this->load->view("admin/permisos/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data  = array(
			'roles' => $this->Usuarios_model->getRoles(), 
			'menus' => $this->Permisos_model->getMenus(), 
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
		$this->load->view("admin/permisos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$menu = $this->input->post("menu");
		$rol = $this->input->post("rol");
		$insert = $this->input->post("insert");
		$read = $this->input->post("read");
		$update = $this->input->post("update");
		$delete = $this->input->post("delete");

		$data = array(
			"id_men" => $menu,
			"id_rol" => $rol,
			"read" => $read,
			"insert" => $insert,
			"update" => $update,
			"delete" => $delete,
		);

		if ($this->Permisos_model->save($data)) {
			redirect(base_url()."administrador/permisos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."administrado/permisos/add");
		}
		
	}

	public function edit($id){
		$data  = array(
			'roles' => $this->Usuarios_model->getRoles(), 
			'menus' => $this->Permisos_model->getMenus(), 
			'permiso' => $this->Permisos_model->getPermiso($id)
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
		$this->load->view("admin/permisos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idpermiso = $this->input->post("idpermiso");
		$menu = $this->input->post("menu");
		$rol = $this->input->post("rol");
		$insert = $this->input->post("insert");
		$read = $this->input->post("read");
		$update = $this->input->post("update");
		$delete = $this->input->post("delete");

		$data = array(
			"read" => $read,
			"insert" => $insert,
			"update" => $update,
			"delete" => $delete,
		);

		if ($this->Permisos_model->update($idpermiso,$data)) {
			redirect(base_url()."administrador/permisos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."administrador/permisos/edit/".$idpermiso);
		}
	}

	public function delete($id){
		$this->Permisos_model->delete($id);
		redirect(base_url()."administrador/permisos");
	}
}