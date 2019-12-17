@extends('layouts.master')
@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="col-md-8">
=======
    <div class="col-md-8 well">
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
        <div class="blanc">
            <h2>{{$titreVue or ''}}</h2>
        </div>
    {{-- Si rien à afficher  --}}
    @if (empty($lesFrais))
        <h5>Aucune fiche de frais à valider</h5>
    {{-- Sinon affiche le tableau --}}
    @else
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
<<<<<<< HEAD
                    <th style="width:20%">Mois</th> 
                    <th style="width:20%">Nb justificatifs</th> 
                    <th style="width:20%">Montant valide</th> 
                    <th style="width:20%">Date de modification</th>         
                    <th style="width:20%">Détails</th>  
=======
                    <th style="width:14%">Nom</th>
                    <th style="width:14%">Prénom</th>
                    <th style="width:14%">Mois</th> 
                    <th style="width:14%">Nb justificatifs</th> 
                    <th style="width:14%">Montant valide</th> 
                    <th style="width:14%">Date de modification</th>         
                    <th style="width:14%">Détails</th>  
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
                </tr>
            </thead>
            @foreach($lesFrais as $unFrais)
            <tr>   
<<<<<<< HEAD
=======
                <td> {{ $unFrais->nom }} </td> 
                <td> {{ $unFrais->prenom }} </td> 
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
                <td> {{ $unFrais->mois }} </td> 
                <td> {{ $unFrais->nbJustificatifs }} </td> 
                <td> {{ $unFrais->montantValide }} </td> 
                <td> {{ $unFrais->dateModif }} </td> 
<<<<<<< HEAD
                <td style="text-align:center;"><a href="{{ url('/validerDetailFrais') }}/{{ $unFrais->mois }}">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
=======
            <td style="text-align:center;"><a href="{{ url('/validerDetailFrais') }}/{{ $unFrais->mois }}/{{ $unFrais->idVisiteur}}">
                    <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
            </tr>
            @endforeach
        </table>
    @endif
<<<<<<< HEAD
=======
    {{-- Si pas d'erreur et maj éffectuer --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
    {{-- Si erreur --}}
    @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
    @endif
    </div>
</div>
@stop
