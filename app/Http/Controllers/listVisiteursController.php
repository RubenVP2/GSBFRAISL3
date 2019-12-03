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
    public function listVisiteurs() {
        $erreur = "";
        $gsbFrais = new GsbFrais();
        $info = $gsbFrais->getListVisiteurs();
        return view('FormModifInfos', compact('info', 'erreur'));
    }


}