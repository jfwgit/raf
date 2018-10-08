@extends('admin.admin')

@section('filter-bar')
    {{--<nav>--}}
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            {{--<ul class="navbar-nav mr-auto">--}}
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--Dropdown--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                        {{--<a class="dropdown-item" href="#">Action</a>--}}
                        {{--<a class="dropdown-item" href="#">Another action</a>--}}
                        {{--<div class="dropdown-divider"></div>--}}
                        {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<form class="form-inline my-2 my-lg-0">--}}
                {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</nav>--}}
@endsection

@section('content')
    @if(session('flash_message') != false)
        <p class="success-added">{{  session('flash_message') }}</p>
    @endif
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Nationality</th>
                <th scope="col">Certification</th>
                <th scope="col">Criminal check</th>
                <th scope="col">Des. location</th>
                <th scope="col">Cur. location</th>
                <th class="text-center" scope="col">Information</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($teachers as $teacher)
                <tr data-identifier="{{ $teacher->id }}">
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->age }}</td>
                    <td>{{ $teacher->nationality }}</td>

                    @if($teacher->certification == \App\Teacher::CERTIFICATION_TEFL)
                        <td>TEFL</td>
                    @elseif($teacher->certification == \App\Teacher::CERTIFICATION_CELTA)
                        <td>CELTA</td>
                    @else
                        <td>TOEFL</td>
                    @endif

                    <td>{{ $teacher->criminal_check == \App\Teacher::CRIMINAL_DONE ? 'Done' : 'In progress' }}</td>
                    <td>{{ $teacher->desired_location }}</td>
                    <td>{{ $teacher->current_location }}</td>
                    <td class="text-center">
                        <a class="more-info" href="{{ route('showTeacher', ['id' => $teacher->id]) }}">
                            <img src="{{ asset('icons/eye.svg') }}" class="glyphicon-eye-open more-info" />
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
<script>
    if(($(".success-added").length)) {
        $(".success-added").delay(3000).fadeOut( "slow", function() {
            $(".success-added").remove();
        });
    }
</script>
@endsection

