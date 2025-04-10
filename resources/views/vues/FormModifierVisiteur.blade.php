@extends('layouts.master')
@section('content')

    <div>
        <div class="container">
            <div class="blanc">
                <h1> {{ $title }}</h1>

            </div>
            {!!  Form::open(['route' => 'validerAdherent']) !!}
            <div class="col-md-9 well well-sm">
                <div class="form-group">
                    <label class="col-md-3 control-label">Nom :</label>
                    <div class="col-md-6">
                        <input type="hidden" name="hid_id" value="{{$adherent->id_visiteur}}"/>
                        <input type="text" name="nom" value="{{$adherent->nom_visiteur}}" />
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Prénom :</label>
                    <div class="col-md-6">
                        <input type="text" name="prenom" value="{{$adherent->prenom_visiteur}}" />
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Laboratoire :</label>
                    <div class="col-md-6">
                        <input type="text" name="laboratoire" value="{{$adherent->id_laboratoire}}" />
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Secteur :</label>
                    <div class="col-md-6">
                        <input type="text" maxlength="10" name="secteur" value="{{$adherent->id_secteur}}" />
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Adresse :</label>
                    <div class="col-md-6">
                        <input type="text" name="adresse_visiteur" value="{{$adherent->adresse_visiteur}}" />
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Code Postal :</label>
                    <div class="col-md-6">
                        <input type="number"  name="cp_visiteur" value="{{$adherent->cp_visiteur}}" />
                    </div>
                </div>
                <br>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-default btn-primary"><span
                                class="glyphicon glyphicon-ok"></span> Valider
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default btn-primary"
                                onclick="{ window.location = '{{ url('/') }}';}">
                            <span class="glyphicon glyphicon-remove"></span>Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
