@extends('layouts.app')
@section('links')
@include('include.links')
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
<main>
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height4 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ed_detail_wrap light">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">Edit Profile</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                @include('include.sidebar')
                <div class="col-lg-8">
                    <div class="comment-form">
                        <h4>Edit Personal Info</h4>
                        @include('include.message')
                        <form method="POST" action="{{route('update.profile') }}" enctype="multipart/form-data" id="EditProfileForm">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name" value="{{ $user ? $user->name : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Class</label>
                                        <input class="form-control" name="class" id="class" type="text" placeholder="Class" value="{{ $user ? $user->class : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email</label>
                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" value="{{ $user ? $user->email : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Date Of Birth</label>
                                        <input class="form-control" name="dob" id="dob" type="date" placeholder="" value="{{ $user ? $user->dob : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Father's Name</label>
                                        <input class="form-control" name="father_name" id="father_name" type="text" placeholder="Father's Name" value="{{ $user ? $user->father_name : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Address</label>
                                        <input class="form-control" name="address" id="address" type="text" placeholder="Address" value="{{ $user ? $user->address : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">School or College</label>
                                        <input class="form-control" name="college_school" id="college_school" type="text" placeholder="School or College" value="{{ $user ? $user->college_school : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Past Academic Result</label>
                                        <input class="form-control" name="past_academic_result" id="past_academic_result" type="text" placeholder="Past Academic Result" value="{{ $user ? $user->past_academic_result : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Branch</label>
                                        <input class="form-control" name="branch" id="branch" type="text" placeholder="Branch" value="{{ $user ? $user->branch : ''}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">How to read</label>
                                        <select class="form-control" name="how_to_read">
                                            <option value="">Select </option>
                                            <option value="ON"{{@$user['how_to_read']=='ON' ? 'selected' : ''}}>Online </option>
                                            <option value="OF" {{@$user['how_to_read']=='OF' ? 'selected' : ''}}>Offline </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ProfileImg" class="col-form-label">Profile Image</label>
                                        <input id="ProfileImg" type="file" class="form-control" name="image">
                                        <div class="uplodpic uplodprofilepic">
                                            @if(@$user->image)
                                            <li><img src="{{asset('storage/app/profileImage/'.@$user->image)}}" style="height:70px; width:90px"></li>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ProfileImg" class="col-form-label">Guardain Information</label>
                                        <input class="form-control" name="guardian_info" id="guardian_info" type="text" placeholder="Guardian Information" value="{{ $user ? $user->guardian_info : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottoms">
                            </div>
                            <h4>Edit Password Info</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Old Password</label>
                                        <input class="form-control" name="old_password" id="old_password" type="password" placeholder="old Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">New Password</label>
                                        <input class="form-control" name="password" id="password" type="password" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Confirm Password</label>
                                        <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
@include('include.scripts')
<script type="text/javascript">
    $(document).ready(function(){
        validator = $('#EditProfileForm').validate({
           rules:{
            email:{
                required: true, 
                email:true,
                remote: {
                url: '{{ route("email.checking") }}',
                type: "post",
                data: {
                    email: function() {
                        return $( "#email" ).val();
                    },
                _token: '{{ csrf_token() }}'
                }
                }
            },
            name: { required: true},
            // email:{required: true},
            class: { required: true},
            dob: { required: true},
            father_name: { required: true},
            address: { required: true},
            college_school: { required: true},
            past_academic_result: { required: true},
            branch: { required: true},
            how_to_read: { required: true},
            guardian_info: { required: true},
            cpassword : {equalTo : "#password"}
           },
           messages: {
            email:{
               remote: 'This email has benn already taken'  
            } ,
         },
           submitHandler:function(form){
               form.submit();
            },
        });
    });
    //Select Profile Pic
    $(function () {
        $("#ProfileImg").change(function () {
            $('.uplodprofilepic').html('');
            let files = this.files;
            if (files.length > 0) {
                let exts = ['image/jpeg', 'image/png', 'image/gif'];
                let valid = true;
                $.each(files, function(i, f) {
                    if (exts.indexOf(f.type) <= -1) {
                        valid = false;
                        return false;
                    }
                });
                if (! valid) {
                    alert('Please choose valid image files (jpeg, png, gif) only.');
                    $("#ProfileImg").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.uplodprofilepic').append('<li><img width="100px;" src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }     
        });
    });    
</script>
@endsection
@section('footer')
@include('include.footer')
@endsection