<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'web';
$route['404_override'] = 'web/error_not_found';
$route['pendaftaran']  = 'web/pendaftaran';
$route['pembayaran']  = 'panel_siswa/pembayaran';
$route['bayar']  = 'panel_siswa/pembayaran_act';
$route['logcs']        = 'web/logcs';



$route['translate_uri_dashes'] = FALSE;
