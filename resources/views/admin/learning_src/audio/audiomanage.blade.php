@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Audio</div>
                    <div class="card-body">

                        @foreach($infos as $info)
                            <form method="POST" action="{{ url('resource/audiodelete/'.$info->id) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Audio Name</label>
                                    <div class="col-md-6">
                                        <label for="name" class="col-md-10 col-form-label text-md-left">{{ $info->name }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Audio Description</label>
                                    <div class="col-md-6">
                                        <label for="description" class="col-md-10 col-form-label text-md-left">{{ $info->description }}</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">Audio Status</label>
                                    <div class="col-md-6">
                                        <label for="status" class="col-md-10 col-form-label text-md-left">{{ $info->status }}</label>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{ url('resource/'.$info->id.'/audio_edit') }}" class="btn btn-success">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                                <hr/>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
