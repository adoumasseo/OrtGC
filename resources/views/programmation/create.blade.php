@extends('layouts.master')
@section('title')
    {{  }}
@endsection
@section('css')
@endsection
@section('content')                                                    

    <form action="{{ route('programmation.store') }}" method="post" class="repeater">
        @csrf
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Semestre</h2>
                <div class="live-preview">
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-select mb-3" aria-label="Default select example">
                                <option value="">Sélectionner le semestre </option>
                                @foreach ( getSemestre($classe->niveau) as $semestre) 
                                    <option value="{{ $semestre }}">Semestre {{ $semestre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div data-repeater-list="programmation">
        <div data-repeater-item>
            <div class="border card rounded-0">
                <div class="card-header">
                    <h2 class="card-title">Unité d'Enseignement</h2>
                    <select class="select2-ue" name="ue">
                        <option value="">Sélectionner une UE</option>
                        @foreach ($ues as $ue)
                            <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-body">
                    <div class="py-2 row">
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Elément constitutif 1</label>
                            <select class="select2-ecue" name="ecue1">
                                <option value="">Selectionner un EC</option>
                                @foreach ($ecues as $ecue)
                                    <option value="{{ $ecue->id }}">{{ $ecue->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Enseignant</label>
                            <select class="select2-enseignant" name="enseignant1">
                                <option value="">Selectionner un enseignant</option>
                                @foreach (getEnseignantsByUfr(getUfr()->id) as $enseignant)
                                    <option value="{{ $enseignant->id }}">{{ $enseignant->nom }} {{ $enseignant->prenoms }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Masse horaire</label>
                            <input type="text" class="form-control" name="masse1" >
                        </div>
                    </div>
                    <div class="py-2 row">
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Date de démarrage</label>
                            <input type="date" class="form-control" id="exampleInputdate" name="date-debut1">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Date fin</label>
                            <input type="date" class="form-control" id="exampleInputdate" name="date-fin1">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="" class="form-label">Heure début</label>
                            <input type="time" class="form-control" id="exampleInputtime" name="heure-debut1">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="" class="form-label">Heure fin</label>
                            <input type="time" class="form-control" id="exampleInputtime" name="heure-fin1">
                        </div>
                    </div>
                    <hr/>
                    <div class="py-2 row">
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Elément constitutif 2</label>
                            <select class="select2-ecue" name="ecue2">
                                <option value="">Selectionner un EC</option>
                                @foreach ($ecues as $ecue)
                                    <option value="{{ $ecue->id }}">{{ $ecue->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Enseignant</label>
                            <select class="select2-enseignant" name="enseignant2">
                                <option value="">Selectionner un enseignant</option>
                                @foreach (getEnseignantsByUfr(getUfr()->id) as $enseignant)
                                    <option value="{{ $enseignant->id }}">{{ $enseignant->nom }} {{ $enseignant->prenoms }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Masse horaire</label>
                            <input type="text" class="form-control" name="masse2" >
                        </div>
                    </div>
                    <div class="py-2 row">
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Date de démarrage</label>
                            <input type="date" class="form-control" id="exampleInputdate" name="date-debut2">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Date fin</label>
                            <input type="date" class="form-control" id="exampleInputdate" name="date-fin2">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="" class="form-label">Heure début</label>
                            <input type="time" class="form-control" id="exampleInputtime" name="heure-debut2">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="" class="form-label">Heure fin</label>
                            <input type="time" class="form-control" id="exampleInputtime" name="heure-fin2">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input data-repeater-delete type="button"  class="btn btn-danger" value="Supprimer l'UE"/>
                </div>
            </div>
        </div>
    </div>
    <input data-repeater-create type="button" class="btn btn-primary" value="Ajouter une UE" id="repeater-button"/>

        <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
            <a href="{{ route('banques.index') }}" type="button"
                class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                    class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>
            <button type="submit" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                    class="align-middle ri-check-line label-icon fs-16 me-2"></i> Enregistrer</button>

        </div>
    </form>

@endsection

@section('script')

@endsection