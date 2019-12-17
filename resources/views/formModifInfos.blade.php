@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'modifInfos']) !!}  
<div class="col-md-12 well well-md">
    <h2>Modification de mes informations personnelles</h2>
    <div class="form-horizontal">    
        
        <div class="form-group">
<<<<<<< HEAD
            <label class="col-md-3 control-label">Code postal : </label>
=======
            <label class="col-md-3 control-label">code postal : </label>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
            <div class="col-md-6 col-md-3">
                 <input type="text" name="cp" ng-model="cp" class="form-control" placeholder="Votre code postal" size ="5"  value="{{ isset($errors) && count($errors) > 0 ? old('cp'): $info->cp }}" required> 
                 @if($errors->has('cp'))
                 <div class="alert alert-danger">
                     {{ $errors->first('cp') }}
                 </div>
                  @endif
                 </div> 
        </div>
        <div class="form-group">
<<<<<<< HEAD
            <label class="col-md-3 control-label">Ville : </label>
=======
            <label class="col-md-3 control-label">ville : </label>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
            <div class="col-md-6 col-md-3">
                <input type="text" name="ville" ng-model="ville" class="form-control" placeholder="Votre ville" maxlength="30" pattern ="^[a-zéèàêâùïüëA-Z][a-zéèàêâùïüëA-Z-'\s]{1,29}$" value="{{isset($errors) && count($errors) > 0 ? old('ville'): $info->ville}}" required>
                @if($errors->has('ville'))
                <div class="alert alert-danger">
                    {{ $errors->first('ville') }}
                </div>
                @endif
            </div>  
<<<<<<< HEAD
        </div> 

        <div class="form-group">
            <label class="col-md-3 control-label">Tel : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="tel" ng-model="tel" class="form-control" placeholder="Votre numéro de téléphone" maxlength="12" pattern ="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" value="{{isset($errors) && count($errors) > 0 ? old('tel'): $info->tel}}" required>
                @if($errors->has('tel'))
                <div class="alert alert-danger">
                    {{ $errors->first('tel') }}
                </div>
                @endif
            </div>  
        </div>   

<div class="form-group">
            <label class="col-md-3 control-label">Mail : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="mail" ng-model="mail" class="form-control" placeholder="Votre adresse email" maxlength="40" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}" value="{{isset($errors) && count($errors) > 0 ? old('mail'): $info->mail}}" required>
                @if($errors->has('mail'))
                <div class="alert alert-danger">
                    {{ $errors->first('mail') }}
                </div>
                @endif
            </div>  
        </div>   


  

        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <a class="btn btn-default btn-danger" href="{{ url('/') }}"><span ></span>Annuler</a>
=======
        </div>   
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
                <a href="{{ url('/') }}" class="btn btn-default btn-danger"><span class="glyphicon glyphicon-log-in"></span> Retour</a>
>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
            </div>
        </div>
  @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
  @endif
<<<<<<< HEAD
    </div>
</div>
=======

</div>
</div>

>>>>>>> 8aede1283be9efcaa9a743b407dd232867105c84
{!! Form::close() !!}
@stop

