<?php
//comm
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
    return view('home');
});


// Afficher le formulaire d'authentification 
//Route::get('/getLogin', 'ConnexionController@getLogin');
Route::get('/getLogin', function () {
   return view ('formLogin');
});
// Authentifie le visiteur à partir du login et mdp saisis
Route::post('/login', 'ConnexionController@logIn');

// Déloguer le visiteur
Route::get('/Logout', 'ConnexionController@logOut');

//saisirFrais
Route::get('/saisirFraisForfait', 'FraisForfaitController@saisirFraisForfait');

//saisirFrais
Route::post('/saisirFraisForfait', 'FraisForfaitController@validerFraisForfait');

// Afficher la liste des fiches de Frais du visiteur connecté
Route::get('/getListeFrais', 'VoirFraisController@getFraisVisiteur');

// Afficher le détail de la fiche de frais pour le mois sélectionné
Route::get('/voirDetailFrais/{mois}', 'VoirFraisController@voirDetailFrais');

// Afficher la liste des frais hors forfait d'une fiche de Frais
Route::get('/getListeFraisHorsForfait/{mois}', 'FraisHorsForfaitController@getFraisHorsForfait');

// Afficher le formulaire d'un Frais Hors Forfait pour une modification
Route::get('/modifierFraisHorsForfait/{idFrais}', 'FraisHorsForfaitController@modifierFraisHorsForfait');

// Afficher le formulaire d'un Frais Hors Forfait pour un ajout
Route::get('/ajouterFraisHorsForfait/{mois}', 'FraisHorsForfaitController@saisirFraisHorsForfait');

// Enregistrer une modification ou un ajout d'un Frais Hors Forfait
Route::post('/validerFraisHorsForfait', 'FraisHorsForfaitController@validerFraisHorsForfait');

// Supprimer un Frais Hors Forfait
Route::get('/supprimerFraisHorsForfait/{idFrais}', 'FraisHorsForfaitController@supprimmerFraisHorsForfait');

// Modifier Infos
Route::get('/modifInfos', 'modifInfosController@affFormModifInfos');

// Modifier Infos
Route::post('/modifInfos', 'modifInfosController@verifInfos');

// Liste les utilisateurs du même secteur que le responsable
Route::get('/listVisiteurs', 'listVisiteursController@listVisiteurs');

// Le responsable modifi les infos d'un utilisateur de son secteur
Route::get('/modifOtherUser/{idOtherUser}', 'modifOtherUserController@affFormModifOtherUser');

Route::post('/modifOtherUser', 'modifOtherUserController@verifInfos');

/**
 * @author Chikh Nawfel
 * Ajout Visiteur
*/


 // Ajouter Visiteur
 Route::get('/newVisiteur', 'NewUsersController@affFormModifInfos');


 /**
 * @author Chikh Nawfel
 * Ajout Visiteur
*/


 // Ajouter un Visiteur
 Route::post('/newVisiteur', 'NewUsersController@verifInfos');
 
 

/**
 * @author Ruben Veloso Paulos
 * Valider Frais
*/
Route::get('/validFrais', 'ValidFraisController@listFrais');

/**
 * @author Ruben Veloso Paulos
 * Affiche la page Valider Frais avec un msg de confirmation si validation effectué
*/
Route::post('/validFrais', 'ValidFraisController@validerFicheFrais');

/**
 * @author Ruben Veloso Paulos
 * Voir detail pour valider frais
*/
Route::get('/validerDetailFrais/{mois}/{id}', 'ValidFraisController@voirDetailFrais');

/**
 * @author Ruben Veloso Paulos
 * Suppression des frais hors forfait
*/
Route::get('/supprimerFraisHorsForfait/{idFraisH}', 'ValidFraisController@supprimerFraisHorsForfait');

/**
 * @author Ruben Veloso Paulos
 * Liste des fiches de frais pour le suivi du paiement
*/
Route::get('/suiviPaiement', 'SuiviPaiementController@listFrais');

/**
 * @author Ruben Veloso Paulos
 * Détail des fiches de frais Validée et Remboursée
*/
Route::get('/suiviPaiement/Detail/{mois}', 'SuiviPaiementController@DetailFrais');

// Retourner à une vue dont on passe le nom en paramètre
Route::get('getRetour/{retour}', function($retour){
    return redirect("/".$retour);
});

// Modifier MDP
Route::get('/modifMdp', 'modifMdpController@affFormModifInfos');

// Modifier MDP
Route::post('/modifMdp', 'modifMdpController@verifInfos');    
