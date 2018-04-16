@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Class</div>
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('lesson_add') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="unit_code" class="col-md-4 col-form-label text-md-right">Unit Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="unit_code" class="form-control" required="required" placeholder="Unit Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Class Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Class Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Class Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" class="form-control" required="required" placeholder="Class Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                                <div class="col-md-6">
                                    <input type="number" name="duration" class="form-control" required="required" placeholder="Duration">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="delivery_mode" class="col-md-4 col-form-label text-md-right">Delivery Mode</label>
                                <div class="col-md-6">
                                    <input type="text" name="delivery_mode" class="form-control" required="required" placeholder="Delivery Mode">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                <div class="col-md-6">
                                    <input type="date" name="start_date" class="form-control" required="required" placeholder="Start Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                <div class="col-md-6">
                                    <input type="date" name="end_date" class="form-control" required="required" placeholder="End Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea type="text" name="description" class="form-control" rows="3" required="required" placeholder="Description"></textarea>
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
