@extends('admin.layouts.app')
@section('title')
@if(@$exam) Edit @else Add @endif Exam
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
                <h2 class="pageheader-title">@if(@$exam) Edit @else Add @endif Exam</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.exam')}}" class="breadcrumb-link">Manage Exam</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$exam) Edit @else Add @endif Exam</li>
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
                <h5 class="card-header">@if(@$exam) Edit @else Add @endif Exam<a class="adbtn btn btn-primary" href="{{route('manage.exam')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.exam')}}" method="post" id="categoryform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$exam->id}}">
                        <div class="row">

                            <!-- <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Platform</label>
                                <select class="form-control required" name="platform">
                                    <option value="">Select</option>
                                    <option value="live_exam">Live Exam</option>
                                    <option value="practice_exam">Practice Exam</option>
                                    <option value="in_branch_exam">In-Branch Exam</option>
                                </select>
                            </div> -->

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Platform</label>
                                <select class="form-control required" name="platform">
                                    <option value="live_exam" {{@$question->platform=='live_exam' ? 'selected' : ''}}>Live Exam</option>
                                    <option value="practice_exam" {{@$question->platform=='practice_exam' ? 'selected' : ''}}>Practice Exam</option>
                                    <option value="in_branch_exam" {{@$question->platform=='in_branch_exam' ? 'selected' : ''}}>In-Branch Exam</option>
                                </select>
                            </div>
                            

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Exam Name </label>
                                <input name="exam_name" type="text" class="form-control required" placeholder="Type here" value="{{@$exam->exam_name}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Course </label>
                                <select class="form-control course_id required" name="course_id" onchange="GetSubject(value)">
                                    <option value="">Select</option>
                                    @foreach($course as $val)
                                        <option value="{{$val->id}}" {{@$exam->course_id==$val->id ? 'selected' : ''}}>{{@$val->name}}</option>
                                    @endforeach                                   
                                </select>
                            </div> 

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Subject </label>
                                <select class="form-control subject_id required" name="subject_id" required="">

                                    @if(@$exam)
                                        @foreach($subjects as $val)
                                            <option value="{{$val->id}}" {{@$exam->subject_id==$val->id ? 'selected' : ''}}>{{@$val->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="">Select Subject</option>
                                    @endif

                                    


                                </select>
                            </div>


                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Exam Duration (in Minutes) </label>
                                <input name="duration_in_minute" type="number" min="0" class="form-control required" placeholder="Type here" value="{{@$exam->duration_in_minute}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Total Question</label>
                                <input name="total_questions" type="number" min="0" class="form-control required" placeholder="Type here" value="{{@$exam->total_questions}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Marks for right</label>
                                <input name="marks_right" type="number" min="0" class="form-control required" placeholder="Type here" value="{{@$exam->marks_right}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Marks for wrong</label>
                                <input name="marks_wrong" type="number" min="0" class="form-control required" placeholder="Type here" value="{{@$exam->marks_wrong}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Exam Start Date</label>
                                <input name="exam_date_time" type="datetime-local" class="form-control required" placeholder="Type here" value="{{ date('Y-m-d\TH:i', strtotime($exam->exam_date_time ?? '')) }}">

                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                <label class="">Instructions ( English )</label>

                                <textarea placeholder="Type here" name="instructions_eng" class="form-control" id="instructions_eng" rows="10" cols="70">{!! @$exam->instructions_eng !!}</textarea>

                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                <label class="">Instructions ( Banglad )</label>

                                <textarea placeholder="Type here" name="instructions_bangla" class="form-control" id="instructions_bangla" rows="10" cols="70">{!! @$exam->instructions_bangla !!}</textarea>


                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$exam) Update @else Save @endif</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#categoryform').validate({
            rules: {
                course_id: {required: true},
                duration_in_minute: {required: true,number:true},
                total_questions: {required: true,number:true}
            },
            submitHandler:function(form){
               form.submit();
            },
        });
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

    $(document).ready(function() {
      $('#instructions_eng').summernote();
    });
    $(document).ready(function() {
      $('#instructions_eng').summernote();
    });
    $(document).ready(function() {
      $('#instructions_bangla').summernote();
    });


</script>
@endsection