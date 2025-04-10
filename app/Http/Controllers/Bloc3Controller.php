<?php

namespace App\Http\Controllers;

use App\dao\ServiceBloc3;
use App\Exceptions\MonException;
use App\Models\Inviter;
use App\Models\Realiser;
use App\Models\Visiteur;
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

    public function Realiser($id)
    {
        $servicebloc = new ServiceBloc3();
        try {

            $title = "Ajouter une activité à un visiteur";
            $activite = $servicebloc->getAllActiviteComp();
            $visiteur = $servicebloc->getVisiteurById($id);
            $realiser = new Realiser();

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/FormAjouterActivite', compact( 'title', 'realiser','visiteur','activite'));
    }

    public function validerrealiser(Request $request)
    {
        try {
            $realiser = new Realiser();
            $servicebloc = new ServiceBloc3();

            $realiser->id_activite_compl =  $request->input('activite');
            $realiser->id_visiteur = $request->input('visiteur');
            $realiser->montant_ac = 0.00;

            $servicebloc->saveRealiser($realiser);

            return redirect(route('ProfilAdherents'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function ListerActiviteComplByAdherent($id)
    {
        try {
            $serviceBloc = new ServiceBloc3();

            $activite = $serviceBloc->GetActiviteByAdherent($id);

            $title = "Liste des activités complémentaires";

            return view('vues/ActiviteParAdherent', compact('title','activite'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function supprimeractivite($id)
    {
        $servicebloc = new ServiceBloc3();
        $servicebloc->delRealiser($id);
        return redirect('ProfilAdherents');
    }

    public function ListeSecteur()
    {
        try {
            $title ='Rechercher par Secteur';
            $servicebloc = new ServiceBloc3();
            $secteur = $servicebloc->ListerSecteurAll();

            return view('vues/VisiteurParSecteur', compact('secteur','title'));
        } catch (
        MonException $e
        ) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function validerRechercheSecteur(Request $request)
    {
        try {
            $visiteur = $request->input('secteur');

            return redirect(route('ListerVisiteurParSecteur', [$visiteur]));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function ListerVisiteurParSecteur($id)
    {
        try {
            $serviceVisiteur = new ServiceBloc3();
            $lesvisiteurs = $serviceVisiteur->getVisiteurParSecteur($id);
            $title =" Liste des Secteurs";


            return view('vues/ListeVisiteurs', compact('lesvisiteurs','title'));

        }catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function validerAdherent(Request $request)
    {
        try {
            $servicebloc = new ServiceBloc3();
            $id_adherent = $request->input('hid_id');
            if ($id_adherent == 0) {
                $adherent = new Visiteur();
            } else {
                $adherent = $servicebloc->getAdherent($id_adherent);
            }
            $adherent->nom_visiteur = $request->input('nom');
            $adherent->prenom_visiteur = $request->input('prenom');
            $adherent->id_laboratoire = $request->input('laboratoire');
            $adherent->id_secteur = $request->input('secteur');
            $adherent->adresse_visiteur = $request->input('adresse_visiteur');

            $adherent->cp_visiteur = $request->input('cp_visiteur');
            $adherent->ville_visiteur = $request->input('ville_visiteur');

            $servicebloc->saveVisiteur($adherent);
            return redirect('ProfilAdherents');

        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function modifierAdherent($id)
    {
        try {
            $title = "Modifer les informations";
            $servicebloc = new ServiceBloc3();
            $adherent = $servicebloc->getAdherent($id);

            return view('vues/FormModifierVisiteur', compact('title', 'adherent'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

}
