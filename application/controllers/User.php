<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'MUser');
		check_login();
	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->MUser->userID();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function editProfile()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->MUser->userID();
		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/editprofile', $data);
			$this->load->view('templates/footer');
		} else {
			$this->MUser->editProfile();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your Profile has been updated!</div>');
			redirect('user');
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->MUser->userID();

		$this->form_validation->set_rules('password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]',[
			'matches' => 'password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[6]|matches[new_password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$this->MUser->changePassword();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password change!</div>');
			redirect('user');
		}
	}
}
