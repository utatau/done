<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['title'] = 'User';
		$data['user'] = $this->user_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('user/index');
		$this->load->view('templates/footer');
	}
	public function proses_ubah()
	{

		$kode = $this->input->post('iduser');
		$user = $this->input->post('user');
		$level = $this->input->post('level');
		$pass = $this->input->post('pwd');
		$passLama = $this->input->post('pwdLama');
		if ($pass == '') {
			$passUpdate = $passLama;
		} else {
			$passUpdate = md5($pass);
		}

		$data = array(
			'username' => $user,
			'level' => $level,
			'password' => $passUpdate
		);

		$where = array('id_user' => $kode);

		$this->user_model->ubah_data($where, $data, 'user');
		$this->session->set_flashdata('Pesan', '
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		redirect('user');
	}
}
