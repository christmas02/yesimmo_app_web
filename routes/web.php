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
Route::get('/', function () {
    return view('welcome');
});

*/


Route::get('/','TemplateController@index')->name('acceuil');

Route::get('/email','AdminContrller@email');

Route::get('/description/appartement/{id}/{type}/{lien}','TemplateController@showAppartement');

Route::get('/description/appartement/location/{id}/{type}/{lien}','TemplateController@showAppartementlocation');

Route::get('/inscription','TemplateController@inscription');

Route::get('/mot_de_passe_oublier','TemplateController@password');

Route::post('/save/revervation/appartement','TemplateController@reserveAppartement');

Route::get('/connexion','TemplateController@connexion');

Route::get('/password','TemplateController@password');

Route::get('/compte/user', 'TemplateController@compteUser');

Route::get('/appartements', 'TemplateController@Appartement');

Route::get('/residences', 'TemplateController@Residence');

Route::get('/bons/coins', 'TemplateController@Boncoins');

Route::post('/recherche/appartement','TemplateController@serchAppart');

Route::post('modification/motPasse','Auth\ForgotPasswordController@forgetPassword');
Route::get('/nouveau_mot_de_passe/{id}/{token}', 'Auth\ForgotPasswordController@newPassword');
Route::post('/savePassword', 'Auth\ForgotPasswordController@saveNewpassword');


//Controller Panier 
Route::resource('cart', 'CartController');

Auth::routes();

Route::get('/home', 'TemplateController@index')->name('home');



Route::group(['middleware' => 'admin'], function()
{
	Route::get('/espace/admin','AdminContrller@index')->name('espace.superadmin');

    Route::get('/add/residence','AdminContrller@addResidence');
    Route::get('/list/residence','AdminContrller@listResidence');
    Route::post('/save/residence','AdminContrller@saveResidence');
    Route::get('/detail/appartement/{id}','AdminContrller@showResidence');
    Route::post('/update/gallerie','AdminContrller@updadeGallerie');
    Route::post('/update/poste','AdminContrller@updadePoste');
    Route::get('/desactiver/appartement/{id}','AdminContrller@desactiverResidence');
    Route::get('/activer/appartement/{id}','AdminContrller@activerResidence');

    Route::get('/add/appartement','AdminContrller@addAppartement');
    Route::get('/list/appartement','AdminContrller@listAppartement');
    Route::post('/save/appartement','AdminContrller@saveAppartement')->name('saveAppartement');
    //Route::get('/details/appartement/{id}','AppartementController@showAppartement');
    Route::post('/update/gallerie/appart','AppartementController@updadeGallerie');
    Route::post('/update/poste/appart','AppartementController@updadePoste');


    Route::get('/list/agent','AdminContrller@listAgent');
    Route::get('/add/agent','AdminContrller@addAgent');
    Route::post('/save/agent','AdminContrller@saveAgent');

    Route::get('/liste/reservation','AdminContrller@getReservation');

    Route::get('/detail/agent/{id}','AdminContrller@showAgent');


////////////==========================================================///////////////////
  
    
});

Route::get('/desact/appartement/{id}','AppartementController@desactiverAppartement');
Route::get('/activ/appartement/{id}','AppartementController@activerAppartement');


Route::get('/espace/agent','AgentController@index')->name('espace.agent');
Route::get('/agent/list/appartement','AgentController@listAppartement');
Route::get('/poste/residence','AgentController@addResidence');
Route::get('/liste/residence','AgentController@listResidence');
Route::post('/save/appartement/agent','AgentController@saveAppartement');
Route::post('/save/gallerie','AgentController@addGaleri');
Route::post('/update/image','AgentController@updateImage');
Route::get('/detail/residence/{id}','AgentController@showResidence');
Route::post('/delet/image','AgentController@deletImage');
Route::post('/updade/img/profile','AgentController@updateImgProfile');
Route::post('/rapport/reservation','AgentController@rapportReservation');




Route::get('/agent/details/appartement/{id}','AgentController@showAppartement');
Route::get('/agent/add/appartement','AgentController@addAppartement');
Route::post('/agent/save/appartement','AgentController@saveAppartement');
Route::post('/update/poste/residence','AppartementController@updadePoste');
Route::get('/agent/reservation','AgentController@getReservation');

Route::get('/confirm/{id}/{token}','Auth\RegisterController@confirm')->name('confirm');

Route::post('/save/profil','UserController@saveProfil');
//Route::post('/save/password','UserController@savePassword');




