<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class modifMdpController extends Controller
{
    /**
     * @author Ravaz Victor
     * Initialise le formulaire avec les infos personnelles
     */
    public function affFormModifInfos()
    {
        $erreur = "";
        $idVisiteur = Session::get('id');
        $gsbFrais = new GsbFrais();
        $info = $gsbFrais->getInfosPerso($idVisiteur);
        return view('formModifMdp', compact('info', 'erreur'));
    }

    public function verifInfos(Request $request)
    {
        $oMdp = $request->input('oMdp');
        $nMdp = $request->input('nMdp');
        $n2Mdp = $request->input('n2Mdp');


        $gsbFrais = new GsbFrais();
        $idVisiteur = Session::get('id');

        if ($nMdp == $n2Mdp) {
            $gsbFrais->modifMotDePasse($nMdp, $idVisiteur, $oMdp);
        } else {
            $erreur = "";
            $info = 1;
            return view('formModifMdp', compact('info', 'erreur'));
        }

        if ($oMdp == $nMdp) {
            $gsbFrais->modifMotDePasse($nMdp, $idVisiteur, $oMdp);
        } else {
            $erreur = "";
            $info = 2;
            return view('formModifMdp', compact('info', 'erreur'));
        }

        return view('confirmModifInfos');
    }
}
