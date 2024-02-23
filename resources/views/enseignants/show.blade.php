@extends('layouts.master')
@section('title')
    Détail d'un enseignant
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="card rounded-0 ">
        <div class="card-header">
            <h2 class="card-title">
                {{ $enseignant->nom }}
            </h2>
        </div>
        <div class="card-body">
            <div class="py-2 row d-flex justify-content-center">

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Nom de l'enseignant</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                        value="{{ $enseignant->nom }}" id="basiInput" readonly>
                    @error('nom')
                        <span class="text-danger"> {{ $errors->first('nom') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Prénoms de l'enseignant</label>
                    <input type="text" class="form-control @error('prenoms') is-invalid @enderror" name="prenoms"
                        value="{{ $enseignant->prenoms }}" id="basiInput" readonly>
                    @error('prenoms')
                        <span class="text-danger"> {{ $errors->first('prenoms') }}</span>
                    @enderror
                </div>


                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Email de l'enseignant</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $enseignant->email }}" id="basiInput" readonly>
                    @error('email')
                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Téléphone de l'enseignant</label>
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                        value="{{ $enseignant->telephone }}" id="basiInput" readonly>
                    @error('telephone')
                        <span class="text-danger"> {{ $errors->first('telephone') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Sexe de l'enseignant</label>
                    <input type="text" class="form-control @error('sexe') is-invalid @enderror" name="sexe"
                    value="{{ $enseignant->sexe }}" id="basiInput" readonly>
                    @error('sexe')
                        <span class="text-danger"> {{ $errors->first('sexe') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Profession de l'enseignant</label>
                    <input type="text" class="form-control @error('profession') is-invalid @enderror"
                        name="profession" value="{{ $enseignant->profession }}" id="basiInput" readonly>
                    @error('profession')
                        <span class="text-danger"> {{ $errors->first('profession') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Adresse de l'enseignant</label>
                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                        value="{{ $enseignant->adresse }}" id="basiInput" readonly>
                    @error('adresse')
                        <span class="text-danger"> {{ $errors->first('adresse') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Nationalité de l'enseignant</label>
                    <input type="text" class="form-control @error('nationalite') is-invalid @enderror"
                        name="nationalite" value="{{ $enseignant->nationalite }}" id="basiInput" readonly>
                    @error('nationalite')
                        <span class="text-danger"> {{ $errors->first('nationalite') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Date de naissance de l'enseignant</label>
                    <input type="date" class="form-control @error('date_naissance') is-invalid @enderror"
                        name="date_naissance" value="{{ $enseignant->date_naissance }}" id="basiInput" readonly>
                    @error('date_naissance')
                        <span class="text-danger"> {{ $errors->first('date_naissance') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Npi de l'enseignant</label>
                    <input type="text" class="form-control @error('npi') is-invalid @enderror" name="npi"
                        value="{{ $enseignant->npi }}" id="basiInput" readonly>
                    @error('npi')
                        <span class="text-danger"> {{ $errors->first('npi') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Numéro IFU de l'enseignant</label>
                    <input type="text" class="form-control @error('ifu') is-invalid @enderror" name="ifu"
                        value="{{ $enseignant->ifu }}" id="basiInput" readonly>
                    @error('ifu')
                        <span class="text-danger"> {{ $errors->first('ifu') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="basiInput" class="form-label">Banque de l'enseignant</label>
                    <input type="text" class="form-control @error('banque_id') is-invalid @enderror" name="banque_id"
                        value="{{ $enseignant->banque->nom }}" id="basiInput" readonly>
                    @error('banque_id')
                        <span class="text-danger"> {{ $errors->first('banque_id') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-12">
                    <label for="basiInput" class="form-label">Numéro de compte de l'enseignant</label>
                    <input type="text" class="form-control @error('compte') is-invalid @enderror" name="compte"
                        value="{{ $enseignant->compte }}" id="basiInput" readonly>
                    @error('compte')
                        <span class="text-danger"> {{ $errors->first('compte') }}</span>
                    @enderror
                </div>

            </div>
                <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                    <a href="{{ route('enseignants.index') }}" type="button"
                        class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                            class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>

                     <a href="{{ route('enseignants.edit', ['enseignant' => $enseignant->slug]) }}">
                        <button class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                            class="align-middle ri-check-line label-icon fs-16 me-2"></i> Editer</button>
                        </a>

                </div>

        </div>
    </div>
@endsection

@section('script')
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
