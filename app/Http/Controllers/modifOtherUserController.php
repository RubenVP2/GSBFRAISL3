<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class modifOtherUserController extends Controller {

    /**
     * Initialise le formulaire avec les infos personnelles
     * @return vue formModifInfos
     */
    public function affFormModifOtherUser($idOtherUser) {
        $erreur = "";
        $idVisiteur = Session::get('id');
        $gsbFrais = new GsbFrais();
<<<<<<< HEAD
        $info = $gsbFrais->getOtherUser($idOtherUser);
        return view('formModifOtherUser', compact('info', 'erreur'));
    }

    public function verifInfos(Request $request) {
        $this->validate($request, [
            'cp' => 'bail|required|digits:5',
            'ville' => 'bail|required|between:2,30|alpha'
        ]);
        // Récupérer les données pour mettre à jour la bdd
        $adresse = $request->input('adresse');
        $cp = $request->input('cp');
        $ville = $request->input('ville');
        $idVisiteur = Session::get('id');
        // Appel de la fonction maj pour mettre à jour la table
        $gsbFrais = new GsbFrais();
        $gsbFrais->majInfos($idVisiteur, $cp, $ville);
        // Confirmer la mise à jour
        return view('confirmModifInfos');
=======
        // Récupère les informations de l'utilisateur sélectionné
        $info = $gsbFrais->getOtherUser($idOtherUser);
        // Récupère la liste des régions dans le même secteur que l'utilisateur
        $region = $gsbFrais->getOtherUserRegion($info->tra_reg);
        // Affiche le formulaire de modification des infos
        $roleVisiteur = Session::get('role');
        if ($roleVisiteur == "Responsable") {
            return view('formModifOtherUser', compact('info', 'region', 'erreur'));
        } else {
            return redirect('/');
        }
    }

    public function verifInfos(Request $request) {
        // Récupérer les données pour mettre à jour la bdd
        $region = $request->input('region');
        $role = $request->input('role');
        $idUser = $request->input('idUser');
        // Vérifie le rôle à attribué
        if($role != "Délégué") {
            $role = "Visiteur";
        }
        // Appel de la fonction maj pour mettre à jour la table
        $gsbFrais = new GsbFrais();
        // Vérifie si une modification à déjà été faite aujourd'hui
        if( $request->input('date') == date('Y-m-d')){
            $gsbFrais->modifOtherUser($idUser, $region, $role, date('Y-m-d'));
        } else {
            $gsbFrais->modifOtherUserInsert($idUser, $region, $role);
        }
        // Confirmer la mise à jour et renvoie à la liste
        $idVisiteur = Session::get('id');
        $info = $gsbFrais->getListVisiteurs($idVisiteur);
        $ok = true;
        return view('listVisiteurs', compact('info', 'ok'));
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
    }


}