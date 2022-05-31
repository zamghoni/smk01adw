<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('form_validation', 'session', 'database', 'email', 'encryption', 'user_agent', 'dompdf_gen','calendar');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'array', 'html', 'form','form_bootstrap','file','text','date','captcha','string','my_helper');

$autoload['config'] = array();


$autoload['language'] = array();

$autoload['model'] = array('Model_siswa', 'Model_data','M_Global');
