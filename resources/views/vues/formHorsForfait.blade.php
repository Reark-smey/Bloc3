@extends('layouts.master')
@section('content')

    {!! Form::open(['url' => 'validateHorsForfait/'.$unHorsForfait->id_fraishorsforfait]) !!}
    <div class="col-md-12  col-sm-12 well well-md">
        <h1> </h1>
        <div class="form-horizontal">
            <input type="hidden" name="id_frais" value="{{$unHorsForfait->id_frais}}"/>
            <input type="hidden" name="id_fraishorsforfait" value="{{$unHorsForfait->id_fraishorsforfait}}"/>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Période : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="text" name="date_fraishorsforfait" value="{{$unHorsForfait->date_fraishorsforfait}}" class="form-control" placeholder="AAAA-MM-JJ" required autofocus maxlength="10">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Libelle : </label>
                <div class="col-md-2  col-sm-2">
                    <input type="text" name="lib_fraishorsforfait" value="{{$unHorsForfait->lib_horsforfait}}"  class="form-control" placeholder="Nom du forfait" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Montant validé : </label>
                <div class="col-md-3 col-sm-3">
                    <input type="number" name="montant_fraishorsforfait" value="{{$unHorsForfait->montant_fraishorsforfait}}"  class="form-control" placeholder="Montant" required>



                </div>

            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = ' ';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
            @if ("{{$unHorsForfait->id_fraishorsforfait}}" > 0)
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <a href=" {{url('/getHorsForfait')}}"><button type="button" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-list"></span> Frais hors forfait</button></a>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3">
                </div>
            @endif
        </div>
    </div>
