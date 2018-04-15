@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Student</div>
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        @foreach($datas as $data)
                            <form method="POST" action="{{ url('Students/delete/'.$data->id) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value={{$data->id}} >

                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="first_name" class="form-control" required="required" value="{{$data->first_name}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                                    <div class="col-md-6">
                                        <input type="text" name="surname" class="form-control" required="required" value="{{$data->surname}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                    <div class="col-md-6">
                                        <input type="date" name="dob" class="form-control" required="required" value="{{$data->dob}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="optional_id" class="col-md-4 col-form-label text-md-right">Optional ID</label>
                                    <div class="col-md-6">
                                        <input type="text" name="optional_id" class="form-control" required="required" value="{{$data->optional_id}}">
                                        @if ($errors->has('optional_id'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('optional_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="text" name="email" class="form-control" required="required" value="{{$data->email}}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                    <div class="col-md-6">
                                        <select name="gender">
                                            <option value="{{$data->gender}}">{{$data->gender}}</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="passport" class="col-md-4 col-form-label text-md-right">Passport</label>
                                    <div class="col-md-6">
                                        <input type="text" name="passport" class="form-control" required="required" value="{{$data->passport}}">
                                        @if ($errors->has('passport'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('passport') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control" required="required" value={{$data->phone}}>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <textarea name="address" rows="3" class="form-control" required="required" value="{{$data->address}}">{{$data->address}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                                    <div class="col-md-6">
                                        <select name="type">
                                            <option value="{{$data->type}}">{{$data->type}}</option>
                                            <option value="international">International</option>
                                            <option value="domestic">Domestic</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="campus" class="col-md-4 col-form-label text-md-right">Campus</label>
                                    <div class="col-md-6">
                                        <select name="campus">
                                            <option value="{{$data->campus}}">{{$data->campus}}</option>
                                            <option value="melbourne">Melbourne</option>
                                            <option value="sydney">Sydney</option>
                                            <option value="hobart">Hobart</option>
                                            <option value="brisbane">Brisbane</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nationality" class="form-control" required="required" value="{{$data->nationality}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="note" class="col-md-4 col-form-label text-md-right">Student Note</label>
                                    <div class="col-md-6">
                                        <textarea name="note" rows="7" class="form-control" required="required" value="{{$data->note}}">{{$data->note}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{ url('Students/'.$data->id.'/edit') }}" class="btn btn-success">Edit</a>
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

