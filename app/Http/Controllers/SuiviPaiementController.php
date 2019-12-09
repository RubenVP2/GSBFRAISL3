<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class SuiviPaiementController extends Controller {

    /**
     * @author Ruben Veloso Paulos
     * Affiche sous forme d'un tableau la liste des fiches frais à état validée ou remboursée
     * @return type Vue listeFrais
     */

    public function listFrais() {
        // Nouvel objet GsbFrais
        $frais = new GsbFrais();
        // Affectation des variables Session
        $idVisiteur = Session::get('id');
        $role = Session::get('role');
        // Appel de la fonction 
        $lesFrais = $frais->getLesFichesFraisValidee($idVisiteur, $role);
        // On affiche la liste de ces frais pour le délégué ou repsonsable
        if ($role == 'Délégué') {
            $titreVue = "Liste des fiches pour les visiteurs de la région";
        } else {
            $titreVue = "Liste des fiches pour les délégués";
        }
        return view('listeFraisVR', compact('lesFrais', 'titreVue'));
    }

    /**
     * @author Ruben Veloso Paulos
     * Affiche le détail des fiches
     */
    public function DetailFrais($mois) {
        $gsbFrais = new GsbFrais();
        $idVisiteur = Session::get('id');
        $lesFraisForfait = $gsbFrais->getLesFraisForfait($idVisiteur, $mois);
        $lesFraisHorsForfait = $gsbFrais->getLesFraisHorsForfait($idVisiteur, $mois);
        $montantTotal = 0;
        foreach ($lesFraisHorsForfait as $fhf){
            $montantTotal = $montantTotal + $fhf->montant;
        }
        $titreVue = "Détail de la fiche de frais du mois ".$mois;
        $retour = "/suiviPaiement";
        return view('listeDetailFicheVR', compact('lesFraisForfait', 'lesFraisHorsForfait', 'mois', 'titreVue','montantTotal', 'retour'));
    }


}