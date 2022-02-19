@extends('back.layouts.master')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-heading">
                            <div>Edit schedule 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="page-links-heading">
                            Edit schedule 
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
                <form class="needs-validation " novalidate action="{{ route('schedule.update',$schedule->id) }}" method="post"
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
                    <div class="form-row ">
                        <div class="col-md-6 mb-3">
                            <label>date</label>
                            <input type="hidden" class="form-control" hidden name="date" value="{{ $schedule->date }}" placeholder=" name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>time</label>
                            <input type="hidden" class="form-control"  name="time" value="{{ $schedule->date }}" placeholder=" name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>status</label>
                            <select name="status"  class="form-control" id="">
                                <option @if ($schedule->status == 1 ) {{'selected'}}   @endif value="1">reserved</option>
                                <option @if ($schedule->status == 0 ) {{'selected'}}   @endif value="0">non reserved</option>

                            </select>
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
