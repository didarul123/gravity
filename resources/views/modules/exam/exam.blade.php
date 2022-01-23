@extends('layouts.app')
@section('links')
@include('include.links')
@include('modules.exam.exam_style')
<style type="text/css">
    img{
        height: 150px;
        width: 350px;
    }
</style>
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
<main>
    <section class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-height1 d-flex align-items-center">
                <div class="container">
                    <div class="pull-right mt-5 mb-5">
                        <div class="text-right1">
                            <i class="fa fa-clock-o" aria-hidden="true" style="float: left; font-size: 22px; margin: 0 10px 0 0;"></i>
                            <div class="countdown-bar timerr_rm01 text-right1" id="countdownB">
                                <div class="timerr_rm02"></div>
                                <div class="timerr_rm03"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <form method="post" action="{{route('submit.exam')}}">
            @csrf
            <input type="hidden" class="tottime" value="{{@$exammaster->duration_in_minute}}">
            <input type="hidden" class="qno" value="1">
            <input type="hidden" class="user_exam_detail_id" value="{{@$user_exam[0]->id}}">
            <input type="hidden" class="user_examId"  value="{{@$exammaster->id}}">
            <input type="hidden" class="totQ" value="{{@$totQ}}">        
            <input type="hidden" name="exammaster_id" class="exammasterID" value="{{@$exammaster->id}}">
            <input type="hidden" class="user_exam_master_id" value="{{@$user_exam[0]->user_exam_master_id}}"> 
            <input type="hidden" class="nextQ" value="{{@$user_exam[1]->id}}">
            <input type="hidden" class="prevQ" value="0">
            <input type="hidden" class="quesno" value="{{@$user_exam[0]->getQuestion->id}}">
            <input type="hidden" class="selected_ans">
            <input type="hidden" class="submitted_ans">
            <input type="hidden" class="timerrrr">
            <input type="hidden" name="examID" class="examID" value="{{@$userExam->id}}">
            <div class="container mb-100">
                <h3 class="ed_title mt-30" style="color:#000;  font-size:18px;">Total Questions : <b class="totQ">{{@$totQ}}</b></h3>
                @foreach($user_exam as $key=>$val)
                    <div class="card exams mt-50">
                        @include('include.message')
                        <div class="card-header">
                            <b class="qno">{{$key+1}}</b>)  <b id="question">
                                @if($val->getQuestion->type=="TEXT")
                                    {{$val->getQuestion->question}}
                                @else
                                    <img src="{{asset('storage/app/question/'.@$val->getQuestion->question)}}">
                                @endif
                            </b>
                        </div>
                        <input type="hidden" name="ques[{{$val->id}}]" value="{{$val->getQuestion->id}}">
                        <div class="card-body">
                            <section class="light">
                                <label>
                                    <div class="numberungw">1</div>
                                    <input type="radio" name="ans[{{$val->id}}]" value="1" id="test1"  class="click_ans" data-salans="1" data-ques="{{$val->getQuestion->id}}" data-id="{{$val->id}}">
                                    <span class="design"></span>
                                    <span class="text" id="answer_1" >
                                        @if($val->getQuestion->type=="TEXT")
                                            {{$val->getQuestion->answer_1}}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->getQuestion->answer_1)}}">
                                        @endif
                                    </span>
                                </label>
                                <label>
                                    <div class="numberungw">2</div>
                                    <input type="radio" name="ans[{{$val->id}}]" value="2" id="test2" class="click_ans" data-salans="2" data-ques="{{$val->getQuestion->id}}" data-id="{{$val->id}}">
                                    <span class="design"></span>
                                    <span class="text" id="answer_2" >
                                        @if($val->getQuestion->type=="TEXT")
                                            {{$val->getQuestion->answer_2}}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->getQuestion->answer_2)}}">
                                        @endif
                                    </span>
                                </label>
                                <label>
                                    <div class="numberungw">3</div>
                                    <input type="radio" name="ans[{{$val->id}}]" value="3" id="test3" class="click_ans" data-salans="3" data-ques="{{$val->getQuestion->id}}" data-id="{{$val->id}}">
                                    <span class="design"></span>
                                    <span class="text" id="answer_3" >
                                        @if($val->getQuestion->type=="TEXT")
                                            {{$val->getQuestion->answer_3}}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->getQuestion->answer_3)}}">
                                        @endif
                                    </span>
                                </label>
                                <label>
                                    <div class="numberungw">4</div>
                                    <input type="radio" name="ans[{{$val->id}}]" value="4" id="test4" class="click_ans" data-salans="4" data-ques="{{$val->getQuestion->id}}" data-id="{{$val->id}}">
                                    <span class="design"></span>
                                    <span class="text" id="answer_4" >
                                        @if($val->getQuestion->type=="TEXT")
                                            {{$val->getQuestion->answer_4}}
                                        @else
                                            <img src="{{asset('storage/app/question/'.@$val->getQuestion->answer_4)}}">
                                        @endif
                                    </span>
                                </label>
                            </section>
                        </div>
                    </div>
                @endforeach
                <div class="pull_left mt-20">  
                    <button type="submit" class="genric-btn danger">Submit Exam</button>
                </div>
            </div>
        </form>
    </section>
