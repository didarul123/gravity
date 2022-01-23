@extends('layouts.app')
@section('links')
@include('include.links')
<style type="text/css">
    .table .thead-dark th {
    color: #fff;
    background-color: #be01fc;
    border-color: blueviolet;
    }
    .cnttus h2{
        color: #000;
        margin-top: 15px;
        margin-bottom: 20px;
        font-size: 25px;
    }
    .cnttus h3{
        color: #000;
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 20px;
    }
    .cnttus p{
        color: #000;
        margin-top: 10px;
        font-size: 18px;
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
                                    <h2 class="ed_title">Contact us</h2>
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
                    <div class="cnttus">
                        <h2>Address :</h2>
                        <h3>Framgate Branch</h3>
                        <p style="margin-bottom: 50px;">Gravity Education , Opposite Ananda Cinema Hall, Farmgate, Dhaka 1215 Phone: 
                            <a href="tel:01300226301" rel="noopener">01300226301</a></p>

                        <h3>Mohammadpur Branch</h3>
                        <p style="margin-bottom: 50px;">Gravity Education,6/9 Sahid Salimullah Road, Mohammadpur Dhaka Phone: <a href="tel:01610475136" rel="noopener">01610475136</a></p>

                        <h3>Khulna Branch Branch</h3>
                        <p style="margin-bottom: -10px;">Gravity Education, Opposite of Chinese Restaurant, 1st Floor , 31 Ahsan Ahmed Road, PTI More, Khulna <a href="tel:01608483766" rel="noopener">01608483766</a></p>
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