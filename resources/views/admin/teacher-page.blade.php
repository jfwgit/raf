@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>Teacher {{$teacher->name}} editing</h1>
        <form action="{{ route('updateTeacher', ['id' => $teacher->id]) }}" method="POST" name="create_teacher" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter school name" value="{{$teacher->name}}">
            </div>
            @if ($errors->has('name'))
                <p class="has-error">{{ $errors->first('name') }}</p>
            @endif

            <div class="individual-content">
                @if($linkPhoto != '/storage/')
                    <img src="{{$linkPhoto}}" >
                @endif

                @if($linkVideo != '/storage/')
                    <video controls width="500px" height="400px">
                        <source src="{{$linkVideo}}" type="video/mp4">
                    </video>
                @endif

                @if($linkCV != '/storage/')
                    <a href="{{$linkCV}}" download>CV</a>
                @endif

            </div>

            <div class="form-group">
                <label for="school_teachers">Age</label>
                <input type="text" name="age" class="form-control" id="age" placeholder="Enter teacher's age" value="{{ $teacher->age }}">
            </div>
            @if ($errors->has('age'))
                <p class="has-error">{{ $errors->first('age') }}</p>
            @endif
            <label for="gender">Gender</label>
            <select class="custom-select custom-select-md mb-3" name="gender" id="gender">
                <option value="1" {{$teacher->gender == 1 ? 'selected' : ''}}>Male</option>
                <option value="2" {{$teacher->gender == 2 ? 'selected' : ''}}>Famale</option>
            </select>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter teacher's email" value="{{$teacher->email}}">
            </div>
            @if ($errors->has('email'))
                <p class="has-error">{{ $errors->first('email')}}</p>
            @endif
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter teacher's phone" value="{{$teacher->phone}}">
            </div>
            @if ($errors->has('phone'))
                <p class="has-error">{{ $errors->first('phone') }}</p>
            @endif
            <label for="degree">Degree</label>
            <select class="custom-select custom-select-md mb-3" name="degree" id="degree">
                <option value="1">BA</option>
                <option value="2">MA</option>
                <option value="3">None</option>
            </select>

            <label for="certification">Certification</label>
            <select class="custom-select custom-select-md mb-3" name="certification" id="certification">
                <option value="1" {{$teacher->certification == 1 ? 'selected' : ''}}>TEFL</option>
                <option value="2" {{$teacher->certification == 2 ? 'selected' : ''}}>CELTA</option>
                <option value="3" {{$teacher->certification == 3 ? 'selected' : ''}}>TOEFL</option>
            </select>

            <label for="criminal_check">Criminal check</label>
            <select class="custom-select custom-select-md mb-3" name="criminal_check" id="criminal_check">
                <option value="1" {{$teacher->criminal_check == 1 ? 'selected' : ''}}>Done</option>
                <option value="2" {{$teacher->criminal_check == 2 ? 'selected' : ''}}>Not done in progress</option>
            </select>

            <label for="notorized">Notorized</label>
            <select class="custom-select custom-select-md mb-3" name="notorized" id="notorized">
                <option value="1" {{$teacher->notarized == 1 ? 'selected' : ''}}>Done</option>
                <option value="2" {{$teacher->notarized == 2 ? 'selected' : ''}}>Not done in progress</option>
            </select>

            <label for="authenticated">Authenticated</label>
            <select class="custom-select custom-select-md mb-3" name="authenticated" id="authenticated">
                <option value="1" {{$teacher->authenticated == 1 ? 'selected' : ''}}>Done</option>
                <option value="2" {{$teacher->authenticated == 2 ? 'selected' : ''}}>Not done in progress</option>
            </select>

            <div class="form-group">
                <label for="desired">Desired location</label>
                <input type="text" name="desired" class="form-control" id="desired" placeholder="Enter teacher's desired location" value="{{$teacher->desired_location}}">
            </div>

            <div class="form-group">
                <label for="current">Current location</label>
                <input type="text" name="current" class="form-control" id="current" placeholder="Enter teacher's current location" value="{{$teacher->current_location}}">
            </div>

            <label for="nationality">Nationality</label>
            <select class="custom-select custom-select-md mb-3" name="nationality" id="nationality">
                <option value="{{$teacher->nationality}}">{{$teacher->nationality}}</option>
            </select>

            <label for="pref_school">Preferred school</label>
            <select class="custom-select custom-select-md mb-3" name="pref_school" id="pref_school">
                @foreach( $schools as $school)
                    <option value="{{ $school->id }}" {{$teacher->authenticated == $school->id ? 'selected' : ''}}>{{ $school->name }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="years">Year's of teaching experience</label>
                <input type="text" name="experience" class="form-control" id="years" placeholder="Enter teacher's years of teaching experience" value="{{$teacher->experience}}">
            </div>
            @if ($errors->has('experience'))
                <p class="has-error">{{ $errors->first('experience')}}</p>
            @endif

            <div class="form-group">
                <label for="salary">Salary expectation</label>
                <input type="text" name="salary_exp" class="form-control" id="salary" placeholder="Enter teacher's salary expectation" value="{{$teacher->salary_exp}}">
            </div>
            @if ($errors->has('salary_exp'))
                <p class="has-error">{{ $errors->first('salary_exp') }}</p>
            @endif

            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" style="float: right" class="btn btn-primary"><a href="{{route('showTeachers', ['page' => 1])}}">Go back</a></button>

        </form>
    </div>
@endsection