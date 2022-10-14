<?php 

class Request_model extends CI_Model 
{

	public function userID()
	{
		$email = $this->session->userdata('email');
		$this->db->join('wilayah_provinsi','wilayah_provinsi.id = user.id_provinsi');
		$this->db->join('wilayah_kabupaten','wilayah_kabupaten.id = user.id_kabupaten');
		$this->db->join('user_role','user_role.id = user.role_id');
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}

	public function getAllOrmas($iduser,$role_id,$id_provinsi,$id_kabupaten)
	{
		$this->db->join('wilayah_provinsi','wilayah_provinsi.id = registrasi_ormas.id_provinsi');
		$this->db->join('wilayah_kabupaten','wilayah_kabupaten.id = registrasi_ormas.id_kabupaten');
		$this->db->join('user','user.iduser = registrasi_ormas.id_user');
		$this->db->join('ormas','ormas.idormas = registrasi_ormas.id_ormas');
		$this->db->order_by('registrasi_ormas.date_created_ormas', 'DESC');
		if ($role_id == 4) {
			return	$this->db->get_where('registrasi_ormas', ['id_user' => $iduser])->result_array();
		}elseif($role_id == 3){
			return	$this->db->get_where('registrasi_ormas', ['id_provinsi' => $id_provinsi,'id_kabupaten' => $id_kabupaten, 'status_registrasi_ormas >=' => 1])->result_array();
		}elseif($role_id == 3){
			return	$this->db->get_where('registrasi_ormas', ['id_provinsi' => $id_provinsi, 'status_registrasi_ormas >=' => 2])->result_array();
		}elseif($role_id == 4){
			return	$this->db->get_where('registrasi_ormas', ['status_registrasi_ormas >=' => 3])->result_array();
		}
		 	
	}

	public function getOrmasById($id)
	{
		$this->db->join('registrasi_ormas','ormas.idormas = registrasi_ormas.id_ormas');
		$this->db->join('wilayah_provinsi','wilayah_provinsi.id = registrasi_ormas.id_provinsi');
		$this->db->join('wilayah_kabupaten','wilayah_kabupaten.id = registrasi_ormas.id_kabupaten');
		$this->db->join('user','user.iduser = registrasi_ormas.id_user');
		return $this->db->get_where('ormas', ['idormas' => $id])->row_array();
		
		 	
	}

	public function addNewOrmas()
	{
		
		$data = [
			"ormas_name" => htmlspecialchars($this->input->post('ormas_name', true)),
			"ormas_contact" => htmlspecialchars($this->input->post('ormas_contact', true)),
			"ormas_address" => htmlspecialchars($this->input->post('ormas_address', true)),
			"ormas_latitude" => htmlspecialchars($this->input->post('ormas_latitude', true)),
			"ormas_longitude" => htmlspecialchars($this->input->post('ormas_longitude', true))
		];
		$this->db->insert('ormas', $data);
		$idormas = $this->db->insert_id();

		$data2 = [
			"id_ormas" => $idormas,
			"id_user" => htmlspecialchars($this->input->post('iduser',true)),
			"id_provinsi" => htmlspecialchars($this->input->post('id_provinsi',true)),
			"id_kabupaten" => htmlspecialchars($this->input->post('id_kabupaten',true)),
			"status_ormas" => 0,
			"date_created_ormas" => time()
		];

		$this->db->insert('registrasi_ormas', $data2);
		$idregistrasi_ormas = $this->db->insert_id();

		$data3 = [
			"id_registrasi_ormas" => $idregistrasi_ormas
		];

		$this->db->insert('confrim_ormas', $data3);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New ormas added</div>');
		redirect('request/ormasDetail/'.$idormas);

	}

	function config_upload($type_file)
	{
		// Document 1
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '3072';
		if ($type_file == 1) {
			$config['upload_path'] = './assets/document/ormas/1/';
		}elseif($type_file == 2){
			$config['upload_path'] = './assets/document/ormas/2/';
		}elseif($type_file == 3) {
			$config['upload_path'] = './assets/document/ormas/3/';
		}elseif($type_file == 4){
			$config['upload_path'] = './assets/document/ormas/4/';
		}
			$this->load->library('upload', $config);
			return $this->upload->initialize($config);
	}

	public function addOrmasDocument($id,$type_file)
	{
		$upload_file = $_FILES['document_file']['name'];

		$this->config_upload($type_file);

		if ($this->upload->do_upload('document_file')) {
			$new_file = $this->upload->data('file_name');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
				redirect('request/ormasDocument/' .$id. '/' .$type_file);
		}
		
		$this->db->where('idormas', $id);
		if ($type_file == 1) {
			$this->db->update('ormas', ["ormas_document1" => $new_file]);
		}elseif ($type_file == 2) {
			$this->db->update('ormas', ["ormas_document2" => $new_file]);
		}elseif ($type_file == 3) {
			$this->db->update('ormas', ["ormas_document3" => $new_file]);
		}elseif ($type_file == 4) {
			$this->db->update('ormas', ["ormas_document4" => $new_file]);
		}
		
	}

		public function editOrmasDocument($id,$type_file)
	{
		$idbook = htmlspecialchars($this->input->post('id', true));
		
		$document_link = htmlspecialchars($this->input->post('document_link', true));

		$upload_file = $_FILES['document_file']['name'];
		
		if ($upload_file) {
			$this->config_upload($type_file);
			if ($this->upload->do_upload('document_file')) {
			$old_file = $document_link;
				if ($type_file == 1) {
					unlink(FCPATH . 'assets/document/ormas/1/' . $old_file);
				}elseif ($type_file == 2) {
					unlink(FCPATH . 'assets/document/ormas/2/' . $old_file);
				}elseif ($type_file == 3) {
					unlink(FCPATH . 'assets/document/ormas/3/' . $old_file);
				}elseif ($type_file == 4) {
					unlink(FCPATH . 'assets/document/ormas/4/' . $old_file);
				}
				
			$new_file = $this->upload->data('file_name');
			}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
			redirect('request/editOrmasDocument/' .$id. '/' .$type_file);
			}
		}else{
			$new_file = $document_link;
		}
		
		$this->db->where('idormas', $id);
		if ($type_file == 1) {
			$this->db->update('ormas', ["ormas_document1" => $new_file]);
		}elseif ($type_file == 2) {
			$this->db->update('ormas', ["ormas_document2" => $new_file]);
		}elseif ($type_file == 3) {
			$this->db->update('ormas', ["ormas_document3" => $new_file]);
		}elseif ($type_file == 4) {
			$this->db->update('ormas', ["ormas_document4" => $new_file]);
		}
		
	}

	

	
}