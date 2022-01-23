@extends('admin.layouts.app')
@section('title')
@if(@$question) Edit @else Add @endif Question
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
                <h2 class="pageheader-title">@if(@$question) Edit @else Add @endif Question</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.exam')}}" class="breadcrumb-link">Manage Exam</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$question) Edit @else Add @endif Question</li>
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
                <h5 class="card-header">@if(@$question) Edit @else Add @endif Question<a class="adbtn btn btn-primary" href="{{route('view.exam',[@Request::segment(3)])}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('update.question', [$question->id])}}" method="post" id="categoryform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="questionType" value="{{@$question->type}}">
                        <input type="hidden" name="exam_master_id" value="{{Request::segment(3)}}">
                        <input type="hidden" class="question_id" name="question_id" value="{{@Request::segment(4)}}">
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-4" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label class="col-form-label">Version</label>
                                    <select name="qs_version" id="" class="form-control">
                                        <option value="Bangla" @php if ($question['qs_version'] == "Bangla") { echo "selected"; } @endphp>Bangla</option>
                                        <option value="English" @php if ($question['qs_version'] == "English") { echo "selected"; } @endphp>English</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-lg-8 col-md-8 col-sm-8" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label class="col-form-label">Question Type</label>
                                    <h3 style="color: red">You can choose text or image. But at leate 1 type is requried</h3>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text_type">
                                <div class="row">
                                    <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pad-r">
                                        <label class="col-form-label">Uddipok ( Text ) ( Optional )</label>
                                        <textarea name="uddipok_text" class="form-control " rows="3" placeholder="Type here">{{@$question->uddipok}}</textarea>
                                    </div>    

                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pad-r">
                                        <label class="col-form-label">Uddipok ( Image ) ( Optional )</label>
                                        <input type="file" name="uddipok_image">
                                        @if(@$question->uddipok_image)
                                            <img src="{{asset('storage/app/question/'.@$question->uddipok_image)}}" width="300" height="130">
                                            <input type="hidden" name="old_uddipok_image" value="{{ $question->uddipok_image }}">
                                        @endif
                                    </div>    

                                    <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pad-r">
                                        <label class="col-form-label">Question ( Text )</label>
                                        <textarea name="question" class="form-control " rows="3" placeholder="Type here">{{@$question->question}}</textarea>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pad-r">
                                        <label class="col-form-label">Question ( Image )</label>
                                        <input type="file" name="question_image">
                                        @if(@$question->question_image)
                                            <img src="{{asset('storage/app/question/'.@$question->question_image)}}" width="300" height="130">
                                            <input type="hidden" name="old_question_image" value="{{ $question->question_image }}">
                                        @endif
                                    </div>  

                                    <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pad-r">
                                        <label class="col-form-label">Answer 1 ( Text )</label>
                                        <input name="answer_1" type="text" class="form-control answer_1 " placeholder="Type here" value="{{@$question->answer_1}}">
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pad-r">
                                        <label class="col-form-label">Answer 1 ( Image )</label>
                                        <input type="file" name="answer_1_image">
                                        @if(@$question->answer_1_image)
                                            <img src="{{asset('storage/app/question/'.@$question->answer_1_image)}}"  width="300" height="130">
                                            <input type="hidden" name="old_answer_1_image" value="{{ $question->answer_1_image }}">
                                        @endif
                                    </div> 

                                    <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pad-r">
                                        <label class="col-form-label">Answer 2 ( Text )</label>
                                        <input name="answer_2" type="text" class="form-control answer_2 " placeholder="Type here" value="{{@$question->answer_2}}">
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pad-r">
                                        <label class="col-form-label">Answer 2 ( Image )</label>
                                        <input type="file" name="answer_2_image">
                                        @if(@$question->answer_2_image)
                                            <img src="{{asset('storage/app/question/'.@$question->answer_2_image)}}"  width="300" height="130">
                                            <input type="hidden" name="old_answer_2_image" value="{{ $question->answer_2_image }}">
                                        @endif
                                    </div> 
                                    
                                    <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pad-r">
                                        <label class="col-form-label">Answer 3 ( Text )</label>
                                        <input name="answer_3" type="text" class="form-control answer_3" placeholder="Type here" value="{{@$question->answer_3}}">
                                        <span class="answer_3_error error"></span>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pad-r">
                                        <label class="col-form-label">Answer 3 ( Image )</label>
                                        <input type="file" name="answer_3_image">
                                        @if(@$question->answer_3_image)
                                            <img src="{{asset('storage/app/question/'.@$question->answer_3_image)}}"  width="300" height="130">
                                            <input type="hidden" name="old_answer_3_image" value="{{ $question->answer_3_image }}">
                                        @endif
                                    </div> 

                                    <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pad-r">
                                        <label class="col-form-label">Answer 4 ( Text )</label>
                                        <input name="answer_4" type="text" class="form-control answer_4" placeholder="Type here" value="{{@$question->answer_4}}">
                                        <span class="answer_4_error error"></span>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pad-r">
                                        <label class="col-form-label">Answer 4 ( Image )</label>
                                        <input type="file" name="answer_4_image">
                                        @if(@$question->answer_4_image)
                                            <img src="{{asset('storage/app/question/'.@$question->answer_4_image)}}"  width="300" height="130">
                                            <input type="hidden" name="old_answer_4_image" value="{{ $question->answer_4_image }}">
                                        @endif
                                    </div> 

                                    <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pad-r">
                                        <label class="col-form-label">Correct Description ( Text )</label>
                                        <textarea name="cor_des_text" class="form-control cor_des_text" rows="5" placeholder="Type here">{{@$question->cor_des}}</textarea>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pad-r">
                                        <label class="col-form-label">Correct Description ( Image )</label>
                                        <input type="file" name="cor_des_image">
                                        @if(@$question->cor_des_image)
                                            <img src="{{asset('storage/app/question/'.@$question->cor_des_image)}}"  width="300" height="130">
                                            <input type="hidden" name="old_cor_des_image" value="{{ $question->cor_des_image }}">
                                        @endif
                                    </div> 

                                </div>


                               
                                
                                
                                
                                
                            </div>
