@extends('layouts.master')
@section('title')
    Détail d'une ufr
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="card rounded-0 ">
        <div class="card-header">
            <h2 class="card-title">
                {{ $ufr->nom }}
            </h2>
        </div>
        <div class="card-body">
            <div class="py-2 row d-flex justify-content-center">

                <div class="mb-3 col-md-12">
                    <label for="basiInput" class="form-label">Code de l'ufr</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                        value="{{ $ufr->code }}" id="basiInput">
                    @error('code')
                        <span class="text-danger"> {{ $errors->first('code') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-12">
                    <label for="nomInput" class="form-label">Nom l'ufr</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                        value="{{ $ufr->nom }}" id="nomInput">
                    @error('nom')
                        <span class="text-danger"> {{ $errors->first('nom') }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-12">
                    <label for="universite" class="form-label">Université de l'ufr</label>
                    <select name="universite_id" id="universite"
                        class="form-control @error('universite_id') is-invalid @enderror">
                            <option value="{{$ufr->universite->id}}">{{$ufr->universite->nom}}</option>
                    </select>
                    @error('universite_id')
                        <span class="text-danger"> {{ $errors->first('universite_id') }}</span>
                    @enderror
                </div>


                <div class="mb-3 col-md-12">
                    <label for="adresseInput" class="form-label">Adresse l'ufr</label>
                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                        value="{{ $ufr->adresse}}" id="adresseInput">
                    @error('adresse')
                        <span class="text-danger"> {{ $errors->first('adresse') }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-12">
                    <label for="siteInput" class="form-label">Site web de l'ufr</label>
                    <input type="text" class="form-control @error('siteweb') is-invalid @enderror" name="siteweb"
                        value="{{ $ufr->siteweb }}" id="siteInput">
                    @error('siteweb')
                        <span class="text-danger"> {{ $errors->first('siteweb') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-12">
                    <label for="emailInput" class="form-label">Email de l'ufr</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $ufr->email }}" id="emailInput">
                    @error('email')
                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-12">
                    <label for="directeurInput" class="form-label">Directeur de l'ufr</label>
                    <input type="text" class="form-control @error('directeur') is-invalid @enderror" name="directeur"
                        value="{{ $ufr->directeur}}" id="directeurInput">
                    @error('directeur')
                        <span class="text-danger"> {{ $errors->first('directeur') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-12">
                    <label for="villeInput" class="form-label">Ville de l'ufr</label>
                    <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville"
                        value="{{ $ufr->ville }}" id="villeInput">
                    @error('ville')
                        <span class="text-danger"> {{ $errors->first('ville') }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-md-12">
                    <label for="logoInput" class="form-label">Logo de l'ufr</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"
                        value="{{ $ufr->logo }}" id="logoInput">
                    @error('logo')
                        <span class="text-danger"> {{ $errors->first('logo') }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-md-12">
                    <label for="telInput" class="form-label">Téléphone de l'ufr</label>
                    <input type="tel" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                        value="{{ $ufr->telephone }}" id="telInput">
                    @error('telephone')
                        <span class="text-danger"> {{ $errors->first('telephone') }}</span>
                    @enderror
                </div>

            </div>
            <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                <a href="{{ route('ufrs.index') }}" type="button"
                    class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                        class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>
                <a href="{{ route('ufrs.edit', ['ufr' => $ufr->slug]) }}">
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
