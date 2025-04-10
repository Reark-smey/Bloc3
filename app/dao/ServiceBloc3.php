<?php

namespace App\dao;

use App\Exceptions\MonException;
use App\Models\activite_compl;
use App\Models\ActiviteCompl;
use App\Models\Inviter;
use App\Models\Laboratoire;
use App\Models\Praticien;
use App\Models\Realiser;
use App\Models\Visiteur;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ServiceBloc3
{
    public function getVisiteurAll() {
        try {
            $lesvisiteurs = DB::table('visiteur')
                ->select('nom_visiteur', 'prenom_visiteur',
                     'id_visiteur',
                'id_laboratoire','id_secteur',
                'adresse_visiteur','cp_visiteur',
                'ville_visiteur','date_embauche','type_visiteur')
                ->where('nom_visiteur', '!=', 'Bloc3Admin')
                ->where('nom_visiteur', '!=', 'Bloc3Com')
                ->get();
            return $lesvisiteurs;

        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getVisiteurById($id) {
        try {
            $lesvisiteurs = DB::table('visiteur')
                ->select('nom_visiteur', 'prenom_visiteur',
                    'id_visiteur',
                    'id_laboratoire','id_secteur',
                    'adresse_visiteur','cp_visiteur',
                    'ville_visiteur','date_embauche','type_visiteur')
                ->where('id_visiteur', '=', $id)
                ->get();
            return $lesvisiteurs;

        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function GetVisiteur($id){
        try {
            return Visiteur::query()
                ->findOrFail($id);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());

        }
    }
    public function getVisiteurParNom($id) {
        try {
            $lesvisiteurs = DB::table('visiteur')
                ->select('nom_visiteur', 'prenom_visiteur',
                    'id_visiteur',
                    'id_laboratoire','id_secteur',
                    'adresse_visiteur','cp_visiteur',
                    'ville_visiteur','date_embauche')
                ->where('nom_visiteur','LIKE', $id.'%')
                ->where('nom_visiteur', '!=', 'Bloc3Admin')
                ->where('nom_visiteur', '!=', 'Bloc3Com')
                ->get();
            return $lesvisiteurs;

        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }


    public function ListerLaboAll() {
        try {
            $leslaboratoires = DB::table('laboratoire')
                ->select(
        'id_laboratoire','nom_laboratoire'
                ,'chef_vente')
                ->get();
            return $leslaboratoires;

        } catch (QueryException $e) {
            throw new MonException($e->getMessage());

        }
    }
    public function getVisiteurParLabo($id) {
        try {
            $lesvisiteurs = DB::table('visiteur')
                ->select('nom_visiteur', 'prenom_visiteur',
                    'id_visiteur',
                    'id_laboratoire','id_secteur',
                    'adresse_visiteur','cp_visiteur',
                    'ville_visiteur','date_embauche')
                ->where('id_laboratoire','=', $id)
                ->where('nom_visiteur', '!=', 'Bloc3Admin')
                ->where('nom_visiteur', '!=', 'Bloc3Com')
                ->get();
            return $lesvisiteurs;

        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function GetLabo($id){
        try {
            return Laboratoire::query()
                ->findOrFail($id);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());

        }
    }

    public function getAllActiviteComp() {
        try {
            return ActiviteCompl::all();
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getAllPraticien()
    {
        try {
            return Praticien::all()->sortBy('nom_praticien');
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function saveActiviteComp(activite_compl $activite_compl){
        try{

            $activite_compl->save();
        }catch(QueryException $e){
            $erreur = $e->getMessage();
            if(!isset($activite_compl->date_activite)) {
                $erreur="Vous devez mettre une Date pour l'activité";
            }
            else if(!isset($activite_compl->lieu_activite)) {
                $erreur="Vous devez mettre un Lieu pour l'activité";
            }
            else if(!isset($activite_compl->theme_activite)) {
                $erreur="Vous devez mettre un thème pour l'activité";
            }
            else if(!isset($activite_compl->motif_activite)) {
                $erreur="Vous devez mettre un motif pour l'activité";
            }
            throw new MonException($erreur, 5);
        }
    }

    public function delActiviteComp($id) {
        try {
            realiser::destroy($id);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function saveInviter(inviter $inviter){
        try{

            $inviter->save();
        }catch(QueryException $e){
            $erreur = $e->getMessage();
            if(!isset($inviter->id_activite_compl)) {
                $erreur="Vous devez mettre une activité";
            }
            else if(!isset($inviter->id_praticien)) {
                $erreur="Vous devez mettre un praticien a invité";
            }

            throw new MonException($erreur, 5);
        }
    }
    public function saveRealiser(Realiser $realiser){
        try{
            $realiser->save();
        }catch(QueryException $e){
            $erreur = $e->getMessage();
            if(!isset($realiser->id_activite_compl)) {
                $erreur="Vous devez mettre une activité";
            }
            else if(!isset($realiser->id_visiteur)) {
                $erreur="Vous devez mettre un praticien a invité";
            }

            throw new MonException($erreur, 5);
        }
    }
    public function delRealiser($id) {
        try {
            DB::table('realiser')
                ->where('id_activite_compl', '=', $id)
                ->delete();

        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

public function GetActiviteByAdherent($id)
{
    try {
        $activite = DB::table('activite_compl')
            ->select(
                'activite_compl.id_activite_compl',
                'activite_compl.date_activite',
                'activite_compl.lieu_activite',
                'activite_compl.theme_activite',
                'motif_activite',
            )
            ->join('realiser','activite_compl.id_activite_compl','=','realiser.id_activite_compl')
            ->join('visiteur','realiser.id_visiteur','=','visiteur.id_visiteur')
            ->where('visiteur.id_visiteur','=',$id)
            ->orderBy('date_activite')
            ->get();

        return $activite;

    } catch ( QueryException $e) {
        throw new MonException($e->getMessage());
    }
}

    public function ListerSecteurAll() {
        try {
            $lessecteurs = DB::table('secteur')
                ->select(
                    'id_secteur','lib_secteur'
                    )
                ->get();
            return $lessecteurs;

        } catch (QueryException $e) {
            throw new MonException($e->getMessage());

        }
    }
    public function getVisiteurParSecteur($id) {
        try {
            $lesvisiteurs = DB::table('visiteur')
                ->select('nom_visiteur', 'prenom_visiteur',
                    'id_visiteur','adresse_visiteur','cp_visiteur','ville_visiteur',
                    'date_embauche',
                    'id_secteur'
                    )
                ->where('id_secteur','=', $id)
                ->where('nom_visiteur', '!=', 'Bloc3Admin')
                ->where('nom_visiteur', '!=', 'Bloc3Com')
                ->get();
            return $lesvisiteurs;

        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function saveVisiteur(Visiteur $visiteur){
        try{
            $visiteur->save();
        }catch(QueryException $e){
            $erreur = $e->getMessage();
            throw new MonException($erreur, 5);
        }
    }

    public function getAdherent($id)
    {
        try {
            $visiteur = DB::table('visiteur')
                ->select('nom_visiteur', 'prenom_visiteur',
                'id_visiteur','adresse_visiteur',
                'cp_visiteur','ville_visiteur','visiteur.id_secteur',
                    'visiteur.id_laboratoire'
                )
                ->where('id_visiteur','=', $id)
            ->first();

            return \App\Models\Visiteur::find($id);
        } catch(QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
