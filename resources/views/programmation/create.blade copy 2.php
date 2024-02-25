@extends('layouts.master')
@section('title')
    Création d'un cours
@endsection
@section('css')
    <link href="{{ URL::asset('build/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <form class="repeater">
        @csrf
    </form>




    <div class="border card rounded-0">
        <div class="card-header">
            <h2 class="card-title">
                AIP
            </h2>
        </div>

        <div class="card-body">
            <form class="repeater">
                @csrf
                    <div data-repeater-list="group-a">
                        <div data-repeater-item>
                            <label for="" class="form-label">UE</label>
                            <div class="py-2 row">
                                <div class="mb-3 col-md-10">
                                    <select class="select2-ue" name="ue">
                                        <option>Selectionner une UE</option>
                                        @foreach ($ues as $ue)
                                            <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <input data-repeater-delete type="button" value="Supprimer" class="btn btn-danger"/>
                                </div>
                            </div>
                            <!-- ECUE -->
                            <div data-repeater-list="group-b">
                                <div data-repeater-item>
                                    <label for="" class="form-label">ECUE</label>
                                    <div class="py-2 row">
                                        <div class="mb-3 col-md-10">
                                            <select class="select2-ue" name="ue">
                                                <option>Selectionner une UE</option>
                                                @foreach ($ues as $ue)
                                                    <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <input data-repeater-delete type="button" value="Supprimer" class="btn btn-danger"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input data-repeater-create type="button" value="Ajouter une UE" class="btn btn-primary"/>

                <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                    <a href="{{ route('banques.index') }}" type="button"
                        class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                            class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>
                    <button type="submit" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                            class="align-middle ri-check-line label-icon fs-16 me-2"></i> Enregistrer</button>

                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ URL::asset('build/js/pages/jquery.min.js')}}"></script>
<script src="{{ URL::asset('build/js/pages/select2.min.js') }}"></script>

    <script>
        $('.select2-ue').select2({
            tags: true,
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
            isFirstItemUndeletable: true
        })
    });
</script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection