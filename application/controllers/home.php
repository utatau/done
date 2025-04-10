<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('cookie');
		$this->load->model('user_model');
		$this->load->model('dokumen_model');
		$this->load->model('kategori_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jmlDokumen'] = $this->dokumen_model->dataJoin()->num_rows();
		$data['jmlKategori'] = $this->kategori_model->dataJoin()->num_rows();
		$data['jmlUser'] = $this->user_model->data()->num_rows();
		$data['yearnow'] = date('Y', strtotime('+0 year'));
		$data['previousyear'] = date('Y', strtotime('-1 year'));
		$data['twoyearago'] = date('Y', strtotime('-2 year'));

		$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}
	public function getTotalTransaksi()
	{
		$tahun = $this->input->post('tahun');
		$jmlDM = $this->dokumen_model->dataJoinLike($tahun)->num_rows();
		$jmlKT = $this->kategori_model->dataJoinLike($tahun)->num_rows();

		$data = array('jmldm' => $jmlDM, 'jmlkt' => $jmlKT);
		echo json_encode($data);
	}
	public function getFilterTahun()
	{
		$tahun = $this->input->post('tahun');

		//Januari
		$januari = 'January';
		$last_januari = date('Y-m-t', strtotime($tahun . '-' . $januari . '-01'));
		$first_januari = date('Y-m-01', strtotime($tahun . '-' . $januari . '-01'));
		$dmJanuari = $this->dokumen_model->jmlperbulan($first_januari, $last_januari)->num_rows();
		$ktJanuari = $this->kategori_model->jmlperbulan($first_januari, $last_januari)->num_rows();

		//Februari
		$februari = 'February';
		$last_februari = date('Y-m-t', strtotime($tahun . '-' . $februari . '-01'));
		$first_februari = date('Y-m-01', strtotime($tahun . '-' . $februari . '-01'));
		$dmFebruari = $this->dokumen_model->jmlperbulan($first_februari, $last_februari)->num_rows();
		$ktFebruari = $this->kategori_model->jmlperbulan($first_februari, $last_februari)->num_rows();

		//Maret
		$maret = 'March';
		$last_maret = date('Y-m-t', strtotime($tahun . '-' . $maret . '-01'));
		$first_maret = date('Y-m-01', strtotime($tahun . '-' . $maret . '-01'));
		$dmMaret = $this->dokumen_model->jmlperbulan($first_maret, $last_maret)->num_rows();
		$ktMaret = $this->kategori_model->jmlperbulan($first_maret, $last_maret)->num_rows();

		//april
		$april = 'April';
		$last_april = date('Y-m-t', strtotime($tahun . '-' . $april . '-01'));
		$first_april = date('Y-m-01', strtotime($tahun . '-' . $april . '-01'));
		$dmApril = $this->dokumen_model->jmlperbulan($first_april, $last_april)->num_rows();
		$ktApril = $this->kategori_model->jmlperbulan($first_april, $last_april)->num_rows();

		//mei
		$mei = 'May';
		$last_mei = date('Y-m-t', strtotime($tahun . '-' . $mei . '-01'));
		$first_mei = date('Y-m-01', strtotime($tahun . '-' . $mei . '-01'));
		$dmMei = $this->dokumen_model->jmlperbulan($first_mei, $last_mei)->num_rows();
		$ktMei = $this->kategori_model->jmlperbulan($first_mei, $last_mei)->num_rows();

		//juni
		$juni = 'June';
		$last_juni = date('Y-m-t', strtotime($tahun . '-' . $juni . '-01'));
		$first_juni = date('Y-m-01', strtotime($tahun . '-' . $juni . '-01'));
		$dmJuni = $this->dokumen_model->jmlperbulan($first_juni, $last_juni)->num_rows();
		$ktJuni = $this->kategori_model->jmlperbulan($first_juni, $last_juni)->num_rows();

		//juli
		$juli = 'July';
		$last_juli = date('Y-m-t', strtotime($tahun . '-' . $juli . '-01'));
		$first_juli = date('Y-m-01', strtotime($tahun . '-' . $juli . '-01'));
		$dmJuli = $this->dokumen_model->jmlperbulan($first_juli, $last_juli)->num_rows();
		$ktJuli = $this->kategori_model->jmlperbulan($first_juli, $last_juli)->num_rows();

		//agustus
		$agustus = 'August';
		$last_agustus = date('Y-m-t', strtotime($tahun . '-' . $agustus . '-01'));
		$first_agustus = date('Y-m-01', strtotime($tahun . '-' . $agustus . '-01'));
		$dmAgustus = $this->dokumen_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();
		$ktAgustus = $this->kategori_model->jmlperbulan($first_agustus, $last_agustus)->num_rows();

		//september
		$september = 'September';
		$last_september = date('Y-m-t', strtotime($tahun . '-' . $september . '-01'));
		$first_september = date('Y-m-01', strtotime($tahun . '-' . $september . '-01'));
		$dmSeptember = $this->dokumen_model->jmlperbulan($first_september, $last_september)->num_rows();
		$ktSeptember = $this->kategori_model->jmlperbulan($first_september, $last_september)->num_rows();

		//oktober
		$oktober = 'October';
		$last_oktober = date('Y-m-t', strtotime($tahun . '-' . $oktober . '-01'));
		$first_oktober = date('Y-m-01', strtotime($tahun . '-' . $oktober . '-01'));
		$dmOktober = $this->dokumen_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();
		$ktOktober = $this->kategori_model->jmlperbulan($first_oktober, $last_oktober)->num_rows();

		//november
		$november = 'November';
		$last_november = date('Y-m-t', strtotime($tahun . '-' . $november . '-01'));
		$first_november = date('Y-m-01', strtotime($tahun . '-' . $november . '-01'));
		$dmNovember = $this->dokumen_model->jmlperbulan($first_november, $last_november)->num_rows();
		$ktNovember = $this->kategori_model->jmlperbulan($first_november, $last_november)->num_rows();

		//desember
		$desember = 'December';
		$last_desember = date('Y-m-t', strtotime($tahun . '-' . $desember . '-01'));
		$first_desember = date('Y-m-01', strtotime($tahun . '-' . $desember . '-01'));
		$dmDesember = $this->dokumen_model->jmlperbulan($first_desember, $last_desember)->num_rows();
		$ktDesember = $this->kategori_model->jmlperbulan($first_desember, $last_desember)->num_rows();


		$data = array(
			'dmJanuari' => $dmJanuari,
			'dmFebruari' => $dmFebruari,
			'dmMaret' => $dmMaret,
			'dmApril' => $dmApril,
			'dmMei' => $dmMei,
			'dmJuni' => $dmJuni,
			'dmJuli' => $dmJuli,
			'dmAgustus' => $dmAgustus,
			'dmSeptember' => $dmSeptember,
			'dmOktober' => $dmOktober,
			'dmNovember' => $dmNovember,
			'dmDesember' => $dmDesember,
			'kJanuari' => $ktJanuari,
			'kFebruari' => $ktFebruari,
			'kMaret' => $ktMaret,
			'kApril' => $ktApril,
			'kMei' => $ktMei,
			'kJuni' => $ktJuni,
			'kJuli' => $ktJuli,
			'kAgustus' => $ktAgustus,
			'kSeptember' => $ktSeptember,
			'kOktober' => $ktOktober,
			'kNovember' => $ktNovember,
			'kDesember' => $ktDesember,
		);
		echo json_encode($data);
	}
}
