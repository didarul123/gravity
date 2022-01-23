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
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h1>{{$exam->exam_name}}</h1>
                    <h5>
                        <span>Total Question:</span> {{$exam->total_questions}} &nbsp; &nbsp; | &nbsp; &nbsp;
                        <span>Full Marks:</span> {{$exam->total_questions * $exam->marks_right}} &nbsp; &nbsp; | &nbsp; &nbsp;
                        <span>Duration: </span>

                        {{$exam->duration_in_minute}}min
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div>
                                <div>
                                    <h1 class="mt-5" style="text-align: center;">&nbsp;<strong>পরীক্ষার্থীদের জন্য নির্দেশাবলি</strong></h1>

                                    <hr>
                                </div>

                                <div>
                                    {!! $exam->instructions_bangla !!}

                                    <div>&nbsp;</div>

                                    <div>&nbsp;</div>
                                </div>

                                <h1 class="mt-5" style="text-align: center;"><strong>Instructions for the examinees</strong></h1>

                                <hr>
                                <div>
                                    {!! $exam->instructions_eng !!}
                                </div>
                            </div>
                        </div>

                        

                    </div>


                    <div class="row justify-content-md-center mt-5">
                        <form action="{{route('exam-question')}}" id="TakeExam" method="post">
                            @csrf
                            <input type="hidden" id="courseId" name="courseId" value="{{$exam->course_id}}">
                            <input type="hidden" id="examId" name="examMasterId" value="{{$exam->id}}">
                            <input type="hidden" id="subjectId" name="subjectId" value="{{$exam->subject_id}}">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <select name="examVersion" id="examVersion" class="form-control version_select" required="" style="width:100%;">
                                        <option value="">Select Version</option>
                                        <option value="Bangla">Bangla</option>
                                        <option value="English">English</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row justify-content-md-center">
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input type="hidden" id="examType" name="examType" value="1">
                                    <button type="submit" class="btn btn-info" name="mcqBtn" value="1">Start Exam</button>
                                </div>
                            </div>
                        </form>                
                    </div>

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