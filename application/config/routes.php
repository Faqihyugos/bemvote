<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'vote/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// login & logout
$route['login'] = 'login/index';
$route['login-admin'] = 'login/admin';
$route['logout'] = 'login/logout';

// CRUD Jurusan
$route['jurusan'] = 'jurusan/index';
$route['jurusan/post'] = 'jurusan/store';
$route['jurusan/edit/(:num)'] = 'jurusan/edit/$1';
$route['jurusan/patch'] = 'jurusan/update';
$route['jurusan/delete'] = 'jurusan/destroy';

// CRD Pemilih
$route['pemilih'] = 'pemilih/index';
$route['pemilih-admin'] = 'pemilih/pemilihadmin';
$route['pemilih/post'] = 'pemilih/store';
$route['pemilih/delete'] = 'pemilih/destroy';
$route['pemilih/(:num)'] = 'pemilih/index/$1';
$route['pemilih-admin/(:num)'] = 'pemilih/pemilihadmin/$1';

// CRUD Paslon
$route['paslon'] = 'paslon/index';
$route['paslon/(:num)'] = 'paslon/show/$1';
$route['paslon/post'] = 'paslon/store';
$route['paslon/edit/(:num)'] = 'paslon/edit/$1';
$route['paslon/patch'] = 'paslon/update';
$route['paslon/delete'] = 'paslon/destroy';

// CRD Admin
$route['admin'] = 'admin/index';
$route['admin/post'] = 'admin/store';
$route['admin/delete'] = 'admin/destroy';

// BEMVOTE Feature
$route['live-count'] = 'vote/livecount';
// $route['live-count-fakultas'] = 'vote/livecountfakultas';
// $route['live-count-fakultas'] = 'vote/waitlivecount';
// $route['live-count'] = 'vote/waitlivecount';

// $route['statistik-fakultas'] = 'vote/statfakultas';
$route['statistik-pemilih'] = 'vote/stat';
$route['suara-masuk'] = 'vote/pemilihan';

// $route['laporan'] = 'laporan/index';
$route['laporan-operator'] = 'laporan/operator';
// $route['laporan'] = 'laporan/waitlaporan';
// $route['laporan-operator'] = 'laporan/waitlaporan';
$route['doc'] = 'login/doc';


