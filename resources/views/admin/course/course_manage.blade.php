@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Course</div>
                    <div class="card-body">

                        @foreach($datas as $data)
                        <form method="POST" action="{{ url('Courses/course_delete/'.$data->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Course Name</label>
                                <div class="col-md-6">
                                    <label for="name" class="col-md-10 col-form-label text-md-left">{{ $data->name }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Course Code</label>
                                <div class="col-md-6">
                                    <label for="code" class="col-md-10 col-form-label text-md-left">{{ $data->code }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cricos_code" class="col-md-4 col-form-label text-md-right">Cricos Code</label>
                                <div class="col-md-6">
                                    <label for="cricos_code" class="col-md-10 col-form-label text-md-left">{{ $data->cricos_code }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                                <div class="col-md-6">
                                    <label for="duration" class="col-md-10 col-form-label text-md-left">{{ $data->duration }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fee" class="col-md-4 col-form-label text-md-right">Fee</label>
                                <div class="col-md-6">
                                    <label for="fee" class="col-md-10 col-form-label text-md-left">{{ $data->fee }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="campus" class="col-md-4 col-form-label text-md-right">Campus</label>
                                <div class="col-md-6">
                                    <label for="campus" class="col-md-10 col-form-label text-md-left">{{ $data->campus }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <lable for="description" class="col-md-10 col-form-label text-md-left">{{$data->description}}</lable>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ url('Courses/'.$data->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
