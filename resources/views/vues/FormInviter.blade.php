@extends('layouts.master')
@section('content')


    <div>
        <div class="container">
            <div class="blanc">
                <h1> {{ $title }}</h1>

            </div>

            {!!  Form::open(['route' => 'validerInviter']) !!}

            <div class="form-group">
                <label class="col-md-3 control-label">Golf:</label>
                <div class="col-md-6">
                    <select class="form-control" name="activite">
                        <option value="0" disabled selected="selected"> Sélectionner une activité</option>
                        @foreach($invitation as $unInv)
                            <option value="{{$unInv->id_activite_compl}}" > {{$unLab->theme_activite}} </option>

                        @endforeach
                    </select>

                </div>
            </div>

            <br>

            <div class="form-group">
                <label class="col-md-3 control-label">Golf:</label>
                <div class="col-md-6">
                    <select class="form-control" name="praticien">
                        <option value="0" disabled selected="selected"> Sélectionner un praticien</option>
                        @foreach($invitation as $unInv)
                            <option value="{{$unInv->id_praticien}}" > {{$unInv->nom_praticien}} {{$unInv->prenom_praticien}} </option>

                        @endforeach
                    </select>

                </div>
            </div>


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


@stop
