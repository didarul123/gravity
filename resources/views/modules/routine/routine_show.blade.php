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
    <section class="slider-area " style="height: 180px;">
        <div class="slider-active">
            <div class="single-slider slider-height4 d-flex align-items-center" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ed_detail_wrap light">
                                <div class="ed_header_caption">
                                    <h2 class="ed_title">Routine</h2>
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
                <div class="col-lg-12">
                    @include('include.message')
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Routine Title</th>
                                <th scope="col">Class</th>
                                {{-- <th scope="col">Routine date</th> --}}
                                <th scope="col">PDF</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(@$routine as $val)
                            <tr>
                                <td>{{@$val->title}}</td>
                                <td>{{@$val->getRoutine->name}}</td>
                                {{-- <td>{{date('d-m-Y', strtotime(@$val->created_at))}} --}}
                                </td>
                                <td class="sorting_1">
                                        <span class="userposted_imgBox">
                                            <a download href="{{asset('storage/app/routine/'.@$val->pdf)}}">Download</a>
                                        </span>
                                    </td>
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