<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abastecimientos_model extends CI_Model {

	public function getAbastecimientos(){
		$this->db->select("*");
		$this->db->from("abastecimientos");
		$this->db->where("estado_abas",'1');
		$this->db->order_by("fecha_abas desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function getAbasbyIDCaja($id){
		$this->db->select("*");
		$this->db->from("abastecimientos");
		$this->db->where("id_caja",$id);
		$resultado = $this->db->get();
		return $resultado->result();
	}
	public function getAbastecimiento($id){
		$this->db->select("*");
		$this->db->from("abastecimientos");
		$this->db->where("id_abas",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function getDetalle($id){
		$this->db->select("dt.*,p.id_prod,p.nombre_prod");
		$this->db->from("detalle_abastecimiento dt");
		$this->db->join("productos p","dt.id_prod = p.id_prod");
		$this->db->where("dt.id_abas",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getAbasbyDate($fechainicio,$fechafin){
		$this->db->select("*");
		$this->db->from("abastecimientos");	
		$this->db->where('fecha_abas >=', $fechainicio); 
		$this->db->where('fecha_abas <=', $fechafin);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function montos($year){
		$this->db->select("MONTH(fecha) as mes, SUM(total) as monto");
		$this->db->from("ventas");
		$this->db->where("fecha_vent >=",$year."-01-01");
		$this->db->where("fecha_vent <=",$year."-12-31");
		$this->db->group_by("mes");
		$this->db->order_by("mes");
		$resultados = $this->db->get();
		return $resultados->result();
	}	



	public function getproductos($valor){
		$this->db->select("id_prod,nombre_prod as label,precio_prod_in,stock_prod");
		$this->db->from("productos");
		$this->db->like("nombre_prod",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function save($data){
		return $this->db->insert("abastecimientos",$data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function save_detalle($data){
		$this->db->insert("detalle_abastecimiento",$data);
	}

	public function update($id,$data){
		$this->db->where("id_abas",$id);
		return $this->db->update("abastecimientos",$data);
	}



}