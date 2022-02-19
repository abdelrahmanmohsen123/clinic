@extends('back.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-heading">
                            <div>Edit assessment 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="page-links-heading">
                            Edit assessment 
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
                <form class="needs-validation " novalidate action="{{ route('assessment.update',$assessment->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}

                    @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-12 mb-3">
                    <label>Choose  assessments</label>
                    <select class="form-control" name="patient_id"
                        required>
                        <option value="" selected disabled>Choose assessment ..</option>
                        @foreach ($patients as $patient)
                            <option @if($patient->id==$assessment->patient_id) {{'selected'}}                                
                            @endif value="{{$patient->id}}">{{$patient->name}}</option>
                        @endforeach
                    
                    </select>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="form-row ">
                    <div class="col-md-6 mb-3">
                        <label>diagnose</label>
                        <textarea class="form-control" name="diagnose" placeholder="diagnose"
                            required>{{ $assessment->diagnose }}</textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>prescription</label>
                        <textarea class="form-control" name="prescription" placeholder="prescription"
                            required>{{ $assessment->prescription }}</textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>lab_test</label>
                        <textarea class="form-control" name="lab_test" placeholder="lab_test"
                            required>{{ $assessment->lab_test }}</textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>other procedure</label>
                        <textarea class="form-control" name="other_procedure" placeholder="other_procedure"
                            >{{ $assessment->other_procedure }}</textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                        
                        @if ($errors->has('files'))
                            @foreach ($errors->get('files') as $error)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $error }}</strong>
                                </span>
                            @endforeach
                        @endif

                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
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

    </div>
@endsection
