@extends('layouts.main')

@section('title', 'Register a new Account')

@section('contents')
    <div class="row">
        <div class="card-panel col m12 row hoverable" style="margin-top: 50px; padding: 20px;">
            <h4>New Account</h4>
            <div class="divider"></div>
            <h5>Basic Info</h5>
            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="input-field col m6">
                    <input name="name" id="name" type="text" value="{{ old('name') }}">
                    <label for="name">Name</label>

                    @if ($errors->has('name'))
                        <span class="red-text">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="nid" id="nid" type="text" value="{{ old('nid') }}" data-length=17>
                    <label for="name">NID</label>

                    @if ($errors->has('nid'))
                        <span class="red-text">
                            <strong>{{ $errors->first('nid') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="file-field input-field col m6">
                    <div class="btn">
                        <span>Image</span>
                        <input type="file" name="profile">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                    @if ($errors->has('profile'))
                        <span class="red-text">
                            <strong>{{ $errors->first('profile') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input type="text" name="birthday" id="birthday" class="datepicker">
                    <label for="birthday">BirthDay</label>
                    @if ($errors->has('birthday'))
                        <span class="red-text">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="father_name" id="father_name" type="text" value="{{ old('father_name') }}">
                    <label for="name">Father's Name</label>

                    @if ($errors->has('father_name'))
                        <span class="red-text">
                            <strong>{{ $errors->first('father_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="mother_name" id="mother_name" type="text" value="{{ old('mother_name') }}">
                    <label for="name">Mother's Name</label>

                    @if ($errors->has('mother_name'))
                        <span class="red-text">
                            <strong>{{ $errors->first('mother_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col s12">
                    <input name="email" id="email" type="email" value="{{ old('email') }}">
                    <label for="email">Email</label>

                    @if ($errors->has('email'))
                        <span class="red-text">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="password" id="password" type="password">
                    <label for="password">Password</label>

                    @if ($errors->has('password'))
                        <span class="red-text">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field  col m6">
                    <input name="password_confirmation" id="cpassword" type="password">
                    <label for="cpassword">Confirm Password</label>
                </div>

                <div class="col s12">
                    <br><h5>Present Address</h5><div class="divider"></div>
                </div>

                <div class="input-field col m6">
                    <input name="present_division" id="division" type="text" value="{{ old('present_division') }}">
                    <label for="name">Division</label>

                    @if ($errors->has('present_division'))
                        <span class="red-text">
                            <strong>{{ $errors->first('present_division') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="present_district" id="present_district" type="text" value="{{ old('present_district') }}">
                    <label for="name">District</label>

                    @if ($errors->has('present_district'))
                        <span class="red-text">
                            <strong>{{ $errors->first('present_district') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="present_upazilla" id="present_upazilla" type="text" value="{{ old('present_upazilla') }}">
                    <label for="name">Upazilla</label>

                    @if ($errors->has('present_upazilla'))
                        <span class="red-text">
                            <strong>{{ $errors->first('present_upazilla') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="present_village" id="village" type="text" value="{{ old('present_village') }}">
                    <label for="name">Village</label>

                    @if ($errors->has('present_village'))
                        <span class="red-text">
                            <strong>{{ $errors->first('present_village') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="present_po" id="present_po" type="text" value="{{ old('present_po') }}">
                    <label for="present_po">Post Office</label>

                    @if ($errors->has('present_po'))
                        <span class="red-text">
                            <strong>{{ $errors->first('present_po') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="present_pc" id="present_pc" type="text" value="{{ old('present_pc') }}">
                    <label for="name">Post Code</label>

                    @if ($errors->has('present_pc'))
                        <span class="red-text">
                            <strong>{{ $errors->first('present_pc') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col s12">
                    <br><h5>Permanent Address</h5><div class="divider"></div>
                </div>

                <p class="col s12">
                    <input type="checkbox" id="same_p" checked />
                    <label for="same_p">Same as Present</label>
                </p>

                <div id="permanent" style="display: none; ">

                    <div class="input-field col m6">
                        <input name="permanent_division" id="permanent_division" type="text" value="{{ old('permanent_division') }}">
                        <label for="name">Division</label>

                        @if ($errors->has('permanent_division'))
                            <span class="red-text">
                                <strong>{{ $errors->first('permanent_division') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col m6">
                        <input name="permanent_district" id="permanent_district" type="text" value="{{ old('permanent_district') }}">
                        <label for="permanent_district">District</label>

                        @if ($errors->has('permanent_district'))
                            <span class="red-text">
                                <strong>{{ $errors->first('permanent_district') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col m6">
                        <input name="permanent_upazilla" id="permanent_upazilla" type="text" value="{{ old('permanent_upazilla') }}">
                        <label for="name">Upazilla</label>

                        @if ($errors->has('permanent_upazilla'))
                            <span class="red-text">
                                <strong>{{ $errors->first('permanent_upazilla') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col m6">
                        <input name="permanent_village" id="permanent_village" type="text" value="{{ old('permanent_village') }}">
                        <label for="name">Village</label>

                        @if ($errors->has('permanent_village'))
                            <span class="red-text">
                                <strong>{{ $errors->first('permanent_village') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col m6">
                        <input name="permanent_po" id="permanent_po" type="text" value="{{ old('permanent_po') }}">
                        <label for="name">Post Office</label>

                        @if ($errors->has('permanent_po'))
                            <span class="red-text">
                                <strong>{{ $errors->first('permanent_po') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col m6">
                        <input name="permanent_pc" id="permanent_pc" type="text" value="{{ old('permanent_pc') }}">
                        <label for="name">Post Code</label>

                        @if ($errors->has('permanent_pc'))
                            <span class="red-text">
                                <strong>{{ $errors->first('permanent_pc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col s12">
                    <br><h5>Personal Details</h5><div class="divider"></div>
                </div>

                <div class="input-field col m6">
                    <select name="religion" id="religion">
                        <option value="Muslim">Muslim</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Christian">Christian</option>
                        <option value="Buddhist">Buddhist</option>
                        <option value="Others">Others</option>
                    </select>
                    <label for="name">Religion</label>

                    @if ($errors->has('religion'))
                        <span class="red-text">
                            <strong>{{ $errors->first('religion') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <select name="marital" id="marital">
                        <option value="0" selected>Unmarried</option>
                        <option value="1">Married</option>
                    </select>
                    <label for="name">Marrital Status</label>

                    @if ($errors->has('marital'))
                        <span class="red-text">
                            <strong>{{ $errors->first('marital') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <select name="gender" id="gender">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Others</option>
                    </select>
                    <label for="name">Gender</label>

                    @if ($errors->has('gender'))
                        <span class="red-text">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="blood" id="blood" type="text" value="{{ old('blood') }}">
                    <label for="name">Blood Group</label>

                    @if ($errors->has('blood'))
                        <span class="red-text">
                            <strong>{{ $errors->first('blood') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="occupation" id="occupation" type="text" value="{{ old('occupation') }}">
                    <label for="name">Occupation</label>

                    @if ($errors->has('occupation'))
                        <span class="red-text">
                            <strong>{{ $errors->first('occupation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col m6">
                    <input name="mobile" id="mobile" type="text" value="{{ old('mobile') }}" placeholder="017XXXXXXXX" data-length=11>
                    <label for="name">Mobile No.</label>

                    @if ($errors->has('mobile'))
                        <span class="red-text">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col s12">
                    <button class="btn blue lighten-1 waves-effect waves-light">Register</button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        $('.datepicker').pickadate({
            selectYears: 51,
            selectMonths: true
        });
        $('#same_p').on('change', function() {
            if ($('#same_p').is(':checked')) {
                $('#permanent').slideUp('slow');
            }else{
                $('#permanent').slideDown('slow');
            }
        })
    });
</script>

@endsection
