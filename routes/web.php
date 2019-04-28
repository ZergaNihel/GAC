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

// Route::get('abs', function () {
//     return view('abs');
// });

 Route::get('modules/details/{id}','ModuleController@details');
    
 Route::get('modules/pdf', function () {
     return view('modules.pdf');
 });
 Route::get('Semestres/dashboard/{id}','SemestreController@dash');
 
 Route::get('new_sem', 'SemestreController@new_sem');
 Route::post('addSem', 'SemestreController@store');

 Route::get('Semestres/index', 'SemestreController@index');
  Route::get('Enseignants/index', 'EnseignantController@index');
  Route::get('random_pwd', 'EnseignantController@rand');
  
 Route::post('addEnsExcel', 'EnseignantController@storeEns');
 Route::post('DeleteEns', 'EnseignantController@delete');
 Route::post('addEns', 'EnseignantController@store');
 Route::get('modules/index', 'ModuleController@index');
 Route::get('DeleteModule/{id}/', 'ModuleController@delete');
 Route::post('addModule', 'ModuleController@store');
 Route::post('EditModule', 'ModuleController@edit');
Route::get('statGroupe/{id}/','GroupController@statistique');
 Route::post('EditGroupes','GroupController@edit');
Route::post('DeleteGroupes','GroupController@delete');
 Route::get('groupe/detail/{id}/{idSem}','GroupController@groupe');
 Route::post('NouveauEtudiant','GroupController@new_student');
Route::get('presence','Presence@index');

Route::post('presence/liste','Presence@lister');

Route::get('justifications','Presence@justification');

Route::get('justifications/accepter','Presence@accepterJ');

Route::get('justifications/refuser','Presence@refuserJ');

Route::get('present','Presence@present');

Route::get('absent','Presence@absent');

Route::get('groupes','Groupe@index');


Route::get('liste_groupes/{id}', 'GroupController@index');


Route::get('tst', function () {
        return view('EnseignantR/test');
    });

Route::get('correction/controle', function () {
    return view('EnseignantR/correction/controle');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Emplois_du_Temps/{id}', 'EmploiTemps@afficher');
Route::get('/Emplois_du_Temps_generale/{id}', 'EmploiTemps@generale');
Route::get('/ess', 'EmploiTemps@afficheress');
Route::post('empCour', 'EmploiTemps@storeCOUR');
Route::post('addSeance', 'EmploiTemps@addSeance');
Route::post('empTP', 'EmploiTemps@storeTP');
Route::post('empTD', 'EmploiTemps@storeTD');
Route::post('empMod', 'EmploiTemps@empMod');
Route::post('popEmp', 'EmploiTemps@empTab');
Route::post('groupes', 'GroupController@import');
