@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'modifInfos']) !!}  
<div class="col-md-12 well well-md">
    <h2>Modification des informations de {{ $info->nom }} {{ $info->prenom }}</h2>

</div>
{!! Form::close() !!}
@stop

