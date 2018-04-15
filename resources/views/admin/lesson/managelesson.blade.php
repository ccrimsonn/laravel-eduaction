@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                        @foreach($infos as $info)
                            <form method="POST" action="{{ url('enrol_student/enrolM_delete/'.$info->id) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="hidden" name="lesson_studentId" value="{{$info->id}}">
                                <div class="form-group row">
                                    <label for="class_name" class="col-md-4 col-form-label text-md-right">Class Name</label>
                                    <div class="col-md-6">
                                        <label for="class_name" class="col-md-10 col-form-label text-md-left">{{ $info->name }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class_code" class="col-md-4 col-form-label text-md-right">Class Code</label>
                                    <div class="col-md-6">
                                        <label for="class_code" class="col-md-10 col-form-label text-md-left">{{ $info->code }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="optional_id" class="col-md-4 col-form-label text-md-right">Student ID</label>
                                    <div class="col-md-6">
                                        <label for="optional_id" class="col-md-10 col-form-label text-md-left">{{ $info->optional_id }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <label for="first_name" class="col-md-10 col-form-label text-md-left">{{ $info->first_name }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                                    <div class="col-md-6">
                                        <label for="surname" class="col-md-10 col-form-label text-md-left">{{ $info->surname }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <label for="email" class="col-md-10 col-form-label text-md-left">{{ $info->email }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campus" class="col-md-4 col-form-label text-md-right">Campus</label>
                                    <div class="col-md-6">
                                        <label for="campus" class="col-md-10 col-form-label text-md-left">{{ $info->campus }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                                    <div class="col-md-6">
                                        <label for="type" class="col-md-10 col-form-label text-md-left">{{ $info->type }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality</label>
                                    <div class="col-md-6">
                                        <label for="nationality" class="col-md-10 col-form-label text-md-left">{{ $info->nationality }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="delivery_mode" class="col-md-4 col-form-label text-md-right">Delivery Mode</label>
                                    <div class="col-md-6">
                                        <label for="delivery_mode" class="col-md-10 col-form-label text-md-left">{{ $info->delivery_mode }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                    <div class="col-md-6">
                                        <label for="start_date" class="col-md-10 col-form-label text-md-left">{{ $info->start_date }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                    <div class="col-md-6">
                                        <label for="end_date" class="col-md-10 col-form-label text-md-left">{{ $info->end_date }}</label>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
