@extends('layouts.master')
@section('content')


    <div>
        <div class="container">
            <div class="blanc">
                <h1> {{ $title }}</h1>

            </div>

            {!!  Form::open(['route' => 'validerrealiser']) !!}
            <div class="col-md-12  col-sm-12 well well-md">

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Activité:</label>
                        <div class="col-md-6">
                            <select class="form-control" name="activite">
                                <option value="0" disabled selected="selected"> Sélectionner une activité</option>
                                @foreach($activite as $unAct)
                                    <option value="{{$unAct->id_activite_compl}}" > {{$unAct->theme_activite}} </option>

                                @endforeach
                            </select>

                        </div>
                    </div>


                    <br>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Visiteur : </label>
                        <div class="col-md-6">
                            <select class="form-control" name="visiteur"  >
                                @foreach($visiteur as $unVis)
                                    <option value="{{$unVis->id_visiteur}}"  selected="selected"> {{$unVis->nom_visiteur}} {{$unVis->prenom_visiteur}} </option>

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

        </div>
    </div>


@stop
