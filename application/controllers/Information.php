<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Information extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('information_model', 'MInformation');
		check_login();
	}

	public function index()
	{
		$data['title'] = 'Book';
		$data['user'] = $this->MInformation->userID();
		$data['booklist'] = $this->MInformation->getAllBook();

		$this->form_validation->set_rules('book_title', 'Title', 'required|trim');
		$this->form_validation->set_rules('book_description', 'Description', 'required|trim');
		if (empty($_FILES['book_file']['name']))
		{
    		$this->form_validation->set_rules('book_file', 'Book File', 'required');
		}
		
		if (empty($_FILES['image']['name']))
		{
		$this->form_validation->set_rules('image', 'Image', 'required');
		}


		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('information/listbook', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MInformation->addNewBook();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New book added</div>');
		redirect('information/index');
		}
	}

	public function bookEdit($id)
	{
		$data['title'] = 'Form Book Edit';
		$data['user'] = $this->MInformation->UserID();
		$data['bookbyid'] = $this->MInformation->getBookById($id);
		
		$this->form_validation->set_rules('book_title', 'Title', 'required|trim');
		$this->form_validation->set_rules('book_description', 'Description', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('information/editbook', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MInformation->bookEdit();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> book edited</div>');
		redirect('information/index');
		}
	}

	public function bookDelete($id)
	{
		$this->MInformation->deleteBook($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> book deleted</div>');
				redirect('information/index');
	}

	public function downloadBook($id)
	{
		$bookbyid = $this->MInformation->getBookById($id);

		$document_name = $bookbyid['book_link'];
		$filename = 'assets/document/book/'.$document_name;
		force_download($filename, NULL);

	}

	public function holybook()
	{
		$data['title'] = 'Holy Book';
		$data['user'] = $this->MInformation->userID();
		$data['holybooklist'] = $this->MInformation->getAllHolyBook();

		$this->form_validation->set_rules('holy_book_title', 'Title', 'required|trim');
		$this->form_validation->set_rules('holy_book_description', 'Description', 'required|trim');
		
		if (empty($_FILES['book_file']['name']))
		{
    		$this->form_validation->set_rules('book_file', 'Holy Book File', 'required');
		}
		
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image', 'Image', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('information/listHolyBook', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MInformation->addNewHolyBook();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New holy book added</div>');
		redirect('information/holybook');
		}
	}

	public function holyBookEdit($id)
	{
		$data['title'] = 'Form Holy Book Edit';
		$data['user'] = $this->MInformation->UserID();
		$data['holybookbyid'] = $this->MInformation->getHolyBookById($id);
		
		$this->form_validation->set_rules('holy_book_title', 'Title', 'required|trim');
		$this->form_validation->set_rules('holy_book_description', 'Description', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('information/editHolyBook', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MInformation->holyBookEdit();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Holy book edited</div>');
		redirect('information/holybook');
		}
	}

	public function holyBookDelete($id)
	{
		$this->MInformation->deleteHolyBook($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Holy book deleted</div>');
				redirect('information/holybook');
	}

	public function downloadHolyBook($id)
	{
		$holybookbyid = $this->MInformation->getHolyBookById($id);

		$document_name = $holybookbyid['holy_book_link'];
		$filename = 'assets/document/holybook/'.$document_name;
		force_download($filename, NULL);

	}

	public function newslist()
	{
		$data['title'] = 'News';
		$data['user'] = $this->MInformation->userID();
		$data['newslist'] = $this->MInformation->getAllNews();

		$this->form_validation->set_rules('news_title', 'Title', 'required|trim');
		$this->form_validation->set_rules('news_description', 'Description', 'required|trim');
		$this->form_validation->set_rules('news_link', 'News Link', 'required|trim');
		
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image', 'Image', 'required');
		}


		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('information/listnews', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MInformation->addNewNews();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New news added</div>');
		redirect('information/newslist');
		}
	}

	public function newsEdit($id)
	{
		$data['title'] = 'Form News Edit';
		$data['user'] = $this->MInformation->UserID();
		$data['newsbyid'] = $this->MInformation->getNewsById($id);
		
		$this->form_validation->set_rules('news_title', 'Title', 'required|trim');
		$this->form_validation->set_rules('news_description', 'Description', 'required|trim');
		$this->form_validation->set_rules('news_link', 'News Link', 'required|trim');
		

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('information/editNews', $data);
		$this->load->view('templates/footer');
		} else {
		$this->MInformation->newsEdit();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> News edited</div>');
		redirect('information/newslist');
		}
	}

	public function newsDelete($id)
	{
		$this->MInformation->deleteNews($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> News deleted</div>');
				redirect('information/newslist');
	}

	
	
}