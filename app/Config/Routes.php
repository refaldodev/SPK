<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->set404Override(function () {
	return view('override.php');
});
$routes->get('/', 'auth::index');
$routes->get('/dashboard', 'dashboard::index', ['filter' => 'ceklogin']);
$routes->get('/datadosen', 'datadosen::index', ['filter' => 'ceklogin']);
$routes->get('/datadosen/create', 'datadosen::create', ['filter' => 'ceklogin']);
$routes->get('/datadosen/create/(:segment)', 'datadosen::index', ['filter' => 'ceklogin']);
$routes->get('/datadosen/penilaiandosen', 'datadosen::penilaiandosen', ['filter' => 'ceklogin']);
$routes->get('/datadosen/tambahnilai', 'datadosen::tambahnilai', ['filter' => 'ceklogin']);
$routes->get('/datadosen/(:segment)', 'datadosen::detail/$1', ['filter' => 'ceklogin']);
$routes->get('/kriteria', 'kriteria::index', ['filter' => 'ceklogin']);
$routes->get('/kriteria/create', 'kriteria::create', ['filter' => 'ceklogin']);
$routes->get('/kriteria/(:segment)', 'kriteria::subkriteria/$1', ['filter' => 'ceklogin']);
$routes->get('/kriteria/edit/(:segment)', 'kriteria::edit/$1', ['filter' => 'ceklogin']);
$routes->get('/subkriteria', 'subkriteria::index', ['filter' => 'ceklogin']);
$routes->get('/subkriteria/edit/(:segment)', 'subkriteria::edit/$1', ['filter' => 'ceklogin']);
$routes->get('/subkriteria/edit', 'subkriteria::edit', ['filter' => 'ceklogin']);
$routes->get('/users', 'users::index', ['filter' => 'ceklogin']);
$routes->get('/gantipassword', 'users::gantipassword', ['filter' => 'ceklogin']);
$routes->get('/dataprofile', 'users::dataprofile', ['filter' => 'ceklogin']);

$routes->get('/mahasiswa', 'mahasiswa::index', ['filter' => 'ceklogin']);
$routes->get('/mahasiswa/penilaiandosen', 'mahasiswa::penilaiandosen', ['filter' => 'ceklogin']);
$routes->get('/nilai', 'mahasiswa::nilai', ['filter' => 'ceklogin']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
