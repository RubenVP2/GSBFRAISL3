<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class listVisiteursController extends Controller {

    /**
     * Initialise le formulaire avec les infos personnelles
     * @return vue listVisiteur
     */
    public function listVisiteurs() {
        $erreur = "";
        $idVisiteur = Session::get('id');
        $gsbFrais = new GsbFrais();
        $info = $gsbFrais->getListVisiteurs($idVisiteur);
        return view('listVisiteurs', compact('info', 'erreur'));
    }


}