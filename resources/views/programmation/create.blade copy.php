@extends('layouts.master')
@section('title')
    Création d'un cours
@endsection
@section('css')
    <link href="{{ URL::asset('build/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="border card rounded-0">

        <div class="card-header">
            <h2 class="card-title">
                AIP
            </h2>
        </div>

        <div class="card-body">
            <form action="{{ route('programmation.store') }}" method="post" class="repeater">
                @csrf
                <div class="py-2 row d-flex justify-content-center">

                    <div class="mb-3 col-md-12">
                        <label for="ue" class="form-label">UE</label>
                        <select class="select2-ue" name="ue">
                            <option>Selectionner une UE</option>
                            @foreach ($ues as $ue)
                                <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                            @endforeach
                        </select>
                        @error('ue')
                            <span class="text-danger"> {{ $errors->first('ue') }}</span>
                        @enderror
                    </div>

                </div>




                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nested</h4>
                                <form class="outer-repeater">
                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item class="outer">
                                            <div class="mb-3">
                                                <label class="form-label" for="formname">Name :</label>
                                                <input type="text" class="form-control" id="formname" placeholder="Enter your Name...">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="formemail">Email :</label>
                                                <input type="email" class="form-control" id="formemail" placeholder="Enter your Email...">
                                            </div>

                                            <div class="inner-repeater mb-4">
                                                <div data-repeater-list="inner-group" class="inner mb-3">
                                                    <label class="form-label">Phone no :</label>
                                                    <div data-repeater-item class="inner mb-3 row">
                                                        <div class="col-md-10 col-sm-8">
                                                            <input type="text" class="inner form-control" placeholder="Enter your phone no..."/>
                                                        </div>
                                                        <div class="col-md-2 col-sm-4">
                                                            <div class="d-grid">
                                                                <input data-repeater-delete type="button" class="btn btn-primary inner mt-2 mt-sm-0" value="Delete"/>
                                                            </div>    
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <input data-repeater-create type="button" class="btn btn-success inner" value="Add Number"/>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label mb-3 d-flex">Gender :</label>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="form-check-input">
                                                    <label class="form-check-label" for="customRadioInline1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="form-check-input">
                                                    <label class="form-check-label" for="customRadioInline2">Female</label>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="formmessage">Message :</label>
                                                <textarea id="formmessage" class="form-control" rows="3" placeholder="Type text..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                            <!-- end cardbody -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->


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
    <!--select2 cdn-->
    <script src="{{ URL::asset('build/js/pages/select2.min.js') }}"></script>

    <script>
        $('.select2-ue').select2({
            tags: true,
        });
    </script>

    <script src="{{ URL::asset('build/js/pages/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-repeater.int.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
