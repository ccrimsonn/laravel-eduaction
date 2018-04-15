@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Unit</div>
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('unit_add') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="course_code" class="col-md-4 col-form-label text-md-right">Course Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="course_code" class="form-control" required="required" placeholder="Course Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Unit Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Unit Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Unit Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" class="form-control" required="required" placeholder="Unit Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                                <div class="col-md-6">
                                    <input type="number" name="duration" class="form-control" required="required" placeholder="Duration">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fee" class="col-md-4 col-form-label text-md-right">Fee</label>
                                <div class="col-md-6">
                                    <input type="number" name="fee" class="form-control" required="required" step="any" placeholder="Unit Fee">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
