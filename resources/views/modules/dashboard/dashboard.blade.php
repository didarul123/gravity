@extends('layouts.app')
@section('links')
@include('include.links')
<style>
/*    .nice-select{
        width: 100%;
    }
    .nice-select .list{
        width: 100%;
    }*/
    .exam_cart{
        height: 100%;
        border: 1px solid #ccc8c8;
        border-radius: 15px;
        background: white;
        box-shadow: -2px 2px 8px 0 rgb(0 0 0 / 12%);
    }
    span.uu-routine-status.uu-practice {
        background: linear-gradient(to right,#aa5f12,#ff9f67);
        color: white;
        padding: 4px 15px;
        border-radius: 25px;
        font-size: 14px;
        float: right;
    }
    .cart_header{
        box-shadow: 0 2px 9px -4px rgb(0 0 0 / 58%);
        padding: 12px;
    }
    .cart_header_title h1{
        font-size: 26px;
        font-weight: bold;
    }
    .cart_des{
        padding: 12px;
    }

    .dashboardCourse{
        height: 44px;
        width: 100%;
        font-size: 15px;

    }

    .dashboardSubject{
        height: 44px;
        width: 100%;
        font-size: 15px;
    }

    .platform{
        height: 44px;
        width: 100%;
        font-size: 15px;
    }

    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
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
            <div class="single-slider slider-height4 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ed_detail_wrap light">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">Dashboard</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog_area single-post-area section-padding" style="background: #dfd7e4;">
        <div class="container">
            <div class="row">
                <!-- @include('include.sidebar') -->
                <div class="col-lg-12">
                    <div class="container">
                        <!-- <h2>You have Enroll {{@$course}} Courses</h2> -->
                    </div>

                    <!-- Nav tabs -->
                    {{-- <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Lecture</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Exam</a>
                        </li>
                    </ul> --}}
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active">
                            <br>
                            <!-- <h3>Lecture</h3> -->
                            <form id="FilterExamForm" onsubmit="return false">
                                <div class="filter_form mb-5" style="border: 1px solid #f6f6f6;padding: 13px;background: #f6cdb5;">
                                    <div class="row">
                                            
                                        <div class="col-sm-3 col-lg-3 col-md-3">
                                            <label for="exampleFormControlSelect4">All Course</label>
                                            <div class="form-group mb-60">
                                                <select class="form-control dashboardCourse" name="course_id" id="exampleFormControlSelect4" required="">
                                                    <option value="">All Course</option>
                                                    @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-lg-3 col-md-3">
                                            <div class="form-group mb-60">
                                                <label for="exampleFormControlSelect4">All Subject</label>
                                                <select class="form-control dashboardSubject" id="exampleFormControlSelect4" required="" name="subject_id">
                                                    <option value="">All Subject</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-lg-3 col-md-3">
                                            <div class="form-group mb-60">
                                                <label for="exampleFormControlSelect4">All Platform</label>
                                                <select name="platform" class="form-control platform" id="exampleFormControlSelect4" required="">
                                                    <option value="">All Platform</option>
                                                    <option value="live_exam">Live Exam</option>
                                                    <option value="practice_exam">Practice Exam</option>
                                                    <option value="in_branch_exam">In-Branch Exam</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-lg-3 col-md-3">
                                            <div class="form-group mb-60">
                                                <label for="exampleFormControlSelect4">Filter</label>
                                                <br>
                                                <button type="button" class="btn btn-primary" id="FilterExamFormBtn">Filter</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="uu-routine-box row d-flex mt-5">
                            <div class="alert alert-danger alert-dismissable col-md-12 text-center No_Found_MSG" style="padding: 13px 0px;">
                                NO LECTURE FOUND.
                            </div>
                        </div>

                        <div class="container">
                            <div class="row filter_exam_data">

                            </div>
                        </div>

                        <div class="container">
                            <div class="row loading_image" style="display: none">
                                <img src="{{asset('public/assets/images/loader.gif')}}" alt="" class="center" width="75">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
@include('include.scripts')

<script>
    
    $('.dashboardCourse').on('change', function () {
        course_id = $('.dashboardCourse').val();

        console.log(course_id)
        if(course_id){
            $.ajax({
                url: "{{ url('/get-subjects/') }}/" + course_id,
                type: "get",
                dataType: "json",
                beforeSend: function() {
                    
                },
                success: function(data) {
                    console.log(data)

                },
                error: function(error) {
                    $('.dashboardSubject').html(error.responseText);
                    console.log(error)
                }
            })
        }

    })


    var token =  $("input[name=_token]").val();
    $('#FilterExamFormBtn').on('click', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        const $this = this;

        $.ajax({
            url: "{{ url('/filter-exam') }}",
            type: "POST",
            data: $("#FilterExamForm").serialize(),
            dataType: "json",
            cache:false,
            beforeSend: function() {
                $('.filter_exam_data').html('');
                $('.loading_image').show();
                $('.No_Found_MSG').hide();

            },
            success: function(data) {
                console.log(data);
                $('.uu-routine-box').hide();

            },
            error: function(error) {
                // console.log(error);
                $('.filter_exam_data').html(error.responseText);
                $('.No_Found_MSG').hide();
                $('.loading_image').hide();


            }
        })

    })




</script>


@endsection
@section('footer')
@include('include.footer')
@endsection