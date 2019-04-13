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

Route::get('presence','Presence@index');

Route::post('presence/liste','Presence@lister');

Route::get('justifications','Presence@justification');

Route::get('justifications/accepter','Presence@accepterJ');

Route::get('justifications/refuser','Presence@refuserJ');

Route::get('present','Presence@present');

Route::get('absent','Presence@absent');

Route::get('enseignant/groupes','Groupe@index');

Route::get('exclus','Presence@exclus');

Route::get('liste_groupes', 'GroupController@index');

Route::get('correction/choix', 'CorrectionCopies@index');

Route::get('choix/module', 'CorrectionCopies@module');

Route::get('choix/paquet', 'CorrectionCopies@paquet');

Route::post('corriger', 'CorrectionCopies@corriger');

Route::get('attribuer/note', 'CorrectionCopies@noter');

Route::get('gestion/paquet/controle', 'CorrectionCopies@GstpaquetCtrl');

Route::get('date/limite/controle', 'CorrectionCopies@datelimite');

Route::post('sujet/controle', 'CorrectionCopies@sujet');

Route::post('corrige/controle', 'CorrectionCopies@corrige');

Route::get('gestion/paquet/examen', 'CorrectionCopies@GstpaquetExm');

Route::get('attribuer/correcteur', 'CorrectionCopies@correcteur');

Route::get('anonymat/paquets','Anonymat@index');

Route::get('anonymat/paquets/liste','Anonymat@lister');

Route::post('/anonymat/import', 'Anonymat@import');

Route::get('anonymat/paquet/details/{id}','Anonymat@details');

Route::get('/supprimer/paquet','Anonymat@delete');

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
