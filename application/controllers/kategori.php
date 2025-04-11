<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->load->model('kategori_model');
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->kategori_model->get_kategori();

        $this->load->view('templates/header', $data);
        $this->load->view('kategori/index');
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {

        $kode = $this->kategori_model->buat_kode();
        $head_kategori = $this->input->post('head_kategori');
        $kepala = $this->input->post('kode_kategori');
        $this->load->model('kategori_model');


        $data['jmlKategori'] = $this->kategori_model->data()->result();
        $data['kategori'] = $this->kategori_model->data()->result();

        $data = array(
            'id_kategori' => $kode,
            'head_kategori' => $head_kategori,
            // 'sub_kategori' => $sub_kategori,
            'kode_kategori' => $kepala
        );

        $this->kategori_model->tambah_data($data, 'kategori');
        $this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
        redirect('kategori');
    }
    public function proses_tambah_sub()
    {

        $kode = $this->kategori_model->buat_kode();
        $head_kategori = $this->input->post('head_kategori');
        $sub_kategori = $this->input->post('sub_kategori');
        $kepala = $this->input->post('kode_kategori');
        $this->load->model('kategori_model');


        $data['jmlKategori'] = $this->kategori_model->data()->result();
        $data['kategori'] = $this->kategori_model->data()->result();

        $data = array(
            'id_kategori' => $kode,
            'head_kategori' => $head_kategori,
            'sub_kategori' => $sub_kategori,
            'kode_kategori' => $kepala
        );

        $this->kategori_model->tambah_data($data, 'kategori');
        $this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Sub Kategori Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
        redirect('kategori');
    }
    public function proses_ubah_sub()
    {
        $kode = $this->input->post('id_kategori');
        $head_kategori = $this->input->post('head_kategori');
        $sub_kategori = $this->input->post('sub_kategori');
        $kepala = $this->input->post('kode_kategori');
        $this->load->model('kategori_model');


        $data['jmlKategori'] = $this->kategori_model->data()->result();
        $data['kategori'] = $this->kategori_model->data()->result();

        $data = array(
            'head_kategori' => $head_kategori,
            'sub_kategori' => $sub_kategori,
            'kode_kategori' => $kepala
        );
        $where = array(
            'id_kategori' => $kode
        );

        $this->kategori_model->ubah_data($where, $data, 'kategori');
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
        redirect('kategori');
    }
    public function ubah_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $new_head_kategori = $this->input->post('head_kategori');

        $this->load->model('Kategori_model');
        $result = $this->Kategori_model->update_kategori($id_kategori, $new_head_kategori);

        if ($result) {
            $this->session->set_flashdata('Pesan', '<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>');
        } else {
            $this->session->set_flashdata('Pesan', '<script>
		$(document).ready(function() {
			swal.fire({
				title: "Gagal diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>');
        }

        redirect('kategori');
    }

    public function proses_ubah()
    {

        $kode = $this->input->post('id_kategori');
        $kategori = $this->input->post('head_kategori');
        $sub_kategori = $this->input->post('sub_kategori');
        $kepala = $this->input->post('kode_kategori');

        $data = array(
            'head_kategori' => $kategori,
            'sub_kategori' => $sub_kategori,
            'kode_kategori' => $kepala
        );

        $where = array(
            'id_kategori' => $kode
        );

        $this->kategori_model->ubah_data($where, $data, 'kategori');
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
        redirect('kategori');
    }

    public function proses_hapus_sub($id)
    {
        $where = array('id_kategori' => $id);
        $this->kategori_model->hapus_data($where, 'kategori');
        $this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
        redirect('kategori');
    }
    public function proses_hapus($id)
    {
        $id = urldecode($id);
        $where = array('head_kategori' => $id);
        $this->kategori_model->hapus_data($where, 'kategori');
        $this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
        redirect('kategori');
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('id_kategori' => $id);
        $data = $this->kategori_model->detail_data($where, 'kategori')->result();
        echo json_encode($data);
    }
}
