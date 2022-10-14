<?php
// supaya tidak bisa diakses filenya dengan user
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
	public function userID()
	{
		$email = $this->session->userdata('email');
		return $this->db->query("SELECT * FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id` WHERE `user`.`email` = '$email'")->row_array();
	}

	// --start book--
	public function getAllBook()
	{
		return $this->db->get('book')->result_array();	
	}

	public function getBookById($id)
	{
		return $this->db->get_where('book', ['idbook' => $id])->row_array();		
	}
	// --stop book--
	// --start holybook--
	public function getAllHolyBook()
	{
		return $this->db->get('holy_book')->result_array();	
	}

	public function getHolyBookById($id)
	{
		return $this->db->get_where('holy_book', ['idholy_book' => $id])->row_array();		
	}
	// --stop holybook--
	// --start News--
	public function getAllNews()
	{
		return $this->db->get('news')->result_array();	
	}

	public function getNewsById($id)
	{
		return $this->db->get_where('news', ['idnews' => $id])->row_array();		
	}
	// --stop News--
}