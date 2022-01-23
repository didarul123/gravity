@extends('admin.layouts.app')
@section('title')
 Edit Class
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
                <h2 class="pageheader-title"> Edit  Class</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.class')}}" class="breadcrumb-link">Manage Class</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Edit  Class</li>
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
                <h5 class="card-header"> Edit  Class<a class="adbtn btn btn-primary" href="{{route('manage.class')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('update.class', [$class->id])}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$class->id}}">
                        <div class="row">

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Course Name</label>
                                <select class="form-control course_id" name="course_id" onchange="GetSubject(value)">
                                    <option value="">Select</option>
                                    @foreach($courses as $val)
                                        <option value="{{$val->id}}" {{@$class->course_id==$val->id ? 'selected' : ''}}>{{@$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Subject Name</label>
                                <select class="form-control subject_id required" name="subject_id" required="">
                                    @foreach($subjects as $val)
                                        <option value="{{$val->id}}" {{@$class->subject_id==$val->id ? 'selected' : ''}}>{{@$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Class Name </label>
                                <input name="title" type="text" class="form-control required" placeholder="Class Name" value="{{@$class->title}}">
                            </div>

                            <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-l imgdiv">
                                <span class="col-form-label">Image</span>
                                <input type="file" class="custom-file-input" id="customFile" name="image" style="display:none">
                                <label class="custom_file_label extrlft" for="customFile">Upload Image</label>
                                <div class="uplodpic uploadImg">
                                    @if(@$class->image)
                                        <li><img src="{{asset('storage/app/class/'.@$class->image)}}"></li>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Class Date </label>
                                <input name="class_date" type="date" class="form-control required" placeholder="Type here" value="{{@$class->class_date}}">
                            </div>

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Class Time </label>
                                <input name="class_time" type="time" class="form-control required" placeholder="Type here" value="{{@$class->class_time}}">
                            </div>

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Zoom Link</label>
                                <input name="zoom_link" type="text" class="form-control required" placeholder="Type here" value="{{@$class->zoom_link}}">
                            </div>

                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                <label class="l">Description</label>
                                <textarea name="description" id="class_des" class="form-control">{!! @$class->description !!}</textarea>
                            </div>

                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                <label class="l">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1" {{@$class->status==1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{@$class->status==0 ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>
                            
                        
                         
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser"> Update </button>
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
                title: {required: true},
            },
            submitHandler:function(form){
               form.submit();
            },
        });
        
    });

    $(document).ready(function() {
      $('#class_des').summernote();
    });

  //GetSubject
  // var token =  $("input[name=_token]").val();
  function GetSubject(val){
    // var datastr = "course_id=" + val  + "&token="+token;
    course_id = $('.course_id').val();
    // console.log(datastr)
    $.ajax({
      type: "get",
      url: "{{ url('/admin/get-subject') }}/" + course_id,
      // data:datastr,
      cache:false,
      beforeSend: function() {
          // setting a timeout
      },
      success:function (data) {            
        $('.subject_id').html(data);

      },
      error: function (jqXHR, status, err) {
        alert(status);
        console.log(err);
      },
      complete: function () {
        // alert("Complete");
      }
    });
  }



</script>
@endsection