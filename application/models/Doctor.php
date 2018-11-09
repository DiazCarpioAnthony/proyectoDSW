<?php 

class Doctor extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getDoctores(){
        $sql = "select d.name as nombres ,d.lastName as apellidos ,s.name as especialidad,d.email, d.url as imagen
        from doctors d join specialties s on d.id = s.id"; 
        $query= $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    function getDoctorByPatientId($patient_id){
        $sql = "select * from doctors where id in ( select doctor_id from meetings where patient_id = ".$patient_id." )"; 
        $query= $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }
    }

}
?>