<!-- 
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 img_type" style="display: none;">
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                    <label class="col-form-label">Question</label>
                                    <input type="file" name="question" id="ques" class="form-control required" value="{{@$question->question}}">
                                    <div class="uplodpic ques">
                                        @if(@$question->question)
                                            <li><img src="{{asset('storage/app/question/'.@$question->question)}}"></li>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                    <label class="col-form-label">Answer 1</label>
                                    <input name="answer_1" type="file" id="ans1" class="form-control answer_1 required" value="{{@$question->answer_1}}">
                                    <div class="uplodpic ans1">
                                        @if(@$question->answer_1)
                                            <li><img src="{{asset('storage/app/question/'.@$question->answer_1)}}"></li>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                    <label class="col-form-label">Answer 2</label>
                                    <input name="answer_2" type="file" id="ans2" class="form-control answer_2 required" value="{{@$question->answer_2}}">
                                    <div class="uplodpic ans2">
                                        @if(@$question->answer_2)
                                            <li><img src="{{asset('storage/app/question/'.@$question->answer_2)}}"></li>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                    <label class="col-form-label">Answer 3</label>
                                    <input name="answer_3" type="file" id="ans3" class="form-control answer_3" value="{{@$question->answer_3}}">
                                    <span class="answer_3_error error"></span>
                                    <div class="uplodpic ans3">
                                        @if(@$question->answer_3)
                                            <li><img src="{{asset('storage/app/question/'.@$question->answer_3)}}"></li>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pad-r">
                                    <label class="col-form-label">Answer 4</label>
                                    <input name="answer_4" type="file" id="ans4" class="form-control answer_4" value="{{@$question->answer_4}}">
                                    <span class="answer_4_error error"></span>
                                    <div class="uplodpic ans4">
                                        @if(@$question->answer_4)
                                            <li><img src="{{asset('storage/app/question/'.@$question->answer_4)}}"></li>
                                        @endif
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Correct Answer</label>
                                <select class="form-control required" name="correct_answer">
                                    <option value="">Select</option>
                                    <option value="answer_1" {{@$question->correct_answer=='answer_1' ? 'selected' : ''}}>Answer 1</option>
                                    <option value="answer_2" {{@$question->correct_answer=='answer_2' ? 'selected' : ''}}>Answer 2</option>
                                    <option value="answer_3" {{@$question->correct_answer=='answer_3' ? 'selected' : ''}}>Answer 3</option>
                                    <option value="answer_4" {{@$question->correct_answer=='answer_4' ? 'selected' : ''}}>Answer 4</option>
                                </select>
                            </div>



                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Status</label>
                                <select class="form-control required" name="status">
                                    <option value="">Select</option>
                                    <option value="1" {{@$question->status=='1' ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{@$question->status=='0' ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>

                            <input type="hidden" class="answer" value="{{@$question->correct_answer}}">
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$question) Update @else Save @endif</button>
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
        

       // $(".cor_des_text").click(function(){
          
       //  }); 



        $('#categoryform').validate({
            rules: {
                // question: {required: true},
                // answer_1: {required: true},
                // answer_2: {required: true},
                // answer_3: {required: true},
                // answer_4: {required: true},
                correct_answer: {required: true}                
            },
            submitHandler:function(form){
               form.submit();
            },
        });

        $('.ques_type').click(function(){
            if($(this).prop("checked") == true){
                var qtype = $(this).val();

                if(qtype=='TEXT'){
                    $('.text_type').show();
                    $('.img_type').hide();
                }   
                if(qtype=='IMAGE'){
                    $('.text_type').hide();
                    $('.img_type').show();
                }
            }
            
        });
        var typp = $('.questionType').val();
        if(typp=='TEXT'){
            $('.text_type').show();
            $('.img_type').hide();
        }   
        if(typp=='IMAGE'){
            $('.text_type').hide();
            $('.img_type').show();
        }


        $("#ques").change(function () {
            $('.ques').html('');
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
                    $("#ques").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.ques').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }  
        });

        $("#ans1").change(function () {
            $('.ans1').html('');
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
                    $("#ans1").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.ans1').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }  
        });

        $("#ans2").change(function () {
            $('.ans2').html('');
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
                    $("#ans2").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.ans2').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }  
        });

        $("#ans3").change(function () {
            $('.ans3').html('');
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
                    $("#ans3").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.ans3').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }  
        });

        $("#ans4").change(function () {
            $('.ans4').html('');
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
                    $("#ans4").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.ans4').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }  
        });




    });
</script>
@endsection