<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('dokumen_model');
		$this->load->model('kategori_model');
	}

	public function index()
	{
		$data['title'] = 'Dokumen';
		$data['dokumen'] = $this->dokumen_model->dataJoin()->result();
		$data['kategori'] = $this->kategori_model->data()->result();
		$data['jmlKategori'] = $this->kategori_model->data()->result();
		$this->load->model('kategori_model');
		$this->load->view('templates/header', $data);
		$this->load->view('dokumen/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Dokumen';
		$data['kategori'] = $this->kategori_model->data()->result();
		$data['jmlKategori'] = $this->kategori_model->data()->result();

		$this->load->model('kategori_model');
		$this->load->view('templates/header', $data);
		$this->load->view('dokumen/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$this->load->model('kategori_model');

		$config['upload_path']   = './assets/upload/dokumen/';
		$config['allowed_types'] = 'PDF|XLSX|pdf|xlsx';
		$config['max_size'] = 5120;

		$namaFile = $_FILES['dokumen']['name'];
		$error = $_FILES['dokumen']['error'];

		$this->load->library('upload', $config);

		$kode = $this->dokumen_model->buat_kode();
		$dokumen = $this->input->post('kode_rak');
		$tngakrj = 	$this->input->post('nama_tenaga_krj');
		$kpj = 	$this->input->post('kpj');
		$kategori = $this->input->post('kategori');
		$tgl_upload = $this->input->post('tgl_upload');
		$masa_berlaku = $this->input->post('masa_berlaku');

		if ($namaFile == '') {
			$ganti = 'pdf.pdf';
		} else {
			if (! $this->upload->do_upload('dokumen')) {
				$error = $this->upload->display_errors();
				redirect('dokumen/tambah');
			} else {
				$data = array('dokumen' => $this->upload->data());
				$nama_file = $data['dokumen']['file_name'];
				$ganti = str_replace(" ", "_", $nama_file);
			}
		};

		$data = array(
			'id_dokumen' => $kode,
			'kode_rak' => $dokumen,
			'nama_tenaga_krj' => $tngakrj,
			'kpj' => $kpj,
			'id_kategori' => $kategori,
			'tgl_upload' => $tgl_upload,
			'masa_berlaku' => $masa_berlaku,
			'file' => $ganti
		);

		$this->dokumen_model->tambah_data($data, 'dokumen');
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
		redirect('dokumen');
	}

	public function proses_ubah()
	{
		$this->load->model('kategori_model');
		$config['upload_path']   = './assets/upload/dokumen/';
		$config['allowed_types'] = 'pdf|xlsx';

		$namaFile = $_FILES['file']['name'];
		$error = $_FILES['file']['error'];

		$this->load->library('upload', $config);

		$kode = $this->input->post('id_dokumen');
		$koderak = $this->input->post('kode_rak');
		$tngakrj = 	$this->input->post('nama_tenaga_krj');
		$kpj = 	$this->input->post('kpj');
		$kategori = $this->input->post('kategori');
		$tgl_upload = $this->input->post('tgl_upload');
		$masa_berlaku = $this->input->post('tambah_masa_berlaku');

		$flama = $this->input->post('fileLama');

		if ($namaFile == '') {
			$ganti = $flama;
		} else {
			if (! $this->upload->do_upload('file')) {
				$error = $this->upload->display_errors();
				redirect('dokumen/ubah/' . $kode);
			} else {

				$data = array('file' => $this->upload->data());
				$nama_file = $data['file']['file_name'];
				$ganti = str_replace(" ", "_", $nama_file);
				if ($flama == 'pdf.pdf') {
				} else {
					unlink('./assets/upload/dokumen/' . $flama . '');
				}
			}
		}

		$data = array(
			'kode_rak' => $koderak,
			'nama_tenaga_krj' => $tngakrj,
			'kpj' => $kpj,
			'id_kategori' => $kategori,
			'tgl_upload' => $tgl_upload,
			'masa_berlaku' => $masa_berlaku,
			'file' => $ganti
		);

		$where = array(
			'id_dokumen' => $kode
		);

		$this->dokumen_model->ubah_data($where, $data, 'dokumen');
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
		redirect('dokumen');
	}

	public function proses_hapus($id)
	{
		$where = array('id_dokumen' => $id);
		$file = $this->dokumen_model->ambilFile($where);
		if ($file) {
			if ($file == 'pdf.pdf') {
			} else {
				unlink('../assets/upload/dokumen/' . $file . '');
			}

			$this->dokumen_model->hapus_data($where, 'dokumen');
		}

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
		redirect('dokumen');
	}

	public function getData()
	{
		$id = $this->input->post('id');
		$where = array('id_dokumen' => $id);
		$data = $this->dokumen_model->detail_data($where, 'dokumen')->result();
		echo json_encode($data);
	}
}
