<?php

namespace App\Http\Controllers;

use App\dao\ServiceBloc3;
use App\Exceptions\MonException;
use App\Models\Inviter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

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
            $invitation = $servicebloc->getAllActiviteComp();
            $praticien = $servicebloc->getAllPraticien();
            $inviter = new Inviter();

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/FormInviter', compact( 'title', 'invitation','praticien','inviter'));
    }

    public function validerInviter(Request $request)
{
    try {
        $inviter = new Inviter();
        $servicebloc = new ServiceBloc3();

        $inviter->id_activite_compl =  $request->input('activite');
        $inviter->id_praticien = $request->input('praticien');
        $inviter->specialiste = " ";

        $servicebloc->saveInviter($inviter);

        return redirect(route('listerVisiteurs'));
    } catch (MonException $e) {
        $erreur = $e->getMessage();
        return view('vues/error', compact('erreur'));
    }
}
    public function InfoAdherents($id){
        try {

            $servicesbloc = new ServiceBloc3();
            $lesAdherents = $servicesbloc->getVisiteurById($id);

            return view('vues/InfoAdherents', compact( 'lesAdherents'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function ProfilAdherents()
    {

        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $id = Session::get('id');
            $servicebloc = new ServiceBloc3();
            $lesAdherents = $servicebloc->getVisiteurById($id);
            return view( '/vues/InfoAdherents' ,compact( 'lesAdherents', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
}
