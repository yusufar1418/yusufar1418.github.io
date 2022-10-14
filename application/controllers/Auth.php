<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'Mauth');
		//form validation di taro di autoload
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
		$data['title'] = 'Form Login';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
		} else {
		$this->Mauth->_login();
		}
	}

	public function registration()
	{
		$get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
   		$data['provinsi'] = $get_prov->result_array();

		$this->form_validation->set_rules('username', 'User Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'email' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		$this->form_validation->set_rules('prov', 'Provinsi', 'required|trim', [
			'required' => 'Selected Your Provinsi'
		]);
		$this->form_validation->set_rules('kab', 'Kabupaten', 'required|trim', [
			'required' => 'Selected Your Kabupaten'
		]);
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');


		if ($this->form_validation->run() == FALSE) {
		$data['title'] = 'Form Registration';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
	} else {
		$this->Mauth->registration();
		// dinonaktifiin karena kirim pesan error
		// $token = base64_encode(random_bytes(32));
		// $this->_sendEmail($token, 'verify');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Registration Success</div>');
		redirect('auth');
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

	public function logout()
	{
		$this->Mauth->logout();
	}

	public function blocked()
	{
		$data['title'] = 'Blocked';
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->query("SELECT * FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id` WHERE `user`.`email` = '$email'")->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('auth/blocked');
		$this->load->view('templates/footer');
	}

	private function _sendEmail($token, $type)
	{
		$email = htmlspecialchars($this->input->post('email', true));
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'yaryusuf47@gmail.com',
			'smtp_pass' => 'pombop9020',
			'smtp_port' => 587,
			'smtp_crypto' => 'tls',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('yaryusuf47@gmail.com', 'Login Yar');
		$this->email->to($email);

		if($type == 'verify') {	
		$this->email->subject('Account Verification');
		$this->email->message('Click this link to verify you account : <a href ="'. base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>');
		}

		if($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$this->Mauth->verify();
	}
}
