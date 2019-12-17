@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-5">
        <div class="blanc">
            <h2>{{$titreVue or ''}}</h2>
        </div>
<<<<<<< HEAD
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Nom</th> 
                    <th style="width:20%">Prénom</th> 
                    <th style="width:20%">Code region</th> 
=======
        @if(!empty($ok))
        <div class="alert alert-success">
            Les informations ont été mises à jour.
        </div>
        @endif
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Nom</th>
                    <th style="width:20%">Prénom</th>
                    <th style="width:20%">Région</th>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
                    <th style="width:20%">Role</th>
                    <th style="width:20%">Modifier</th>
                </tr>
            </thead>
            @foreach($info as $oneInfo)
<<<<<<< HEAD
            <tr>   
                <td> {{ $oneInfo->nom }} </td> 
                <td> {{ $oneInfo->prenom }} </td> 
                <td> {{ $oneInfo->tra_reg }} </td> 
=======
            <tr>
                <td> {{ $oneInfo->nom }} </td>
                <td> {{ $oneInfo->prenom }} </td>
                <td> {{ $oneInfo->reg_nom }} </td>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
                <td> {{ $oneInfo->tra_role }} </td>
                <td style="text-align:center;"><a href="{{ url('/modifOtherUser') }}/{{ $oneInfo->id }}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
            </tr>
            @endforeach
        </table>
<<<<<<< HEAD
    @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
    @endif
    </div>
</div>
@stop
=======
        @if (session('erreur'))
        <div class="alert alert-danger">
            {{ session('erreur') }}
        </div>
        @endif
    </div>
</div>
@stop
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
