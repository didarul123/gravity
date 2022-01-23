@extends('admin.layouts.app')
@section('title')
Send Message
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
                <h2 class="pageheader-title">Send Message</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Send Message</li>
                            
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
                <h5 class="card-header">Send Message{{-- <a class="adbtn btn btn-primary" href="{{route('manage.notice.board')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a> --}}</h5>
                <div class="card-body">
                    <form action="{{route('send.message')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="ID" id="ID" value="{{@$notice->id}}"> --}}
                        <div class="row">
                             <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">

                                <p><strong>Student List</strong></p>
                                @foreach($student as $val)
                                    <input class="single-checkbox"type="checkbox" name="menu[]" value="{{$val->id}}" multiple required > {{ $val->name }}<br>
                                @endforeach
                                <label id="menu[]-error" class="error" for="menu[]"></label>

                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Title </label>
                                <input name="title" type="text" class="form-control required" placeholder="Type here">
                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Description </label>
                                <div text_area> 
                                    <textarea placeholder="Type here" name="description" class="form-control" cols="70"></textarea>
                                </div>
                            </div>
                        
                           
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">Send To All</button>
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
                description: {required: true},
            },
            submitHandler:function(form){
               form.submit();
            },
        });
        
    });
</script>
@endsection