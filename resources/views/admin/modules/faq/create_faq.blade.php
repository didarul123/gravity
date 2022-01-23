@extends('admin.layouts.app')
@section('title')
@if(@$faq) Edit @else Add @endif FAQ
@endsection
@section('links')
@include('admin.includes.links')
@endsection
@section('headers')
@include('admin.includes.header')
@endsection
@section('sidebar')
@include('admin.includes.sidebar')
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">@if(@$faq) Edit @else Add @endif FAQ</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.faq')}}" class="breadcrumb-link">Manage FAQ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$faq) Edit @else Add @endif FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @include('admin.includes.message')
            <div class="card">
                <h5 class="card-header">@if(@$faq) Edit @else Add @endif FAQ<a class="adbtn btn btn-primary" href="{{route('manage.faq')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.faq')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$faq->id}}">
                        <div class="row">
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Question </label>
                                <div text_area> 
                                    <textarea placeholder="Type here" name="question" class="form-control" rows="5" cols="40" >{!! @$faq->question !!}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Answer </label>
                                <div text_area> 
                                    <textarea placeholder="Type here" name="answer" rows="5" cols="40" class="form-control">{{@$faq->answer}}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$faq) Update @else Save @endif</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@include('admin.includes.footer')
@endsection
@section('script')
@include('admin.includes.scripts')
<script>
    $(document).ready(function(){

        $('#teacherform').validate({
            rules: {
                question: {required: true},
                answer: {required: true},
            },
            submitHandler:function(form){
               form.submit();
            },
        });
        
    });

    $(document).ready(function() {
      $('#summernote').summernote();
    });

</script>
@endsection