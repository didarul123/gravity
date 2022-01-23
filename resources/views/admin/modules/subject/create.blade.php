@extends('admin.layouts.app')
@section('title')
 Add Subject
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
                <h2 class="pageheader-title"> Add Subject</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.class')}}" class="breadcrumb-link">Manage Subject</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Add Subject</li>
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
                <h5 class="card-header"> Add Subject<a class="adbtn btn btn-primary" href="{{route('manage.subject')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.subject')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$subject->id}}">
                        <div class="row">

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Course Name</label>
                                <select class="form-control course_id" name="course_id" required="" onchange="GetClass(value)">
                                    <option value="">Select</option>
                                    @foreach($courses as $val)
                                        <option value="{{$val->id}}">{{@$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
<!-- 
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Class Name</label>
                                <select class="form-control class_id required" name="class_id" required="">
                                    <option value="">Select Class</option>
                                </select>
                            </div> -->

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Subject Name </label>
                                <input name="name" type="text" class="form-control required" placeholder="Subject Name">
                            </div>

                            <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-l imgdiv">
                                <span class="col-form-label">Image</span>
                                <input type="file" class="custom-file-input" id="customFile" name="image" style="display:none">
                                <label class="custom_file_label extrlft" for="customFile">Upload Image</label>
                                <div class="uplodpic uploadImg">
                                    
                                </div>
                            </div>


                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                <label class="l">Description</label>
                                <textarea name="description" id="subject_des" class="form-control"></textarea>
                            </div>

                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                <label class="l">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            
                        
                         
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser"> Save</button>
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
      $('#subject_des').summernote();
    });



  //GetClass
  // var token =  $("input[name=_token]").val();
  function GetClass(val){
    // var datastr = "course_id=" + val  + "&token="+token;
    course_id = $('.course_id').val();
    // console.log(datastr)
    $.ajax({
      type: "get",
      url: "{{ url('/admin/get-class') }}/" + course_id,
      // data:datastr,
      cache:false,
      beforeSend: function() {
          // setting a timeout
      },
      success:function (data) {            
        $('.class_id').html(data);

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