</main>
<div id="back-top" >
    <a title="Go to Top" href="javascript:;"> <i class="fas fa-level-up-alt"></i></a>
</div>
@endsection
@section('scripts')
@include('include.scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="{{asset('public/js/script.js')}}"></script>
<script type="text/javascript">
    $("html").on("contextmenu",function(e){
       return false;
    });
    
    $(document).ready(function(){
        var totTime = Number($('.tottime').val());
        countdown('countdownB', 0, 0, totTime, 00); 
        $('.click_ans').click(function(){
            if($(this).prop("checked" ,true)){
                var reqData = {
                    'jsonrpc' : '2.0',                
                    '_token'  : '{{csrf_token()}}',
                    'data'    : {
                        'ans'           : $(this).data('salans'),
                        'ques'          : $(this).data('ques'),
                        'EQid'          : $(this).data('id')
                    }
                };
                $.ajax({
                    url: '{{ route('select.option') }}',
                    dataType: 'json',
                    data: reqData,
                    type: 'post',
                    success: function(response){
                        console.log(response)
                    },
                    error:function(error) {
                        console.log(error.responseText);
                    }
                });
            }
        });
    });
    
    
    function nextSection(){
        Swal.fire({
          title: 'Time over for exam.',
          timer: 7000,
          showConfirmButton: false,
          icon: 'error',
          onClose: () => {
            var examID = $('.examID').val();
            window.location.href ='{{url('score-card')}}/'+examID;
          }
        })
    }
    
    
    // For keyboard
    function disable_f5(e)
    {
      if ((e.which || e.keyCode) >0)
      {
          e.preventDefault();
          e.stopPropagation();
    
      }
    }
    
    $(document).ready(function(){
        $(document).bind("keydown", disable_f5);    
    });
    
    var tbc = 0;
    $(window).focus(function() {
        tbc++;
        if(tbc>=3){
            let timerInterval
            Swal.fire({
              title: 'You are aborted from the test.',
              timer: 7000,
              showConfirmButton: false,
              icon: 'error',
              willOpen: () => {
                timerInterval = setInterval(() => {
                  const content = Swal.getContent()
                }, 100)
              },
              onClose: () => {
                clearInterval(timerInterval)
                window.location = '{{ route('dashboard') }}';
              }
            })
        } else {
            Swal.fire({
              icon: 'warning',
              text: 'You switched to another browser tab during exam. You are not allowed to do this. Your test will be aborted if you do it.',
            })
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#answer_1').click(function(){$('.selected_ans').val(1);});
        $('#answer_2').click(function(){$('.selected_ans').val(2);});
        $('#answer_3').click(function(){$('.selected_ans').val(3);});
        $('#answer_4').click(function(){$('.selected_ans').val(4);});

        var nmm = Number($('.qno').val()); 
        if(nmm>0){
            $('.PQno').removeClass('active');
            $('.apt'+nmm).addClass('active');
        }
        $('body').on('click','.slider-area',function(){
            $('.message').hide();
        });

        if($('.prevQ').val()==''|| $('.prevQ').val()==null || $('.prevQ').val()==0){
            $('.prvvv').hide();
        } 
        
        $('body').on('click','.next',function(){
            var q_id;
            var type;
            var qNo = Number($('.qno').val());
            var TotQ = Number($('.totQ').val());
            var ans = $('.selected_ans').val();
            var ques = $('.quesno').val();

            if($(this).data('act')=='N' || $(this).data('act')=='SK'){
                if($('.nextQ').val()==''|| $('.nextQ').val()==null || $('.nextQ').val()==0){
                    return false;
                }
                type = 'N';
                q_id = $('.nextQ').val();
                if(qNo<TotQ){
                    $('.qno').html(Number(qNo+1));
                    $('.qno').val(Number(qNo+1));
                }else{
                    $('.qno').html(Number(1));
                    $('.qno').val(Number(1));
                }
                for (var i = 1; i <= 10; i++) {
                    $('.apt'+(i+1)).removeClass('active');
                    if(i==qNo){
                        $('.apt'+(i+1)).addClass('active');
                    }
                }
            }
            if($(this).data('act')=='P'){
                if($('.prevQ').val()==''|| $('.prevQ').val()==null || $('.prevQ').val()==0){
                    $('.prvvv').hide();
                    return false;
                }
                $('.prvvv').show();
                type = 'P';
                q_id = $('.prevQ').val();
                if(qNo>1){
                    $('.qno').html(Number(qNo-1));
                    $('.qno').val(Number(qNo-1));
                }
                for (var i = 1; i <= 10; i++) {
                    $('.apt'+(i-1)).removeClass('active');
                    if(i==qNo){
                        $('.apt'+(i-1)).addClass('active');
                    }
                }
            }
            if($(this).data('act')=='S'){
                // ans = $('.selected_ans').val();
                if ($("#test1").prop("checked")) {ans = 1;}
                if ($("#test2").prop("checked")) {ans = 2;}
                if ($("#test3").prop("checked")) {ans = 3;}
                if ($("#test4").prop("checked")) {ans = 4;}
                if(ans==null || ans==''){
                    Swal.fire({
                      icon: 'warning',
                      text: 'Please select option.',
                    })
                    return false;
                } 
                type = 'S';
                q_id = $('.nextQ').val();
                if(qNo<TotQ){
                    $('.qno').html(Number(qNo+1));
                    $('.qno').val(Number(qNo+1));
                }
            }
            var reqData = {
                'jsonrpc' : '2.0',                
                '_token'  : '{{csrf_token()}}',
                'data'    : {
                'q_id'    : q_id,
                'exammasterID'    : $('.exammasterID').val(),
                'user_exam_master_id'    : $('.user_exam_master_id').val(),
                'totQ'    : $('.totQ').val(),
                'type'    : type,
                'ans'     : ans,
                'ques'    : ques,
                'EQid'    : $('.user_exam_detail_id').val(),
                'user_exam_id'    : $('.user_examId').val()

                }
            };
            $.ajax(
            {
                url: '{{ route('next.question') }}',
                dataType: 'json',
                data: reqData,
                type: 'post',
                success: function(response) 
                {
                    if(response.result){
                        if(type=='S'){
                            console.log(response)
                            if(response.result.next==0 && response.result.prev==0){
                                var examID = $('.examID').val();
                                window.location.href ='{{url('score-card')}}/'+examID;
                            }
                        }
                        $('#question').html(response.result.question);
                        $('#answer_1').html(response.result.answer_1);
                        $('#answer_2').html(response.result.answer_2);
                        $('#answer_3').html(response.result.answer_3);                                
                        $('#answer_4').html(response.result.answer_4);                                
                        $('.quesno').val(response.result.quesno);
                        $('.user_exam_detail_id').val(response.result.user_exam_detail_id);
                        $('.option').attr('checked', false);
                        for (var i = 1; i <= 4; i++) {
                            if(response.result.answer_no==i){
                                $('.submitted_ans').val(i)
                                $('#test'+i).prop('checked','checked');
                            } else{
                                $('#test'+i).prop('checked','');
                            }
                        }
                        $('.nextQ').val(response.result.next);
                        $('.prevQ').val(response.result.prev);
                        $('.selected_ans').val('');

                        if($('.prevQ').val()==''|| $('.prevQ').val()==null || $('.prevQ').val()==0){
                            $('.prvvv').hide();
                        }else {
                            $('.prvvv').show();
                        }
                        if($('.nextQ').val()==''|| $('.nextQ').val()==null || $('.nextQ').val()==0){
                            $('.nexxxx').hide();
                        }else {
                            $('.nexxxx').show();
                        }
                    }
                  
                },
                error:function(error) 
                {
                    console.log(error.responseText);
                }
            });
        });
    });
</script>
@endsection