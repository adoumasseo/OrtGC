<?php

use App\Models\Ufr;
use App\Models\Classe;
use App\Models\Annee;
use Illuminate\Support\Facades\Auth;

function getUfr(){
    $user = Auth::user();
    if($user->hasRole('Administrateur')){
        return Ufr::find(session()->get('UFR_ID'));
    }else if(!$user->hasRole('Responsable')){
        return Ufr::find($user->ufr_id);
    }else{
        return null;
    }
}

function getClasse(){
    $user = Auth::user();
    if($user->hasRole('Responsable')){
        return Classe::find($user->classe_id);
    }else{
        return Classe::find(session()->get('CLASSE_ID'));
    }
}

function getAnnee()
{
    if (session()->has('ANNEE_ID')) {
        $annee = Annee::find(session()->get('ANNEE_ID'));
    } else {
        $annee = Annee::orderBy('id', 'desc')->first();
        session()->put('ANNEE_ID', $annee ? $annee->id : null);
    }
    return $annee;
}
