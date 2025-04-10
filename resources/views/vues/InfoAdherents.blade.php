
@extends('layouts.master')
@section('content')


    <div class="container">
        <div class="blanc">
            <h1>Les Informations</h1>
        </div>
        <table class="table table-borderer table-striped">
            <thead>
            <tr>

                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Date d'embauche</th>
                <th>Type</th>


            </tr>
            </thead>
            @foreach($lesAdherents as $unAdh)
                <tr>

                    <td>{{$unAdh->nom_visiteur}}</td>
                    <td>{{$unAdh->prenom_visiteur}}</td>
                    <td>{{$unAdh->adresse_visiteur}}</td>
                    <td>{{$unAdh->cp_visiteur}}</td>
                    <td>{{$unAdh->ville_visiteur}}</td>
                    <td>{{$unAdh->date_embauche}}</td>

                    <td>
                            <?php
                            switch ($unAdh->type_visiteur) {
                                case 'A':
                                    echo "Administrateur";
                                    break;
                                case 'V':
                                    echo "Visiteur";
                                    break;
                                case 'C':
                                    echo "Commercial";
                                    break;
                                case 'P':
                                    echo "Praticien";
                                    break;
                                case 'G':
                                    echo "Garde";
                                    break;
                            }
                        ?>
                    </td>




                    <td style="text-align:center;">
                        <a href="{{url('/Realiser')}}/{{$unAdh->id_visiteur}}">
                            <span class="glyphicon glyphicon-plus-sign" data-toggle="tooltip" data-placement="top" title="Ajouter une activité">

                            </span>
                        </a>
                    </td>

                    <td style="text-align:center;">
                        <a href="{{url('/ListerActivites')}}/{{$unAdh->id_visiteur}}">
                            <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir les activités">

                            </span>
                        </a>
                    </td>

                    <td style="text-align:center;">
                        <a href="{{url('/modifierAdherent')}}/{{$unAdh->id_visiteur}}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier Adhérent">

                            </span>
                        </a>
                    </td>

                </tr>
            @endforeach
            <br> <br>



        </table>

    </div>
@stop
