<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login',['filter' => 'checklogout']);
$routes->get('/administator', 'Administator::',['filter' => 'auth']);
$routes->get('/dashboard', 'Administator::index',['filter' => 'auth']);
$routes->get('/admin/edit/(:segment)','Administator::editAdmin/$1');
$routes->get('/satuan/edit/(:segment)','Administator::editSatuan/$1');
$routes->get('/petugas/edit/(:segment)','Administator::editPetugas/$1');
$routes->get('/barangperson/edit/(:segment)','Administator::editItemPerson/$1');
$routes->delete('/admin/delete/(:num)','Administator::delAdmin/$1');
$routes->delete('/satuan/delete/(:num)','Administator::delSatuan/$1');
$routes->delete('/petugas/delete/(:num)','Administator::delPetugas/$1');
$routes->delete('/itemPerson/delete/(:segment)','Administator::delItemPerson/$1');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
