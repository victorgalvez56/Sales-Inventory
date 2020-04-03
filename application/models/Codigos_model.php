<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigos_model extends CI_Model {

	public function getCodigos(){
		$this->db->select("c.*,t.nombre_tipo as tipo");
		$this->db->from("codigos c");
		$this->db->join("tipo_codigo t","c.id_tipo = t.id_tipo");	
		$this->db->order_by("fecha_codigo desc");

		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getCodigosD(){
		$this->db->select("c.*,t.nombre_tipo as tipo");
		$this->db->from("codigos c");
		$this->db->join("tipo_codigo t","c.id_tipo = t.id_tipo");	
		$this->db->where("estado_codigo = 'DISPONIBLE'");	
		
		$resultados = $this->db->get();
		return $resultados->result();
	}	
	public function getCodigo($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("codigos");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("codigos",$data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("codigos",$data);
	}

}