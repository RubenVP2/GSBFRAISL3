@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row'>

    
    <div class="col-md-12 col-sm-12 well well-md">
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
                </tr>
            </thead>
            @foreach($lesFraisHorsForfait as $unFHF)
            <tr>   
                <td> {{ $unFHF->libelle }} </td> 
                <td> {{ $unFHF->date }} </td> 
                <td> {{ $unFHF->montant }} </td>
            @endforeach
            <tr>
                <td style="text-align: right"> Montant total :</td>
                <td></td>
                <td>{{$montantTotal}}</td>
            </tr>
        </table>
        <div class='row'>
            <div class="col-md-3 col-sm-3">
                <a href="{{ url($retour)}}" ><button type="button" class="btn btn-default btn-danger" >Retour</button></a>                
            </div>           
        </div>
    </div>
</div>
</div>
@stop
