<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	//CITAS VIGENTES CON TODOS SUS ATRIBUTOS
	public function getcitas(){ //HECHO---------------------------------------
		//http://localhost/webservices/index.php/Welcome/getcitas
		$this->load->model('cita');
		$data = $this->cita->getCitas();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	//ENVIAR TODO EL HISTORIAL DE UN PACIENTE
	public function gethistorialbyid(){ //HECHO---------------------------------------
		//http://localhost/webservices/index.php/Welcome/getHistorialbyid?patient_id=1
		$patient_id = $this->input->get('patient_id');

		$this->load->model('cita');
		$data = $this->cita->getHistorial($patient_id);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function getdoctores(){ //HECHO---------------------------------------
		//http://localhost/webservices/index.php/Welcome/getdoctores
		$this->load->model('doctor');
		$data = $this->doctor->getDoctores();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	//VERIFICAR LOGIN
	public function verificarlogin(){ //HECHO ------------------------------------------------
		//http://localhost/webservices/index.php/Welcome/verificarlogin?email=anthony@hotmail.com&password=6846464162
		$email = $this->input->get('email');
		$password = $this->input->get('password');

		$this->load->model('user');
		$data =$this->user->verificarLogin($email, $password);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	//MEDICOS QUE ATIENDEN AL PACIENTE
	public function getdoctorbypatientid(){
		//http://localhost/webservices/index.php/Welcome/getdoctorbypatientid?patient_id=1
		$mypatient_id = $this->input->get('patient_id'); 

		$this->load->model('doctor');
		$data = $this->doctor->getDoctorByPatientId($mypatient_id);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	//REGISTRAR CONSULTAS DE LOS PACIENTES -- FALTA TABLA ASI QUE ESTA EN POSIBLEMENTE FUNCIONE
	public function registrarconsultabyid(){
		//http://localhost/webservices/index.php/Welcome/registrarconsultabyid?patient_id=5&consulta=hola
		$mypatient_id = $this->input->get('patient_id'); 
		$pregunta = $this->input->get('pregunta');

		$this->load->model('consulta');
		$this->consulta->registrarConsultaById($mypatient_id, $pregunta);
		header('Content-Type: application/json');
		echo json_encode("En breve responderemos su consulta.");
	}
	//CAMBIAR ESTADO DE CITA A CANCELADO Y ENVIAR MENSAJE DE CONFIRMACION
	public function cancelarcita(){
		//http://localhost/webservices/index.php/Welcome/cancelarcita?id=2
		$myid = $this->input->get('id');

		$this->load->model('cita');
		$this->cita->cancelarCita($myid);
		header('Content-Type: application/json');
		echo json_encode("Su cita ha sido cancelada");
	}
	//MODIFICAR DATOS SOLO LOS CAMPOS QUE SE ENVIEN Y ENVIAR MENSAJE DE CONFIRMACION
	public function modificarpaciente(){
		//http://localhost/webservices/index.php/Welcome/modificarpaciente?id=4&name=paolo
		$id = $this->input->get('id');
		$name = $this->input->get('name');
		$lastName = $this->input->get('lastName');
		$birthdate = $this->input->get('birthdate');
		$phone = $this->input->get('phone');
		$address = $this->input->get('address');
		$email = $this->input->get('email');
		$password = $this->input->get('password');

		$this->load->model('paciente');
		$data =$this->paciente->modificarPaciente($id, $name, $lastName, $birthdate, $phone, $address, $email, $password);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
	
	

	/*
	public function getuser(){
		$this->load->model('usuario');
		$data = $this->usuario->getUser();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function getcitasbyid(){
		$myid = $this->input->get('id'); 
		
		$this->load->model('cita');
		$data = $this->cita->getCitasById($myid);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function getuserbynombre(){

		$mynombre = $this->input->get('nombre'); 
		
		$this->load->model('usuario');
		$data = $this->usuario->getUserByNombre($mynombre);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function getcitas(){
		$this->load->model('cita');
		$data = $this->cita->getCitas();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
	public function updateuserbyid(){
		$myid = $this->input->get('id');
		$mynombre = $this->input->get('nombre');
		
		$this->load->model('usuario');
		$data = $this->usuario->updateUserById($myid, $mynombre);
		
		echo "Datos modificados";
	}*/


	
}
