@extends('admin.layouts.app')
@section('title')
@if(@$student) Edit @else Add @endif Student
@endsection
@section('links')
@include('admin.includes.links')
@endsection
@section('headers')
@include('admin.includes.header')
@endsection
@section('sidebar')
@include('admin.includes.sidebar')
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">@if(@$manager) Edit @else Add @endif Student</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.branch.manager')}}" class="breadcrumb-link">Student</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$student) Edit @else Add @endif Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @include('admin.includes.message')
            <div class="card">
                <h5 class="card-header">@if(@$student) Edit @else Add @endif Teacher<a class="adbtn btn btn-primary" href="{{route('manage.student')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.student')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$student->id}}">
                        <div class="row">
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Name </label>
                                <input name="name" type="text" class="form-control required" placeholder="Type here" value="{{@$student->name}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Email </label>
                                <input name="email" type="text" class="form-control required" placeholder="Type here" value="{{@$student->email}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Class </label>
                                <input name="class" type="text" class="form-control required" placeholder="Type here" value="{{@$student->class}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Mobile No </label>
                                <input name="mobile" type="text" class="form-control required" placeholder="Type here" value="{{@$student->mobile}}">
                            </div> 
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Date of birth </label>
                                <input name="dob" type="date" class="form-control required" value="{{@$student->dob}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Father's Name </label>
                                <input name="father_name" type="text" class="form-control required" placeholder="Type here" value="{{@$student->father_name}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Address </label>
                                <input name="address" type="text" class="form-control required" placeholder="Type here" value="{{@$student->address}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">School or College </label>
                                <input name="college_school" type="text" class="form-control required" placeholder="Type here" value="{{@$student->college_school}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Past Academic Result </label>
                                <input name="past_academic_result" type="text" class="form-control required" placeholder="Type here" value="{{@$student->past_academic_result}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Past Academic Result </label>
                                <input name="past_academic_result" type="text" class="form-control required" placeholder="Type here" value="{{@$student->past_academic_result}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Branch </label>
                                <input name="branch" type="text" class="form-control required" placeholder="Type here" value="{{@$student->branch}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Guardian Information </label>
                                <input name="guardian_info" type="text" class="form-control required" placeholder="Type here" value="{{@$student->guardian_info}}">
                            </div>
                            {{-- <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-l imgdiv">
                                <span class="col-form-label">Image</span>
                                <input type="file" class="custom-file-input" id="customFile" name="image" style="display:none">
                                <label class="custom_file_label extrlft" for="customFile">Upload Image</label>
                                <div class="uplodpic uploadImg">
                                    @if(@$manager->image)
                                        <li><img src="{{asset('storage/app/branch_manager_image/'.@$manager->image)}}"></li>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">How to read</label>
                                        <select class="form-control" name="how_to_read">
                                            <option value="">Select </option>
                                            <option value="ON"{{@$student['how_to_read']=='ON' ? 'selected' : ''}}>Online </option>
                                            <option value="OF" {{@$student['how_to_read']=='OF' ? 'selected' : ''}}>Offline </option>
                                        </select>
                                    </div>
                                </div>

                            <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="ProfileImg" class="col-form-label">Profile Image</label>
                                        <input id="ProfileImg" type="file" class="form-control" name="image">
                                        <div class="uplodpic uplodprofilepic">
                                            @if(@$student->image)
                                            <li><img src="{{asset('storage/app/profileImage/'.@$student->image)}}" style="height:70px; width:90px"></li>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$student) Update @else Save @endif</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@include('admin.includes.footer')
@endsection
@section('script')
@include('admin.includes.scripts')
<script>
    $(document).ready(function(){

        $('#teacherform').validate({
            rules: {
                name: {required: true},
                email: {required: true},
            },
            submitHandler:function(form){
               form.submit();
            },
        });
        
        $("#customFile").change(function () {
            $('.uploadImg').html('');
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
                    $("#customFile").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.uploadImg').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }
            
        });
    });
</script>
@endsection