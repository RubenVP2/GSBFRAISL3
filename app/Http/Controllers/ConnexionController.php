<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;
class ConnexionController extends Controller
{
    /**
     * Authentifie le visiteur 
     * @param $request : objet request avec login et mdp
     * @return type Vue formLogin ou home
     */
    public function logIn(Request $request) {
        $login = $request->input('login');
        $pwd = $request->input('pwd'); 
        $gsbFrais = new GsbFrais();
        $res = $gsbFrais->getInfosVisiteur($login,$pwd);
        if(empty($res)){
            Session::put('id', '0');
            $erreur = "Login ou mot de passe inconnu !";
            //Session::flash('erreur', $erreur);
            // return back()->withInput($request->except('pwd'));
             return back()->with('erreur', $erreur);
        }
        else{
            $visiteur = $res[0];
            $id = $visiteur->id;
            $nom =  $visiteur->nom;
            $prenom = $visiteur->prenom;
            $role = $gsbFrais->getVisiteurRole($id);
            $region = $gsbFrais->getVisiteurRegion($id);
            Session::put('id', $id);
            Session::put('nom', $nom);
            Session::put('prenom', $prenom);
            Session::put('role', $role->role);
            Session::put('region', $region->region);
//            return view('home');
            return redirect('/');
        }
    }
    
    /**
     * Déconnecte le visiteur authentifié
     * @return type Vue home
     */
    public function logOut(){
        Session::put('id', '0');
//        Session::forget('id');
        return view('home');
    }
}
