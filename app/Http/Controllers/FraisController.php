<?php

namespace App\Http\Controllers;

use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceFrais;
use App\Models\Frais;
use Exception;
class FraisController extends Controller
{
    public function getFraisVisiteur() {

        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $id = Session::get('id');
            $servicesFrais = new ServiceFrais();
            $mesFrais = $servicesFrais->getFrais($id);
            return view( '/vues/listeFrais' ,compact( 'mesFrais', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function updateFrais($id_frais) {
        $erreur = "";
        try {
            $serviceFrais = new ServiceFrais();
            $unFrais = $serviceFrais->getById($id_frais);
            $titreVue = "Modification d'une fiche de frais";
            return view('/vues/formFrais', compact('unFrais', 'titreVue', 'erreur'));
        }catch (Exception $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function validateFrais(Request $request, $id_frais)
    {

        $erreur = "";
        try {

            $anneemois = $request->input('anneemois');
            $nbjustificatifs = $request->input('nbjustificatifs');
            $serviceFrais = new ServiceFrais();

            if ($id_frais > 0 ) {
                $serviceFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            }else {
                $id_visiteur = Session::get('id');
                $serviceFrais->insertFrais($id_visiteur, $anneemois, $nbjustificatifs);
            }
            return redirect('/getFraisVisiteur');
        } catch (Exception $e){
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function addFrais(){
        $serviceFrais = new ServiceFrais();
        try {
            $unFrais = new Frais();
            $unFrais->id_frais = 0;
            $titreVue = "Création d'une fiche de frais";
            return view('/vues/formFrais', compact('unFrais', 'titreVue'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function removeFrais($id_frais){
        try{

            $serviceFrais = new ServiceFrais();
            $serviceFrais->deleteFrais($id_frais);


        }catch (Exception $e){
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
}
