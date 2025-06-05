<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Home;
use App\Controllers\InputPertandingan;
use App\Controllers\Tiketpertandingan;
use App\Controllers\Tampilanuser;
use App\Controllers\Jenispertandingan;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::login', ['filter' => 'guest']);
$routes->post('/', 'Home::login_process', ['filter' => 'guest']);
$routes->post('/daftar/simpandata', 'Home::daftar', ['filter' => 'guest']);
$routes->get('/logout', 'Home::logout');


$routes->get('menu', 'Home::menu', ['filter' => 'admin']);

$routes->get('/inputpertandingan', 'InputPertandingan::index', ['filter' => 'admin']);
$routes->post('/inputpertandingan/simpandata', 'Inputpertandingan::simpandata', ['filter' => 'admin']);
$routes->post('/inputpertandingan/updatedata', 'Inputpertandingan::updatedata', ['filter' => 'admin']);
$routes->post('/inputpertandingan/hapusdata', 'Inputpertandingan::hapusdata', ['filter' => 'admin']);

$routes->get('/tiketpert/(:num)', 'Tiketpertandingan::index/$1', ['filter' => 'admin']);
$routes->post('/tiketpert/simpandata', 'Tiketpertandingan::simpandata', ['filter' => 'admin']);

$routes->get('/statuspembelian', 'Statuspembelian::index', ['filter' => 'admin']);
$routes->post('/statuspembelian/updatedata', 'Statuspembelian::updatedata', ['filter' => 'admin']);
$routes->post('/statuspembelian/hapusdata', 'Statuspembelian::hapusdata', ['filter' => 'admin']);


$routes->get('/tampilanuser', 'Tampilanuser::index', ['filter' => 'user']);
$routes->get('tampilanuser/(:num)', 'Tampilanuser::pertandinganByJenis/$1', ['filter' => 'user']);
$routes->get('/status', 'Status::index', ['filter' => 'user']);

$routes->get('jenispertandingan', 'Jenispertandingan::index', ['filter' => 'admin']);
$routes->get('jenispertandingan/(:num)', 'Jenispertandingan::pertandinganByJenis/$1', ['filter' => 'admin']);

$routes->get('/pembelian/(:num)', 'Pembelian::index/$1', ['filter' => 'user']);
$routes->post('/pembelian/simpandata', 'Pembelian::simpandata', ['filter' => 'user']);

$routes->get('invoice/cetak/(:num)', 'Pembelian::cetak/$1');



// Backup
// $routes->get('/tampiljenispert', 'Tampiljenispert::index');
