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
            if(!isset($activite_compl->NomAdherent)) {
                $erreur="Vous devez mettre un Nom";
            }
            else if(!isset($activite_compl->PrenomAdherent)) {
                $erreur="Vous devez mettre un prénom";
            }
            else if(!isset($activite_compl->Adherent_username)) {
                $erreur="Vous devez mettre un identifiant";
            }
            else if(!isset($activite_compl->mdp_adherent)) {
                $erreur="Vous devez mettre un mot de passe";
            }
            else if(!isset($activite_compl->type)) {
                $erreur="Vous devez mettre un type";
            }
            throw new MonException($erreur, 5);
        }
    }
}
