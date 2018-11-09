<?php 

class Paciente extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    function modificarPaciente($id, $name, $lastName, $birthdate, $phone, $address, $email, $password) {
        $data = array();

        if($name!=null){
            $data += [ 'name' => $name ];
        }
        if($lastName!=null){
            $data += [ 'lastName' => $lastName ];
        }
        if($birthdate!=null){
            $data += [ 'birthdate' => $birthdate ];
        }
        if($phone!=null){
            $data += [ 'phone' => $phone ];
        }
        if($address!=null){
            $data += [ 'address' => $address ];
        }
        if($email!=null){
            $data += [ 'email' => $email ];
        }
        if($password!=null){
            $data += [ 'password' => $password ];
        }
        
        $this->db->where('id', $id);
        $query = $this->db->update('patients', $data);
        if($query!=null){
            return "DATOS MODIFICADOS CORRECTAMENTE";
        }
        return "USUARIO INVALIDO";
        
    }
}
?>