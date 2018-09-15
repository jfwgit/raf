@extends('admin.admin')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">School</th>
                    <th scope="col">Location</th>
                    <th scope="col">Teachers</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deactivate</th>
                    <th scope="col">Information</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $school['id'] }}</td>
                    <td>{{ $school['name'] }}</td>
                    <td>{{ $school['location'] }}</td>
                    <td>{{ $school['teachers'] }}</td>

                    @if( $school['status'] == 1)
                        <td>Active</td>
                        <td>
                            <a href="{{ route('deactivateSchool', ['id' => $school['id']]) }}">Deactivate</a>
                        </td>
                    @else
                        <td>Inactive</td>
                        <td>
                            <a href="{{ route('activateSchool', ['id' => $school['id']]) }}">Activate</a>
                        </td>
                    @endif

                    <td>
                        <a href="{{ route('showSchool', ['id' => $school['id']]) }}">Full information</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection