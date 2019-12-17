@extends('layouts.master')
@section('content')
<<<<<<< HEAD
{!! Form::open(['url' => 'modifInfos']) !!}  
<div class="col-md-12 well well-md">
    <h2>Modification des informations de {{ $info->nom }} {{ $info->prenom }}</h2>

</div>
{!! Form::close() !!}
@stop

=======
{!! Form::open(['url' => 'modifOtherUser']) !!}
<div class="col-md-12 well well-md">
    <h2>Modification des informations de {{ $info->nom }} {{ $info->prenom }}</h2>
    <input type="hidden" name="idUser" value="{{$info->id or 0}}" />
    <input type="hidden" name="date" value="{{$info->tra_date}}" />
    <div class="form-group">
        <label class="col-md-3 col-sm-3 control-label">Région : </label>
        <select class="form-control" name="region">
            @foreach($region as $oneRegion)
            @if( $info->tra_reg == $oneRegion->id )
            <option selected="selected" value="{{ $oneRegion->id }}"> {{ $oneRegion->reg_nom }} </option>
            @else
            <option value="{{ $oneRegion->id }}"> {{ $oneRegion->reg_nom }} </option>
            @endif
            @endforeach
        </select>
    </div>
    @if( $info->tra_role == "Visiteur")
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="role" value="Délégué" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">Passer l'utilisateur en tant que délégué</label>
    </div>
    @endif
  <button type="submit" class="btn btn-primary">Valider</button>
  <button type="button" class="btn btn-default btn-danger" 
                        onclick="javascript: window.location = '{{ url('/listVisiteurs')}}';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler</button>
</div>
{!! Form::close() !!}
@stop
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
