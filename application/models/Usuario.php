<?php 

class Usuario extends CI_Model{

    function __construct(){
        parent::__construct();
    }/*
    function getUser(){
        $query = $this->db->get('usuario');
        return $query->result_array();
    }
    function getUserByNombre($nombre){
        $this->db->where('nombre',$nombre);
        $query = $this->db->get('usuario');
        return $query->row();
    } 
    function updateUserById($id,$nombre){
        $this->db->set('nombre', $nombre);
        $this->db->where('id', $id);
        $this->db->update('usuario');
    }   */


}
?>