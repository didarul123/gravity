@extends('layouts.app')
@section('links')
@include('include.links')
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
                                    <h2 class="ed_title text-center">Payment</h2>
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
            <div class="form-group mb-20">
                <label for="exampleFormControlSelect1">Course</label> : <b>{{@$course->name}}</b>
            </div>
            <div class="form-group mb-20">
                <label for="exampleFormControlSelect1">Total amount</label> : <b>{{@$course->price}}</b>
            </div>
            <div class="clearfix"></div>
            <form method="post" action="{{route('payment')}}">
            	@csrf
            	<input type="hidden" name="amount" value="{{@$course->price}}">
                <input type="hidden" name="id" value="{{@$course->id}}">
                @if(@$enroll)
                <label for="exampleFormControlSelect1">Already enroll this course</label>
                <a href="{{route('course')}}" class="genric-btn danger mt-10" style="width: 100%;">Back</a>
                @else
            	<button type="submit" class="genric-btn danger mt-10" style="width: 100%;">Pay</button>
                @endif
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