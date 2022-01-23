@extends('layouts.app')
@section('links')
@include('include.links')
<style>
    .nice-select{
    width: 100%;
    }
    .nice-select .list{
    width: 100%;
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
                                    <h2 class="ed_title text-center">Enrollment</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="enrollment_form mt-100 mb-100">
            <form action="{{route('store.enroll.student')}}" method="POST">
                @csrf
                <div class="form-group ">
                    <label for="exampleFormControlSelect6">Version of study</label>
                    <select class="form-control" name="virsion_of_study_id">
                        <option name="">Select</option>
                        <option value="1">Ban</option>
                        <option value="2">Eng</option>
                    </select>
                </div>
                 <div class="form-group ">
                    <label for="exampleFormControlSelect6">Branch</label>
                    <select class="form-control" name="branch_id">
                        <option name="">Select</option>
                        <option value="1">CSE</option>
                        <option value="2">ME</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect6">Batch Day's</label>
                    <select class="form-control" name="batch_day_id">
                        <option name="">Select</option>
                        <option value="1">Sunday</option>
                        <option value="2">Monday</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect6">Batch Time</label>
                    <select class="form-control" name="batch_time_id">
                        <option name="">Select</option>
                        <option value="1">10:00 AM</option>
                        <option value="2">11:00 AM</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect6">Batch Name</label>
                    <select class="form-control" name="batch_name_id">
                        <option name="">Select</option>
                        <option value="1">Start Batch</option>
                        <option value="2">JBS Batch</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect6">Select Your Course</label>
                    <select class="form-control" name="course_id">
                        <option name="">Select</option>
                        @foreach($course as $val)
                        <option value="{{@$val->id}}">{{@$val->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" value="next" class="genric-btn danger mt-10" style="width: 100%;">Next</button>
            </form>
        </div>
    </section>
</main>
@endsection
@section('scripts')
@include('include.scripts')
@endsection
@section('footer')
@include('include.footer')
@endsection