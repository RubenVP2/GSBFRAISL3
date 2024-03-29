<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class ValidFraisController extends Controller {

    /**
     * @author Ruben Veloso Paulos
     * Affiche sous forme d'un tableau la liste des fiches frais
     * @return type Vue listeFrais
     */

    public function listFrais() {
        // Nouvel objet GsbFrais
        $frais = new GsbFrais();
        // Affectation des variables Session
        $idVisiteur = Session::get('id');
        $role = Session::get('role');
        // Appel de la fonction 
        $lesFrais = $frais->getLesFichesFraisVisiteur($idVisiteur, $role);
        // On affiche la liste de ces frais pour le délégué ou repsonsable
        if ($role == 'Délégué') {
            $titreVue = "Liste des fiches clôturées pour les visiteurs";
        } else {
            $titreVue = "Liste des fiches clôturées pour les délégués";
        }
             
        return view('listeFraisValid', compact('lesFrais', 'titreVue'));
    }

    /**
     * @author Ruben Veloso Paulos
     * Affiche le détail (frais forfait et hors forfait)
     * @return type Vue detailFrais
     */ 
  public function voirDetailFrais($mois, $id){
        $gsbFrais = new GsbFrais();
        $idVisiteur = Session::get('id');
        $lesFraisForfait = $gsbFrais->getLesFraisForfait($idVisiteur, $mois);
        $lesFraisHorsForfait = $gsbFrais->getLesFraisHorsForfait($idVisiteur, $mois);
        $montantTotal = 0;
        foreach ($lesFraisHorsForfait as $fhf){
            $montantTotal = $montantTotal + $fhf->montant;
        }
        $titreVue = "Détail de la fiche de frais du mois ".$mois;
        $retour = "/validFrais";
        return view('listeDetailFicheValid', compact('lesFraisForfait', 'id', 'lesFraisHorsForfait', 'mois', 'titreVue','montantTotal', 'retour'));
    }

    /**
     * @author Ruben Veloso Paulos
     * Valide la fiche frais change donc le statut en bdd
     * @return type route /validFrais
     */

    public function validerFicheFrais(Request $request) { 
        $etat = 'VA';
        $gsbFrais = new GsbFrais();
        $mois = $request->input('mois');
        $idVisiteur = $request->input('id');
        $gsbFrais->majEtatFicheFrais($idVisiteur, $mois, $etat);
// Retourne à la liste des fiches cloturées 
        return redirect('/validFrais')->with('status', 'Mise à jour effectuée!');

    }

    /**
     * @author Ruben Veloso Paulos 
     * Supprime une ligne de frais hors forfait
     * @param $fraisHorsForfait Récupère l'id fraishorsforfait 
     */
    public function supprimerFraisHorsForfait($fraisHorsForfait) {
        $gsbFrais = new GsbFrais();
        $gsbFrais->supprimerFraisHorsForfait($fraisHorsForfait);
    }


}