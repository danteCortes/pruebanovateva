<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * 1. API autentificada con usuarios, validar usuarios, modedlado se BD de usuarios que tiene muchos post
 * y los post tiene muchas categorias, crud para cada modelo y tres endpoint 
 * post por categoria, 
 * get usuario que postearon en una categopría 
 * y los post de un usuario.
 * 
 * paginacion de resultados test unitarios y seeders con fakes.
 * 
 */




























use GuzzleHttp\Client;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guzzle', function () {
    $client = new Client([
        'base_uri' => 'https://pokeapi.co/api/v2/',
    ]);

    $response = $client->request('GET', 'pokemon/pikachu');

    // return 'holamundo';
    $pokemon = $response->getBody();

    return json_decode($pokemon)->abilities;
});
