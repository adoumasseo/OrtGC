@extends('layouts.master')
@section('title')
    Programmation des cours
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{ $classe->nom }}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('programmation.create') }}">
                        <button type="button" class="btn btn-success add-btn">
                            <i class="align-bottom ri-add-line me-1"></i> Ajouter
                        </button>
                    </a>
                </div>

                <div class="live-preview">
                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                        @foreach ( getSemestre($classe->niveau) as $semestre)  
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionlefticonExample{{ $semestre }}">
                                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#accor_lefticonExamplecollapse{{ $semestre }}" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse{{ $semestre }}">
                                        Semestre {{ $semestre }}
                                    </button>
                                </h2>
                                <div id="accor_lefticonExamplecollapse{{ $semestre }}" class="accordion-collapse collapse show" aria-labelledby="accordionlefticonExample{{ $semestre }}" data-bs-parent="#accordionlefticon" style="">
                                    <div class="accordion-body">
                                                <div class="accordion-flush" id="accordionFlushExample">
                                                    @foreach ( getUeBySemestre($classe->id,$semestre) as $cours )
                                                        <div class="">
                                                            <h2 class="" id="flush-heading{{ $cours->id }}">
                                                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $cours->id }}" aria-expanded="true" aria-controls="flush-collapse{{ $cours->id }}">
                                                                    {{ $cours->ue->nom }}
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapse{{ $cours->id }}" class="accordion-collapse collapse show" aria-labelledby="flush-heading{{ $cours->id }}" data-bs-parent="#accordionFlushExample" style="">
                                                                <div class="accordion-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">ECUE</th>
                                                                                    <th scope="col">Enseignant</th>
                                                                                    <th scope="col">Masse horaire</th>
                                                                                    <th scope="col">Exécuté</th>
                                                                                    <th scope="col">Date début</th>
                                                                                    <th scope="col">Date fin</th>
                                                                                    <th scope="col">Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="fw-medium">01</td>
                                                                                    <td>Bobby Davis</td>
                                                                                    <td>50</td>
                                                                                    <td>25</td>
                                                                                    <td>25/01/2024</td>
                                                                                    <td>20/02/2024</td>
                                                                                    <td><span class="badge bg-success">Confirmed</span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
               
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!--end col-->
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
