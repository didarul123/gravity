@extends('admin.layouts.app')
@section('title')
@if(@$fact) Edit @else Add @endif Fact
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
                <h2 class="pageheader-title">@if(@$fact) Edit @else Add @endif Fact</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.fact')}}" class="breadcrumb-link">Manage Fact</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$fact) Edit @else Add @endif Fact</li>
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
                <h5 class="card-header">@if(@$fact) Edit @else Add @endif Fact<a class="adbtn btn btn-primary" href="{{route('manage.fact')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.fact', [$fact->id])}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$fact->id}}">
                        <div class="row">
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Title </label>
                                <div text_area> 
                                    <input type="text" name="title" class="form-control" value="{{$fact->title}}">
                                </div>
                            </div>
                            
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Description </label>
                                <div text_area> 
                                    <input type="text" name="description" class="form-control" value="{{$fact->description}}">
                                </div>
                            </div>
                            
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Teachers </label>
                                <div text_area> 
                                    <input type="number" name="teachers" class="form-control" value="{{$fact->teachers}}">
                                </div>
                            </div>
                            
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Branch Managers </label>
                                <div text_area> 
                                    <input type="number" name="branch_managers" class="form-control" value="{{$fact->branch_managers}}">
                                </div>
                            </div>
                            
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Students </label>
                                <div text_area> 
                                    <input type="number" name="students" class="form-control" value="{{$fact->students}}">
                                </div>
                            </div>
                            
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Courses </label>
                                <div text_area> 
                                    <input type="number" name="courses" class="form-control" value="{{$fact->courses}}">
                                </div>
                            </div>



                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$fact) Update @else Save @endif</button>
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