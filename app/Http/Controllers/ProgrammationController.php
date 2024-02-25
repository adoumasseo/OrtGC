<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Classe;
use App\Models\Ufr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProgrammationStoreRequest;
use App\Http\Requests\ProgrammationUpdateRequest;
use App\Models\Cours;
use App\Models\Ecue;
use App\Models\Ue;

class ProgrammationController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();
        if ($user->hasRole('Administrateur') ) {
            $classes = Classe::get();
        }else if( $user->hasRole('Ufr') ) {
            /*$classes = DB::table('classes')
                            ->join('filieres', 'filieres.id', '=', 'classes.filiere_id')
                            ->join('departements', 'departements.id', '=', 'filieres.departement_id')
                            ->where('departements.ufr_id', '=', $user->ufr_id)
                            ->get();*/
            $classes = Classe::with('filiere.departement.ufr')->whereHas('filiere.departement', function ($query) use ($user) {
                $query->where('ufr_id', $user->ufr_id);
            })->get();
        }else{
            $classes = null;
        }
        return view('programmation.index', compact('classes'));
    }
    public function show(Classe $classe): View
    {
        return view('programmation.show', compact('classe'));
    }

    public function create(Classe $classe): View
    { dd(getSemestre($classe->niveau));
        $ues = Ue::get();
        $ecues=Ecue::get();
        return view('programmation.create', compact('ues','ecues','classe'));
    }

    public function store(/*ProgrammationStoreRequest*/ Request $request): RedirectResponse
    {
        dd($request);
        $validated = $request->validated();

        $banque = Cours::create($validated);
        notyf()->addSuccess('Cours créé avec success.');
        return redirect()->route('programmation.create');
    }

    public function edit(Classe $classe): View
    { 
        return view('programmation.edit', compact('classe'));
    }
}
