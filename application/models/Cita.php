<?php 

class Cita extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    function getCitas(){
        $sql = "select d.name as medico ,o.name as consultorio, m.date as fecha, m.hour as hora 
        from meetings m join doctors d on m.doctor_id=d.id
        join offices o on m.office_id=o.id where m.keyword_state=3"; 
        $query= $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }
    } 
    function getCitaById($id){
        $this->db->where('id',$id);
        $this->db->where('keyword_state',3);
        $query = $this->db->get('meetings');
        return $query->row();
    } 
    function cancelarCita($id){
        $this->db->set('keyword_state', 4);
        $this->db->where('id', $id);
        $this->db->update('meetings');
    }
    function getHistorial($patient_id){
        $sql = "select d.name as nombresMedico ,d.lastName as apellidosMedico ,o.name as consultorio, m.date as fecha, m.hour as hora 
        from meetings m join doctors d on m.doctor_id=d.id join offices o on m.office_id=o.id 
        where m.patient_id = ".$patient_id." and m.keyword_state=3"; 
        $query= $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }

    } 
}
?>