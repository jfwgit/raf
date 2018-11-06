@extends('admin.admin')

@section('content')
    <div class="container">
        <h1>Teacher creating</h1>
        <form action="{{ route('createTeacher') }}" method="POST" name="create_teacher" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter school name">
            </div>
            @if ($errors->has('name'))
                <p class="has-error">{{ $errors->first('name') }}</p>
            @endif
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" class="form-control" id="photo" />
            </div>
            @if ($errors->has('photo'))
                <p class="has-error">{{ $errors->first('photo') }}</p>
            @endif
            <div class="form-group">
                <label for="cv">CV</label>
                <input type="file" name="cv" class="form-control" id="cv" />
            </div>
            @if ($errors->has('cv'))
                <p class="has-error">{{ $errors->first('cv') }}</p>
            @endif
            <div class="form-group">
                <label for="video">Introducing video (Max File size ~ 30MB)</label>
                <input type="file" name="video" class="form-control" id="video" />
            </div>
            @if ($errors->has('video'))
                <p class="has-error">{{ $errors->first('video') }}</p>
            @endif
            <div class="form-group">
                <label for="school_teachers">Age</label>
                <input type="text" name="age" class="form-control" id="age" placeholder="Enter teacher's age">
            </div>
            @if ($errors->has('age'))
                <p class="has-error">{{ $errors->first('age') }}</p>
            @endif
            <label for="gender">Gender</label>
            <select class="custom-select custom-select-md mb-3" name="gender" id="gender">
                <option value="1">Male</option>
                <option value="2">Famale</option>
            </select>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter teacher's email">
            </div>
            @if ($errors->has('email'))
                <p class="has-error">{{ $errors->first('email')}}</p>
            @endif
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter teacher's phone">
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
                <option value="1">TEFL</option>
                <option value="2">CELTA</option>
                <option value="3">TOEFL</option>
            </select>

            <label for="criminal_check">Criminal check</label>
            <select class="custom-select custom-select-md mb-3" name="criminal_check" id="criminal_check">
                <option value="1">Done</option>
                <option value="2">Not done in progress</option>
            </select>

            <label for="notorized">Notorized</label>
            <select class="custom-select custom-select-md mb-3" name="notorized" id="notorized">
                <option value="1">Done</option>
                <option value="2">Not done in progress</option>
            </select>

            <label for="authenticated">Authenticated</label>
            <select class="custom-select custom-select-md mb-3" name="authenticated" id="authenticated">
                <option value="1">Done</option>
                <option value="2">Not done in progress</option>
            </select>

            <div class="form-group">
                <label for="desired">Desired location</label>
                <input type="text" name="desired" class="form-control" id="desired" placeholder="Enter teacher's desired location">
            </div>

            <div class="form-group">
                <label for="current">Current location</label>
                <input type="text" name="current" class="form-control" id="current" placeholder="Enter teacher's current location">
            </div>

            <label for="nationality">Nationality</label>
            <select class="custom-select custom-select-md mb-3" name="nationality" id="nationality"></select>

            <label for="pref_school">Preferred school</label>
            <select class="custom-select custom-select-md mb-3" name="pref_school" id="pref_school">
                <option value="Kindergarten">Kindergarten</option>
                <option value="Primary school">Primary school</option>
                <option value="International school">International school</option>
                <option value="Training center">Training center</option>
                <option value="Other">Other</option>
            </select>

            <div class="form-group">
                <label for="years">Year's of teaching experience</label>
                <input type="text" name="experience" class="form-control" id="years" placeholder="Enter teacher's years of teaching experience">
            </div>
            @if ($errors->has('experience'))
                <p class="has-error">{{ $errors->first('experience')}}</p>
            @endif
            <div class="form-group">
                <label for="salary">Salary expectation</label>
                <input type="text" name="salary_exp" class="form-control" id="salary" placeholder="Enter teacher's salary expectation">
            </div>
            @if ($errors->has('salary_exp'))
                <p class="has-error">{{ $errors->first('salary_exp') }}</p>
            @endif
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        var country_list = [
            "Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda",
            "Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh",
            "Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina",
            "Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Canada","Cambodia",
            "Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands",
            "Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti",
            "Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia",
            "Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies",
            "Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala",
            "Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India",
            "Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan",
            "Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya",
            "Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives",
            "Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat",
            "Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand",
            "Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay",
            "Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda",
            "Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia",
            "Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain",
            "Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland",
            "Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga",
            "Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine",
            "United Arab Emirates", "United States of America" ,"United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)",
            "Yemen","Zambia","Zimbabwe"
        ];

        $.each(country_list, function(key, value) {
            $('#nationality')
                .append($("<option></option>")
                    .attr("value",value)
                    .text(value));
        });
    </script>
@endsection