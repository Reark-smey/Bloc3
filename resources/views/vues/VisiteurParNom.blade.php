@extends('layouts.master')
@section('content')



    <div>
        <div class="container">
            <div class="blanc">
                <h1> {{ $title }}</h1>

            </div>
            {!!  Form::open(['route' => 'validerRecherche']) !!}
            <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 control-label">Nom:</label>
                <div class="col-md-6">
                    <input type="text" name="nom" class="form-control" required autofocus>
                </div>
            </div>
            </div>




            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-primary"><span
                            class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="{ window.location = '{{ url('/VisiteurParNom') }}';}">
                        <span class="glyphicon glyphicon-remove"></span>Annuler
                    </button>
                </div>
            </div>
        </div>



    </div>


@stop
