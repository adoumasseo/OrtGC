@extends('layouts.master')
@section('title')
    Transmission des TS - {{ $departement->nom }}
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{ route('cours.post_transmettre')}}">
                <button type="button" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                class="align-middle ri-check-line label-icon fs-16 me-2"></i> Transmettre les TS au service de programmation</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="banquesTable" class="table align-middle table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Filière</th>
                                    <th>Classe</th>
                                    <th>Semestre impaire</th>
                                    <th>Semestre paire</th>
                                    <th class="" data-sort="action" style="width: 15px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $classe)
                                    <tr>
                                        <td>{{ $classe->filiere->nom }}</td>
                                        <td>{{ $classe->nom }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('cours.show', ['classe' => $classe->slug]) }}"
                                                    type="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Voir le TS"
                                                    class="mb-1 ms-1 btn btn-sm btn-info btn-icon waves-effect waves-light"><i
                                                        class="ri-eye-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>




                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/customs/banque.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
