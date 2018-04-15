@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Assessment</div>
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('assessment_add') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="lesson_code" class="col-md-4 col-form-label text-md-right">Class Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="lesson_code" class="form-control" required="required" placeholder="Class Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Assessment Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Assessment Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea type="text" name="description" class="form-control" rows="3" required="required" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <select name="status">
                                        <option value="show">Show</option>
                                        <option value="hidden">Hidden</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assessment_file" class="col-md-4 col-form-label text-md-right">Upload File</label>
                                <div class="col-md-6">
                                    <input type="file" id="assessment_file" name="assessment_file" class="form-control" required="required">
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
