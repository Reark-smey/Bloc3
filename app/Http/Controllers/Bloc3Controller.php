<?php

namespace App\Http\Controllers;

use App\dao\ServiceBloc3;
use App\Exceptions\MonException;

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
        return view('vues/ListeAdherents', compact('lesvisiteurs'));
    }

    public function listervisiteursByNom($id)
    {
        try {

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/ListeAdherents', compact('lesvisiteurs'));
    }
}
