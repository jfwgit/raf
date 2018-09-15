@extends('admin.admin')

@section('content')
    <div class="container">
            <div class="form-group">
                <label for="code">Status</label>
                @if($school->status == \App\School::SCHOOL_ACTIVE)
                    <input type="text" name="code" class="form-control" id="code" value="Active" readonly>
                @else
                    <input type="text" name="code" class="form-control" id="code" value="Inactive" readonly>
                @endif
            </div>

            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" class="form-control" id="code" value="{{ $school->code }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">School</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $school->name }}" readonly>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ $school->location }}" readonly>
            </div>


            <div class="form-group">
                <label for="school_teachers">Number of teachers</label>
                <input type="number" name="teachers" class="form-control" id="school_teachers" value="{{ $school->teachers }}" readonly>
            </div>

            <div class="form-group">
                <label for="school_data">School data</label>
                <textarea class="form-control" name="data" id="school_data" readonly>{{ $school->data }} </textarea>
            </div>
    </div>
@endsection