@extends('admin.admin')

@section('content')
    <div class="container">
        <form action="{{ route('createSchool') }}" method="POST" name="create_school">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="code">Generated code</label>
                <input type="text" name="code" class="form-control" id="code" readonly>
            </div>

            <div class="form-group">
                <label for="name">School name</label>
                <input type="email" name="name" class="form-control" id="name" placeholder="Enter school name">
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" placeholder="Enter school location">
            </div>


            <div class="form-group">
                <label for="school_teachers">Number of teachers</label>
                <input type="text" name="teachers" class="form-control" id="school_teachers" placeholder="Enter teachers number">
            </div>

            <div class="form-group">
                <label for="school_data">School data</label>
                <textarea class="form-control" name="data" id="school_data" placeholder="Enter school data" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection