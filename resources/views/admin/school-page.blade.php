@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>School {{ $school->name }} editing</h1>
        <form action="{{ route('updateSchool', ['id' => $school->id])}}" method="POST" name="update_school">
            {{ csrf_field() }}
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
                <input type="text" name="name" class="form-control" id="name" value="{{ $school->name }}">
            </div>
            @if ($errors->has('name'))
                <p class="has-error">{{ $errors->first('name') }}</p>
            @endif

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ $school->location }}">
            </div>
            @if ($errors->has('location'))
                <p class="has-error">{{ $errors->first('location') }}</p>
            @endif

            <div class="form-group">
                <label for="school_teachers">Number of teachers</label>
                <input type="number" name="teachers" class="form-control" id="school_teachers" value="{{ $school->teachers }}">
            </div>
            @if ($errors->has('teachers'))
                <p class="has-error">{{ $errors->first('teachers') }}</p>
            @endif

            <div class="form-group">
                <label for="school_data">School data</label>
                <textarea class="form-control" name="data" id="school_data">{{ $school->data }} </textarea>
            </div>
            @if ($errors->has('data'))
                <p class="has-error">{{ $errors->first('data') }}</p>
            @endif

            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" style="float: right" class="btn btn-primary"><a href="{{route('showSchools')}}">Go back</a></button>
        </form>
    </div>
@endsection