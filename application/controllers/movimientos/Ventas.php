<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
		$this->load->model("Cajas_model");

		$this->load->model("Productos_model");
	}


	
	public function index()
	{
		$data = array(
			'permisos' => $this->permisos,
			'ventas' => $this->Ventas_model->getVentas(),
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
		$this->load->view("admin/ventas/list",$data);
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


		$data = array(
			'productos' => $this->Productos_model->getProductos(),
			);	

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$dataaside);
		$this->load->view("admin/ventas/add",$data);
		$this->load->view("layouts/footer");
	}

	public function getproductos(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getproductos($valor);
		echo json_encode($clientes);
	}


	public function store(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-7 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$total =$this->input->post("total");
		$DatosUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$IdAperturaCajaAbierta = $DatosUltimaCaja->id_caja;
		$idCajaAbierta = $DatosUltimaCaja->caja_abierta;


		$idproductos =$this->input->post("idproductos");
		$precios =$this->input->post("precios");
		$cantidades =$this->input->post("cantidades");
		$importes =$this->input->post("importes");


		$data = array(

			'fecha_vent' => $nuevafecha,
			'total_vent' => $total,
			'estado_vent'   => '1',
			'id_caja'   => $IdAperturaCajaAbierta,
		);


		if($idCajaAbierta==1 && $total>0){
			if($this->Ventas_model->save($data)) {
			$idventa = $this->Ventas_model->lastID();


			$this->save_detalle($idproductos,$idventa,$precios,$cantidades,$importes);
			redirect(base_url()."movimientos/ventas");
			}else{
				redirect(base_url()."movimientos/ventas/add");
			}
		}else{
			redirect(base_url()."movimientos/ventas/");
		}


	}




	protected function save_detalle($productos,$idventa,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'id_prod' => $productos[$i], 
				'id_vent' => $idventa,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
			);

			$this->Ventas_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}

	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->Productos_model->getProducto($idproducto);

		if($productoActual->stock_prod >= $cantidad){
		$data = array(

			'stock_prod' => $productoActual->stock_prod - $cantidad, 
		);
		$this->Productos_model->update($idproducto,$data);


		}else{
			redirect(base_url()."movimientos/ventas/add");

		}

	}



	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa)
		);
		$this->load->view("admin/ventas/view",$data);
	}


	public function delete($id){
		$data  = array(
			'estado_vent' => "0", 
		);
		$this->Ventas_model->update($id,$data);
		echo "movimientos/ventas";
	}

}