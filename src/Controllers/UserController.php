<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
	public function showLogin()
	{
		$data = [
			'success' => session_get_flash('success'),
			'error' => session_get_flash('error')
		];
		render_view('login',$data);
	}
	public function showRegister()
	{	
		$data = [
			'success' => session_get_flash('success'),
			'error' => session_get_flash('error')
		];
		render_view('register',$data);
	}

	public function showLoginAdmin()
	{
		$data = [
			'success' => session_get_flash('success'),
			'error' => session_get_flash('error')
		];
		render_view_admin('login',$data);
	}


	public function Register()
	{
		$user = new User();
		if ($user->fill($_POST)->create()) {
			$_SESSION['success'] = 'Đăng ký thành công.';
			redirect('/login');
		}

		$_SESSION['error'] = 'Đã có lỗi xảy ra.';
		redirect('/register');
	}

	public function Login()
	{	
		$user = new User();
		if(isset($_POST['submit']) && ($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userinfo=$user->login($username,$password);
		$role = $userinfo['role'];
		if ($role == '0') {
			$_SESSION['username'] = $userinfo;
			redirect('/');
		}}

		$_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
		redirect('/login');
	}

	public function LoginAdmin()
	{	
		$user = new User();
		if(isset($_POST['submit']) && ($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userinfo=$user->login($username,$password);
		$role = $userinfo['role'];
		if ($role=='1') {
			$_SESSION['admin'] = $userinfo;
			redirect('/admin');
		}}

		$_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
		redirect('/admin/login');
	}
	public function logout()
	{	
		session_unset();
		session_destroy();
		redirect('/');
	}
	public function logoutAdmin()
	{	
		session_unset();
		session_destroy();
		redirect('/admin');
	}

}
