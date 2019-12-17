@extends('layouts.master')
@section('content')
<div class="col-md-12 well well-md">
    <h2>Ajout d'un nouvel utilisateur confirmé</h2>
    <div class="alert alert-success">
        L'utilisateur a bien été crée.
    </div>
</div>
{!! Form::close() !!}
@stop