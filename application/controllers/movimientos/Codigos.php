<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigos extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Codigos_model");		
		$this->load->model("Tipos_model");
		$this->load->model("Cajas_model");

	}

	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'codigos' => $this->Codigos_model->getCodigos(), 
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
		$this->load->view("admin/codigos/list",$data);
		$this->load->view("layouts/footer");

	}

	public function sell(){
		$data =array( 
			"codigos" => $this->Codigos_model->getCodigosD(),		
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
		$this->load->view("admin/codigos/sell",$data);
		$this->load->view("layouts/footer");
	}

	public function store2(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-7 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$idCodigo = $this->input->post("idcodigo");


		$DatosUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$IdAperturaCajaAbierta = $DatosUltimaCaja->id_caja;
		$usuarioregistrador=$this->session->userdata("nombre"); 

		$data = array(
			'estado_codigo' => "VENDIDO", 
			'responsable' => $usuarioregistrador, 
			'fecha_codigo' => $nuevafecha,
			'id_caja'   => $IdAperturaCajaAbierta,
		);
		
		if ($this->Codigos_model->update($idCodigo,$data)) {
			redirect(base_url()."movimientos/codigos/sell");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."movimientos/codigos/edit/".$idCodigo);
		}
	}




	public function add(){
		$data =array( 
			"tipos" => $this->Tipos_model->getTipos(),		
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
		$this->load->view("admin/codigos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){

		$codigo = $this->input->post("codigo_codigo");
		$precio = $this->input->post("precio_codigo");
		$tipo = $this->input->post("tipo");

		$this->form_validation->set_rules("codigo_codigo","Codigo","required|is_unique[codigos.codigo_codigo]");
		$this->form_validation->set_rules("precio_codigo","Precio","required|numeric");


		if ($this->form_validation->run()) {
			$data  = array(
				'codigo_codigo' => $codigo, 
				'precio_codigo' => $precio,
				'id_tipo' => $tipo,
				'estado_codigo' => "DISPONIBLE"
			);

			if ($this->Codigos_model->save($data)) {
				redirect(base_url()."movimientos/codigos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."movimientos/codigos/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	public function edit($id){
		$data =array( 
			"codigo" => $this->Codigos_model->getCodigo($id),

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
		$this->load->view("admin/codigos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idcodigo = $this->input->post("idcodigo");
		$codigo = $this->input->post("codigo_codigo");
		$precio = $this->input->post("precio_codigo");

		$data  = array(
			'codigo_codigo' => $codigo,
			'precio_codigo' => $precio,

		);
		if ($this->Codigos_model->update($idcodigo,$data)) {
			redirect(base_url()."movimientos/codigos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."movimientos/codigos/edit/".$idcodigo);
		}
	}
	public function view(){
		$idcodigo = $this->input->post("id");
		$data = array(
			"codigo" => $this->Codigos_model->getCodigo($idcodigo),
			
		);
		$this->load->view("admin/codigos/view",$data);

	}
}