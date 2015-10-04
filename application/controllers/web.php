<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	/**
	 * @author : Irpan Pardosi
	 * @keterangan : Controller untuk halaman awal ketika aplikasi krs web based diakses
	 **/
	public function _construct()
	{
		session_start();
	}
	
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			$d['judul'] = "Login - Sistem Informasi Aman Transport";
			
			//buat atribut form
			$frm['username'] = array('name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'value' => '',
				'class' => 'input-teks-login',
				'placeholder' => 'Masukkan username.....'
			);
			$frm['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => '',
				'class' => 'input-teks-login',
				'placeholder' => 'Masukkan password.....'
			);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('web/bg_login',$frm);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin' || $st == "or" || $st == "op" || $st == "cp" || $st == "ca" || $st == "ft")
			{
				header('location:'.base_url().'admin');
			}
		
		}
	}
	
	public function login()
	{
		$d['judul'] = "Login - Sistem Informasi Akademik Online";
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		//echo $u." ".$p; exit();
		$this->web_app_model->getLoginData($u,$p);
	}
	
	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'web');
		}
		else
		{
			$this->session->sess_destroy();
			header('location:'.base_url().'web');
		}
	}
}

/* End of file web.php */
/* Location: ./application/controllers/web.php */