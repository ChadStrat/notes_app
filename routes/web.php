<?php
use Illuminate\Http\Request;

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
$router->get('/', function () use ($router) {return $router->app->version();});
$router->post('/register','UsersController@register');

$router->get('v1/api/note/create', ['middleware' => 'auth', 'uses' => 'NotesController@create']);
$router->get('v1/api/note/update/{id}', ['middleware' => 'auth', 'uses' => 'NotesController@update']);
$router->get('v1/api/note/delete/{id}', ['middleware' => 'auth', 'uses' => 'NotesController@delete']);
$router->get('v1/api/note/{id}', ['middleware' => 'auth', 'uses' => 'NotesController@note']);
// $router->get('v1/api/note/update', ['middleware' => 'auth', 'uses' => 'NotesController@update']);
// $router->get('v1/api/note/delete', ['middleware' => 'auth', 'uses' => 'NotesController@delete']);
