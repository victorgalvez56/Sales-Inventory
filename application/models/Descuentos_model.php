<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descuentos_model extends CI_Model {

	public function getDescuentos(){
		$this->db->select("*");
		$this->db->from("descuentos");
		$this->db->order_by("fecha_desc desc");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

	public function save($data){
		return $this->db->insert("descuentos",$data);
	}	

	public function getDescuento($id){
		$this->db->where("id_desc",$id);
		$resultado = $this->db->get("descuentos");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_desc",$id);
		return $this->db->update("descuentos",$data);
	}	
}