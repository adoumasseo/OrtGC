@extends('layouts.master')
@section('title')
    Création d'un utilisateur
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="border card rounded-0">

        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="py-2 row d-flex justify-content-center">

                    <div class="mb-3 col-md-12">
                        <label for="basiInput" class="form-label">Université</label>
                        <select class="form-control js-example-templating" name="ufr_id">
                            @foreach($universites as $universite)
                                <optgroup label="{{$universite->nom}}">
                                    @foreach($universite->ufrs as $ufr)
                                        <option value="{{$ufr->id}}">{{$ufr->nom}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('ufr_id')
                            <span class="text-danger"> {{ $errors->first('ufr_id') }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-12">
                        <div class="col-md-6">
                            <label for="basiInput" class="form-label">Montant</label>
                            <input type="number" placeholder="000" class="form-control @error('montant') is-invalid @enderror" name="montant"
                                   value="{{ old('montant') }}" id="basiInput">
                            @error('montant')
                            <span class="text-danger"> {{ $errors->first('montant') }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                    <a href="{{ route('cycles.index') }}" type="button"
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
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
