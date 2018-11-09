<?php 

class User extends CI_Model{

    function __construct(){
        parent::__construct();
    }
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
    }   
    function verificarLogin($email,$password){
        $this->db->select('id');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('users');

        if($query->row()){
            return $query->row();
        }else{
            $data = array(
                'id' => "-1"
            );
            return $data;
        }
    }


}
?>