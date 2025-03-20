<?php

namespace App\Http\Controllers;

use App\dao\ServiceFrais;
use App\Exceptions\MonException;
use App\Models\Frais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceHorsForfait;
use App\Models\HorsForfait;
use Exception;
class HorsForfaitController extends Controller
{
    public function getHorsForfait() {

        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $id = Session::get('id');
            $servicesHorsForfait = new ServiceHorsForfait();
            $mesHorsForfait = $servicesHorsForfait->getHorsForfait($id);
            return view( '/vues/listeHorsForfait' ,compact( 'mesHorsForfait', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function updateHorsForfait($id_horsforfait) {
        $erreur = "";
        try {
            $serviceHorsForfait = new ServiceHorsForfait();
            $unHorsForfait = $serviceHorsForfait->getById($id_horsforfait);
            $titreVue = "Modification d'une fiche de  hors forfait";
            return view('/vues/formHorsForfait', compact('unHorsForfait', 'titreVue', 'erreur'));
        }catch (Exception $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function validateHorsForfait(Request $request, $id_horsforfait)
    {

        $erreur = "";
        try {

            $datefraishorsforfait = $request->input('date_fraishorsforfait');
            $libellehorsforfait = $request->input('lib_fraishorsforfait');
            $montanthorsforfait = $request->input('montant_fraishorsforfait');
            $id_frais = $request->input('id_frais');
            $serviceHorsForfait = new ServiceHorsForfait();

            if ($id_horsforfait > 0 ) {
                $serviceHorsForfait->updateHorsForfait($id_horsforfait, $datefraishorsforfait, $libellehorsforfait,$montanthorsforfait);
            }else {
                $serviceHorsForfait->insertHorsForfait($id_frais, $datefraishorsforfait, $libellehorsforfait,$montanthorsforfait);
            }
            return redirect('/getHorsForfait');
        } catch (Exception $e){
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function addHorsForfait($id_frais){
        $serviceHorsForfait = new ServiceHorsForfait();
        try {
            $unHorsForfait = new HorsForfait();
            $unHorsForfait->id_fraishorsforfait = 0;
            $unHorsForfait->id_frais= $id_frais;
            $titreVue = "Création d'une fiche de frais";
            return view('/vues/formHorsForfait', compact('unHorsForfait', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function removeHorsForfait($id_HorsForfait){
        try{

            $serviceHorsFrais = new ServiceHorsForfait();
            $serviceHorsFrais->deleteHorsForfait($id_HorsForfait);


        }catch (Exception $e){
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
}
