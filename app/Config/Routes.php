<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->resource('post');
$routes->setAutoRoute(true);

$routes->get('/', 'Home::home');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

$routes->get('ajax', 'AjaxController::index');
$routes->get('ajax/getData', 'AjaxController::getData');
$routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1'); // Untuk DELETE
$routes->post('ajax/create', 'AjaxController::create'); // Untuk CREATE
$routes->post('ajax/update/(:num)', 'AjaxController::update/$1'); // Untuk UPDATE (atau put jika mau lebih RESTful)

// Rute admin (dengan filter auth)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});

// PENTING: Rute ini dipindah ke bawah agar tidak menimpa artikel/add
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->get('/kategori/(:segment)', 'Artikel::kategori/$1');
