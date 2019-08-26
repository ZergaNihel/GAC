<?php
use App\User;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Route::get('/bar', function () {
    return view('barview');
});

 Route::get('error_500', 'SemestreController@index');

 //------------------------Etudiants----------------------
 Route::get('/dates/{id}/', 'EtudiantController@dates') ;
 Route::get('/absences_Etudiant', 'EtudiantController@index') ;
 Route::get('/absences_Etudiant/details/{id}', 'EtudiantController@details') ;
 Route::post('/add_justif', 'EtudiantController@add_justif') ;
 Route::post('/edit_justif', 'EtudiantController@modifier') ;

 Route::get('/Etudiant/notes', 'EtudiantController@notes') ;
 //------------------ MailBoxe ----------------------------
Route::get('/boite_de_reception', 'MailBoxController@index') ;
Route::get('/envoye', 'MailBoxController@envoye') ;
Route::get('/brouillons', 'MailBoxController@brouillons') ;
Route::get('/corbeille', 'MailBoxController@corbeille') ;

Route::get('/delete_msg/{id}/{id_notif}', 'MailBoxController@delete') ;
Route::post('/save_mail', 'MailBoxController@enregistrer') ;
Route::get('/form_mail', 'MailBoxController@composer') ;
Route::get('/emails/view/{id}/{id_notif}', 'MailBoxController@detail') ;
Route::post('send_email', 'MailBoxController@send');
Route::post('multifileupload', 'MailBoxController@store')->name('multifileupload');
 //------------------ SemestreController ----------------------------

 Route::get('Semestres/dashboard/{id}','SemestreController@dash');
 Route::get('new_sem', 'SemestreController@new_sem');
 Route::get('statdash/{id}', 'SemestreController@graphe1');
 Route::post('addSem', 'SemestreController@store');
 Route::get('Semestres/index', 'SemestreController@index');
 Route::get('Semestres/historique', 'SemestreController@historique');
 Route::get('Semestres/historique/{id}', 'SemestreController@histoDet');
 Route::get('Semestres/historique/Groupes/{id}', 'SemestreController@GrpDet');
  Route::get('archiver/{id}', 'SemestreController@archiver');
 Route::get('admin/parametre', 'ParametresController@index');

 Route::post('param', 'ParametresController@store');
 Route::post('EditParam', 'ParametresController@edit');
//------------------ EnseignantController ----------------------------
  Route::get('Enseignants/index', 'EnseignantController@index');
  Route::get('random_pwd', 'EnseignantController@rand');
  Route::post('addEnsExcel', 'EnseignantController@storeEns');
 Route::post('DeleteEns', 'EnseignantController@delete');
 Route::post('addEns', 'EnseignantController@store');
 //------------------ ModuleController ----------------------------
 Route::get('modules/index', 'ModuleController@index');
 Route::get('DeleteModule/{id}/', 'ModuleController@delete');
 Route::post('addModule', 'ModuleController@store');
 Route::post('EditModule', 'ModuleController@edit');
 Route::get('modules/details/{id}','ModuleController@details');
 Route::get('modules/pdf/{id}/{sc}', 'ModuleController@details_pdf');
 
 //------------------ GroupController ----------------------------
Route::get('statGroupe/{id}/','GroupController@statistique');
Route::post('EditGroupes','GroupController@edit');
Route::post('DeleteGroupes','GroupController@delete');
 Route::get('groupe/detail/{id}/{idSem}','GroupController@groupe');
 Route::get('groupe/index1/{id}','GroupController@index1');
  Route::get('supprime_etudiant/{id}','GroupController@destroy');
 Route::post('NouveauEtudiant','GroupController@new_student');
Route::get('liste_groupes/{id}', 'GroupController@index');
Route::get('edit_Student/{id}', 'GroupController@editStud');
Route::post('groupes', 'GroupController@import');
Route::post('update_student', 'GroupController@update_student');

