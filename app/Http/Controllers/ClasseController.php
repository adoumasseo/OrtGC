<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseStoreRequest;
use App\Http\Requests\ClasseUpdateRequest;
use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Filiere;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $filieres = Filiere::all();
        $cycles = Cycle::all();
        $classes = Classe::get();

        return view('classes.index', compact('classes', 'filieres', 'cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $filieres = Filiere::all();
        $cycles = Cycle::all();
        $classes = Classe::get();
        return view(
            'classes.create', compact('classes', 'filieres', 'cycles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClasseStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $classe = Classe::create($validated);
        notyf()->addSuccess('Classe créée avec success.');
        return redirect()->route('classes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Classe $classe): View
    {
        return view('classes.show', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Classe $classe): View
    {
        return view(
            'classes.edit',
            compact('classes')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ClasseUpdateRequest $request,
        classe $classe
    ): RedirectResponse {
        // $this->authorize('update', $classe);

        $validated = $request->validated();

        $classe->update($validated);
        notyf()->addSuccess('Classe modifié avec success.');
        return redirect()
            ->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Classe $classe
    ): RedirectResponse {
        // $this->authorize('delete', $classe);

        $classe->delete();
        notyf()->addSuccess('Classe supprimée avec success.');
        return redirect()
            ->route('classes.index');
    }
}
