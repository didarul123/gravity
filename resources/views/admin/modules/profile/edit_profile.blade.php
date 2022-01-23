@extends('admin.layouts.app')
@section('title')
Edit Profile
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
<div class="dashboard-ecommerce">
<div class="container-fluid dashboard-content ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Edit Profile</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="ecommerce-widget">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @include('admin.includes.message')
                <div class="card">
                    <h5 class="card-header">Edit Profile</h5>
                    <div class="card-body">
                        <form id="EditProfileForm" action="{{route('update.admin.profile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{@$profile->id}}" id="ID">
                            <div class="row">

                                <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{@$profile->name}}">
                                </div>
                                
                                <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" id="email" placeholder="Enter Email" class="form-control" name="email" value="{{@$profile->email}}">
                                </div>
                                
                                <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password">
                                </div>
                                <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <label class="col-form-label">Confirm Password</label>
                                    <input type="password" placeholder="Confirm Password" class="form-control" name="cpassword">
                                </div>
                                <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <label for="ProfileImg" class="col-form-label">Profile Image</label>
                                    <input id="ProfileImg" type="file" class="form-control" name="image">
                                    <div class="uplodpic uplodprofilepic">
                                        @if(@$profile->image)
                                            <li><img src="{{asset('storage/app/admin/profileImage/'.@$profile->image)}}"></li>
                                        @endif
                                    </div>
                                    </div>
                                       
                                </div>
                                <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                    <button type="submit" class="btn btn-primary ">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
<script type="text/javascript">
    $(document).ready(function(){
        validator = $('#EditProfileForm').validate({
           rules:{
            email:{required: true},
            name: { required: true},
            cpassword : {equalTo : "#password"}
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
                        $('.uplodprofilepic').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }  
        });
    });

</script>
@endsection