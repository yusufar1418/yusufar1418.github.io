<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'MAdmin');
		check_login();
	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->MAdmin->userID();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->MAdmin->userID();
		$data['role'] = $this->MAdmin->getAllRoleMenu();

		$this->form_validation->set_rules('role', 'Role', 'required');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
		}else{
			$this->MAdmin->addNewRole();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added</div>');
				redirect('admin/role');
		}
	}

	public function roleEdit($id)
	{
		$data['title'] = 'Role Edit';
		$data['user'] = $this->MAdmin->userID();
		$data['role'] = $this->MAdmin->getRoleById($id);
		
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/roleEdit', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MAdmin->editRole();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> role edited</div>');
		redirect('admin/role');
		}
	}

	public function roleDelete($id)
	{
		$this->MAdmin->deleteRole($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Role deleted</div>');
				redirect('admin/role');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->MAdmin->userID();
		$data['role'] = $this->MAdmin->getRoleByID($role_id);
		$data['menu'] = $this->MAdmin->getRoleAccess();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		
		$data['user'] = $this->MAdmin->changeAccess();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}

	public function userlist()
	{
		$data['title'] = 'User List ';
		$data['user'] = $this->MAdmin->userID();
		$role_id = $data['user']['role_id'];
		$id_provinsi = $data['user']['id_provinsi'];
		$id_kabupaten = $data['user']['id_kabupaten'];
		$data['role_id'] = $role_id;
		$data['userlist'] = $this->MAdmin->getAllUser($role_id, $id_provinsi, $id_kabupaten);
		$data['role'] = $this->MAdmin->getAllRole($role_id);
		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
   		$data['provinsi'] = $get_prov->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('role', 'Role', 'required|trim', [
			'required' => 'Selected Your Role'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!',
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');

		$this->form_validation->set_rules('position', 'Position', 'required|trim');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Telephone', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/listuser', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MAdmin->addNewUser();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New user added</div>');
		redirect('admin/userlist');
		}
	}

	function add_ajax_kab($id_prov)
	{
    	$query = $this->db->get_where('wilayah_kabupaten',['provinsi_id'=>$id_prov]);
    	$data = "<option value=''>- Select Kabupaten -</option>";
    	foreach ($query->result_array() as $value) {
        	$data .= "<option value='".$value['id']."'>".$value['nama_kabupaten']."</option>";
    	}
    	echo $data;
	}

	public function userEdit($id)
	{
		$data['title'] = 'Form User Edit';
		$data['userbyid'] = $this->MAdmin->getUserById($id);
		$data['user'] = $this->MAdmin->UserID();
		$role_id = $data['user']['role_id'];
		$data['role'] = $this->MAdmin->getAllRole($role_id);
		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
   		$data['provinsi'] = $get_prov->result_array();
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('role', 'Role', 'required|trim', [
			'required' => 'Selected Your Role'
		]);

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edituser', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MAdmin->userEdit();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> user edited</div>');
		redirect('admin/userlist');
		}
	}

	public function userDetail($id)
	{
		$data['title'] = 'User Detail';
		$data['user'] = $this->MAdmin->userID();
		$data['userbyid'] = $this->MAdmin->getUserById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/detailuser', $data);
		$this->load->view('templates/footer');
	}

		public function userDelete($id)
	{
		$this->MAdmin->deleteUser($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> user deleted</div>');
				redirect('admin/userlist');
	}

		public function resetPassword($id)
	{
		$this->MAdmin->resetPassword($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> user reset password</div>');
				redirect('admin/userlist');
	}

	public function deleteButton()
	{
		$id = 1;
		$data['title'] = 'Role Edit';
		$data['user'] = $this->MAdmin->userID();
		$data['del'] = $this->MAdmin->getDelById($id);
		
		$this->form_validation->set_rules('del', 'Status Delete', 'required');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/delEdit', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MAdmin->delEdit();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> delete button edited</div>');
		redirect('admin/role');
		}
	}
	
}