//------------------UserController ----------------------------
Route::get('membre/{id}/details','UserController@details');
Route::get('membre/{id}/edite','UserController@edit');
Route::put('membre/{id}','UserController@update');
Route::get('membreE/{id}/details','UserEController@details');
Route::get('membreE/{id}/edite','UserEController@edit');
Route::put('membreE/{id}','UserEController@update');

//------------------ Presence ----------------------------

Route::get('semestre/choix','Presence@semestre');

Route::get('presence/{id}','Presence@index');

Route::post('presence/liste','Presence@lister');

Route::get('justifications/{id}','Presence@justification');

Route::post('justifications/accepter','Presence@accepterJ');

Route::post('justifications/refuser','Presence@refuserJ');

Route::get('present','Presence@present');

Route::get('absent','Presence@absent');

Route::get('exclus/{id}','Presence@listeExclus');

Route::get('exclure/etudiant','Presence@exclure');

Route::get('historique/{d}/{m}/{y}/{idh}/{id}','Presence@historique');

Route::get('enseignant/groupes/{id}','Groupes@index');

Route::get('enseignant/statGroupe/{id}/','Groupes@statistique');

Route::get('correction/choix/{id}', 'CorrectionCopies@index');

Route::get('choix/module', 'CorrectionCopies@module');

Route::get('choix/paquet', 'CorrectionCopies@paquet');

Route::post('corriger', 'CorrectionCopies@corriger');

Route::post('valider/correction', 'CorrectionCopies@valider');

Route::get('attribuer/note', 'CorrectionCopies@noter');

Route::get('gestion/paquet/controle/{id}', 'CorrectionCopies@GstpaquetCtrl');

Route::get('date/limite/controle', 'CorrectionCopies@datelimite');

Route::post('sujet/controle', 'CorrectionCopies@sujet');

Route::post('corrige/controle', 'CorrectionCopies@corrige');

Route::get('gestion/paquet/examen/{id}', 'CorrectionCopies@GstpaquetExm');

Route::get('attribuer/correcteur', 'CorrectionCopies@correcteur');

Route::get('gestion/correction/choix/{id}', 'GestionCorrection@index');

Route::get('gestion/choix/paquet', 'GestionCorrection@paquet');

Route::post('gestion/notes', 'GestionCorrection@lister');

Route::get('choix/ecart', 'GestionCorrection@ecart');

Route::get('attribuer/note/finale', 'GestionCorrection@noter');

Route::get('choix/formule', 'GestionCorrection@formule');

Route::post('decoder/paquet', 'GestionCorrection@decoder');

Route::get('notes/{id}', 'Deliberation@index');

Route::get('notes/{id}/{p}', 'Deliberation@detail');

Route::get('anonymat/paquets','Anonymat@index');

Route::get('anonymat/paquets/liste','Anonymat@lister');

Route::post('/anonymat/import', 'Anonymat@import');

Route::get('anonymat/paquet/details/{id}','Anonymat@details');

Route::get('/supprimer/paquet','Anonymat@delete');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('/', 'HomeController@index')->name('home');*/
//------------------ Emploi_du_temps ----------------------------
Route::get('/Emplois_du_Temps/{id}', 'EmploiTemps@afficher');
Route::get('/Emplois_du_Temps_generale/{id}', 'EmploiTemps@generale');
Route::post('empCour', 'EmploiTemps@storeCOUR');
Route::post('addSeance', 'EmploiTemps@addSeance');
Route::post('empGenerale', 'EmploiTemps@empGen');
Route::post('empTP', 'EmploiTemps@storeTP');
Route::post('empTD', 'EmploiTemps@storeTD');
Route::post('empMod', 'EmploiTemps@empMod');
Route::post('popEmp', 'EmploiTemps@empTab');
Route::post('DeleteSea', 'EmploiTemps@destroy');
//------------------------CompteEtudiant----------------------
Route::get('/comptes_etudiants','CompteEtudiant@index');

//--------------------------------------------------------------

/*Route::get('ajax-crud-list', 'GroupController@index1');
 Route::post('ajax-crud-list/store', 'GroupController@store');
 Route::get('ajax-crud-list/delete/{id}', 'GroupController@destroy');*/