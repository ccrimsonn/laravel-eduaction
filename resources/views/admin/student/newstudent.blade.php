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

                        <form method="POST" action="{{ route('add') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="form-control" required="required" placeholder="first name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                                <div class="col-md-6">
                                    <input type="text" name="surname" class="form-control" required="required" placeholder="Surname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                <div class="col-md-6">
                                    <input type="date" name="dob" class="form-control" required="required" placeholder="Date of Birth">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="optional_id" class="col-md-4 col-form-label text-md-right">Optional ID</label>
                                <div class="col-md-6">
                                    <input type="text" name="optional_id" class="form-control" required="required" placeholder="Optional ID">
                                    @if ($errors->has('optional_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('optional_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" required="required" placeholder="Password">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control" required="required" placeholder="E-mail">
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
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="passport" class="col-md-4 col-form-label text-md-right">Passport</label>
                                <div class="col-md-6">
                                    <input type="text" name="passport" class="form-control" required="required" placeholder="Passport">
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
                                    <input type="text" name="phone" class="form-control" required="required" placeholder="Phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea name="address" rows="3" class="form-control" required="required" placeholder="Address"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                                <div class="col-md-6">
                                    <select name="type">
                                        <option value="international">International</option>
                                        <option value="domestic">Domestic</option>
                                        </select>
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

                            <div class="form-group row">
                                <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality</label>
                                <div class="col-md-6">
                                    <input type="text" name="nationality" class="form-control" required="required" placeholder="Nationality">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="note" class="col-md-4 col-form-label text-md-right">Student Note</label>
                                <div class="col-md-6">
                                    <textarea name="note" rows="7" class="form-control" required="required" placeholder="Student Note"></textarea>
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
