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
        $class = Classe::get();

        return view('classes.index', compact('class', 'filieres', 'cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $filieres = Filiere::all();
        $cycles = Cycle::all();
        $class = Classe::get();
        return view(
            'classes.create', compact('class', 'filieres', 'cycles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClasseStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        //dd($validated);
        $class = Classe::create($validated);

        notyf()->addSuccess('Classe créée avec success.');
        return redirect()->route('classes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $class): View
    {
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $class): View
    {
        $filieres = Filiere::all();
        $cycles = Cycle::all();
        return view(
            'classes.edit',
            compact('class', 'filieres', 'cycles')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ClasseUpdateRequest $request,
        Classe $class
    ): RedirectResponse {
        // $this->authorize('update', $classe);

        $validated = $request->validated();

        $class->update($validated);
        notyf()->addSuccess('Classe modifié avec success.');
        return redirect()
            ->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Classe $class
    ): RedirectResponse {
        // $this->authorize('delete', $classe);

        $class->delete();
        notyf()->addSuccess('Classe supprimée avec success.');
        return redirect()
            ->route('classes.index');
    }
}
