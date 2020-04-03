<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
		$this->load->model("Proveedores_model");
		$this->load->model("Cajas_model");			
	}

	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'productos' => $this->Productos_model->getProductos(), 
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
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
		$data =array( 
			"categorias" => $this->Categorias_model->getCategorias(),
			"proveedores" => $this->Proveedores_model->getProveedores()		
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
		$this->load->view("admin/productos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){

		$nombre = $this->input->post("nombre_prod");
		$descripcion = $this->input->post("descripcion_prod");
		$precio_in = $this->input->post("precio_prod_in");
		$precio_out = $this->input->post("precio_prod_out");
		$categoria = $this->input->post("categoria");
		$proveedor = $this->input->post("proveedor");

		$this->form_validation->set_rules("nombre_prod","Nombre","required|is_unique[productos.nombre_prod]");
		$this->form_validation->set_rules("precio_prod_in","Precio Entrada","required|numeric");
		$this->form_validation->set_rules("precio_prod_out","Precio Salida","required|numeric");

		if ($this->form_validation->run()) {
			$data  = array(
				'nombre_prod' => $nombre, 
				'descripcion_prod' => $descripcion,
				'precio_prod_in' => $precio_in,
				'precio_prod_out' => $precio_out,
				'id_cat' => $categoria,
				'id_prov' => $proveedor,
				'estado_prod' => "1"
			);

			if ($this->Productos_model->save($data)) {
				redirect(base_url()."mantenimiento/productos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/productos/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	public function edit($id){
		$data =array( 
			"producto" => $this->Productos_model->getProducto($id),
			"categorias" => $this->Categorias_model->getCategorias(),
			"proveedores" => $this->Proveedores_model->getProveedores()

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
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idproducto = $this->input->post("idproducto");
		$nombre = $this->input->post("nombre_prod");
		$descripcion = $this->input->post("descripcion_prod");
		$precio_prod_in = $this->input->post("precio_prod_in");
		$precio_prod_out = $this->input->post("precio_prod_out");
		$stock = $this->input->post("stock_prod");
		$inventary_min = $this->input->post("inventary_min");		
		$categoria = $this->input->post("categoria");
		$proveedor = $this->input->post("proveedor");

		$data  = array(
			'nombre_prod' => $nombre,
			'descripcion_prod' => $descripcion,
			'precio_prod_in' => $precio_prod_in,
			'precio_prod_out' => $precio_prod_out,
			'stock_prod' => $stock,
			'inventary_min' => $inventary_min,			
			'id_cat' => $categoria,
			'id_prov' => $proveedor,
		);
		if ($this->Productos_model->update($idproducto,$data)) {
			redirect(base_url()."mantenimiento/productos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/productos/edit/".$idproducto);
		}
	}
	public function delete($id){
		$data  = array(
			'estado_prod' => "0", 
		);
		$this->Productos_model->update($id,$data);
		echo "mantenimiento/productos";
	}

}