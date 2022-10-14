<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model', 'MMain');
	}

	public function index()
	{
		$data['title'] = 'LSM';
		$data['user'] = $this->MMain->userID();
		$data['booklist'] = $this->MMain->getAllBook();
		$data['holybooklist'] = $this->MMain->getAllHolyBook();
		$data['newslist'] = $this->MMain->getAllNews();

		$this->load->view('templates/main_header', $data);
		$this->load->view('templates/main_topbar', $data);
		$this->load->view('main/index', $data);
		$this->load->view('templates/main_footer', $data);
	}

	public function detailBook($id)
	{
		$data['title'] = 'LSM';
		$data['user'] = $this->MMain->userID();
		$data['bookbyid'] = $this->MMain->getBookById($id);

		$this->load->view('templates/main_header', $data);
		$this->load->view('templates/main_topbar', $data);
		$this->load->view('main/detailBook', $data);
		$this->load->view('templates/main_footer', $data);
	}

	public function downloadBook($id)
	{
		$bookbyid = $this->MMain->getBookById($id);

		$document_name = $bookbyid['book_link'];
		$filename = 'assets/document/book/'.$document_name;
		force_download($filename, NULL);

	}

	public function detailHolyBook($id)
	{
		$data['title'] = 'LSM';
		$data['user'] = $this->MMain->userID();
		$data['holybookbyid'] = $this->MMain->getHolyBookById($id);

		$this->load->view('templates/main_header', $data);
		$this->load->view('templates/main_topbar', $data);
		$this->load->view('main/detailHolyBook', $data);
		$this->load->view('templates/main_footer', $data);
	}

}