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

                    <p>Students:</p>
                        <div class = "links">
                            <a href = "{{ route('Student', ['value' => 'new']) }}">Create Student</a>
                            |
                            <a href = "{{ route('Student', ['value' => 'search']) }}">Manage Student</a>
                        </div>
                    <hr/>
                    <p>Trainers:</p>
                        <div class = "links">
                            <a href = "{{ route('trainer_create') }}">Create Trainer</a>
                            |
                            <a href = "{{ route('trainer_index') }}">Manage Trainer</a>
                        </div>
                    <hr/>
                    <p>Courses:</p>
                        <div class = "links">
                            <a href = "{{ route('Course', ['value' => 'new']) }}">Create Course</a>
                            |
                            <a href = "{{ route('Course', ['value' => 'search']) }}">Manage Course</a>
                        </div>
                    <hr/>
                    <p>Units:</p>
                        <div class = "links">
                            <a href = "{{ route('unit_create') }}">Create Unit</a>
                            |
                            <a href = "{{ route('unit_index') }}">Manage Unit</a>
                        </div>
                    <hr/>
                    <p>Classes:</p>
                        <div class = "links">
                            <a href = "{{ route('lesson_create') }}">Create Class</a>
                            |
                            <a href = "{{ route('lesson_index') }}">Manage Class</a>
                        </div>
                    <hr/>
                    <p>Enrollment:</p>
                        <div class = "links">
                            <a href = "{{ route('enrolS_create') }}">Enrol Student</a>
                            |
                            <a href = "{{ route('enrolT_create') }}">Enrol Trainer</a>
                            |
                            <a href = "{{ route('enrolM_index', ['value' => 'student']) }}">Search Enrollment by Students</a>
                            |
                            <a href = "{{ route('enrolM_index', ['value' => 'lesson']) }}">Search Enrollment by Classes</a>
                            |
                            <a href = "{{ route('enrolM_index', ['value' => 'trainer']) }}">Search Enrollment by Trainers</a>
                        </div>
                        <hr/>
                        <p>Learning Sources:</p>
                        <div class = "links">
                            <a href = "{{ route('src_index', ['value' => 'article']) }}">Class Notes</a>
                            |
                            <a href = "{{ route('src_index', ['value' => 'assessment']) }}">Assessments</a>
                            |
                            <a href = "{{ route('src_index', ['value' => 'video']) }}">Videos</a>
                            |
                            <a href = "{{ route('src_index', ['value' => 'audio']) }}">Audios</a>
                        </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
