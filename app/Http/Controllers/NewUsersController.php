<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class NewUsersController extends Controller {

    /**
     * Initialise le formulaire avec les infos personnelles
     * @return vue formModifInfos
     */
    public function affFormModifInfos() {
        $gsbfrais = new GsbFrais();
        $mdp = $gsbfrais->NewMdp(6);
        $result = $gsbfrais->AffichageRegion();
        $result2 = $gsbfrais->AffichageRole();
        $erreur = "";
        return view('formNewVisiteurs', compact( 'result', 'mdp','result2',  'erreur'));
    }

    public function verifInfos(Request $request) {

        // Récupérer les données pour uinsere des données dans la bdd

        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $mdp = $request->input('mdp');
        $reg_nom =  $request->input('reg_nom') ;
        $tra_role = $request->input('tra_role');
        $login = strtoupper($prenom[0] , $nom);
        $ville = $request->input('ville');
        $adresse = $request->input('adresse');
        $cp = $request->input('cp');
        $dateEmbauche = $request->input('dateEmbauche');
        $mail = $request->input('mail');
        $tel = $request->input('tel');
        
        $id = $request->input('id');
        $logina = $prenom[0] . $nom;
        Session::put ('login',$logina);




        // Appel de la fonction maj pour mettre à jour la table avec le nouvel utilisateurs
        $gsbFrais = new GsbFrais();
        $gsbFrais->addUsers($id,$nom,$prenom,$mdp,$login,$adresse,$cp,$dateEmbauche,$mail,$tel);
        $gsbFrais->addTravail($id,now(),$reg_nom,$tra_role);
        // Confirmer la mise à jour
        return view('confirmModifInfos');
    }

}