@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('search') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="id" class="col-md-4 col-form-label text-md-right">Student ID</label>
                                <div class="col-md-6">
                                    <input type="text" name="id" class="form-control" required="required" placeholder="Student ID">
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
