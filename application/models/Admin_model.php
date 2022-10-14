<?php 

class Admin_model extends CI_Model 
{

	public function userID()
	{
		$email = $this->session->userdata('email');
		return $this->db->query("SELECT * FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id` WHERE `user`.`email` = '$email'")->row_array();
	}

	public function getAllUser($role_id, $id_provinsi, $id_kabupaten)
	{
		$this->db->join('wilayah_provinsi','wilayah_provinsi.id = user.id_provinsi');
		$this->db->join('wilayah_kabupaten','wilayah_kabupaten.id = user.id_kabupaten');
		$this->db->join('user_role','user_role.id = user.role_id');
		$this->db->order_by('user.date_created', 'DESC');
		if ($role_id == 1) {
		$this->db->where_not_in('role_id', '4');
			return	$this->db->get('user')->result_array();
		}elseif($role_id == 2){
			return	$this->db->get_where('user', ['role_id' => 3])->result_array();
		}elseif($role_id == 3){
			return	$this->db->get_where('user', ['role_id' => 4, 'id_provinsi' => $id_provinsi, 'id_kabupaten' => $id_kabupaten])->result_array();
		}
		 	
	}

	public function getUserById($id)
	{
		$this->db->join('wilayah_provinsi','wilayah_provinsi.id = user.id_provinsi');
		$this->db->join('wilayah_kabupaten','wilayah_kabupaten.id = user.id_kabupaten');
		$this->db->join('user_role','user_role.id = user.role_id');
		$this->db->order_by('user.date_created', 'DESC');
		return $this->db->get_where('user', ['iduser' => $id])->row_array();		
	}

	public function getAllRole($role_id)
	{
		if ($role_id == 1) {
		$this->db->where_not_in('id', '4');
		return	$this->db->get('user_role')->result_array();
		}elseif($role_id == 2){
		return	$this->db->get_where('user_role', ['id' => 3])->result_array();
		}
	}

	public function getAllRoleMenu()
	{
		return	$this->db->get('user_role')->result_array();	
	}

	public function getAllVessel()
	{
		$this->db->order_by('vessel', 'ASC');
		return	$this->db->get('vessel')->result_array();
	}

		public function getAllCertificatesC()
	{
		$this->db->order_by('cc_name', 'ASC');
		return	$this->db->get('certificates_competency')->result_array();
	}   

	public function getAllPosition()
	{
		return	$this->db->get('position')->result_array();
	}

	public function getRoleById($role_id)
	{
		 return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
	}

	public function getDelById($id)
	{
		 return $this->db->get_where('setting', ['idsetting' => $id])->row_array();
	}

	public function getRoleAccess()
	{
		$this->db->where('id !=', 1);
		return $this->db->get('user_menu')->result_array();
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId', true);
		$role_id = $this->input->post('roleId', true);

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		}else{
			$this->db->delete('user_access_menu', $data);
		}
		return $result;
	}

	public function addNewRole()
	{
		$this->db->insert('user_role', ["role" => htmlspecialchars($this->input->post('role', true))]);
	}

	public function deleteRole($id)
	{
		//this->db->where('id', $id);
		$this->db->delete('user_role', ['id' => $id]);
	}

	public function editRole()
	{
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('user_role', ["role" => htmlspecialchars($this->input->post('role', true))]);
	}

		public function addNewUser()
	{
		$role = htmlspecialchars($this->input->post('role', true));
		if ($role == 1) {
			$id_provinsi = 0;
			$id_kabupaten = 0;
		}elseif ($role == 2) {
			$id_provinsi = htmlspecialchars($this->input->post('prov', true));
			$id_kabupaten = 0;
			if (($id_provinsi == 0) OR empty($id_provinsi)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Please select provinsi</div>');
				redirect('admin/userlist');
			}
		}elseif ($role == 3) {
			$id_provinsi = htmlspecialchars($this->input->post('prov', true));
			$id_kabupaten = htmlspecialchars($this->input->post('kab', true));
			if (($id_provinsi == 0) OR empty($id_provinsi)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Please select provinsi</div>');
				redirect('admin/userlist');
			}
			if (($id_kabupaten == 0) OR empty($id_kabupaten)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Please select kabupaten</div>');
				redirect('admin/userlist');
			}
		}

		$data = [
			"username" => htmlspecialchars($this->input->post('name', true)),
			"email" => htmlspecialchars($this->input->post('email', true)),
			"password" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
			"role_id" => $role,
			"position" => htmlspecialchars($this->input->post('position', true)),
			"id_provinsi" => $id_provinsi,
			"id_kabupaten" => $id_kabupaten,
			"telephone" => htmlspecialchars($this->input->post('telephone', true)),
			"address" => htmlspecialchars($this->input->post('address', true)),
			"date_created" => time(),
			"image" => "default.jpg"	
		];
		$this->db->insert('user', $data);

	}

	public function userEdit()
	{
		$id = htmlspecialchars($this->input->post('id', true));
		$role = htmlspecialchars($this->input->post('role', true));
		if ($role == 1) {
			$id_provinsi = 0;
			$id_kabupaten = 0;
		}elseif ($role == 2) {
			$id_provinsi = htmlspecialchars($this->input->post('prov', true));
			$id_kabupaten = 0;
			if (($id_provinsi == 0) OR empty($id_provinsi)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Please select provinsi</div>');
				redirect('admin/userEdit/'.$id);
			}
		}elseif ($role == 3) {
			$id_provinsi = htmlspecialchars($this->input->post('prov', true));
			$id_kabupaten = htmlspecialchars($this->input->post('kab', true));
			if (($id_provinsi == 0) OR empty($id_provinsi)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Please select provinsi</div>');
				redirect('admin/userEdit/'.$id);
			}
			if (($id_kabupaten == 0) OR empty($id_kabupaten)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Please select kabupaten</div>');
				redirect('admin/userEdit/'.$id);
			}
		}
		$data = [
			"username" => htmlspecialchars($this->input->post('name', true)),
			"email" => htmlspecialchars($this->input->post('email', true)),
			"role_id" => $role,
			"position" => htmlspecialchars($this->input->post('position', true)),
			"id_provinsi" => $id_provinsi,
			"id_kabupaten" => $id_kabupaten,
			"telephone" => htmlspecialchars($this->input->post('telephone', true)),
			"address" => htmlspecialchars($this->input->post('address', true)),
			"date_created" => time(),
			"image" => "default.jpg"
		];

		$this->db->where('iduser', htmlspecialchars($this->input->post('id', true)));
		$this->db->update('user', $data);	
			
	}

	public function deleteUser($id)
	{
		$this->db->delete('user', ['iduser' => $id]);
	}

	public function delEdit()
	{
		$this->db->where('idsetting', $this->input->post('id', true));
		$this->db->update('setting', ["delete_button" => htmlspecialchars($this->input->post('del', true))]);
	}

	public function resetPassword($id)
	{
	
		$resetpassword = "123456";
		
				// password sudah ok
				$password_hash = password_hash($resetpassword, PASSWORD_DEFAULT);
				
			$this->db->where('iduser', $id);
			$this->db->update('user', ["password" => $password_hash]);
	}
	
}