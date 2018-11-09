<?php 

class Consulta extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    function registrarConsultaById($patient_id, $pregunta){
        $data = array(
            'patient_id' => $patient_id,
            'consulta' => $pregunta
        );
        $this->db->insert('consultas', $data);
    } 

}
?>