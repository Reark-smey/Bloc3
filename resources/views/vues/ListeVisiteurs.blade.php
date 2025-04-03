
@extends('layouts.master')
@section('content')



    <div class="container">
        <div class="blanc">
            <h1>Liste des membres</h1>
        </div>
        <table class="table table-borderer table-striped">
            <thead>
            <tr>

                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Date d'embauche</th>


            </tr>
            </thead>
            @foreach($lesvisiteurs as $unVis)
                <tr>

                    <td>{{$unVis->nom_visiteur}}</td>
                    <td>{{$unVis->prenom_visiteur}}</td>
                    <td>{{ $unVis->adresse_visiteur }}</td>
                    <td>{{ $unVis->cp_visiteur }}</td>
                    <td>{{$unVis->ville_visiteur}}</td>
                    <td>{{$unVis->date_embauche}}</td>



                    <td style="text-align:center;">
                        <a href="{{url('/modifierAdherent')}}/{{$unVis->id_visiteur}}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier">

                            </span>
                        </a>
                    </td>

                    <td style="text-align:center;">
                        <a href="{{url('/InfoAdherents')}}/{{$unVis->id_visiteur}}">
                            <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir profil">

                            </span>
                        </a>
                    </td>



                </tr>
            @endforeach
            <br> <br>



        </table>
    </div>
