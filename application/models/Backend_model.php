<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link_men",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("id_men",$menu);
		$this->db->where("id_rol",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function rowCountCodigos(){
		$this->db->select("COUNT(id) as countcod");
		$this->db->where("estado_codigo","DISPONIBLE");
		$resultados = $this->db->get("codigos");
		return $resultados->row();
	}
	public function rowCountProductos(){
		$this->db->select("COUNT(id_prod) as countprod");
		$this->db->where("estado_prod","1");
		$resultados = $this->db->get("productos");
		return $resultados->row();
	}
	public function rowCountUsuarios(){
		$this->db->select("COUNT(id_usu) as countusu");
		$this->db->where("estado_usu","1");
		$resultados = $this->db->get("usuarios");
		return $resultados->row();
	}
	public function rowCountCajas(){
		$this->db->select("COUNT(id_caja) as countcaja");
		$this->db->where("caja_abierta","0");
		$this->db->where("estado_caja","1");
		$resultados = $this->db->get("cajas");
		return $resultados->row();
	}
	public function getProductoAbastecer(){
		$this->db->select("*");
		$this->db->from("productos");
		$this->db->where("stock_prod<=","inventary_min");
		$resultados = $this->db->get();
		return $resultados->result();		
	}
	public function getCantProductoAbastecer(){
		$this->db->select("COUNT(id_prod) as cant");
		$this->db->from("productos");
		$this->db->where("stock_prod<=","inventary_min");
		$resultados = $this->db->get();
		return $resultados->row();		
	}		
	
}