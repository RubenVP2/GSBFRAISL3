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
        }

        return view('confirmModifInfos');
    }
}
