@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Unit</div>
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('lesson_update') }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value={{$data->id}} >

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Class Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required="required" value="{{$data->name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Class Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" class="form-control" required="required" value="{{$data->code}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                                <div class="col-md-6">
                                    <input type="text" name="duration" class="form-control" required="required" value="{{$data->duration}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="delivery_mode" class="col-md-4 col-form-label text-md-right">Delivery Mode</label>
                                <div class="col-md-6">
                                    <input type="text" name="delivery_mode" class="form-control" required="required" value="{{$data->delivery_mode}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                <div class="col-md-6">
                                    <input type="date" name="start_date" class="form-control" required="required" value="{{$data->start_date}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                <div class="col-md-6">
                                    <input type="date" name="end_date" class="form-control" required="required" value="{{$data->end_date}}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
