@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Course Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('course_search') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Course Code</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" class="form-control" required="required" placeholder="Course Code">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection