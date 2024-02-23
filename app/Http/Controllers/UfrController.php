<?php

namespace App\Http\Controllers;

use App\Models\Ufr;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UfrStoreRequest;
use App\Http\Requests\UfrUpdateRequest;
use App\Models\Universite;
use Illuminate\Support\Facades\Auth;

class UfrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ufrs = Ufr::get(); 
        return view('ufrs.index', compact('ufrs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $universites = Universite::get();

        return view(
            'ufrs.create',compact('universites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UfrStoreRequest $request): RedirectResponse
    {
        // $this->authorize('create', Ufr::class);
        $validated = $request->validated();
        $ufr = Ufr::create($validated);
        notyf()->addSuccess('Ufr créée avec success.');
        return redirect()->route('ufrs.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Ufr $ufr): View
    {
    
        return view('ufrs.show', compact('ufr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Ufr $ufr): View
    {
        return view(
            'ufrs.edit',
            compact('ufr')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UfrUpdateRequest $request,
        Ufr $ufr
    ): RedirectResponse {
        // $this->authorize('update', $ufr);
        $validated = $request->validated();
        $ufr->update($validated);
        notyf()->addSuccess('Ufr modifiée avec success.');
        return redirect()
            ->route('ufrs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Ufr $ufr
    ): RedirectResponse {
        // $this->authorize('delete', $ufr);

        $ufr->delete();
        notyf()->addSuccess('Ufr supprimée avec success.');
        return redirect()
            ->route('ufrs.index');
    }
}
