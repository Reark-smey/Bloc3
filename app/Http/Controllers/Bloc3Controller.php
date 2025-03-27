<?php

namespace App\Http\Controllers;

use App\dao\ServiceBloc3;
use App\Exceptions\MonException;
use App\Models\Inviter;
use Illuminate\Http\Request;

class Bloc3Controller
{
    public function listerVisiteurs()
    {
        $Servicebloc = new ServiceBloc3();
        try {
            $lesvisiteurs = $Servicebloc->getVisiteurAll();
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/ListeVisiteurs', compact('lesvisiteurs'));
    }

    public function visiteursByNom()
    {
        $servicebloc = new ServiceBloc3();
        try {


            $title = "Rechercher un visiteur";

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/VisiteurParNom', compact( 'title'));
    }

    public function validerRecherche(Request $request)
    {
        try {
            $visiteur = $request->input('nom');

            return redirect(route('ListerVisiteurParNom', [$visiteur]));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function ListerVisiteurParNom($nom)
    {
        try {
            $serviceVisiteur = new ServiceBloc3();
            $lesvisiteurs = $serviceVisiteur->getVisiteurParNom($nom);
            $title =" Liste des visiteurs";


            return view('vues/ListeVisiteurs', compact('lesvisiteurs','title'));

        }catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function ListeLabo()
    {
        try {
            $title ='Rechercher par Laboratoire';
            $servicebloc = new ServiceBloc3();
            $labo = $servicebloc->ListerLaboAll();

            return view('vues/FormRechercheParLabo', compact('labo','title'));
        } catch (
            MonException $e
        ) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function validerRechercheLabo(Request $request)
    {
        try {
            $visiteur = $request->input('laboratoire');

            return redirect(route('ListerVisiteurParLabo', [$visiteur]));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function ListerVisiteurParLabo($id)
    {
        try {
            $serviceVisiteur = new ServiceBloc3();
            $lesvisiteurs = $serviceVisiteur->getVisiteurParLabo($id);
            $title =" Liste des Laboratoires";


            return view('vues/ListeVisiteurs', compact('lesvisiteurs','title'));

        }catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function Inviter()
    {
        $servicebloc = new ServiceBloc3();
        try {

            $title = "Inviter un praticien à une activité";

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/FormInviter', compact( 'title'));
    }

    public function validerInviter(Request $request)
{
    try {
        $inviter = new Inviter();

        $visiteur = $request->input('activite');
        $visiteur = $request->input('praticien');

        return redirect(route('ListerVisiteurParLabo', [$visiteur]));
    } catch (MonException $e) {
        $erreur = $e->getMessage();
        return view('vues/error', compact('erreur'));
    }
}
}
