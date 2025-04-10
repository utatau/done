<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['home'] = 'Home/index';
$route['pengaturan'] = 'Pengaturan/index';
$route['login'] = 'Login/index';

$route['dokumen'] = 'Dokumen/index';

$route['filemanager'] = 'Filemanager/index';

$route['kategori'] = 'Kategori/index';

$route['(:any)'] = 'gagal/index/$1';
$route['404_override'] = 'Gagal/index';
$route['translate_uri_dashes'] = FALSE;
