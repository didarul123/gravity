@extends('admin.layouts.app')
@section('title')
@if(@$pub) Edit @else Add @endif Publication
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
                <h2 class="pageheader-title">@if(@$pub) Edit @else Add @endif Publication</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.publication')}}" class="breadcrumb-link">Manage Publication</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$pub) Edit @else Add @endif Publication</li>
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
                <h5 class="card-header">@if(@$pub) Edit @else Add @endif Publication<a class="adbtn btn btn-primary" href="{{route('manage.publication')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.publication')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$pub->id}}">
                        <div class="row">
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Title </label>
                                <input name="title" type="text" class="form-contro required" placeholder="Type here" value="{{@$pub->ltitle}}">
                                <label class="col-form-label">Description </label>
                                <div text_area> 
                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                    <textarea placeholder="Type here" name="description" class="form-control" cols="70">{{@$pub->description}}</textarea>
                                </div>
                            </div>
                        
                           
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$pub) Update @else Save @endif</button>
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
                title: {required: true},
            },
            submitHandler:function(form){
               form.submit();
            },
        });
        
    });
</script>
@endsection