@extends('layouts.master')
@section('title')
    Table de spécification - {{ $classe->nom }}
@endsection
@section('css')
<link href="{{ URL::asset('build/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<form action="{{ route('cours.store') }}" method="post">
    @csrf
    <input type="hidden" name="classe" value="{{ $classe->id }}"/>
    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
        @foreach ( getSemestre($classe->niveau) as $semestre)  
            <div class="accordion-item">
                <h2 class="accordion-header" id="accordionlefticonExample{{ $semestre }}">
                    <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_lefticonExamplecollapse{{ $semestre }}" aria-expanded="false" aria-controls="accor_lefticonExamplecollapse{{ $semestre }}">
                        Semestre {{ $semestre }}
                    </button>
                </h2>
                <div id="accor_lefticonExamplecollapse{{ $semestre }}" class="accordion-collapse collapse" aria-labelledby="accordionlefticonExample{{ $semestre }}" data-bs-parent="#accordionlefticon" style="">
                    <div class="accordion-body">
                                <div class="accordion-flush" id="accordionFlushExample">
                                    <div class='repeater'>
                                        <div data-repeater-list="programmation{{ $semestre }}">
                                            <div data-repeater-item>
                                                @if(getCoursByClasseBySemestre($classe->id,$semestre))
                                                    @foreach ( getCoursByClasseBySemestre($classe->id,$semestre) as $cours)
                                                        <div class="border card rounded-0">
                                                            <div class="card-body">
                                                                <div class="py-2 row">
                                                                    <div class="mb-3 col-md-8">
                                                                        <h2 class="card-title">Unité d'Enseignement</h2>
                                                                        <select class="select2-ue" name="ue">
                                                                            <option value="">Sélectionner une UE</option>
                                                                            @foreach ($ues as $ue)
                                                                                <option value="{{ $ue->id }}" {{ $cours->ue_id == $ue->id ? 'selected' : '' }}>{{ $ue->nom }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Crédit</label>
                                                                        <input type="text" class="form-control" name="credit" value="{{ $cours->credit }}" >
                                                                    </div>
            
                                                                    <hr/>
            
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Elément constitutif 1</label>
                                                                        <select class="select2-ecue" name="ecue1">
                                                                            <option value="">Selectionner un EC</option>
                                                                            @foreach ($ecues as $ecue)
                                                                                <option value="{{ $ecue->id }}" {{ $cours->ecue1==$ecue->id ? 'selected' : '' }}>{{ $ecue->nom }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Enseignant</label>
                                                                        <select class="select2-enseignant" name="enseignant1">
                                                                            <option value="">Selectionner un enseignant</option>
                                                                            @foreach (getEnseignantsByUfr(getUfr()->id) as $enseignant)
                                                                                <option value="{{ $enseignant->id }}" {{ $cours->enseignant1==$enseignant->id ? 'selected' : '' }}>{{ $enseignant->nom }} {{ $enseignant->prenoms }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Masse horaire</label>
                                                                        <input type="text" class="form-control" name="masse1" value="{{ $cours->heure_theorique1 }}">
                                                                    </div>
                                                                    <hr/>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Elément constitutif 2</label>
                                                                        <select class="select2-ecue" name="ecue2">
                                                                            <option value="">Selectionner un EC</option>
                                                                            @foreach ($ecues as $ecue)
                                                                                <option value="{{ $ecue->id }}" {{ $cours->ecue2==$ecue->id ? 'selected' : '' }}>{{ $ecue->nom }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Enseignant</label>
                                                                        <select class="select2-enseignant" name="enseignant2">
                                                                            <option value="">Selectionner un enseignant</option>
                                                                            @foreach (getEnseignantsByUfr(getUfr()->id) as $enseignant)
                                                                                <option value="{{ $enseignant->id }}" {{ $cours->enseignant2==$enseignant->id ? 'selected' : '' }}>{{ $enseignant->nom }} {{ $enseignant->prenoms }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Masse horaire</label>
                                                                        <input type="text" class="form-control" name="masse2" value="{{ $cours->heure_theorique2 }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <input data-repeater-delete type="button"  class="btn btn-danger" value="Supprimer l'UE"/>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="border card rounded-0">
                                                        <div class="card-body">
                                                            <div class="py-2 row">
                                                                <div class="mb-3 col-md-8">
                                                                    <h2 class="card-title">Unité d'Enseignement</h2>
                                                                    <select class="select2-ue" name="ue">
                                                                        <option value="">Sélectionner une UE</option>
                                                                        @foreach ($ues as $ue)
                                                                            <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Crédit</label>
                                                                    <input type="text" class="form-control" name="credit" >
                                                                </div>
        
                                                                <hr/>
        
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
                                                                    <input type="text" class="form-control" name="masse1">
                                                                </div>
                                                                <hr/>
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
                                                                    <input type="text" class="form-control" name="masse2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <input data-repeater-delete type="button"  class="btn btn-danger" value="Supprimer l'UE"/>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-primary" value="Ajouter une UE" id="repeater-button"/> 
                                    </div>

                                </div>
                            </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
        <a href="{{ route('cours.index') }}" type="button"
            class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>
        <button type="submit" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                class="align-middle ri-check-line label-icon fs-16 me-2"></i> Enregistrer</button>

    </div>
</form>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ URL::asset('build/js/pages/select2.min.js') }}"></script>

    <script>
    $('.select2-ue').select2({
        tags: true,
        placeholder: "Sélectionner une UE",
    });
    $('.select2-ecue').select2({
        tags: true,
        placeholder: "Sélectionner un EC",
    });
    $('.select2-enseignant').select2({
        tags: false,
        placeholder: "Sélectionner un ensignant",
    });
    </script>
    <script src="{{ URL::asset('build/js/pages/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-repeater.int.js') }}"></script>
    <script>
    $(document).ready(function () {
    $('.repeater').repeater({
        initEmpty: false,
        defaultValues: {
            'text-input': 'foo'
        },
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            if(confirm("Voulez-vous vraiment supprimer l'UE")) {
                $(this).slideUp(deleteElement);
            }
        },
        
        ready: function (setIndexes) {
            $dragAndDrop.on('drop', setIndexes);
        },
        isFirstItemUndeletable: false
    })
    });
    </script>

    <script type="text/javascript">
    $("#repeater-button").click(function(){
    setTimeout(function(){

        $('.select2-container').remove();
        $('.select2-ue').select2({
            placeholder: "Sélectionner une UE",
            tags: true,
            allowClear: true
        });
        $('.select2-ecue').select2({
            placeholder: "Sélectionner un EC",
            tags: true,
            allowClear: true
        });
        $('.select2-enseignant').select2({
            placeholder: "Sélectionner un enseignant",
            allowClear: true
        });
        $('.select2-container').css('width','100%');

    }, 100);
    });
    </script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
