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
                        <span>Total Question:</span> {{$totalQuestion}} &nbsp; &nbsp; | &nbsp; &nbsp;
                        <span>Full Marks:</span> {{$totalQuestion * $exam->marks_right}} &nbsp; &nbsp; | &nbsp; &nbsp;
                        <span>Duration: </span>

                        {{$exam->duration_in_minute}}min

                        <input type="hidden" value="{{$exam->duration_in_minute}}" id="duration_in_minute">
                    </h5>
                </div>
            </div>


            <!-- <div class="row justify-content-md-center mt-3" style="background-color: #57646e;border-radius: 10px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12">
                        <div class="remaining text-center mt-4">
                            <h1 class="text-white">Remaining : <b>


                                <span class="text-white" id="remainingTime"></span>
                                </b>


                            </h1>
                            <p class="text-white">Start: </p>
                         </div>
                    </div>
                </div>
            </div> -->
            @php $i=1; @endphp
            
                

                @foreach($exam_questions as $exam_question)
                    <?php 
                        $detail = App\Models\UserExamDetail::where('user_exam_master_id', $exId->id)->first();
                    ?>
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

                                            <!-- <input type="text" value="{{ $exam_question->correct_answer }}">

                                            <input type="text" value="{{ $exam_question->answer_1 }}"> -->


                                        <div class="row">

                                            <!-- <span class="options_border" data-id="{{$exam_question->id}}">A</span>  -->

                                            @if($exam_question->correct_answer == 'answer_1')
                                                <i class="fas fa-check" style="font-size: 38px;color: green;position: relative;left: 38px;top: 1px;"></i>
                                            
                                            @endif

                                            @if($exam_question->correct_answer != 'answer_1' && $detail->answe_no != 'answer_1')
                                                <i class="fas fa-times" style="font-size: 38px;color: red;position: relative;left: 34px;top: 1px;"></i>
                                            @endif

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_1" id="test4" data-salans="answer_1" class="options_border" data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}" disabled="">

                                            <p class="mt-2">
                                                <strong>
                                                    @if($exam_question->answer_1)
                                                        {{ @$exam_question->answer_1 }}
                                                    @else
                                                        <img src="{{asset('storage/app/question/'.@$exam_question->answer_1_image)}}" style=" width: 227px; height: 97px;">
                                                    @endif
                                                </strong>
                                            </p>
                                        </div>
                                        
                                        <hr style="margin: 13px 0;">

                                        <div class="row">


                                            <!-- <span class="options_border" data-id="{{$exam_question->id}}">B</span>  -->

                                            @if($exam_question->correct_answer == 'answer_2')
                                                <i class="fas fa-check" style="font-size: 38px;color: green;position: relative;left: 38px;top: 1px;"></i>
                                            @endif

                                            @if($exam_question->correct_answer != 'answer_2' && $detail->answe_no != 'answer_1')
                                                <i class="fas fa-times" style="font-size: 38px;color: red;position: relative;left: 34px;top: 1px;"></i>
                                            @endif

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_2" id="test4" data-salans="answer_2" class="options_border"  data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}" disabled="">

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

                                            @if($exam_question->correct_answer == 'answer_3')
                                                <i class="fas fa-check" style="font-size: 38px;color: green;position: relative;left: 38px;top: 1px;"></i>
                                            @endif

                                            @if($exam_question->correct_answer != 'answer_3' && $detail->answe_no != 'answer_1')
                                                <i class="fas fa-times" style="font-size: 38px;color: red;position: relative;left: 34px;top: 1px;"></i>
                                            @endif

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_3" id="test4" data-salans="answer_3" class="options_border"  data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}" disabled="">

                                            <p class="mt-2">
                                                <strong>
                                                    @if($exam_question->answer_3)
                                                        {{ @$exam_question->answer_3 }}
                                                    @else
                                                        <img src="{{asset('storage/app/question/'.@$exam_question->answer_3_image)}}" style=" width: 227px; height: 97px;">
                                                    @endif
                                                </strong>
                                            </p>

                                        </div>
                                        <hr style="margin: 13px 0;">
                                        <div class="row">

                                            <!-- <span class="options_border" data-id="{{$exam_question->id}}">D</span>  -->

                                            @if($exam_question->correct_answer == 'answer_4')
                                                <i class="fas fa-check" style="font-size: 38px;color: green;position: relative;left: 38px;top: 1px;"></i>
                                          
                                            @endif

                                            @if($exam_question->correct_answer != 'answer_4' && $detail->answe_no != 'answer_1')
                                                <i class="fas fa-times" style="font-size: 38px;color: red;position: relative;left: 34px;top: 1px;"></i>
                                            @endif

                                            <input type="radio" name="ans[{{$exam_question->id}}]"  value="answer_4" id="test4" data-salans="answer_4" class="options_border"  data-ques="{{$exam_question->getQuestion->id ?? ''}}" data-id="{{$exam_question->id}}" disabled="">

                                            <p class="mt-2">
                                                <strong>
                                                    @if($exam_question->answer_4)
                                                        {{ @$exam_question->answer_4 }}
                                                    @else
                                                        <img src="{{asset('storage/app/question/'.@$exam_question->answer_4_image)}}" style=" width: 227px; height: 97px;">
                                                    @endif
                                                </strong>
                                            </p>

                                        </div>
                                       
                                    </div>
                                </div>

                                                         
                            </div>
                            
                        </div>

                    </div>

                    <div class="row justify-content-md-center" style="background-color: #fff;border-radius: 10px;">

                        <div class="bekkha" style="padding: 15px;border: 1px solid green;background: #D7F7D4;">
                            <div class="bekkha_h1">
                                <h2><b>ব্যাখ্যা:</b></h2>
                            </div>
                            <div class="bekkha_para" style="font-size: 18px;">
                                @if($exam_question->cor_des)
                                    {!! $exam_question->cor_des !!}
                                @else
                                    <img src="{{asset('storage/app/question/'.@$exam_question->answer_1_image)}}" style=" width: 227px; height: 97px;">
                                @endif
                            </div>
                        </div>

                    </div>


                @endforeach
                <div class="container mt-5 text-center">
                    <div class="col-md-12">
                        <a href="{{route('score.card', $user_examId)}}"><button type="submit" class="btn btn-info">Score Board <i class="fas fa-arrow-right"></i></button></a>
                    </div>
                </div>    
        </div>
    </div>
</main>
@endsection
@section('scripts')
@include('include.scripts')


@endsection
@section('footer')
@include('include.footer')
@endsection