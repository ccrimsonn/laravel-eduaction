@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Unit</div>
                    <div class="card-body">

                        @foreach($datas as $data)
                            <form method="POST" action="{{ url('Lessons/lesson_delete/'.$data->id) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="course_name" class="col-md-4 col-form-label text-md-right">Unit Name</label>
                                    <div class="col-md-6">
                                        <label for="course_name" class="col-md-10 col-form-label text-md-left">{{ $unit_name }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Class Name</label>
                                    <div class="col-md-6">
                                        <label for="name" class="col-md-10 col-form-label text-md-left">{{ $data->name }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">Class Code</label>
                                    <div class="col-md-6">
                                        <label for="code" class="col-md-10 col-form-label text-md-left">{{ $data->code }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                                    <div class="col-md-6">
                                        <label for="duration" class="col-md-10 col-form-label text-md-left">{{ $data->duration }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="delivery_mode" class="col-md-4 col-form-label text-md-right">Delivery Mode</label>
                                    <div class="col-md-6">
                                        <label for="delivery_mode" class="col-md-10 col-form-label text-md-left">{{ $data->delivery_mode }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                    <div class="col-md-6">
                                        <label for="start_date" class="col-md-10 col-form-label text-md-left">{{ $data->start_date }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                    <div class="col-md-6">
                                        <label for="end_date" class="col-md-10 col-form-label text-md-left">{{ $data->end_date }}</label>
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
                                        <a href="{{ url('Lessons/'.$data->id.'/edit') }}" class="btn btn-success">Edit</a>
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
