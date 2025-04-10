@extends('layouts.master')
@section('content')
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <div>
        <div class="container">
            <div class="blanc">
                <h1> {{ $title }}</h1>

            </div>
            {!!  Form::open(['route' => 'validerAddActivite']) !!}
            <div class="col-md-9 well well-sm">
                <div class="form-group">
                    <label class="col-md-3 control-label">Date :</label>
                    <div class="col-md-6">
                        <input type="hidden" name="hid_id" value="{{$activite->id_activite_compl}}"/>
                        <input type="date" name="date" value="{{$activite->date_activite}}"  required/>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Lieu :</label>
                    <div class="col-md-6">
                        <input type="text" name="lieu" value="{{$activite->lieu_activite}}" required/>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Thème :</label>
                    <div class="col-md-6">
                        <input type="text" name="theme" value="{{$activite->theme_activite}}" required/>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Motif :</label>
                    <div class="col-md-6">
                        <input type="text"  name="motif" value="{{$activite->motif_activite}}" required/>
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
