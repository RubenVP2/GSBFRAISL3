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
                    <th style="width:20%">Mois</th> 
                    <th style="width:20%">Nb justificatifs</th> 
                    <th style="width:20%">Montant valide</th> 
                    <th style="width:20%">Date de modification</th>         
                    <th style="width:20%">Détails</th>  
                </tr>
            </thead>
            @foreach($lesFrais as $unFrais)
            <tr>   
                <td> {{ $unFrais->mois }} </td> 
                <td> {{ $unFrais->nbJustificatifs }} </td> 
                <td> {{ $unFrais->montantValide }} </td> 
                <td> {{ $unFrais->dateModif }} </td> 
                <td style="text-align:center;"><a href="{{ url('/validerDetailFrais') }}/{{ $unFrais->mois }}">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
            </tr>
            @endforeach
        </table>
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
