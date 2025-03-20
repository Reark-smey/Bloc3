<?php

namespace App\dao;

use App\Exceptions\MonException;
use App\Models\activite_compl;
use App\Models\Laboratoire;
use App\Models\Visiteur;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ServiceBloc3
{
    public function ListeVisiteurAll() {
        try {
            $lesvisiteurs = DB::table('visiteur')
                ->select('nom_visiteur', 'prenom_visiteur',
                    'visiteur.email', 'id_visiteur',
                'id_laboratoire','id_secteur',
                'adresse_visiteur','cp_visiteur',
                'ville_visiteur','date_embauche')
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

    public function GetLabo($id){
        try {
            return Laboratoire::query()
                ->findOrFail($id);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());

        }
    }

    public function saveActiviteComp(activite_compl $activite_compl){
        try{

            $activite_compl->save();
        }catch(QueryException $e){
            $erreur = $e->getMessage();
            if(!isset($activite_compl->date_activite)) {
                $erreur="Vous devez mettre une Date pour l'acitité";
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
            activite_compl::destroy($id);
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

}
