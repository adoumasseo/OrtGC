@extends('layouts.master')
@section('title')
    Programmation des cours
@endsection
@section('css')
<link href="{{ URL::asset('build/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
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
                if(confirm('Are you sure you want to delete this element?')) {
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