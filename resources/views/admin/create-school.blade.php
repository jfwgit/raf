@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>School creating</h1>
        <form action="{{ route('createSchool') }}" method="POST" name="create_school">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="code">Generated code</label>
                <input type="text" name="code" class="form-control" id="code" value="{{ $code }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">School name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter school name">
            </div>
            @if ($errors->has('name'))
            <p class="has-error">{{ $errors->first('name') }}</p>
            @endif
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" placeholder="Enter school location">
            </div>
            @if ($errors->has('location'))
                <p class="has-error">{{ $errors->first('location') }}</p>
            @endif

            <div class="form-group">
                <label for="school_teachers">Number of teachers</label>
                <input type="number" name="teachers" class="form-control" id="school_teachers" placeholder="Enter teachers number">
            </div>
            @if ($errors->has('teachers'))
                <p class="has-error">{{ $errors->first('teachers') }}</p>
            @endif
            <div class="form-group">
                <label for="school_data">School data</label>
                <textarea class="form-control" name="data" id="school_data" placeholder="Enter school data" rows="10"></textarea>
            </div>
            @if ($errors->has('data'))
                <p class="has-error">{{ $errors->first('data') }}</p>
            @endif
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection