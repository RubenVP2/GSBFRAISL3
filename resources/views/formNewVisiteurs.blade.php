@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'newVisiteur']) !!}  
<div class="col-md-12 well well-md">
    <h2>Ajout d'un nouvel utilisateurs </h2>
    <div class="form-horizontal"> 
    
    <div class="form-group">
            <label class="col-md-3 control-label">Id : </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="id" ng-model="id" class="form-control" placeholder="Votre ID" size ="4"  value="" required> Ce dernier doit contenir une lettre et maximum deux chiffres , comme par exemple : 'f45'
                 @if($errors->has('id'))
                 <div class="alert alert-danger">
                     {{ $errors->first('id') }}
                 </div>

                  @endif
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-3 control-label">Nom: </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="nom" ng-model="nom" class="form-control" placeholder="Votre nom" size ="10"  value="" required> 
                 @if($errors->has('nom'))
                 <div class="alert alert-danger">
                     {{ $errors->first('nom') }}
                 </div>
                  @endif
                 </div> 
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Prénom : </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="prenom" ng-model="prenom" class="form-control" placeholder="Votre prenom" size ="10"  value="" required> 
                 @if($errors->has('prenom'))
                 <div class="alert alert-danger">
                     {{ $errors->first('prenom') }}
                 </div>
                  @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mot de passe : </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="mdp" ng-model="mdp" class="form-control" required value={{$mdp}} readonly> 
                 @if($errors->has('mdp'))
                 <div class="alert alert-danger">
                     {{ $errors->first('mdp') }}
                 </div>
                  @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse : </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="adresse" ng-model="adresse" class="form-control" placeholder="Votre adresse" size ="40"  value="" required> 
                 @if($errors->has('adresse'))
                 <div class="alert alert-danger">
                     {{ $errors->first('adresse') }}
                 </div>
                  @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">CP : </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="cp" ng-model="cp" class="form-control" placeholder="Votre code postal" size ="5"  value="" required> 
                 @if($errors->has('cp'))
                 <div class="alert alert-danger">
                     {{ $errors->first('cp') }}
                 </div>
                  @endif
            </div>
        </div> 
        <div class="form-group">
            <label class="col-md-3 control-label">Date d'embauche : </label>
            <div class="col-md-6 col-md-3">
                 <input type="date" name="date" ng-model="date" class="form-control" placeholder="Votre date d'embauche" size ="9"  value="" required> 
                 @if($errors->has('date'))
                 <div class="alert alert-danger">
                     {{ $errors->first('date') }}
                 </div>
                  @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Votre adresse email : </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="mail" ng-model="mail" class="form-control"placeholder="Votre adresse email" maxlength="40" pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}"   value="" required> 
                 @if($errors->has('mail'))
                 <div class="alert alert-danger">
                     {{ $errors->first('mail') }}
                 </div>
                  @endif
            </div>
        </div><div class="form-group">
            <label class="col-md-3 control-label">Votre numéro de téléphone : </label>
            <div class="col-md-6 col-md-3">
                 <input type="text" name="tel" ng-model="tel" class="form-controlaction" placeholder="Votre numéro de téléphone" maxlength="12" pattern ="^(?:0|\(?\+33\)?\s?|0033\s?)[1- 79](?:[\.\-\s]?\d\d){4}$" value="" required> 
                 @if($errors->has('tel'))
                 <div class="alert alert-danger">
                     {{ $errors->first('tel') }}
                 </div>
                  @endif
            </div>
        </div> 
        
                </div><div class="form-group">
            <label class="col-md-3 control-label">Votre région de travail:</label>
            <div class="col-md-6 col-md-3">
                        <select name="tra_reg">
                        @foreach($result as $oneResult)
                            <option value="{{ $oneResult->reg_nom }}" >{{ $oneResult->reg_nom }}</option>
                        @endforeach
                       </select>
            </div>
        </div> 

           </div><div class="form-group">
            <label class="col-md-3 control-label">Votre rôle de travail :</label>
            <div class="col-md-6 col-md-3">
                        <select name="tra_role">
                        @foreach($result2 as $oneResult)
                            <option value="{{ $oneResult->tra_role }}" >{{ $oneResult->tra_role }}</option>
                        @endforeach
                       </select>
            </div>
        </div> 





        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
                <a class="btn btn-default btn-danger" href="{{ url('/') }}"><span ></span>Annuler</a>
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

