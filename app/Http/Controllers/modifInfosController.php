<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class modifInfosController extends Controller {

    /**
     * Initialise le formulaire avec les infos personnelles
     * @return vue formModifInfos
     */
    public function affFormModifInfos() {
        $erreur = "";
        $idVisiteur = Session::get('id');
        $gsbFrais = new GsbFrais();
        $info = $gsbFrais->getInfosPerso($idVisiteur);
        return view('formModifInfos', compact('info', 'erreur'));
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
    }


}