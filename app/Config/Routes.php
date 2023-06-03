<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// checklist
$routes->get('/checklist/simpan', 'Checklist::simpan'); // agar tdk masuk ke pilihPeralatan krn (:any)
$routes->get('/checklist/print', 'Checklist::print'); // agar tdk masuk ke pilihPeralatan krn (:any)
$routes->get('/checklist/(:num)', 'Checklist::print/$1');
$routes->get('/checklist/(:any)', 'Checklist::pilihPeralatan/$1');

// servicerequest
$routes->get('/servicerequest/simpan', 'Servicerequest::simpan'); // agar tdk masuk ke index krn (:alpha)
$routes->get('/servicerequest/print', 'Servicerequest::print'); // agar tdk masuk ke index krn ada (:alpha)
$routes->get('/servicerequest/(:num)', 'Servicerequest::print/$1');
$routes->get('/servicerequest/(:alpha)', 'Servicerequest::index/$1'); // membedakan cm dan flm

// limas
$routes->get('/limas/(:num)', 'Limas::print/$1');

// make_notice
$routes->get('/make_notice', 'Make_notice::index', ['filter' => 'role:admin,manager bagian operasi,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/make_notice/index', 'Make_notice::index', ['filter' => 'role:admin,manager bagian operasi,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/make_notice/post', 'Make_notice::post', ['filter' => 'role:admin,manager bagian operasi,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// database_home
$routes->get('/db_home/index', 'Db_home::index', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_home', 'Db_home::index', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// database_checklist
$routes->get('/db_checklist', 'Db_checklist::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_checklist/index', 'Db_checklist::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_checklist/edit', 'Db_checklist::edit', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_checklist/details/(:num)', 'Db_checklist::details/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->delete('/db_checklist/(:num)', 'Db_checklist::delete/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_checklist/(:any)', 'Db_checklist::prints/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->post('/db_checklist/(:num)', 'Db_checklist::approve/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// database_servicerequest
$routes->get('/db_servicerequest', 'Db_servicerequest::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_servicerequest/index', 'Db_servicerequest::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_servicerequest/edit', 'Db_servicerequest::edit', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_servicerequest/details/(:num)', 'Db_servicerequest::details/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->delete('/db_servicerequest/(:num)', 'Db_servicerequest::delete/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_servicerequest/(:any)', 'Db_servicerequest::prints/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->post('/db_servicerequest/(:num)', 'Db_servicerequest::approve/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// database_limas
$routes->get('/db_limas', 'Db_limas::index', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_limas/index', 'Db_limas::index', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_limas/edit', 'Db_limas::edit', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_limas/details/(:num)', 'Db_limas::details/$1', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->delete('/db_limas/(:num)', 'Db_limas::delete/$1', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_limas/(:any)', 'Db_limas::prints/$1', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->post('/db_limas/(:num)', 'Db_limas::approve/$1', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// database_users
$routes->get('/db_users', 'Db_users::index', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_users/index', 'Db_users::index', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_users/edit', 'Db_users::edit', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->delete('/db_users/(:num)', 'Db_users::delete/$1', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_users/(:any)', 'Db_users::details/$1', ['filter' => 'role:admin,supervisor logistic,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// database_notice
$routes->get('/db_notice', 'Db_notice::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_notice/index', 'Db_notice::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_notice/edit', 'Db_notice::edit', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->delete('/db_notice/(:num)', 'Db_notice::delete/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/db_notice/(:any)', 'Db_notice::details/$1', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// input_limas
$routes->get('/input_limas', 'Input_limas::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/input_limas/index', 'Input_limas::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/input_limas/simpan', 'Input_limas::simpan', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// input_limas
$routes->get('/input_co', 'Input_co::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/input_co/index', 'Input_co::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/input_co/simpan', 'Input_co::simpan', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);

// kpi_monitring
$routes->get('/kpi_monitoring', 'Kpi_monitoring::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/kpi_monitoring/index', 'Kpi_monitoring::index', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);
$routes->get('/kpi_monitoring/details', 'Kpi_monitoring::details', ['filter' => 'role:admin,supervisor operasi shift a,supervisor operasi shift b,supervisor operasi shift c,supervisor operasi shift d']);


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
