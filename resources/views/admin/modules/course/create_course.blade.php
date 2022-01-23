@extends('admin.layouts.app')
@section('title')
@if(@$course) Edit @else Add @endif Course
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
                <h2 class="pageheader-title">@if(@$course) Edit @else Add @endif Course</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.teacher')}}" class="breadcrumb-link">Manage Course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$course) Edit @else Add @endif Course</li>
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
                <h5 class="card-header">@if(@$course) Edit @else Add @endif Course<a class="adbtn btn btn-primary" href="{{route('manage.course')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.course')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$course->id}}">
                        <div class="row">
                            <!-- <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Class Name</label>
                                <select class="form-control parent_id" name="parent_id">
                                    <option value="">Select</option>
                                    @foreach($parent as $val)
                                        <option value="{{$val->id}}" {{@$course->parent_id==@$val->id ? 'selected' : ''}}>{{@$val->name}}</option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Course Name </label>
                                <input name="name" type="text" class="form-control required" placeholder="Type here" value="{{@$course->name}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">From Date </label>
                                <input name="from_date" type="date" class="form-control required" placeholder="Type here" value="{{@$course->from_date}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">To Date </label>
                                <input name="to_date" type="date" class="form-control required" placeholder="Type here" value="{{@$course->to_date}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Price </label>
                                <input name="price" type="text" class="form-control required" placeholder="Type here" value="{{@$course->price}}">
                            </div>
                            <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-l imgdiv">
                                <span class="col-form-label">Image</span>
                                <input type="file" class="custom-file-input" id="customFile" name="image" style="display:none">
                                <label class="custom_file_label extrlft" for="customFile">Upload Image</label>
                                <div class="uplodpic uploadImg">
                                    @if(@$course->image)
                                        <li><img src="{{asset('storage/app/course/'.@$course->image)}}"></li>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Mobile No </label>
                                <input name="mobile" type="text" class="form-control required" placeholder="Type here" value="{{@$teacher->mobile}}">
                            </div> --}}
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Description </label>
                                <div text_area> 
                                    <textarea placeholder="Type here" name="description" class="form-control" id="course_summernote" rows="10" cols="70">{!! @$course->description !!}</textarea>
                                </div>
                            </div>
                            
                            
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$course) Update @else Save @endif</button>
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
                from_date: {required: true},
                to_date: {required: true},
                price: {required: true},
                description: {required: true},
                image:       {required:true}
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

    $(document).ready(function() {
      $('#course_summernote').summernote();
    });


</script>




@endsection