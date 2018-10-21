@extends('admin.admin')

@section('filter-bar')
<div class="container" >
    <form action="{{ route('showTeachers', ['page' => 1]) }}" method="GET" name="filter_teachers">
        <div style="display: inline-flex">
            <div class="col-md-3">
                <label for="criminal_check">Criminal check</label>
                <select class="custom-select custom-select-md mb-3" name="criminal_check" id="criminal_check">
                    <option value="1">Done</option>
                    <option value="2">Not done in progress</option>
                </select>

            </div>
            <div class="col-md-3">
                <label for="criminal_check">Nationality</label>
                <select class="custom-select custom-select-md mb-3" name="nationality" id="criminal_check">
                    <option value="1">Native</option>
                    <option value="2">Other</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="certification">Certification</label>
                <select class="custom-select custom-select-md mb-3" name="certification" id="certification">
                    <option value="1">TEFL</option>
                    <option value="2">CELTA</option>
                    <option value="3">TOEFL</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="degree">Degree</label>
                <select class="custom-select custom-select-md mb-3" name="degree" id="degree">
                    <option value="1">BA</option>
                    <option value="2">MA</option>
                    <option value="3">None</option>
                </select>
            </div>
            <div>
                <label for="324">&nbsp;</label>
                <button name="nbsp" type="submit" class="btn btn-success">Accept filter</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('content')
    @if(session('flash_message'))
        <p class="success-added">{{ session('flash_message') }}</p>
    @endif
    <div class="container-fluid" style="width: 90%!important">
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
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Change status</th>
                <th class="text-center" scope="col">Edit info</th>
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
                    @if( $teacher->status == 1)
                        <td>Active</td>
                        <td class="text-center">
                            <a class="inactive-svg" href="{{ route('deactivateTeacher', ['id' => $teacher->id]) }}">
                                <img src="{{ asset('icons/cancel.svg') }}" class="inactive-svg" />
                            </a>
                        </td>
                    @else
                        <td>Inactive</td>
                        <td class="text-center">
                            <a class="active-svg" href="{{ route('activateTeacher', ['id' => $teacher->id]) }}">
                                <img src="{{ asset('icons/checked.svg') }}" class="active-svg" />
                            </a>
                        </td>
                    @endif
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
    @if($pages > 1)
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

                @if($page == 1)
                    <li class="page-item disabled">
                @else
                    <li class="page-item">
                        @endif
                        <a class="page-link" href="{{route('showTeachers', ['page' => $pages - 1])}}" tabindex="-1">Previous</a>
                    </li>

                    @for($i = 1; $i <= $pages; $i++)
                        <li class="page-item"><a class="page-link {{$page == $i ? 'active disabled' : ''}}" href="{{route('showTeachers', ['page' => $i])}}">{{$i}}</a></li>
                    @endfor

                    @if($page == $pages || $pages == 0)
                        <li class="page-item disabled">
                            @else
                                <a class="page-link" href="{{route('showTeachers', ['page' => $pages + 1])}}">Next</a>
                            @endif

                        </li>
            </ul>
        </nav>
    @endif
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

