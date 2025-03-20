@extends('layouts.master')
@section('content')

    <h1> </h1>
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <th style="width:30%">Période</th>
        <th style="width:30%">Libelle</th>
        <th style="width:20%">Montant</th>
        <th style="width:20%">Modifier</th>
        <th style="width:20%">Supprimer</th>
        </thead>
        @foreach($mesHorsForfait as $horsforfait)
            <tr>
                <td>{{$horsforfait->date_fraishorsforfait}} </td>
                <td>{{$horsforfait->lib_fraishorsforfait}} </td>
                <td>{{$horsforfait->montant_fraishorsforfait}} </td>
                <td style="text-align:center;">
                    <a href="{{url('/updateHorsForfais')}}/{{$horsforfait->id_fraishorsforfait}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                    </a>
                </td>
                <td style="text-align:center;">
                    <a onclick="javascript:if (confirm('Suppression confirmée ?')) {
                    window.location='{{url('/removeHorsForfais')}}/{{$horsforfait->id_fraishorsforfait}}'
					}">
                        <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                              title="Supprimer"></span>
                    </a>
                </td>
            </tr>

        @endforeach
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <a href=" {{url('/addHorsForfait')}}/{{$horsforfait->id_frais}}"><button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Ajouter
                    </button>

                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider les montants
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = ' ';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
            </div>
        </div>
    </table>
    @include('vues/error')
