<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_session');
		
	}

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        {
			$this->home();
        }
        else
        {
			redirect('media_online', 'location');
        }
	}

	public function home()
	{
		$data['title'] = 'Login';

		$this->load->view('template/dashboard_header.php', $data);
		$this->load->view('login/login.php', $data);
		$this->load->view('template/dashboard_footer.php', $data);
	}

	public function login_process()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);

		$result = $this->model_session->login($data);
		if($result == true){
			$username = $this->input->post('username');
			$result = $this->model_session->getUserData($username);
			if($result != false){
				$session_data = array(
					'username' => $result[0]->username,
					'firstname' => $result[0]->firstname,
					'lastname' => $result[0]->lastname,
					'email' => $result[0]->email,
					'institution' => $result[0]->institution,
					'industry' => $result[0]->industry,
					'position' => $result[0]->position,
					'country' => $result[0]->country,
					'city' => $result[0]->city,
					'regdate'=> $result[0]->regdate,
					'activated' => $result[0]->activated,
					'logged_in' => TRUE 
				);

				$this->session->set_userdata($session_data);

				redirect('media_online', 'location');
				//$this->load->view('template/dashboard_headerv2.php',$data);
				//$this->load->view('media_online/media_main.php' ,$data);
				//$this->load->view('media_online/search_word.php' ,$data);
				//$this->load->view('media_online/media_report.php' ,$data);
				//$this->load->view('template/dashboard_footer.php' ,$data);
			}
		}	
		else{
			$data['message_display'] = 'Invalid Username or Password';
			redirect('login', 'location');
			//$data['title'] = 'Login';
			//$this->load->view('template/dashboard_header.php',$data);
			//$this->load->view('login/login.php',$data);
			//echo 'Invalid Username or Password';
			//$this->load->view('template/dashboard_footer.php',$data);
		}
	}

	public function logout(){
		$session_data = array(
			'username' => '',
			'firstname' => '',
			'lastname' => '',
			'email' => '',
			'institution' => '',
			'industry' => '',
			'position' => '',
			'country' => '',
			'city' => '',
			'regdate' => '',
			'activated' => '',
			'logged_in' => FALSE
		);

		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
		$data['message_display'] = 'Successfully Logout';

		redirect('', 'location');
	}

}