@extends('admin.layouts.app')
@section('title')
@if(@$routine) Edit @else Add @endif Routine
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
                <h2 class="pageheader-title">@if(@$routine) Edit @else Add @endif Routine</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.routine')}}" class="breadcrumb-link">Manage Routine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$routine) Edit @else Add @endif Routine</li>
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
                <h5 class="card-header">@if(@$routine) Edit @else Add @endif Routine<a class="adbtn btn btn-primary" href="{{route('manage.routine')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.routine')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$routine->id}}">
                        <div class="row">
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Title</label>
                                <input name="title" type="text" class="form-control required" placeholder="Type here" value="{{@$program->title}}">
                            </div>
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Class</label>
                                <select class="form-control" name="course_id">
                                    <option value="">Select</option>
                                    @foreach(@$course_list as $val)
                                    <option value="{{@$val->id}}">{{@$val->name}}</option>
                                    {{-- <option value="I" {{@$key['status']=='I' ? 'selected' : ''}}>Inactive</option> --}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-l imgdiv">
                                <span class="col-form-label">PDF</span>
                                <input type="file" class="custom-file-input" id="customFile" name="pdf" style="display:none">
                                <label class="custom_file_label extrlft" for="customFile">Upload PDF</label>
                            </div>
                            
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$routine) Update @else Save @endif</button>
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
                titile: {required: true},
                course_id: {required: true},
                pdf: {required: true},
            },
            submitHandler:function(form){
               form.submit();
            },
        });
        
        // $("#customFile").change(function () {
        //     $('.uploadImg').html('');
        //     let files = this.files;
        //     if (files.length > 0) {
        //         let exts = ['image/jpeg', 'image/png', 'image/gif','image/pdf'];
        //         let valid = true;
        //         $.each(files, function(i, f) {
        //             if (exts.indexOf(f.type) <= -1) {
        //                 valid = false;
        //                 return false;
        //             }
        //         });
        //         if (! valid) {
        //             alert('Please choose valid image files (jpeg, png, gif,pdf) only.');
        //             $("#customFile").val('');
        //             return false;
        //         }
        //         $.each(files, function(i, f) {
        //             var reader = new FileReader();
        //             reader.onload = function(e){
        //                 $('.uploadImg').append('<li><img src="' + e.target.result + '"></li>');
        //             };
        //             reader.readAsDataURL(f);
        //         });
        //     }
            
        // });
    });
</script>
@endsection