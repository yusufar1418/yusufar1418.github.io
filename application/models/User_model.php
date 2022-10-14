<?php
defined('BASEPATH') or exit('No direct script access allowed'); 

class User_model extends CI_Model
{

	public function userID()
	{
		$email = $this->session->userdata('email');
		return $this->db->query("SELECT * FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id` WHERE `user`.`email` = '$email'")->row_array();
	}

	public function editProfile()
	{
		$imagename = htmlspecialchars($this->input->post('imagename', true));
		$upload_image = $_FILES['image']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/profile/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$old_image = $imagename;
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/img/profile/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$data = [
					"username" => htmlspecialchars($this->input->post('name', true)),
					"image" => $new_image
				];

				$this->db->where('email', htmlspecialchars($this->input->post('email', true)));
				$this->db->update('user', $data);
			} else {
				echo $this->upload->display_errors();
			}
		} else {

			$data = [
				"username" => htmlspecialchars($this->input->post('name', true))
			];

			$this->db->where('email', htmlspecialchars($this->input->post('email', true)));
			$this->db->update('user', $data);
		}
	}

	public function changePassword()
	{
		$currentpassword = htmlspecialchars($this->input->post('password', true));
		$newpassword = htmlspecialchars($this->input->post('new_password1', true));
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		if (!password_verify($currentpassword, $user['password'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong current password!</div>');
			redirect('user/changepassword');
		} else{
			if ($currentpassword == $newpassword) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as current password!</div>');
			redirect('user/changepassword');
			} else {
				// password sudah ok
				$password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
				
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('user', ["password" => $password_hash]);
			}
		}
	}
}
