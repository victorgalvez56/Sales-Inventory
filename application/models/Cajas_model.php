<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cajas_model extends CI_Model {


	public function getCajas(){
		$this->db->select("*");
		$this->db->from("cajas");
		$this->db->where("estado_caja",'1');
		$this->db->order_by("fecha_cierre desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function getCajasbyDate($fechainicio,$fechafin){
		$this->db->select("*");
		$this->db->from("cajas");	
		$this->db->where('fecha_cierre >=', $fechainicio); 
		$this->db->where('fecha_cierre <=', $fechafin);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function years(){
		$this->db->select("YEAR(fecha_cierre) as year");
		$this->db->from("cajas");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function montos($year){
		$this->db->select("MONTH(fecha_cierre) as mes, SUM(total_caja) as monto");
		$this->db->from("cajas");
		$this->db->where("fecha_cierre>=",$year."-01-01 00:00:00");
		$this->db->where("fecha_cierre<=",$year."-12-31 00:00:00");
		$this->db->group_by("mes");
		$this->db->order_by("mes","asc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getCaja($id){
		$this->db->where("id_caja",$id);
		$resultado = $this->db->get("cajas");
		return $resultado->row();

	}
	public function getVentabyIDCaja($id){
		$this->db->select("v.id_vent,v.total_vent,v.fecha_vent,v.id_caja");
		$this->db->from("ventas v");
		$this->db->join("cajas c","v.id_caja = c.id_caja");	
		$this->db->where("v.id_caja",$id);
		$this->db->where("v.estado_vent",'1');
		$resultados = $this->db->get();
		return $resultados->result();
	}



	public function getAlquileresIDCaja(){
		$this->db->select("a.total,c.*");
		$this->db->from("codigos a");
		$this->db->join("cajas c","a.id_caja = c.id_caja");	
		$this->db->where("c.estado_caja","1");
		$this->db->order_by("fecha_cierre desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}



	public function getAbasbyIDCaja($id){
		$this->db->select("a.id_abas,a.total_abas,a.fecha_abas,a.id_caja");
		$this->db->from("abastecimientos a");
		$this->db->join("cajas c","a.id_caja = c.id_caja");	
		$this->db->where("a.id_caja",$id);
		$this->db->where("a.estado_abas",'1');

		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getCodbyIDCaja($id){
		$this->db->select("a.fecha_codigo,a.precio_codigo,a.codigo_codigo,a.responsable,a.id_caja");
		$this->db->from("codigos a");
		$this->db->join("cajas c","a.id_caja = c.id_caja");	
		$this->db->where("a.id_caja",$id);
		$this->db->where("estado_codigo",'VENDIDO');
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getDescbyIDCaja($id){
		$this->db->select("a.fecha_desc,a.monto_desc,a.motivo_desc");
		$this->db->from("descuentos a");
		$this->db->join("cajas c","a.id_caja = c.id_caja");	
		$this->db->where("a.id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getTotalbyIDCaja($id){
		$this->db->select_sum('v.total_vent');
		$this->db->from("ventas v");
		$this->db->join("cajas c","v.id_caja = c.id_caja");			
		$this->db->where("c.id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}	


	public function getSumaVentaCaja($id){
		$this->db->select_sum('total_vent');
		$this->db->from("ventas");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();	
	}	

	public function getSumaAbasCaja($id){
		$this->db->select_sum('total_abas');
		$this->db->from("abastecimientos");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();	
	}	

	public function getSumaCodCaja($id){
		$this->db->select_sum('precio_codigo');
		$this->db->from("codigos");
		$this->db->where("id_caja",$id);
		$this->db->where("estado_codigo",'VENDIDO');
		$resultados = $this->db->get();
		return $resultados->row();	
	}

	public function getSumaDescCaja($id){
		$this->db->select_sum('monto_desc');
		$this->db->from("descuentos");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();	
	}	
	public function getCuentas($id){
		$this->db->select('cuentas');
		$this->db->from("alquileres");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();	
	}
	public function getEquipos($id){
		$this->db->select('equipos');
		$this->db->from("alquileres");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();	
	}
	public function gettotalALq($id){
		$this->db->select('total');
		$this->db->from("alquileres");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();	
	}
	public function veriAlqui($id){
		$this->db->where("id_caja",$id);
		$resultado = $this->db->get("alquileres");
		return $resultado->row();

	}



	public function getIdUltimoAlquiler(){

		$resultado = $this->db->get("alquileres")->last_row();
		return $resultado;
	}	





	public function getIdUltimaCaja(){

		$resultado = $this->db->get("cajas")->last_row();
		return $resultado;
	}	
	
	public function getVentasCaja($id){
		$this->db->select("*");
		$this->db->from("ventas");
		$this->db->order_by("fecha_vent desc");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function lastID(){
		return $this->db->insert_id();
	}

	public function getIdVentasbyDate($id){
		$this->db->select("id_vent");
		$this->db->from("ventas");
		$this->db->where("fecha_vent >=",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getAbasCaja($id){
		$this->db->select("*");
		$this->db->from("abastecimientos");
		$this->db->order_by("fecha_abas desc");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getDesCaja($id){
		$this->db->select("*");
		$this->db->from("descuentos");
		$this->db->order_by("fecha_desc desc");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getCodCaja($id){
		$this->db->select("*");
		$this->db->from("codigos");
		$this->db->order_by("fecha_codigo desc");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function countVentCaja($id){
		$this->db->select("COUNT(id_vent) as cont");
		$this->db->from("ventas");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}
	public function countAbasCaja($id){
		$this->db->select("COUNT(id_abas) as cont");
		$this->db->from("abastecimientos");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function countDescCaja($id){
		$this->db->select("COUNT(id) as cont");
		$this->db->from("codigos");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function countCodCaja($id){
		$this->db->select("COUNT(id_desc) as cont");
		$this->db->from("descuentos");
		$this->db->where("id_caja",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("cajas",$data);
	}

	public function saveAlquiler($data){
		return $this->db->insert("alquileres",$data);
	}

	public function updateVentas($FechaAperturaCajaAbierta,$dataventa){
		$this->db->where("fecha_vent >=",$FechaAperturaCajaAbierta);
		return $this->db->update("ventas",$dataventa);
	}
	public function updateCaja($id,$data){
		$this->db->where("id_caja",$id);
		return $this->db->update("cajas",$data);
	}
	public function update($id,$data){
		$this->db->where("id_caja",$id);
		return $this->db->update("cajas",$data);
	}
	public function updateAlquiler($id,$data){
		$this->db->where("id_caja",$id);
		return $this->db->update("alquileres",$data);
	}

	public function getAlquiler($id){
		$this->db->where("id_alq",$id);
		$resultado = $this->db->get("alquileres");
		return $resultado->row();

	}

	public function getCajasAlquileres($idAlquiler){
		$this->db->select("c.id_caja");
		$this->db->from("cajas c");
		$this->db->join("alquileres a","c.id_caja = a.id_caja");	
		$this->db->where("a.id_caja",$idAlquiler);
		$resultados = $this->db->get();
		return $resultados->row();
	}

}