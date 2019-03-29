<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('abs', function () {
    return view('abs');
});

Route::get('presence', function () {
    return view('EnseignantR/presence');
});

Route::get('groupes', function () {
    return view('EnseignantR/groupes');
});

Route::get('liste_groupes', 'GroupController@index');


Route::get('correction/controle', function () {
    return view('EnseignantR/correction/controle');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Emplois_du_Temps', 'EmploiTemps@afficher');
Route::get('/ess', 'EmploiTemps@afficheress');
Route::post('empCour', 'EmploiTemps@storeCOUR');
Route::post('empTP', 'EmploiTemps@storeTP');
Route::post('empTD', 'EmploiTemps@storeTD');
Route::post('empMod', 'EmploiTemps@empMod');
Route::post('popEmp', 'EmploiTemps@empTab');
Route::post('groupes', 'GroupController@import');
