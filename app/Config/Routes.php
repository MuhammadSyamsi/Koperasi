<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attemptRegister');
$routes->get('logout', 'Auth::logout');

$routes->get('invoice', 'InvoiceController::index');
$routes->get('invoice/getData', 'InvoiceController::getData');
$routes->get('invoice/view/(:num)', 'InvoiceController::view/$1');

// Semua halaman Home hanya bisa diakses setelah login
$routes->group('', function ($routes) {
    $routes->get('/', 'Laporan::index');
    $routes->get('info', 'Home::info');
    $routes->post('transaksi/update', 'Home::update');
    $routes->post('transaksi/delete', 'Home::delete');
    $routes->post('/simpan', 'Home::simpan');
    $routes->get('/barang', 'Home::barang');
    $routes->get('/listkulak', 'Home::listkulak');
    $routes->post('/reqkulak', 'Home::kulak');

    // Resource API juga aman di balik login
    $routes->resource('api/home', ['controller' => 'Api\Home']);
    $routes->resource('api/kedua', ['controller' => 'Api\Kedua']);
    $routes->resource('api/psb', ['controller' => 'Api\Psb']);

    // Invoice Routes
    $routes->get('invoice/create', 'InvoiceController::create');
    $routes->post('invoice/store', 'InvoiceController::store');
    $routes->get('invoice/addPayment/(:num)', 'Invoice::addPayment/$1');
    $routes->post('invoice/savePayment/(:num)', 'Invoice::savePayment/$1');
    $routes->get('invoice/addItem/(:num)', 'Invoice::addItem/$1');
    $routes->post('invoice/saveItem', 'Invoice::saveItem');
    $routes->get('invoice/edit/(:num)', 'Invoice::edit/$1');
    $routes->post('invoice/update/(:num)', 'Invoice::update/$1');
    $routes->get('invoice/print/(:num)', 'Invoice::print/$1');

    $routes->get('/laporan', 'Laporan::index');

    // Aset
    $routes->get('aset/create', 'Laporan::createAset');
    $routes->post('aset/store', 'Laporan::storeAset');

    // Barang
    $routes->get('barang/create', 'Laporan::createBarang');
    $routes->post('barang/store', 'Laporan::storeBarang');

    // Saku
    $routes->get('saku/create', 'Laporan::createSaku');
    $routes->post('saku/store', 'Laporan::storeSaku');

    // Keuangan
    $routes->get('keuangan/create', 'Laporan::createKeuangan');
    $routes->post('keuangan/store', 'Laporan::storeKeuangan');
    // Keuangan Multiple
    $routes->get('keuangan/multiple', 'Laporan::createMultipleKeuangan');
    $routes->post('keuangan/multipleStore', 'Laporan::storeMultipleKeuangan');
});

$routes->group('pembiayaan', function ($routes) {
    $routes->get('/', 'Pembiayaan::index');
    $routes->get('create', 'Pembiayaan::create');
    $routes->post('store', 'Pembiayaan::store');
    $routes->get('edit/(:num)', 'Pembiayaan::edit/$1');
    $routes->post('update/(:num)', 'Pembiayaan::update/$1');
    $routes->get('delete/(:num)', 'Pembiayaan::delete/$1');
});
