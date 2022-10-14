<?php 

class Information_model extends CI_Model 
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
	
	function config_upload($type_file)
	{
		// foto book
		if ($type_file == 1) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/book/';
			$this->load->library('upload', $config);
		// file book	
		}elseif($type_file == 2){
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '100240';
			$config['upload_path'] = './assets/document/book/';
			$this->load->library('upload', $config);
		// foto holy book
		}elseif($type_file == 3) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/holybook/';
			$this->load->library('upload', $config);
		// file holy book	
		}elseif($type_file == 4){
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '100240';
			$config['upload_path'] = './assets/document/holybook/';
			$this->load->library('upload', $config);
		//foto news
		}elseif($type_file == 5) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/news/';
			$this->load->library('upload', $config);
		}
			return $this->upload->initialize($config);
	}

		public function addNewBook()
	{
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$type_file = 1;
				$this->config_upload($type_file);

				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');	
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image:' . $this->upload->display_errors() . '</div>');
					redirect('information/index');
				}
			}else{
				$new_image = "default.png";
			}		
				
			$upload_file = $_FILES['book_file']['name'];

			if ($upload_file) {
				$type_file = 2;
				$this->config_upload($type_file);

				if ($this->upload->do_upload('book_file')) {
					$new_file = $this->upload->data('file_name');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File:' . $this->upload->display_errors() . '</div>');
						redirect('information/index');
				}
			}else{
				$new_file = "";
			}
				$data = [
					"book_title" => htmlspecialchars($this->input->post('book_title', true)),
					"book_description" => htmlspecialchars($this->input->post('book_description', true)),
					"book_image" => $new_image,
					"book_link" => $new_file,	
					"date_created_book" => time()
				];
				$this->db->insert('book', $data);
				
	}

		public function bookEdit()
	{
		$idbook = htmlspecialchars($this->input->post('id', true));
		$book_image = htmlspecialchars($this->input->post('book_image', true));
		$book_link = htmlspecialchars($this->input->post('book_link', true));
		
		$upload_image = $_FILES['image']['name'];
		
		if ($upload_image) {
			$type_file = 1;
			$this->config_upload($type_file);
			if ($this->upload->do_upload('image')) {
			$old_image = $book_image;
				if ($old_image != 'default.png') {
					unlink(FCPATH . 'assets/img/book/' . $old_image);
				}	
			$new_image = $this->upload->data('file_name');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image:' . $this->upload->display_errors() . '</div>');
				redirect('information/bookEdit/'.$idbook);
			}
		}else{
			$new_image = $book_image;
		}

		$upload_file = $_FILES['book_file']['name'];
		
		if ($upload_file) {
			$type_file = 2;
			$this->config_upload($type_file);
			if ($this->upload->do_upload('book_file')) {
			$old_file = $book_link;
				if ($old_file != 'default.png') {
					unlink(FCPATH . 'assets/document/book/' . $old_file);
				}	
			$new_file = $this->upload->data('file_name');
			}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File:' . $this->upload->display_errors() . '</div>');
			redirect('information/bookEdit/'.$idbook);
			}
		}else{
			$new_file = $book_link;
		}
					
			$data = [
				"book_title" => htmlspecialchars($this->input->post('book_title', true)),
				"book_description" => htmlspecialchars($this->input->post('book_description', true)),
				"book_image" => $new_image,
				"book_link" => $new_file,	
				"date_created_book" => time()
			];
			$this->db->where('idbook', $idbook);
			$this->db->update('book', $data);
		
	}

	public function deleteBook($id)
	{	
		
		$row = $this->getBookById($id);
		$book_image = $row['book_image'];
		$old_book_image = $book_image;
			if ($old_book_image != 'default.png') {
				unlink(FCPATH . 'assets/img/book/' . $old_book_image);
			}

		$book_link = $row['book_link'];
		$old_book_link = $book_link;
		unlink(FCPATH . 'assets/document/book/' . $old_book_link);

		//delete book by idbook
		$this->db->delete('book', ['idbook' => $id]);
		
	}


		public function addNewHolyBook()
	{
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$type_file = 3;
				$this->config_upload($type_file);

				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');	
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Image:' . $this->upload->display_errors() . '</div>');
					redirect('information/holybook');
				}
			}else{
				$new_image = "default.png";
			}		
				
			$upload_file = $_FILES['book_file']['name'];

			if ($upload_file) {
				$type_file = 4;
				$this->config_upload($type_file);

				if ($this->upload->do_upload('book_file')) {
					$new_file = $this->upload->data('file_name');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> File:' . $this->upload->display_errors() . '</div>');
						redirect('information/holybook');
				}
			}else{
				$new_file = "";
			}
				$data = [
					"holy_book_title" => htmlspecialchars($this->input->post('holy_book_title', true)),
					"holy_book_description" => htmlspecialchars($this->input->post('holy_book_description', true)),
					"holy_book_image" => $new_image,
					"holy_book_link" => $new_file,	
					"date_created_holy_book" => time()
				];
				$this->db->insert('holy_book', $data);
				
	}

		public function holyBookEdit()
	{
		$idbook = htmlspecialchars($this->input->post('id', true));
		$holy_book_image = htmlspecialchars($this->input->post('holy_book_image', true));
		$holy_book_link = htmlspecialchars($this->input->post('holy_book_link', true));
		
		$upload_image = $_FILES['image']['name'];

		if ($upload_image) {
			$type_file = 3;
			$this->config_upload($type_file);
			if ($this->upload->do_upload('image')) {
			$old_image = $holy_book_image;
				if ($old_image != 'default.png') {
					unlink(FCPATH . 'assets/img/holybook/' . $old_image);
				}	
			$new_image = $this->upload->data('file_name');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Image:' . $this->upload->display_errors() . '</div>');
				redirect('information/holyBookEdit/'.$idbook);
			}
		}else{
			$new_image = $holy_book_image;
		}

		$upload_file = $_FILES['book_file']['name'];
		
		if ($upload_file) {
			$type_file = 4;
			$this->config_upload($type_file);
			if ($this->upload->do_upload('book_file')) {
			$old_file = $holy_book_link;
				if ($old_file != 'default.png') {
					unlink(FCPATH . 'assets/document/holybook/' . $old_file);
				}	
			$new_file = $this->upload->data('file_name');
			}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File:' . $this->upload->display_errors() . '</div>');
			redirect('information/holyBookEdit/'.$idbook);
			}
		}else{
			$new_file = $holy_book_link;
		}
			$data = [
				"holy_book_title" => htmlspecialchars($this->input->post('holy_book_title', true)),
				"holy_book_description" => htmlspecialchars($this->input->post('holy_book_description', true)),
				"holy_book_image" => $new_image,
				"holy_book_link" => $new_file,	
				"date_created_holy_book" => time()
			];
			$this->db->where('idholy_book', $idbook);
			$this->db->update('holy_book', $data);
	}

	public function deleteHolyBook($id)
	{	
		
		$row = $this->getHolyBookById($id);
		$holy_book_image = $row['holy_book_image'];
		$old_holy_book_image = $holy_book_image;
			if ($old_holy_book_image != 'default.png') {
				unlink(FCPATH . 'assets/img/holybook/' . $old_holy_book_image);
			}

		$holy_book_link = $row['holy_book_link'];
		$old_holy_book_link = $holy_book_link;
		unlink(FCPATH . 'assets/document/holybook/' . $old_holy_book_link);

		//delete book by idbook
		$this->db->delete('holy_book', ['idholy_book' => $id]);
		
	}

		public function addNewNews()
	{
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$type_file = 5;
				$this->config_upload($type_file);

				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');	
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image:' . $this->upload->display_errors() . '</div>');
					redirect('information/newslist');
				}
			}else{
				$new_image = "default.png";
			}		
			
				$data = [
					"news_title" => htmlspecialchars($this->input->post('news_title', true)),
					"news_description" => htmlspecialchars($this->input->post('news_description', true)),
					"news_image" => $new_image,
					"news_link" => htmlspecialchars($this->input->post('news_link', true)),	
					"date_created_news" => time()
				];
				$this->db->insert('news', $data);
				
	}

		public function newsEdit()
	{
		$idnews = htmlspecialchars($this->input->post('id', true));
		$news_image = htmlspecialchars($this->input->post('news_image', true));
		
		$upload_image = $_FILES['image']['name'];
		
		if ($upload_image) {
			$type_file = 5;
			$this->config_upload($type_file);
			if ($this->upload->do_upload('image')) {
			$old_image = $news_image;
				if ($old_image != 'default.png') {
					unlink(FCPATH . 'assets/img/news/' . $old_image);
				}	
			$new_image = $this->upload->data('file_name');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image:' . $this->upload->display_errors() . '</div>');
				redirect('information/newsEdit/'.$idnews);
			}
		}else{
			$new_image = $news_image;
		}
					
			$data = [
				"news_title" => htmlspecialchars($this->input->post('news_title', true)),
				"news_description" => htmlspecialchars($this->input->post('news_description', true)),
				"news_image" => $new_image,	
				"date_created_news" => time()
			];
			$this->db->where('idnews', $idnews);
			$this->db->update('news', $data);
		
	}

	public function deleteNews($id)
	{	
		
		$row = $this->getNewsById($id);
		$news_image = $row['news_image'];
		$old_news_image = $news_image;
			if ($old_news_image != 'default.png') {
				unlink(FCPATH . 'assets/img/news/' . $old_news_image);
			}

		//delete news by idnews
		$this->db->delete('news', ['idnews' => $id]);
		
	}


	
}