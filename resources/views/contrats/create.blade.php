@extends('layouts.master')
@section('title')
@lang('translation.advanced')
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('build/libs/multi.js/multi.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('build/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Etablir un contrat</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div>

                            <form>
                                <div class="col-lg-12  mb-2">
                                    <h6 class="fw-semibold">Enseignant</h6>

                                    <select class="js-example-basic-single" name="valeur_selectionnee" id="id="valeurSelectionnee">
                                        @foreach ($enseignants as $enseignant)
                                            <option value="AL">{{ $enseignant->nom . " " . $enseignant->prenoms}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-2 position-relative mb-2" >
                                    <label for="validationTooltip01" class="form-label">Numero</label>
                                    <input type="number" class="form-control" id="validationTooltip01"
                                        required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <h6 class="fw-semibold">Cours</h6>

                                <select required multiple="multiple" name="favorite_fruits" id="multiselect-basic">
                                    <option selected>Apple</option>
                                    <option>Banana</option>
                                    <option selected>Blueberry</option>
                                    <option selected>Cherry</option>
                                    <option>Coconut</option>
                                    <option>Grapefruit</option>
                                    <option>Kiwi</option>
                                    <option>Lemon</option>
                                    <option>Lime</option>
                                    <option>Mango</option>
                                    <option>Orange</option>
                                    <option>Papaya</option>
                                </select>
                                <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                                    <a href="" type="button"
                                        class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                                            class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>
                                    <button type="submit" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                                            class="align-middle ri-check-line label-icon fs-16 me-2"></i> Enregistrer</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end col -->


                    <!-- end col -->
                </div>
                <!-- end row -->


                <!-- end row -->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/@tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-input-spin.init.js') }}"></script>
<!-- input flag init -->
<script src="{{URL::asset('build/js/pages/flag-input.init.js')}}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
<!--jquery cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/app.js') }}"></script>


        <script>
            $(document).ready(function () {
                $('#valeurSelectionnee').change(function () {
                    var valeurSelectionnee = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("select") }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            valeur_selectionnee: valeurSelectionnee
                        },
                        success: function (data) {
                            // Mettez à jour votre interface utilisateur en fonction des résultats
                            var resultatContainer = $('#resultats-container');
                            resultatContainer.empty();

                            if (data.resultats.length > 0) {
                                var html = '<ul>';
                                $.each(data.resultats, function (index, resultat) {
                                    html += '<li>' + resultat.nom_colonne + '</li>';
                                    // Personnalisez cela en fonction de votre modèle
                                });
                                html += '</ul>';
                                resultatContainer.append(html);
                            } else {
                                resultatContainer.append('<p>Aucun résultat trouvé.</p>');
                            }
                        },
                        error: function (error) {
                            console.log('Erreur : ' + error.responseText);
                        }
                    });
                });
            });
        </script>
@endsection
