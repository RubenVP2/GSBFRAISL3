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
        <h2 class="bvn">Bienvenue {{Session::get('nom')}} {{Session::get('prenom')}} sur le site intranet du laboratoire GSB.</h2>
        <h3 class="bvn">Déconnectez vous à chaque fin de session. </h3>
</div>
    @stop
@endif