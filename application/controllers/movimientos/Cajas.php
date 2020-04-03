<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cajas extends CI_Controller {
	private $permisos;
	public function __construct(){

		
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Cajas_model");
		$this->load->model("Ventas_model");
		$this->load->model("Abastecimientos_model");	
		$this->load->model("Codigos_model");
		$this->load->model("Productos_model");
		$this->load->model("Descuentos_model");


	}

	
	public function index()
	{
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

		$data  = array(
			'permisos' => $this->permisos,

			'cajas' => $this->Cajas_model->getCajas(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$dataaside);
		$this->load->view("admin/cajas/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$idUltimaAlq = $this->Cajas_model->getIdUltimoAlquiler();
		$idCaja = $idUltimaCaja->id_caja;
		$idCajaAbierta = $idUltimaCaja->caja_abierta;
		$ConteoV = $this->Cajas_model->countVentCaja($idCaja);		
		$CV = 	$ConteoV->cont;
		$ConteoA = $this->Cajas_model->countAbasCaja($idCaja);
		$CA = 	$ConteoA->cont;
		$ConteoD = $this->Cajas_model->countDescCaja($idCaja);
		$CD = 	$ConteoD->cont;
		$ConteoC = $this->Cajas_model->countCodCaja($idCaja);
		$CC = 	$ConteoC->cont;
		$idcaja = $idUltimaCaja->id_caja;

		$idalquiler = $idUltimaAlq->id_caja;

		$validacion= $idcaja/$idalquiler;
		$TotalConteo = $ConteoV->cont+$ConteoA->cont+$ConteoD->cont+$ConteoC->cont;

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
			$data  = array(

				'caja' => $this->Cajas_model->getIdUltimaCaja(),
				'caja_abierta' => $this->$idCajaAbierta = $idUltimaCaja->caja_abierta,
				'conteoCajas' => $this->$TotalConteo = $ConteoV->cont+$ConteoA->cont+$ConteoD->cont+$ConteoC->cont,
				"validacion2" => $validacion,
				'ga' => '1',
			);

		}else{

			$data  = array(

				'caja' => $this->Cajas_model->getIdUltimaCaja(),
				'caja_abierta' => $this->$idCajaAbierta = $idUltimaCaja->caja_abierta,
				'conteoCajas' => $this->$TotalConteo = $ConteoV->cont+$ConteoA->cont+$ConteoD->cont+$ConteoC->cont,
				"validacion2" => $validacion,
				'ga' => '0',
			);
		}



		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$idCaja = $idUltimaCaja->id_caja;
		$idCajaAbierta = $idUltimaCaja->caja_abierta;

		 

	



	
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$dataaside);
		$this->load->view("admin/cajas/add",$data);
		$this->load->view("layouts/footer");





	}	

	public function storeAlquileres(){
			$cuentas = $this->input->post("cuentas");
			$equipos = $this->input->post("equipos");

			$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();

			$idUltimaAlq = $this->Cajas_model->getIdUltimoAlquiler();



			$idcaja = $idUltimaCaja->id_caja;

			$idalquiler = $idUltimaAlq->id_caja;

			$validacion= $idcaja/$idalquiler;


			$idCajaAbierta = $idUltimaCaja->caja_abierta;
			$usuarioregistrador=$this->session->userdata("nombre"); 



			$data = array(
				'cuentas' => $cuentas,
				'equipos' => $equipos,
				'total' => $equipos+$cuentas,
				'estado_alq' => '1',
				'id_caja' => $idcaja,
			);


			if($idcaja!=$idalquiler){

			$this->Cajas_model->saveAlquiler($data);
			redirect(base_url()."movimientos/cajas/add");


		}else{
			redirect(base_url()."movimientos/cajas/add");
				
		}

	}



	public function store(){
	
			$fecha = date("d-m-Y H:i:s");
			$nuevafecha = strtotime('-7 hour', strtotime($fecha)); // 6 hour en horario de verano
			$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);

			$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
			$idUltimaAlq = $this->Cajas_model->getIdUltimoAlquiler();
			$idalquiler = $idUltimaAlq->id_caja;
			$idcaja = $idUltimaCaja->id_caja;


			$cajaabierta = $idUltimaCaja->caja_abierta;
			$usuarioregistrador=$this->session->userdata("nombre"); 

			


			
			$data = array(
				'fecha_abertura' => $nuevafecha,
				'responsable' => $usuarioregistrador,
				'caja_abierta' => '1',
			);
			

			if($cajaabierta=="0" && $idcaja==$idalquiler){

				$this->Cajas_model->save($data);
					redirect(base_url()."movimientos/cajas/add");

					
				}else{

					redirect(base_url()."movimientos/cajas/add");
				}

	}

	public function view($id){


		$Cuentas = $this->Cajas_model->getCuentas($id);
		$Equipos = $this->Cajas_model->getEquipos($id);
		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();

		$idUltimaAlq = $this->Cajas_model->getIdUltimoAlquiler();



		$idcaja = $idUltimaCaja->id_caja;

		$idalquiler = $idUltimaAlq->id_caja;

		$validacion= $idcaja/$idalquiler;

		$SumaVentaCaja = $this->Cajas_model->getSumaVentaCaja($id);
		$SumaVentCaja = $SumaVentaCaja->total_vent;

		$SumaAbastCaja = $this->Cajas_model->getSumaAbasCaja($id);
		$SumaAbasCaja = $SumaAbastCaja->total_abas;

		$SumaCodiCaja = $this->Cajas_model->getSumaCodCaja($id);
		$SumaCodCaja = $SumaCodiCaja->precio_codigo;

		$SumaDescCaja = $this->Cajas_model->getSumaDescCaja($id);
		$SumaDesCaja = $SumaDescCaja->monto_desc;

$TotalCaja = ($Equipos->equipos+$Cuentas->cuentas+$SumaVentaCaja->total_vent-$SumaAbastCaja->total_abas+$SumaCodiCaja->precio_codigo-$SumaDescCaja->monto_desc);

		$data  = array(
			'cajas' => $this->Cajas_model->getCaja($id),
			'cuentas' => $this->Cajas_model->getCuentas($id),
			'equipos' =>$this->Cajas_model->getEquipos($id),
			'alquileres' => $validacion,

			'totalventa' => $this->Cajas_model->getSumaVentaCaja($id), 
			'totalabas' => $this->Cajas_model->getSumaAbasCaja($id), 
			'totalcodigo' => $this->Cajas_model->getSumaCodCaja($id), 
			'totaldescuento' => $this->Cajas_model->getSumaDescCaja($id), 			

			'sumatotalcaja' => $this->$TotalCaja = ($Equipos->equipos+$Cuentas->cuentas+$SumaVentaCaja->total_vent-$SumaAbastCaja->total_abas+$SumaCodiCaja->precio_codigo-$SumaDescCaja->monto_desc),

			'ventas' => $this->Cajas_model->getVentasCaja($id), 
			'abas' => $this->Cajas_model->getAbasCaja($id), 
			'codigos' => $this->Cajas_model->getCodCaja($id), 
			'descuentos' => $this->Cajas_model->getDesCaja($id), 		
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
		$this->load->view("admin/cajas/view",$data);
		$this->load->view("layouts/footer");

	}


	public function viewbox(){
		$valor = $this->input->post("id");


		$Cuentas = $this->Cajas_model->getCuentas($valor);
		$Equipos = $this->Cajas_model->getEquipos($valor);
		$idUltimaCaja = $this->Cajas_model->getIdUltimaCaja();

		$idUltimaAlq = $this->Cajas_model->getIdUltimoAlquiler();

		$veri =  $this->Cajas_model->veriAlqui($valor);

		if($veri==[]){
					$SumaVentaCaja = $this->Cajas_model->getSumaVentaCaja($valor);
		$SumaVentCaja = $SumaVentaCaja->total_vent;

		$SumaAbastCaja = $this->Cajas_model->getSumaAbasCaja($valor);
		$SumaAbasCaja = $SumaAbastCaja->total_abas;

		$SumaCodiCaja = $this->Cajas_model->getSumaCodCaja($valor);
		$SumaCodCaja = $SumaCodiCaja->precio_codigo;

		$SumaDescCaja = $this->Cajas_model->getSumaDescCaja($valor);
		$SumaDesCaja = $SumaDescCaja->monto_desc;
			$sumatotalb = $SumaVentaCaja->total_vent+$SumaCodiCaja->precio_codigo-$SumaAbastCaja->total_abas-$SumaDescCaja->monto_desc;
		}else{
					
		$SumaVentaCaja = $this->Cajas_model->getSumaVentaCaja($valor);
		$SumaVentCaja = $SumaVentaCaja->total_vent;

		$SumaAbastCaja = $this->Cajas_model->getSumaAbasCaja($valor);
		$SumaAbasCaja = $SumaAbastCaja->total_abas;

		$SumaCodiCaja = $this->Cajas_model->getSumaCodCaja($valor);
		$SumaCodCaja = $SumaCodiCaja->precio_codigo;

		$SumaDescCaja = $this->Cajas_model->getSumaDescCaja($valor);
		$SumaDesCaja = $SumaDescCaja->monto_desc;
			$SumaTotalA = $this->Cajas_model->gettotalALq($valor);
			$sumatotalb = $SumaTotalA->total+$SumaVentCaja+$SumaCodCaja-$SumaAbasCaja-$SumaDesCaja;
		}
		
		

		$idcaja = $idUltimaCaja->id_caja;

		$idalquiler = $idUltimaAlq->id_caja;

		$validacion= $idcaja/$idalquiler;

		$SumaVentaCaja = $this->Cajas_model->getSumaVentaCaja($valor);
		$SumaVentCaja = $SumaVentaCaja->total_vent;

		$SumaAbastCaja = $this->Cajas_model->getSumaAbasCaja($valor);
		$SumaAbasCaja = $SumaAbastCaja->total_abas;

		$SumaCodiCaja = $this->Cajas_model->getSumaCodCaja($valor);
		$SumaCodCaja = $SumaCodiCaja->precio_codigo;

		$SumaDescCaja = $this->Cajas_model->getSumaDescCaja($valor);
		$SumaDesCaja = $SumaDescCaja->monto_desc;



		

		$data = array(
			'veri' => $veri,
			'abas' => $this->Cajas_model->getAbasbyIDCaja($valor),			
			'ventas' => $this->Cajas_model->getVentabyIDCaja($valor),
			'codigos' => $this->Cajas_model->getCodbyIDCaja($valor),
			'descuentos' => $this->Cajas_model->getDescbyIDCaja($valor),
			'cuentas' => $this->Cajas_model->getCuentas($valor),
			'equipos' =>$this->Cajas_model->getEquipos($valor),
			'alquileres' => $validacion,



			'sumventa' => $this->Cajas_model->getSumaVentaCaja($valor),
			'sumabas' => $this->Cajas_model->getSumaAbasCaja($valor),
			'sumacod' => $this->Cajas_model->getSumaCodCaja($valor),			
			'sumadesc' => $this->Cajas_model->getSumaDescCaja($valor),

			'sumatotalcaja' => $sumatotalb,				
					
		);
		$this->load->view("admin/cajas/viewbox",$data);
			

	}
	public function closebox(){
		$DatosUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$IdAperturaCajaAbierta = $DatosUltimaCaja->id_caja;

		$SumaVentaCaja = $this->Cajas_model->getSumaVentaCaja($IdAperturaCajaAbierta);
		$SumaVentCaja = $SumaVentaCaja->total_vent;

		$SumaAbastCaja = $this->Cajas_model->getSumaAbasCaja($IdAperturaCajaAbierta);
		$SumaAbasCaja = $SumaAbastCaja->total_abas;

		$SumaCodiCaja = $this->Cajas_model->getSumaCodCaja($IdAperturaCajaAbierta);
		$SumaCodCaja = $SumaCodiCaja->precio_codigo;

		$SumaDescCaja = $this->Cajas_model->getSumaDescCaja($IdAperturaCajaAbierta);
		$SumaDesCaja = $SumaDescCaja->monto_desc;


			$SumaTotalA = $this->Cajas_model->gettotalALq($IdAperturaCajaAbierta);
			$sumatotalb = $SumaTotalA->total+$SumaVentCaja+$SumaCodCaja-$SumaAbasCaja-$SumaDesCaja;

		$FechaAperturaCajaAbierta = $DatosUltimaCaja->fecha_abertura;

		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-7 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);

		$cerrarcaja = array(
			'caja_abierta' =>'0',	
			'estado_caja' =>'1',	
			'total1_caja' =>$SumaTotalA->total,	
			'total2_caja' => $SumaVentCaja+$SumaCodCaja-$SumaAbasCaja,
			'total3_caja' => $SumaDescCaja->monto_desc,
			'total_caja' => $sumatotalb,	
			'fecha_cierre' => $nuevafecha,				
		);

		$dataventa = array(
			'id_caja' => $DatosUltimaCaja->id_caja,			
			
		);		



		$this->Cajas_model->updateVentas($FechaAperturaCajaAbierta,$dataventa);
		$this->Cajas_model->updateCaja($IdAperturaCajaAbierta,$cerrarcaja);

		
					redirect(base_url()."movimientos/cajas/add");

		
	}
	public function edit($id){
		$data  = array(
			'alquiler' => $this->Cajas_model->getAlquiler($id), 
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
		$this->load->view("admin/cajas/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){





		$idAlquiler = $this->input->post("idAlquiler");
		$cuentas = $this->input->post("cuentas");
		$equipos = $this->input->post("equipos");

		$alquileractual = $this->Cajas_model->getAlquiler($idAlquiler);

		$cajaAlquiler = $this->Cajas_model->getCajasAlquileres($idAlquiler);
		$gaa = $cajaAlquiler->id_caja;


		$SumaVentaCaja = $this->Cajas_model->getSumaVentaCaja($gaa);
		$SumaVentCaja = $SumaVentaCaja->total_vent;

		$SumaAbastCaja = $this->Cajas_model->getSumaAbasCaja($gaa);
		$SumaAbasCaja = $SumaAbastCaja->total_abas;

		$SumaCodiCaja = $this->Cajas_model->getSumaCodCaja($gaa);
		$SumaCodCaja = $SumaCodiCaja->precio_codigo;

		$SumaDescCaja = $this->Cajas_model->getSumaDescCaja($gaa);
		$SumaDesCaja = $SumaDescCaja->monto_desc;


			
			$sumatotalb =$equipos+$cuentas+$SumaTotalA->total+$SumaVentCaja+$SumaCodCaja-$SumaAbasCaja-$SumaDesCaja;




		$this->form_validation->set_rules("equipos","Equipos","required");
		$this->form_validation->set_rules("cuentas","Cuentas","required");


		if ($this->form_validation->run()==TRUE) {
			$data2 = array(
				'total_caja' => $sumatotalb, 
			);


			$data = array(
				'cuentas' => $cuentas, 
				'equipos' => $equipos,
				'total' => $cuentas+$equipos,
			);

			if ($this->Cajas_model->updateAlquiler($idAlquiler,$data) && $this->Cajas_model->update($gaa,$data2)) {
				redirect(base_url()."movimientos/cajas/");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."movimientos/cajas/edit/".$idAlquiler);
			}
		}else{
			$this->edit($idAlquiler);
		}

	}


	public function agregarAbast($id){

		$data  = array(
			'cajas' => $this->Cajas_model->getCaja($id), 
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
		$this->load->view("admin/cajas/abastecimiento",$data);
		$this->load->view("layouts/footer");
	}



	public function abastecimiento(){
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
		$cajamodificar =$this->input->post("idCaja");


		$data = array(
			'fecha_abas' => $nuevafecha,
			'total_abas' => $total,
			'estado_abas' => '1',
			'id_caja'   => $cajamodificar,
		);

		
		if($idCajaAbierta==1 && $total>0){
			if($this->Abastecimientos_model->save($data)) {
			$idventa = $this->Abastecimientos_model->lastID();


			$this->save_detalle($idproductos,$idventa,$precios,$cantidades,$importes);
			redirect(base_url()."movimientos/cajas");
			}else{
				redirect(base_url()."movimientos/cajas/add");
			}
		}else{
			redirect(base_url()."movimientos/cajas");
		}

	
	}




	protected function save_detalle($productos,$idabas,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'id_prod' => $productos[$i], 
				'id_abas' => $idabas,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
			);

			$this->Abastecimientos_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}

	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->Productos_model->getProducto($idproducto);

		
		$data = array(

			'stock_prod' => $productoActual->stock_prod + $cantidad, 
		);
		$this->Productos_model->update($idproducto,$data);


		}





	public function delete($id){
		$data  = array(
			'estado_caja' => "0", 
		);
		$this->Cajas_model->update($id,$data);
		echo "movimientos/cajas";
	}


	public function agregarDesc($id){

		$data  = array(
			'cajas' => $this->Cajas_model->getCaja($id), 
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
		$this->load->view("admin/cajas/descuento",$data);
		$this->load->view("layouts/footer");
	}



	public function descuento(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-6 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$motivo = $this->input->post("motivo_desc");
		$monto = $this->input->post("monto_desc");
		$cajamodificar =$this->input->post("idCaja");

		$DatosUltimaCaja = $this->Cajas_model->getIdUltimaCaja();
		$IdAperturaCajaAbierta = $DatosUltimaCaja->id_caja;

		$this->form_validation->set_rules("motivo_desc","Motivo","required");
		$this->form_validation->set_rules("monto_desc","Monto","required|numeric");

		$montoanterior = $this->Cajas_model->getCaja($cajamodificar);
		$montoant = $montoanterior->total3_caja;

		if ($this->form_validation->run()) {
			$data  = array(
				'motivo_desc' => $motivo, 
				'fecha_desc' =>$nuevafecha,
				'monto_desc' => $monto,
				'id_caja'   => $cajamodificar,
				'estado_desc' => "1"
			);
			$data2  = array(

				'total3_caja' => $monto+$montoant,
			);
			$this->Cajas_model->update($cajamodificar,$data2);

			if ($this->Descuentos_model->save($data)) {
				redirect(base_url()."movimientos/cajas");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."movimientos/cajas/add");
			}
		}
		else{
			$this->add();
		}

		
	}



}
