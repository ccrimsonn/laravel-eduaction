@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Enrollment</div>
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Errors: </strong><br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <table width="97%">
                            <tr>
                                <th>Class Code</th>
                                <th>Class Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Enrol Student</th>
                            </tr>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>
                                        {{$lesson->code}}

                                    </td>
                                    <td>{{$lesson->name}}</td>
                                    <td>{{$lesson->start_date}}</td>
                                    <td>{{$lesson->end_date}}</td>
                                    <td>
                                        <form method="POST" action="{{ route('enrolS_add') }}">
                                            {{ csrf_field() }}
                                            <div style="float:left;">
                                                <input type="hidden" name="lessonId" value="{{$lesson->id}}">
                                                <input type="text" name="sOptionalId" class="form-control" required="required" placeholder="Student Optional ID">
                                            </div>
                                            <div style="float:right;">
                                                <button style="" type="submit" class="btn btn-primary">Enrol</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
