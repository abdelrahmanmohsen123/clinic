@extends('back.layouts.master')
@section('custom-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-heading">
                            <div>Add bill service
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="page-links-heading">
                            Add bill service / <a href="{{ route('bill.index') }}">bill</a> /
                            <a href="{{ route('dashboard.index') }}">Home</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="app-main__inner">

        <div class="main-card mb-3 card ">
            <div class="card-body">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-diamond">
                        </i>
                    </div>

                </div>
                <form class="needs-validation " novalidate action="{{ route('bill.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row ">
                       

                       
                        <div class="col-md-6 mb-3">
                            <label>Choose  Patients</label>
                            <select class="form-control" name="patient_id"
                                required>
                                <option value="" selected disabled>Choose patient ..</option>
                                @foreach ($patients as $patient)
                                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                                @endforeach
                            
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Choose  visit</label>
                            <select class="form-control" name="visit_id"
                                required>
                                <option value="" selected disabled>Choose visit ..</option>
                                @foreach ($visits as $visit)
                                    <option value="{{$visit->id}}">{{$visit->visit_type}} {{$visit->price}}</option>
                                @endforeach
                                
                            
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>procedure</label>
                            {{-- <select class="js-example-basic-multiple form-control" name="procedures[]" multiple="multiple"> --}}
                                
                                @foreach ($procedures as $procedure)
                                    {{-- <option value="{{ $procedure->id }}">{{ $procedure->name }}</option> --}}
                                    <div class="form-check ">
                                        <input class="form-check-input " type="checkbox" name="procedures[]" value="{{$procedure->id}}" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            {{ $procedure->name }}
                                        </label>
                                    </div>
                                @endforeach
                                
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            {{-- </select> --}}
                        </div>
                       
                       
                        

                        @if ($errors->has('files'))
                            @foreach ($errors->get('files') as $error)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $error }}</strong>
                                </span>
                            @endforeach
                        @endif

                    </div>
                    <button class="btn btn-primary" type="submit">Add New</button>
                </form>

                <script>
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            var forms = document.getElementsByClassName('needs-validation');
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </div>
        </div>
 
    @endsection
    @section('custom-script')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endsection
