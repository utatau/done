<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->load->model('pengaturan_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->pengaturan_model->data()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pengaturan/index');
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Pengaturan';
        $where = array('id_user' => $id);
        $data['user'] = $this->pengaturan_model->detail_data($where, 'user')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pengaturan/index');
        $this->load->view('templates/footer');
    }


    public function proses_ubah()
    {
        $user = $this->input->post('user');
        $kode = $this->input->post('iduser');
        $pass = $this->input->post('pwd');
        $passLama = $this->input->post('pwdLama');
        if ($pass == '') {
            $passUpdate = $passLama;
        } else {
            $passUpdate = md5($pass);
        }

        $data = array(
            'username' => $user,
            'password' => $passUpdate,

        );

        $where = array('id_user' => $kode);

        $this->pengaturan_model->ubah_data($where, $data, 'user');
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
        redirect('home');
    }
}
