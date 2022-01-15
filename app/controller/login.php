<?php

class login extends DController
{

	public function __construct()
	{

		$data = array();
		$message = array();

		parent::__construct();
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->load->view('cpanel/header');

		session::init();
		if (session::get("login") == true) {
			header("Location: " . BASE_URL . "login/dashboard");
		} else {
			$this->load->view('cpanel/login');
		}
		$this->load->view('cpanel/footer');
	}

	public function dashboard()
	{
		session::checkSession();

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/dashboard');
		$this->load->view('cpanel/footer');
	}
	public function authentication_login()
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$table_admin = 'tbl_admin';
		$loginModel = $this->load->model('loginModel');

		$count = $loginModel->login($table_admin, $username, $password);

		if ($count == 0) {
			header("Location:" . BASE_URL . "/login");
		} else {
			$result = $loginModel->getLogin($table_admin, $username, $password);

			session::init();
			session::set('login', true);
			session::set('username', $result[0]['username']);
			session::set('userid', $result[0]['password']);

			header("Location: dashboard");
		}
	}

	public function logout()
	{
		session::init();
		unset($_SESSION['login']);
		header("Location:" . BASE_URL . "login");
	}
}
