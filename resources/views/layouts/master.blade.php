<!doctype html>
<html lang="fr">
{!! Html::style('assets/css/bootstrap.css') !!}
{!! Html::style('assets/css/gsb.css') !!}


    <head>

    </head>


    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">GSB Frais</a>
                    </div>

                    @if (Session::get('id') == 0)
                        <div class="collapse navbar-collapse" id="navbar-collapse-target">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{url('/formLogin')}}" data-toggle="collapse" data-targer=".navbar-collapse.in"> Se Connecter</a> </li>
                            </ul>
                        </div>
                    @endif

                    @if (Session::get('id') >0 and Session::get('type') == 'A')
                        <div class="collapse navbar-collapse" id="navbar-collapse-target">
                            <ul class="nav navbar-collapse navbar-nav navbar-left" id="navbar-collapse-target" >
                                <li><a href="{{url('/ProfilAdherents')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Profil Membre</a></li>


                                <li><a href="{{url('/ajouterFrais')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter</a></li>
                                <li><a href="{{url('/listerVisiteurs')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Liste des visiteurs</a></li>
                                <li><a href="{{url('/ChercherParNom')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Recherche de visiteurs</a></li>
                                <li><a href="{{url('/ListeLabo')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Recherche par laboratoire</a></li>
                                <li><a href="{{url('/Inviter')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Inviter un praticien</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{url('/getLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in" > ({{Session::get('login')}}) Se déconnecter</a> </li>

                            </ul>
                        </div>
                    @endif

                    @if (Session::get('id') >0 and Session::get('type') == 'V')
                        <div class="collapse navbar-collapse" id="navbar-collapse-target">
                            <ul class="nav navbar-collapse navbar-nav navbar-left" id="navbar-collapse-target" >
                                <li><a href="{{url('/getFraisVisiteur')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>


                                <li><a href="{{url('/ListeLabo')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Recherche par laboratoire</a></li>
                                <li><a href="{{url('/Inviter')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Inviter un praticien</a></li>
                                <li><a href="{{url('/ProfilAdherents')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Inviter un praticien</a></li>

                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{url('/getLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in" > ({{Session::get('login')}}) Se déconnecter</a> </li>

                            </ul>
                        </div>
                    @endif

                </div><!--/.container-fluid -->
            </nav>
        </div>
        <div class="container">
            @yield('content')
        </div>



    </body>
</html>
