@extends('back.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-heading">
                            <div>Add visit
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="page-links-heading">
                            Add visit
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
                <form class="needs-validation " novalidate action="{{ route('visit.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                            <label>Choose  schedules</label>
                            <select class="form-control" name="schedule_id"
                                required>
                                <option value="" selected disabled>Choose schedule ..</option>
                                @foreach ($schedules as $schedule)
                                    <option value="{{$schedule->id}}">{{$schedule->date}} {{$schedule->time}}</option>
                                @endforeach
                            
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>    
                    <div class="form-row ">
                        <div class="col-md-6 mb-3">
                            <label>visit_type</label>
                            <select name="visit_type"  class="form-control" id="">
                                <option  value="Examination">Examination</option>
                                <option  value="Consultation">Consultation</option>

                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" placeholder="price" required>
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

    </div>
@endsection
