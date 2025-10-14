<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/', 'MascotaController::listar');             // Mostrar todas las mascotas
$routes->get('crear', 'MascotaController::crear');           // Formulario para crear mascota
$routes->post('guardar', 'MascotaController::guardar');      // Guardar nueva mascota
$routes->get('editar/(:num)', 'MascotaController::editar/$1'); // Formulario para editar mascota por ID
$routes->post('actualizar', 'MascotaController::actualizar'); // Actualizar mascota
$routes->get('borrar/(:num)', 'MascotaController::borrar/$1'); // Borrar mascota por ID
