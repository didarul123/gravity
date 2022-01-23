@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .mrr{
        position: absolute;
        left: 200px;
    }
    .mrr1{
        position: absolute;
        left: 220px;
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
            <!-- Single Slider -->
            <div class="single-slider slider-height4 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ed_detail_wrap light">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">Score Card</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                @include('include.sidebar')
                <div class="col-lg-8">
                    <div class="comment-form">
                        <h4><u>Score Card</u></h4>
                        @include('include.message')
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Total Question</label><strong class="mrr"> : </strong> <strong class="mrr1">{{@$totQ}}</strong>
                                    <br>
                                    <label class="col-form-label">Total Answered</label><strong class="mrr">:</strong> <strong class="mrr1">{{@$totA}}</strong>
                                    <br>
                                    <label class="col-form-label">Total Correct</label><strong class="mrr">:</strong> <strong class="mrr1">{{@$totR}}</strong>
                                    <br>
                                    <label class="col-form-label">Total Wrong</label><strong class="mrr">:</strong> <strong class="mrr1">{{@$totW}}</strong>
                                    <br>
                                    <label class="col-form-label">Total Score</label><strong class="mrr">:</strong> <strong class="mrr1">{{@$score}}</strong>
                                </div>
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
@endsection
@section('footer')
@include('include.footer')
@endsection