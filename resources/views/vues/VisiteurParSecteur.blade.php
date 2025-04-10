@extends('layouts.master')
@section('content')


    <div>
        <div class="container">
            <div class="blanc">
                <h1> {{ $title }}</h1>

            </div>

            {!!  Form::open(['route' => 'validerRechercheSecteur']) !!}

            <div class="form-group">
                <label class="col-md-3 control-label">Secteurs :</label>
                <div class="col-md-6">
                    <select class="form-control" name="secteur">
                        <option value="0" disabled selected="selected"> Sélectionner un Secteur</option>
                        @foreach($secteur as $unSec)
                            <option value="{{$unSec->id_secteur}}" > {{$unSec->lib_secteur}} </option>

                        @endforeach
                    </select>

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


@stop
