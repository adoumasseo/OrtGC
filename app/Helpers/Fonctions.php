<?php

use App\Models\Ufr;
use App\Models\Classe;
use App\Models\Annee;
use App\Models\Cours;
use App\Models\Ue;
use App\Models\Ecue;
use App\Models\Enseignant;
use App\Models\Programmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

function getSemestre($niveau){
    $debut=2 * ($niveau - 1);
    return array($debut,$debut+1);
}

function getCoursByClasseBySemestre($classe_id,$semestre){
    $params = ['classe_id' => $classe_id, 'semestre' => $semestre];
    return Cours::where($params)->get(); 
}

function getProgrammationByClasseBySemestre($classe_id,$semestre){
    $params = ['classe_id' => $classe_id, 'semestre' => $semestre,'annee_id'=>getAnnee()->id];
    return Programmation::where($params)->get();
}

function getEnseignantsByUfr($ufr_id){
    $enseignants=DB::table('enseignants')
                   ->join('exercer', 'enseignants.id','=','exercer.enseignant_id')
                   ->where('exercer.ufr_id','=',$ufr_id)
                   ->get();
    return $enseignants; 
}

function rechercherUe($val){
    $ue=Ue::find($val);
    if($ue){
        return $ue;
    }else{
        $ue=Ue::create([
            'nom' => $val
        ]);
        return $ue;
    }
}

function rechercherEcue($val){
    $ecue=Ecue::find($val);
    if($ecue){
        return $ecue;
    }else{
        $ecue=Ecue::create([
            'nom' => $val
        ]);
        return $ecue;
    }
}

function rechercherEnseignant($val){
    return Enseignant::find($val);
}

function isTransmis($departement_id){
    $programmations=DB::select("Select programmations.*
                    FROM programmations
                    INNER JOIN classes ON programmations.classe_id = classes.id
                    INNER JOIN filieres ON classes.filiere_id = filieres.id
                    WHERE programmations.annee_id=".getAnnee()->id."
                    AND filieres.departement_id=".$departement_id."
                    ");
    if(count($programmations)>0){
        return true;
    }else{
        return false;
    }
}
