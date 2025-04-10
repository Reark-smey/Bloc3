
@extends('layouts.master')
@section('content')



    <div class="container">
        <div class="blanc">
            <h1>Liste des membres</h1>
        </div>
        <table class="table table-borderer table-striped">
            <thead>
            <tr>

                <th>Date de l'activité</th>
                <th>Lieu</th>
                <th>Thème</th>
                <th>Motif</th>



            </tr>
            </thead>
            @foreach($activite as $unAct)
                <tr>

                    <td>{{$unAct->date_activite}}</td>
                    <td>{{$unAct->lieu_activite}}</td>
                    <td>{{$unAct->theme_activite}}</td>
                    <td>{{$unAct->motif_activite}}</td>




                    <td style="text-align:center;">
                        <a href="{{url('/modifierActivite')}}/{{$unAct->id_activite_compl}}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier">

                            </span>
                        </a>
                    </td>


                    <td>
                        <a onclick="return confirm('vous êtes sûr de vouloir supprimer?')"
                           href="{{route('supprimeractivite', [$unAct->id_activite_compl])}}">
                            <span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top"
                                  title="Supprimer"></span>
                        </a>
                    </td>



                </tr>
            @endforeach
            <br> <br>



        </table>
    </div>
