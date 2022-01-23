@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .properties__img img{
        height: 250px;
    }
    .act_class{
        color: #38a4ff !important;
        border-color: #38a4ff !important;
        background: #fff !important;
        border: 1px solid !important;
    }
    .card-header h1, h5{
        font-weight: bold;
        font-size: 35px;
    }
    .card-header h5{
        font-weight: 600;
        font-size: 25px;
    }
    form{
        width: 100%;
    }
    .version_select{
        width: 100%;
        height: 50px;
        font-size: 17px;
        font-weight: bold;
    }

    .options_border{
        width: 40px;
        background: #b8b4b4;
        text-align: center;
        height: 40px;
        border-radius: 50%;
        color: white;
        margin-right: 10px;
        padding: 8px;
        cursor: pointer;
    }

    .option_active{
        background: #1077b8;
    }

</style>
@endsection
@section('header')
@include('include.header')
@endsection
@section('body')
<main>
    <section class="pricing pb-100 pt-100">
        <div class="container">
        </div>
    </section>
    <div class="courses-area section-padding40 fix" style="background: #fcf5ea;">
        <div class="container">
            <div class="card" style="border: 0">
                <div class="card-header text-center">
                    <h1>{{$exam->exam_name}}</h1>
                    <h5>
                        <span>Total Question:</span> {{$exam->total_questions}} &nbsp; &nbsp; | &nbsp; &nbsp;
                        <span>Full Marks:</span> {{$exam->total_questions * $exam->marks_right}} &nbsp; &nbsp; | &nbsp; &nbsp;
                        <span>Duration: </span>

                        {{$exam->duration_in_minute}}min

                        <input type="hidden" value="{{$exam->duration_in_minute}}" id="duration_in_minute">
                    </h5>
                </div>
                <div class="card-body">

                </div>
            </div>


            <div class="row justify-content-md-center mt-3" style="background-color: #57646e;border-radius: 10px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12">
                        <div class="remaining text-center mt-4">
                            <h1 class="text-white">Remaining : <b>


                                <span class="text-white" id="remainingTime"></span>
                                </b>


                            </h1>
                            <p class="text-white">Start: {{$start_time}}</p>
                         </div>
                    </div>
                </div>
            </div>
            @php $i=1; @endphp
            <form method="post" action="{{route('submit.exam')}}">
                @csrf
                <input type="hidden" class="tottime" value="{{@$exam->duration_in_minute}}">
                <input type="hidden" class="qno" value="1">
                <input type="hidden" name="user_examId" class="user_examId"  value="{{@$UserExam}}">
                <input type="hidden" class="totQ" value="{{@$totQ}}">        
                <input type="hidden" name="examID" class="examID" value="{{@$exam->id}}">
                <input type="hidden" class="prevQ" value="0">
                <input type="hidden" class="selected_ans">
                <input type="hidden" class="submitted_ans">
                <input type="hidden" class="timerrrr">

                @foreach($exam_questions as $exam_question)
                    
                    <div class="row justify-content-md-center mt-5" style="background-color: #fff;border-radius: 10px;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="remaining text-center mt-4" style="padding: 20px;">
                                <div class="question_serial " style="text-align: left;">
                                    <p><u>Question {{$i++}}</u></p>

                                    <div class="question">
                                        <h1 style="font-size: 24px;">
                                            @if($exam_question->question)
                                                {{ @$exam_question->question }}
                                            @else
                                                <img src="{{asset('storage/app/question/'.@$exam_question->question_image)}}" style=" width: 227px; height: 97px;">
                                            @endif
                                        </h1>
                                    </div>
                                    <hr style="margin: 25px 0;">

                                    <div class="options">
                                        <div class="row">

                                            <!-- <span class="options_border" data-id="{{$exam_question->id}}">A</span>  -->

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_1" id="test4" data-salans="answer_1" class="options_border" data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}">

                                            <p class="mt-2"><strong>
                                                @if($exam_question->answer_1)
                                                    {{ @$exam_question->answer_1 }}
                                                @else
                                                    <img src="{{asset('storage/app/question/'.@$exam_question->answer_1_image)}}" style=" width: 227px; height: 97px;">
                                                @endif
                                            </strong></p>

                                        </div>
                                        
                                        <hr style="margin: 13px 0;">

                                        <div class="row">

                                            <!-- <span class="options_border" data-id="{{$exam_question->id}}">B</span>  -->

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_2" id="test4" data-salans="answer_2" class="options_border"  data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}">

                                            <p class="mt-2"><strong>
                                                @if($exam_question->answer_2)
                                                    {{ @$exam_question->answer_2 }}
                                                @else
                                                    <img src="{{asset('storage/app/question/'.@$exam_question->answer_2_image)}}" style=" width: 227px; height: 97px;">
                                                @endif
                                            </strong></p>

                                        </div>
                                        <hr style="margin: 13px 0;">
                                        <div class="row">

                                            <!-- <span class="options_border" data-id="{{$exam_question->id}}">C</span>  -->

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_3" id="test4" data-salans="answer_3" class="options_border"  data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}">

                                            <p class="mt-2"><strong>
                                                @if($exam_question->answer_3)
                                                    {{ @$exam_question->answer_3 }}
                                                @else
                                                    <img src="{{asset('storage/app/question/'.@$exam_question->answer_3_image)}}" style=" width: 227px; height: 97px;">
                                                @endif
                                            </strong></p>

                                        </div>
                                        <hr style="margin: 13px 0;">
                                        <div class="row">

                                            <!-- <span class="options_border" data-id="{{$exam_question->id}}">D</span>  -->

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_4" id="test4" data-salans="answer_4" class="options_border"  data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}">

                                            <p class="mt-2"><strong>
                                                @if($exam_question->answer_4)
                                                    {{ @$exam_question->answer_4 }}
                                                @else
                                                    <img src="{{asset('storage/app/question/'.@$exam_question->answer_4_image)}}" style=" width: 227px; height: 97px;">
                                                @endif
                                            </strong></p>

                                        </div>
                                       
                                    </div>

                                </div>

                                                         
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="container mt-5 text-center">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</main>
@endsection
@section('scripts')
@include('include.scripts')


<script>

    var duration_in_minute = document.getElementById("duration_in_minute").value;
    var startMinites = duration_in_minute;
    var time = startMinites * 60;
    var remainingTime = document.getElementById("remainingTime");
    const interval = setInterval(updateTime, 1000);
    function updateTime() {
        var minutes = Math.floor(time / 60);
        var seconds = time % 60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        remainingTime.innerHTML = `${minutes}:${seconds}`;
        time--;
    }

    // setInterval(myTimer, 1000);

    // function myTimer() {
    //   const d = new Date();
    //   document.getElementById("remainingTime").innerHTML = d.toLocaleTimeString();
    // }

    $('.options_border').on('click', function(){

        var $this = $(this);
        var id = $(this).data('id');

        // $(".options_border").removeClass("option_active");
        $(this).addClass("option_active"); 


    })
</script>

@endsection
@section('footer')
@include('include.footer')
@endsection