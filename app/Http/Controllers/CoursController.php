<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Classe;
use App\Models\Ufr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CoursStoreRequest;
use App\Http\Requests\CoursUpdateRequest;
use App\Models\Cours;
use App\Models\Ecue;
use App\Models\Ue;

class CoursController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();
        $departement = $user->departement;
        
        $classes = Classe::with('filiere')->whereHas('filiere', function ($query) use ($departement) {
                $query->where('departement_id', $departement->id);
            })->get();
        
        return view('cours.index', compact('classes','departement'));
    }
    public function show(Classe $classe): View
    {
        return view('cours.show', compact('classe'));
    }

    public function create(Classe $classe): View
    { dd(getSemestre($classe->niveau));
        $ues = Ue::get();
        $ecues=Ecue::get();
        return view('cours.create', compact('ues','ecues','classe'));
    }

    public function store(Request $request): RedirectResponse
    {
        $classe=Classe::find($request->classe);

        if($classe){
            DB::table('cours')->where('classe_id', $classe->id)->delete();
            $semestres=getSemestre($classe->niveau);
            foreach($semestres as $semestre){
                $programmations = $request->get('programmation'.$semestre);;
                foreach($programmations as $programmation){
                    if($programmation['ue']){
                        $ue = rechercherUe($programmation['ue']);
                        $cours=new Cours();
                        $cours->classe_id=$classe->id;
                        $cours->ue_id=$ue->id;
                        $cours->semestre=$semestre;
                        $cours->credit=$programmation['credit'];
                        if($programmation['ecue1']){
                            $ecue1 = rechercherEcue($programmation['ecue1']);
                            $cours->ecue1=$ecue1->id;
                            $cours->enseignant1=$programmation['enseignant1'];
                            $cours->heure_theorique1=$programmation['masse1'];
                        }
                        if($programmation['ecue2']){
                            $ecue2 = rechercherEcue($programmation['ecue2']);
                            $cours->ecue2=$ecue2->id;
                            $cours->enseignant2=$programmation['enseignant2'];
                            $cours->heure_theorique2=$programmation['masse2'];
                        }

                        $cours->save();
                    }
                }
            }
        }
        notyf()->addSuccess('Table de spécification créée avec succès.');
        return redirect()->route('cours.index');
    }

    public function edit(Classe $classe): View
    { 
        $ues = Ue::get();
        $ecues=Ecue::get();
        return view('cours.edit', compact('classe','ues','ecues'));
    }
}
