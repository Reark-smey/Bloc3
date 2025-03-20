<?php

namespace App\dao;

use App\Models\Frais;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class ServiceHorsForfait
{
    public function getHorsForfait($id) {
        try {
            $lesHorsforfait = DB::table('fraishorsforfait')
                ->select()
                ->where('id_frais','=', $id)
                ->orderby ('id_frais', 'ASC')
                ->get();
            return $lesHorsforfait;
        }catch(QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getById($id_HorsForfait)
    {
        try {
            $unFrais = DB::table('fraishorsforfait')
                ->select()
                ->where('id_fraishorsforfait','=', $id_HorsForfait)
                ->first();

            return $unFrais ;
        } catch(\Illuminate\Database\QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function updateHorsForfait($id_HorsForfait, $datefraishorsforfait, $libellehorsforfait,$montanthorsforfait){
        try {

            DB::table('fraishorsforfait')->where('id_fraishorsforfait', $id_HorsForfait)
                ->update([
                    'date_fraishorsforfait'=>$datefraishorsforfait,
                    'lib_fraishorsforfait'=>$libellehorsforfait,
                    'montant_fraishorsfait'=>$montanthorsforfait,
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }
    public function insertHorsForfait($id_frais, $datefraishorsforfait, $libellehorsforfait,$montanthorsforfait ){
        try{
            DB::table('fraishorsforfait')->insert(['date_fraishorsforfait'=>$datefraishorsforfait,
                'id_frais'=>$id_frais,
                'lib_fraishorsforfait'=>$libellehorsforfait,
                'montant_fraishorsforfait'=>$montanthorsforfait],
            );
        }catch(QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function deleteHorsForfait($id_horsforfait){

        try{

            DB::table('fraishorsforfait')->where('id_fraishorsforfait', $id_horsforfait)->delete();
        }catch (QueryException $e){
            $erreur = $e->getMessage();
            if($e->getCode()==23000){}
            $erreur="Impossible de supprimer une fiche ayant des frais liés";

        }
        throw new MonException($erreur, 5);

    }
}
