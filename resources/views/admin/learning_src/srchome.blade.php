@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Manage {{$type}}</p>
                        <div class = "links">
                            <a href = "{{ route($url.'create') }}">Create {{$type}}</a>
                            |
                            <a href = "{{ route($url.'manage') }}">Manage {{$type}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
