@if(count($exams) > 0)
    @foreach($exams as $exam)
        <div class="col-md-4  mt-3 mb-3">
            <div class="exam_cart">
                <div class="cart_header">
                    <div class="cart_header_btn">
                        <span class="uu-routine-status uu-practice">
                            
                            @if($exam->platform == 'live_exam')
                                <span>Live</span>
                            @endif
                            @if($exam->platform == 'practice_exam')
                                <span>Practice Exam</span>
                            @endif
                            @if($exam->platform == 'in_branch_exam')
                                <span>In-Branch Exam</span>
                            @endif

                        </span>
                    </div>
                    <br>
                    <div class="cart_header_title mt-4">
                        <h2><strong>{{$exam->exam_name}}</strong></h2>
                    </div>
                </div>

                <div class="cart_des">
                    <h4>Date & Time</h4>
                    <span><strong> {{ date('Y-m-d\TH:i', strtotime($exam->exam_date_time)) }}</strong></span>

                    <br><br>

                    <h4>Duration</h4>
                    <span><strong>{{$exam->duration_in_minute}} min</strong></span>

                    <br><br>

                    <h4>Course</h4>
                    <span><strong>{{$exam->getCourse->name ?? ''}}</strong></span><br>
                    <!-- <span>Pre-Medical Free Class 2021</span> -->

                    <div class="text-center">
                        <p style="font-weight: 700; color: #e46013;">You haven't taken the exam yet</p>
                        <a href="{{route('take-exam', [$exam->id])}}"><button class="btn btn-primary">Take Exam</button></a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@else

    <div class="row" style="width: 100%;">
        <div class="col-md-12 text-center alert alert-danger">
                <p>NO LECTURE FOUND.</p>
        </div>
    </div>

 

@endif