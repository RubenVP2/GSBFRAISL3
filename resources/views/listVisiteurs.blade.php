@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-5">
        <div class="blanc">
            <h2>{{$titreVue or ''}}</h2>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Nom</th> 
                    <th style="width:20%">Prénom</th> 
                    <th style="width:20%">Code region</th> 
                    <th style="width:20%">Role</th>
                </tr>
            </thead>
            @foreach($info as $oneInfo)
            <tr>   
                <td> {{ $oneInfo->nom }} </td> 
                <td> {{ $oneInfo->prenom }} </td> 
                <td> {{ $oneInfo->tra_reg }} </td> 
                <td> {{ $oneInfo->tra_role }} </td>
            </tr>
            @endforeach
        </table>
    @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
    @endif
    </div>
</div>
@stop
