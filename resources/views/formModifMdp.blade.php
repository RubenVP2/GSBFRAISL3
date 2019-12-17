@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'modifMdp']) !!}  
<div class="col-md-12 well well-md">
    <h2>Modification de votre mot de passe </h2>
    <div class="form-horizontal">    
        @if(is_int($info)&&$info==1)
        <h4 class="text-danger">Les nouveaux mots de passe ne correspondent pas !</h4>
        @endif
        @if(is_int($info)&&$info==2)
        <h4 class="text-danger">L'ancien mots de passe et le nouveau mot de passe sont identiques !</h4>
        @endif
       
        <div class="form-group">
            <label class="col-md-4 control-label">Votre ancien mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="oMdp" ng-model="oMdp" class="form-control" placeholder="Votre ancien mdp" required>
                @if($errors->has('oMdp'))
                <div class="alert alert-danger">
                    {{ $errors->first('oMdp') }}
                </div>
                @endif
            </div>  
        </div>   
        <div class="form-group">
            <label class="col-md-4 control-label">Votre nouveau mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="nMdp" ng-model="nMdp" class="form-control" placeholder="Votre nouveau mdp" required>
                @if($errors->has('nMdp'))
                <div class="alert alert-danger">
                    {{ $errors->first('nMdp') }}
                </div>
                @endif
            </div>  
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Verification du nouveau mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="n2Mdp" ng-model="n2Mdp" class="form-control" placeholder="Votre nouveau mdp"  required>
                @if($errors->has('n2Mdp'))
                <div class="alert alert-danger">
                    {{ $errors->first('n2Mdp') }}
                </div>
                @endif
            </div>  
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
                <a href="{{ url('/') }}" class="btn btn-default btn-danger"><span class="glyphicon glyphicon-log-in"></span> Retour</a>
            </div>
        </div>
  @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
  @endif

</div>
</div>

{!! Form::close() !!}
@stop

