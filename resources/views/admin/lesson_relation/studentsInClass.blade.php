@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <th>Class Name</th>
                                <th>Class Code</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Student E-mail</th>
                            </tr>
                            @foreach($infos as $info)
                                <tr>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->code}}</td>
                                    <td>{{$info->optional_id}}</td>
                                    <td>{{$info->first_name}} {{$info->surname}}</td>
                                    <td>{{$info->email}}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
