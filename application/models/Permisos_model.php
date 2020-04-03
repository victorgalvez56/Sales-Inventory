<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos_model extends CI_Model {
	public function getPermisos(){
		$this->db->select("p.*,m.nombre_men as menu, r.nombre_rol as rol");
		$this->db->from("permisos p");
		$this->db->join("roles r", "p.id_rol = r.id_rol");
		$this->db->join("menus m", "p.id_men = m.id_men");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getMenus(){
		$resultados = $this->db->get("menus");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("permisos",$data);
	}

	public function getPermiso($id){
		$this->db->where("id_per",$id);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("id_per",$id);
		return $this->db->update("permisos",$data);
	}

	public function delete($id){
		$this->db->where("id_per",$id);
		$this->db->delete("permisos");
	}
}