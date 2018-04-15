@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Trainer</div>
                    <div class="card-body">

                        @foreach($datas as $data)
                            <form method="POST" action="{{ url('Trainers/trainer_delete/'.$data->id) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <label for="first_name" class="col-md-10 col-form-label text-md-left">{{ $data->first_name }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                                    <div class="col-md-6">
                                        <label for="surname" class="col-md-10 col-form-label text-md-left">{{ $data->surname }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="optional_id" class="col-md-4 col-form-label text-md-right">Optional ID</label>
                                    <div class="col-md-6">
                                        <label for="optional_id" class="col-md-10 col-form-label text-md-left">{{ $data->optional_id }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <label for="address" class="col-md-10 col-form-label text-md-left">{{ $data->address }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <label for="email" class="col-md-10 col-form-label text-md-left">{{ $data->email }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <label for="phone" class="col-md-10 col-form-label text-md-left">{{ $data->phone }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality</label>
                                    <div class="col-md-6">
                                        <label for="nationality" class="col-md-10 col-form-label text-md-left">{{ $data->nationality }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campus" class="col-md-4 col-form-label text-md-right">Campus</label>
                                    <div class="col-md-6">
                                        <label for="campus" class="col-md-10 col-form-label text-md-left">{{ $data->campus }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                    <div class="col-md-6">
                                        <label for="dob" class="col-md-10 col-form-label text-md-left">{{ $data->dob }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Nationality</label>
                                    <div class="col-md-6">
                                        <label for="gender" class="col-md-10 col-form-label text-md-left">{{ $data->nationality }}</label>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{ url('Trainers/'.$data->id.'/edit') }}" class="btn btn-success">Edit</a>
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
