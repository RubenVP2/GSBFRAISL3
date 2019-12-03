@extends('layouts.master')
    @section('content')
<div>
    @if (Session::get('id') == '0' || Session::get('id') == null) 
        <h2 class="bvn">Bienvenue sur le site intranet du laboratoire GSB.</h2>
        <h3 class="bvn">Vous devez vous connecter pour accéder aux services de ce site et vous déconnecter à chaque fin de session. </h3>
</div>
    @stop
@else
    @section('content')
<div>
        @if (Session::get('role') == 'Responsable')
    @section('content') 
        <div>
            <h2 class="bvn">Bienvenue {{Session::get('nom')}} {{Session::get('prenom')}} sur le site intranet du laboratoire GSB.</h2>
            <h3 class="bvn">Déconnectez vous à chaque fin de session. </h3>
            <h3 class="bvn"> Vous avez le role : {{Session::get('role')}}.</h3>
            <h3>Information : Vous etes chargez d'encadrer la formation des nouveaux visiteurs, de dynamiser leurs équipes (en effectuant des analyses statistiques de réalisation d'objectifs, de pourcentage de médecins visités, d'augmentation des ventes...), de financer les soirées d'information (gestion d'un budget)</h3>
        </div>
    @stop
@elseif (Session::get('role') == 'Délégué')
@section('content') 
        <div>
            <h2 class="bvn">Bienvenue {{Session::get('nom')}} {{Session::get('prenom')}} sur le site intranet du laboratoire GSB.</h2>
            <h3 class="bvn">Déconnectez vous à chaque fin de session. </h3>
            <h3 class="bvn"> Vous avez le role : {{Session::get('role')}}.</h3>
            <h3>Information : Vous etes un visiteurs à part entière qui occupent trois quarts de leur temps professionnel à la visite médicale, mais vous avez un rôle d'intermédiaire entre les visiteurs d'une région et leur responsable de secteur. Vous disposez d'une décharge horaire pour s'occuper de l'organisation de réunions bilan mensuelles, de recueillir les problèmes rencontrés sur le terrain... Vous avez aussi un rôle administratif de contrôle des frais de déplacement de leur région afin de rester dans le budget qui leurs a été alloué.</h3>
        </div>
    @stop
    @elseif (Session::get('role') == 'Visiteur')
@section('content') 
        <div>
            <h2 class="bvn">Bienvenue {{Session::get('nom')}} {{Session::get('prenom')}} sur le site intranet du laboratoire GSB.</h2>
            <h3 class="bvn">Déconnectez vous à chaque fin de session. </h3>
            <h3 class="bvn"> Vous avez le role : {{Session::get('role')}}.</h3>
            <h3>Information : L'objectif d'une visite est d'actualiser et rafraîchir la connaissance des professionnels de santé sur les produits de l'entreprise. Vous ne faite pas de vente, mais votre interventions a un impact certain sur la prescription de la pharmacopée du laboratoire.</h3>
        </div>
    @stop
@endif
</div>
    @stop
@endif

