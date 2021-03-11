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


/**
 * I didn't realize when I started that Laravel Lumen did not utilize route groups. woops.
 * preferably there would be a route group for v1/api and nested group for note
 */
$router->get('v1/api/notes', ['middleware' => 'auth', 'uses' => 'NotesController@list']);
$router->post('v1/api/note/create', ['middleware' => 'auth', 'uses' => 'NotesController@create']);
$router->put('v1/api/note/update/{id}', ['middleware' => 'auth', 'uses' => 'NotesController@update']);
$router->delete('v1/api/note/delete/{id}', ['middleware' => 'auth', 'uses' => 'NotesController@delete']);
$router->get('v1/api/note/{id}', ['middleware' => 'auth', 'uses' => 'NotesController@note']);
