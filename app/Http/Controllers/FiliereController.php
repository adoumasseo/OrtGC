<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiliereStoreRequest;
use App\Models\Filiere;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FiliereUpdateRequest;
use App\Models\Departement;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $departements = Departement::all();
        $filieres = Filiere::get();

        return view('filieres.index', compact('filieres', 'departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $departements = Departement::all();
        $filieres = Filiere::get();
        return view(
            'filieres.create', compact('filieres', 'departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FiliereStoreRequest $request): RedirectResponse
    {
        // $this->authorize('create', Banque::class);

        $validated = $request->validated();

        $filiere = Filiere::create($validated);
        notyf()->addSuccess('Filière créée avec success.');
        return redirect()->route('filieres.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Filiere $filiere): View
    {

        return view('filieres.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Filiere $filiere): View
    {
        return view(
            'filieres.edit',
            compact('filiere')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( FiliereUpdateRequest $request,
    Filiere $filiere
): RedirectResponse {
    // $this->authorize('update', $banque);

    $validated = $request->validated();

    $filiere->update($validated);
    notyf()->addSuccess('Filière modifiée avec success.');
    return redirect()
        ->route('filieres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request,
    Filiere $filiere
): RedirectResponse {
    // $this->authorize('delete', $banque);

    $filiere->delete();
    notyf()->addSuccess('Filière supprimée avec success.');
    return redirect()
        ->route('filieres.index');
    }
}
