<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Login::index');
$routes->post('/','Login::index');
$routes->get('/home', 'Home::index');
$routes->get('/input-jadwal', 'InputJadwal::index');
$routes->get('/lihat-jadwal', 'LihatJadwal::index');
$routes->get('/details-jadwal', 'LihatJadwal::detailsJadwalKU');
$routes->get('/details-jadwal2', 'LihatJadwal::detailsJadwalSM');
$routes->get('/lihat-tim', 'LihatTim::index');
$routes->get('/buat-jadwal', 'BuatJadwal::index');
$routes->get('/form-jadwal', 'BuatJadwal::formJadwal');
$routes->post('/submit-jadwal', 'BuatJadwal::tambah');
