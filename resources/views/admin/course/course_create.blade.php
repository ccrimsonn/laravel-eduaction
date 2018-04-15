@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Course</div>
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('course_add') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Course Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Course Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Course Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" class="form-control" required="required" placeholder="Course Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cricos_code" class="col-md-4 col-form-label text-md-right">Cricos Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="cricos_code" class="form-control" required="required" placeholder="Cricos Code">
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
                                    <input type="number" name="fee" class="form-control" required="required" step="any" placeholder="Course Fee">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="campus" class="col-md-4 col-form-label text-md-right">Campus</label>
                                <div class="col-md-6">
                                    <select name="campus">
                                        <option value="melbourne">Melbourne</option>
                                        <option value="sydney">Sydney</option>
                                        <option value="hobart">Hobart</option>
                                        <option value="brisbane">Brisbane</option>
                                    </select>
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
