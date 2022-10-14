<?php
// supaya tidak bisa diakses filenya dengan user
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function _login()
	{
		$email = htmlspecialchars($this->input->post('email', true));
		$password = htmlspecialchars($this->input->post('password', true));

		$user = $this->db->query("SELECT * FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id` WHERE `user`.`email` = '$email'")->row_array();
		// var_dump($user);
		// die; untuk liat SEBARIS user yg ada di database

		//usernya ada
		if ($user) {
			// jika user aktif
			if ($user['is_active'] == 1) {
				//jika aktif langsung cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'iduser' => $user['iduser'],
						'role_id' => $user['role_id'],
						'role' => $user['role']
					];
					//jika benar simpan ke session
					$this->session->set_userdata($data);
					//cek session roleid
					if ($user['role_id'] == 2) {
						redirect('user');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account is not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$email = htmlspecialchars($this->input->post('email', true));
		$data = [
			"username" => htmlspecialchars($this->input->post('username', true)),
			"email" => $email,
			"image" => 'default.jpg',
			"password" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
			"telephone" => htmlspecialchars($this->input->post('telephone', true)),
			"id_provinsi" => htmlspecialchars($this->input->post('prov', true)),
			"id_kabupaten" => htmlspecialchars($this->input->post('kab', true)),
			"address" => htmlspecialchars($this->input->post('address', true)),
			"role_id" => '4',
			"is_active" => '1',
			"date_created" => time()
		];

		//siapkan token
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('user', $data);
		$this->db->insert('user_token', $user_token);
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if($user_token) {
				if(time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .'has been activated! Please login.</div>');
		redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired</div>');
		redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
		redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
		redirect('auth');	
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('iduser');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}
}
