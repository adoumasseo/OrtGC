@extends('layouts.master')

@section('title')
    Détail d'une classe
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            text-align: center;
            padding: 20px;
        }
        .card-title {
            color: #495057;
            font-size: 2rem;
            margin-bottom: 0;
        }
        .card-body {
            padding: 40px;
        }
        .detail-item {
            margin-bottom: 20px;
        }
        .detail-label {
            font-weight: bold;
        }
        .detail-value {
            margin-top: 5px;
        }
        .btn-container {
            text-align: center;
            margin-top: 40px;
        }
        .btn-action {
            margin-right: 20px;
        }
    </style>
@endsection

@section('content')
<div class="card rounded-0 ">
    <div class="card-header">
        <h2 class="card-title">
            {{ $class->nom }}
        </h2>
    </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-item">
                        <span class="detail-label">Nom du departement:</span>
                        <span class="detail-value">{{ $class->filiere->departement->nom }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nom de la filière:</span>
                        <span class="detail-value">{{ $class->filiere->nom }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nom de la classe:</span>
                        <span class="detail-value">{{ $class->nom }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="detail-item">
                        <span class="detail-label">Effectif:</span>
                        <span class="detail-value">{{ $class->effectif }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Niveau:</span>
                        <span class="detail-value">{{ $class->niveau }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nom du cycle:</span>
                        <span class="detail-value">{{ $class->cycle->nom }}</span>
                    </div>
                </div>
            </div>

            <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                <a href="{{ route('classes.index') }}" type="button"
                    class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                        class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>

                 <a href="{{ route('classes.edit', ['class' => $class->slug]) }}">
                    <button class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                        class="align-middle ri-check-line label-icon fs-16 me-2"></i> Editer</button>
                    </a>

            </div>
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
