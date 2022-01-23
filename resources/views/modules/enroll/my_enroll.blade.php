@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .table .thead-dark th {
    color: #fff;
    background-color: #be01fc;
    border-color: blueviolet;
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
                                    <h2 class="ed_title">My Enrollment</h2>
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
                    @include('include.message')
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Course Name</th>
                                <th scope="col">enrollment date</th>
                                <th scope="col">Price</th>
                                <th scope="col">From Date</th>
                                <th scope="col">To Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(@$enroll as $val)
                            <tr>
                                <td>{{@$val->getMyCourse->name}}</td>
                                <td>{{date('d-m-Y', strtotime(@$val->created_at))}}
                                </td>
                                <td>{{@$val->getMyCourse->price}}</td>
                                <td>{{date('d-m-Y', strtotime(@$val->getMyCourse->from_date))}}
                                <td>{{date('d-m-Y', strtotime(@$val->getMyCourse->to_date))}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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