<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos_model extends CI_Model {

	public function getTipos(){
		$this->db->where("estado_tipo","1");
		$resultados = $this->db->get("tipo_codigo");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("tipo_codigo",$data);
	}
	public function getTipo($id){
		$this->db->where("id_tipo",$id);
		$resultado = $this->db->get("tipo_codigo");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_tipo",$id);
		return $this->db->update("tipo_codigo",$data);
	}
}
