<?php
use Illuminate\Support\Str;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', ['uses' => 'HomeController@index']);

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('/auth/register', ['uses' => 'AuthController@register']);
    $router->post('/auth/login', ['uses' => 'AuthController@login']);
});

$router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->get('/', ['uses' => 'MahasiswaController@index']);
    $router->get('/profile', ['uses' => 'MahasiswaController@profile']);
    $router->get('/{nim}', ['uses' => 'MahasiswaController@nimprofile']);
    $router->post('/{nim}/matakuliah/{mkId}', ['uses' => 'MahasiswaController@addmatkul']);
    $router->put('/{nim}/matakuliah/{mkId}', ['uses' => 'MahasiswaController@delmatkul']);
});

$router->get('/prodi', ['uses' => 'HomeController@prodi']);
$router->get('/matakuliah', ['uses' => 'HomeController@matkul']);