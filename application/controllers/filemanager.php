<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filemanager extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->load->model('dokumen_model');
        $this->load->model('filemanager_model');
    }

    public function index()
    {
        $data['title'] = 'File';
        $data['dokumen'] = $this->dokumen_model->dataJoin()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('filemanager/index');
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'File';

        $data['dokumen'] = $this->filemanager_model->detail_join($id, 'dokumen')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('filemanager/detail');
        $this->load->view('templates/footer');
    }
    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('id_dokumen' => $id);
        $data = $this->dokumen_model->detail_data($where, 'dokumen')->result();
        echo json_encode($data);
    }
}
