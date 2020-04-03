<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public function getProductos(){
		$this->db->select("prod.*,c.nombre_cat as categoria,prov.nombre_prov as proveedor");
		$this->db->from("productos prod");
		$this->db->join("categorias c","prod.id_cat = c.id_cat");	
		$this->db->join("proveedores prov","prod.id_prov = prov.id_prov");		
		$this->db->where("prod.estado_prod","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getProducto($id){
		$this->db->where("id_prod",$id);
		$resultado = $this->db->get("productos");
		return $resultado->row();
	}


	public function save($data){
		return $this->db->insert("productos",$data);
	}

	public function update($id,$data){
		$this->db->where("id_prod",$id);
		return $this->db->update("productos",$data);
	}

}