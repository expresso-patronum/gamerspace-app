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
$routes->add('/', 'Home::filtrar');
$routes->get('/', 'Home::getDados');
$routes->add('/pesquisar', 'Home::pesquisar');
$routes->add('/rankings', 'Home::mostraRankings');

$routes->get('/cadastroCliente', 'Home::mostraCadastro');
$routes->add('/cadastrarProduto', 'Home::cadastrarProduto');
$routes->add('/descricaoDoProduto/(:num)', 'Home::descricaoDoProduto/$1');
$routes->add('/formEditarProduto/(:num)', 'Home::editarProduto/$1');
$routes->add('/editarProduto/(:num)', 'Home::updateProdutoToDB/$1');
$routes->get('/formExcluirProduto/(:num)', 'Home::deleteProduto/$1');
$routes->get('/deleteCategoria/(:num)', 'Home::deleteCategoria/$1');
$routes->get('/updateCategoria/(:num)', 'Home::updateCategoria/$1');
$routes->add('/updateCategoria/(:num)', 'Home::updateCategoriaToDB/$1');
$routes->add('/cadastroCategoria', 'Home::cadastroCategoria');
$routes->add('/cadastrarCategoria', 'Home::cadastroCategoriaToDB');
$routes->add('/cadastrarProdutoToDB', 'Home::cadastrarProdutoToDB');
$routes->add('/clientes', 'Home::mostraClientes');
$routes->add('/categorias', 'Home::mostraCategorias');
$routes->add('/cadastrarCliente', 'Home::cadastrarClienteToDB');
$routes->add('/descricaoDoCliente/(:num)', 'Home::descricaoDoCliente/$1');
$routes->get('/deleteCliente/(:num)', 'Home::deleteCliente/$1');
$routes->get('/formEditarCliente/(:num)', 'Home::mostraEditarCliente/$1');
$routes->add('/formEditarCliente/(:num)', 'Home::editarCliente/$1');
$routes->add('/cadastrarUsuarioProduto/(:num)', 'Home::cadastrarUsuarioProduto/$1');
/*
 * ---------------cadastrarUsuarioProduto-----------------------------------------------------
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
