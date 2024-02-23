@extends('layouts.master')
@section('title')
   Liste des départements
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

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">

                <div class="mb-3">
                    <a href="{{ route('departements.create') }}">
                        <button type="button" class="btn btn-success add-btn">
                            <i class="align-bottom ri-add-line me-1"></i> Ajouter
                        </button>
                    </a>
                    <button class="btn btn-soft-danger" id="delete-record"><i class="ri-delete-bin-2-line"></i></button>
                </div>
                <div class="table-responsive">
                    <table id="departementsTable" class="table align-middle table-bordered table-striped"
                        style="width:100%">
                        <thead>
                            <tr>
                                @if (Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur'))
                                        <th scope="col" style="width: 10px;"></th>
                                    @endif
                                <th>Code du département</th>
                                <th>Nom du département</th>
                                <th>Nom de l'ufr</th>
                                <th>Nom du chef département</th>
                                <th>Logo</th>
                                @if (Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur'))
                                    <th class="" data-sort="action" style="width: 40px;">Actions</th>
                                @else
                                    <th class="" data-sort="action" style="width: 20px;">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departements as $item)
                                <tr>
                                    @if (Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur'))
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input fs-15" type="checkbox" name="check"
                                                        value="{{ $item->id }}">
                                                </div>
                                            </th>
                                        @endif
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->nom }}</td>
                                    <td>{{ optional($item->ufrs)->nom }}</td>
                                    <td>{{ optional($item->enseignants)->nom }} {{ optional($item->enseignants)->prenoms }}</td>
                                    <td>{{ $item->logo }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('departements.show', ['departement' => $item->id]) }}"
                                                type="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Voir"
                                                class="mb-1 ms-1 btn btn-sm btn-info btn-icon waves-effect waves-light"><i
                                                    class="ri-eye-line"></i></a>
                                            @if (Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur'))
                                                <a href="{{ route('departements.edit', ['departement' => $item->id]) }}"
                                                    type="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Editer"
                                                    class="mb-1 ms-1 btn btn-sm btn-warning btn-icon waves-effect waves-light"><i
                                                        class="ri-edit-line"></i>
                                                </a>

                                                <button type="button" data-departement="{{ $item->slug }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Supprimer" id="{{ $item->id }}"
                                                    class="mb-1 ms-1 btn-delete btn btn-sm btn-danger btn-icon waves-effect waves-light"><i
                                                        class="ri-close-line"></i></button>
                                            @endif


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
<script src="{{ URL::asset('assets/js/pages/customs/departement.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
