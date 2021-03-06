@extends('admin.admin')

@section('content')
    @if(Session::has('flash_message'))
        <p class="success-added">{{ session('flash_message') }}</p>
    @endif
    <div class="container-fluid" style="width: 90%!important">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">School</th>
                    <th scope="col">Location</th>
                    <th scope="col">Teachers</th>
                    <th scope="col">Status</th>
                    <th class="text-center" scope="col">Change status</th>
                    <th class="text-center" scope="col">Edit info</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->location }}</td>
                    <td>{{ $school->teachers }}</td>

                    @if( $school->status == 1)
                        <td>Active</td>
                        <td class="text-center">
                            <a class="inactive-svg" href="{{ route('deactivateSchool', ['id' => $school->id]) }}">
                                <img src="{{ asset('icons/cancel.svg') }}" class="inactive-svg" />
                            </a>
                        </td>
                    @else
                        <td>Inactive</td>
                        <td class="text-center">
                            <a class="active-svg" href="{{ route('activateSchool', ['id' => $school->id]) }}">
                                <img src="{{ asset('icons/checked.svg') }}" class="active-svg" />
                            </a>
                        </td>
                    @endif

                    <td class="text-center">
                        <a class="more-info" href="{{ route('showSchool', ['id' => $school->id]) }}">
                            <img src="{{ asset('icons/eye.svg') }}" class="more-info" />
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