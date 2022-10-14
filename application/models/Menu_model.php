<?php
// supaya tidak bisa diakses filenya dengan user
defined('BASEPATH') or exit('No direct script access allowed'); 

class Menu_model extends CI_Model 
{

	public function userID()
	{
		$email = $this->session->userdata('email');
		return $this->db->query("SELECT * FROM `user` WHERE `user`.`email` = '$email'")->row_array();
	}

	public function getAllMenu()
	{
		return $this->db->get('user_menu')->result_array();
	}

	public function getAllSubmenu()
	{
		$query= "SELECT `user_sub_menu`.*, `user_menu`.`menu` FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
		return $this->db->query($query)->result_array();
	}

	public function getMenuById($id)
	{
		return $this->db->get_where('user_menu', ['id' => $id])->row_array();
	}
	
	public function getSubmenuById($id)
	{
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}

	public function addNewMenu()
	{
		$this->db->insert('user_menu', ["menu" => htmlspecialchars($this->input->post('menu', true))]);
	}

	public function deleteMenu($id)
	{
		//this->db->where('id', $id);
		$this->db->delete('user_menu', ['id' => $id]);
	}

	public function editMenu()
	{
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('user_menu', ["menu" => htmlspecialchars($this->input->post('menu', true))]);
	}

	public function addNewSubmenu()
	{
		$data = [
			"title" => htmlspecialchars($this->input->post('title', true)),
			"menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
			"url" => htmlspecialchars($this->input->post('url', true)),
			"icon" => htmlspecialchars($this->input->post('icon', true)),
			"is_active" => htmlspecialchars($this->input->post('is_active', true))
		];

		$this->db->insert('user_sub_menu', $data);
	}

	public function deleteSubmenu($id)
	{
		//this->db->where('id', $id);
		$this->db->delete('user_sub_menu', ['id' => $id]);
	}

	public function editSubmenu()
	{
		$data = [
			"title" => htmlspecialchars($this->input->post('title', true)),
			"menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
			"url" => htmlspecialchars($this->input->post('url', true)),
			"icon" => htmlspecialchars($this->input->post('icon', true)),
			"is_active" => htmlspecialchars($this->input->post('is_active', true))
		];

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('user_sub_menu', $data);
	}

}