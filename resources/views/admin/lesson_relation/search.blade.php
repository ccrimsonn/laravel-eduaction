@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enrollment Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('enrolM_search') }}">
                            {{ csrf_field() }}
                            @if($value == "student")
                            <div class="form-group row">
                                <label for="optionalId" class="col-md-4 col-form-label text-md-right">Optional ID</label>
                                <div class="col-md-6">
                                    <input type="text" name="optionalId" class="form-control" placeholder="Optional ID">
                                </div>
                            </div>
                            @endif
                            @if($value == "lesson")
                            <div class="form-group row">
                                <label for="lesson_code" class="col-md-4 col-form-label text-md-right">Class Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="lesson_code" class="form-control" placeholder="Class Code">
                                </div>
                            </div>
                            @endif
                            @if($value == "trainer")
                                <div class="form-group row">
                                    <label for="TOptionalId" class="col-md-4 col-form-label text-md-right">Trainer ID</label>
                                    <div class="col-md-6">
                                        <input type="text" name="TOptionalId" class="form-control" placeholder="Trainer ID">
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection