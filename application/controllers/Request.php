<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('request_model', 'MRequest');
		check_login();
	}

	public function index()
	{
		$data['title'] = 'List Ormas';
		$data['user'] = $this->MRequest->userID();
		$iduser = $data['user']['iduser'];
		$role_id = $data['user']['role_id'];
		$id_provinsi = $data['user']['id_provinsi'];
		$id_kabupaten = $data['user']['id_kabupaten'];
		$data['ormaslist'] = $this->MRequest->getAllOrmas($iduser,$role_id,$id_provinsi,$id_kabupaten);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('request/index', $data);
		$this->load->view('templates/footer');
	}

	public function addOrmas()
	{
		$data['title'] = 'Tambah Ormas';
		$data['user'] = $this->MRequest->userID();
		$this->form_validation->set_rules('ormas_name', 'Nama Ormas', 'required|trim');
		$this->form_validation->set_rules('ormas_address', 'Alamat Ormas', 'required|trim');
		$this->form_validation->set_rules('ormas_contact', 'Kontak', 'required|trim');
		$this->form_validation->set_rules('ormas_latitude', 'Latitude', 'required|trim');
		$this->form_validation->set_rules('ormas_longitude', 'Longitude', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('request/addOrmas', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MRequest->addNewOrmas();
		}
	}

	public function ormasDetail($id)
	{
		$data['title'] = 'Ormas Detail';
		$data['ormasbyid'] = $this->MRequest->getOrmasById($id);
		$data['user'] = $this->MRequest->userID();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('request/ormasDetail', $data);
		$this->load->view('templates/footer');
	}

	public function ormasDocument($id,$type_file)
	{
		$data['title'] = 'Upload Dokumen';
		$data['user'] = $this->MRequest->userID();

		$data['type_file'] = $type_file;
		
		$this->form_validation->set_rules('type_file', 'type_file', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('request/uploadDocumentOrmas', $data);
		$this->load->view('templates/footer');
		}else{
		$this->MRequest->addOrmasDocument($id,$type_file);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> document uploded</div>');
		redirect('request/ormasDetail/'.$id);
		}		
	}

		public function editOrmasDocument($id,$type_file)
	{
		$data['title'] = 'Edit Upload Dokumen';
		$data['user'] = $this->MRequest->userID();
		$data['ormasbyid'] = $this->MRequest->getOrmasById($id);
		$data['type_file'] = $type_file;

		
		$this->form_validation->set_rules('type_file', 'type_file', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('request/editDocumentOrmas', $data);
		$this->load->view('templates/footer');
		}else{
		$this->MRequest->editOrmasDocument($id,$type_file);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> document uploded</div>');
		redirect('request/ormasDetail/'.$id);
		}		
	}

	public function ormasDocumentDownload($id,$type_file)
	{
		$ormasbyid = $this->MRequest->getOrmasById($id);
		
		if ($type_file == 1) {
			$document_name = $ormasbyid['ormas_document1'];
			$filename = 'assets/document/ormas/1/'.$document_name;
		}elseif ($type_file == 2) {
			$document_name = $ormasbyid['ormas_document2'];
			$filename = 'assets/document/ormas/2/'.$document_name;
		}elseif ($type_file == 3) {
			$document_name = $ormasbyid['ormas_document3'];
			$filename = 'assets/document/ormas/3/'.$document_name;
		}elseif ($type_file == 4) {
			$document_name = $ormasbyid['ormas_document4'];
			$filename = 'assets/document/ormas/4/'.$document_name;
		}
		force_download($filename, NULL);

	}

	public function ormasFormulirDownload($type_file)
	{
		
		//buat setting untuk ambil data formulir
		if ($type_file == 3) {
			$filename = 'assets/document/ormas/formulir/formulir3.pdf';
		}elseif ($type_file == 4) {
			$filename = 'assets/document/ormas/formulir/formulir4.pdf';
		}
		force_download($filename, NULL);

	}

	
	
}