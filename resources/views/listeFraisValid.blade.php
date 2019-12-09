@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-8">
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
                    <th style="width:14%">Nom</th>
                    <th style="width:14%">Prénom</th>
                    <th style="width:14%">Mois</th> 
                    <th style="width:14%">Nb justificatifs</th> 
                    <th style="width:14%">Montant valide</th> 
                    <th style="width:14%">Date de modification</th>         
                    <th style="width:14%">Détails</th>  
                </tr>
            </thead>
            @foreach($lesFrais as $unFrais)
            <tr>   
                <td> {{ $unFrais->nom }} </td> 
                <td> {{ $unFrais->prenom }} </td> 
                <td> {{ $unFrais->mois }} </td> 
                <td> {{ $unFrais->nbJustificatifs }} </td> 
                <td> {{ $unFrais->montantValide }} </td> 
                <td> {{ $unFrais->dateModif }} </td> 
            <td style="text-align:center;"><a href="{{ url('/validerDetailFrais') }}/{{ $unFrais->mois }}/{{ $unFrais->idVisiteur}}">
                    <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
            </tr>
            @endforeach
        </table>
    @endif
    {{-- Si pas d'erreur et maj éffectuer --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{-- Si erreur --}}
    @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
    @endif
    </div>
</div>
@stop
