@extends('layouts.master')
@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="col-md-8 col-sm-8">
=======
    <div class="row">
    <div class="col-md-12 col-sm-12 well">
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
        <div class="blanc">
            <h2>{{$titreVue or ''}}</h2>
        </div>
        <h3>Liste des frais forfait</h3>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>id</th> 
                    <th>Quantité</th>  
                </tr>
            </thead>
            @foreach($lesFraisForfait as $unFF)
            <tr>   
                <td> {{ $unFF->idfrais }} </td> 
                <td> {{ $unFF->quantite }} </td> 
            </tr>
            @endforeach
        </table>
        <h3>Liste des frais hors forfait</h3>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>Libellé</th> 
                    <th>Date</th> 
                    <th>Montant</th>  
<<<<<<< HEAD
=======
                    <th>Supprimer</th>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
                </tr>
            </thead>
            @foreach($lesFraisHorsForfait as $unFHF)
            <tr>   
                <td> {{ $unFHF->libelle }} </td> 
                <td> {{ $unFHF->date }} </td> 
<<<<<<< HEAD
                <td> {{ $unFHF->montant }} </td>                 
=======
                <td> {{ $unFHF->montant }} </td>
            <td style="text-align:center;">
                {{-- Demande confirmation à l'utilisateur  --}}
                <a onclick="return confirm('Êtes-vous sûr ?');" href="{{ url('/supprimerFraisHorsForfait') }}/{{$unFHF->id }}">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Suppression"></span></a></td>                
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
            </tr>
            @endforeach
            <tr>
                <td style="text-align: right"> Montant total :</td>
<<<<<<< HEAD
                <td>{{$montantTotal}}</td>
            </tr>
        </table>
        <div class="row">
                <div class="col-md-2 col-sm-2">
                        <a href="{{ url('')}}" ><button type="button" class="btn btn-default btn-success" >Valider la fiche</button></a>                
                    </div>
            <div class="col-md-3 col-sm-3">
                <a href="{{ url($retour)}}" ><button type="button" class="btn btn-default btn-danger" >Retour</button></a>                
            </div>           
        </div>  
        @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
  @endif
=======
                <td></td>
                <td>{{$montantTotal}}</td>
            </tr>
        </table>
{!! Form::open(array('url' => '/validFrais')) !!}
        <div class="row">
            <div class="col-md-2 col-sm-2">
            <input type="hidden" name="mois" value="{{ $mois }}">
            <input type="hidden" name="id" value="{{ $id }}">
               <button type="submit" class="btn btn-default btn-success" >Valider la fiche</button>        
            </div>
{!! Form::close() !!}

            <div class="col-md-3 col-sm-3">
                <a href="{{ url($retour)}}" ><button type="button" class="btn btn-default btn-danger" >Retour</button></a>                
            </div>           
        </div>
    </div>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
    </div>
</div>
@stop
