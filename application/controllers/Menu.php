<?php
// supaya tidak bisa diakses filenya dengan user
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model', 'MMenu');
		check_login();
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->MMenu->userID();
		$data['menu'] = $this->MMenu->getAllMenu();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');
		}else{
			$this->MMenu->addNewMenu();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
				redirect('menu');
		}
	}

	public function deleteMenu($id)
	{
		$this->MMenu->deleteMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu deleted</div>');
				redirect('menu');
	}

	public function editMenu($id)
	{
		$data['title'] = 'Edit Menu';
		$data['user'] = $this->MMenu->userID();
		$data['user_menu'] = $this->MMenu->getMenuById($id);

			$this->form_validation->set_rules('menu', 'Menu', 'required');
		

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/editmenu', $data);
				$this->load->view('templates/footer');
			} else {
				$this->MMenu->editMenu();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu edited</div>');
				redirect('menu');
			}
	}

	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->MMenu->userID();
		$data['submenu'] = $this->MMenu->getAllSubmenu();
		$data['menu'] = $this->MMenu->getAllMenu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/submenu', $data);
				$this->load->view('templates/footer');
			} else {
				$this->MMenu->addNewSubmenu();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu added</div>');
				redirect('menu/submenu');
			}
	}

	public function deleteSubmenu($id)
	{
		$this->MMenu->deleteSubmenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu deleted</div>');
				redirect('menu/submenu');
	}

	public function editSubmenu($id)
	{
		$data['title'] = 'Edit Submenu';
		$data['user'] = $this->MMenu->userID();
		$data['menu'] = $this->MMenu->getAllMenu();
		$data['user_sub_menu'] = $this->MMenu->getSubmenuById($id);

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('menu/editsubmenu', $data);
				$this->load->view('templates/footer');
			} else {
				$this->MMenu->editSubmenu();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu edited</div>');
				redirect('menu/submenu');
			}

	}
}