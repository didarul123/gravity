@extends('admin.layouts.app')
@section('title')
Course Details
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
                <h2 class="pageheader-title">Course Details</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('manage.course')}}" class="breadcrumb-link">Manage Course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Course Details<a class="adbtn btn btn-primary" href="{{route('manage.course')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <div class="manager-dtls dtls-div">
                        <div class="row fld">
                            <div class="col-md-12">
                                <p><span class="titel-span">Course Name</span> <span class="deta-span"><strong>:</strong> {{@$course->name ? $course->name : '-' }}</span> </p>

                                <p><span class="titel-span">From Date</span> <span class="deta-span"><strong>:</strong> {{@$course->from_date ? @$course->from_date : 'N.A'}}</span> </p>

                                <p><span class="titel-span">To Date</span> <span class="deta-span"><strong>:</strong> {{@$course->to_date ? @$course->to_date : 'N.A'}}</span> </p>

                                <p><span class="titel-span">Price</span> <span class="deta-span"><strong>:</strong> {{@$course->price ? @$course->price : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Description</span> <span class="deta-span"><strong>:</strong> {{@$course->description ? @$course->description : 'N.A'}}</span> </p>
                                
                                {{-- <p><span class="titel-span">Status </span> <span class="deta-span"><strong>:</strong> 
                                    @if($teacher->status=='A')
                                        Active
                                    @elseif($teacher->status=='I')
                                        Inactive
                                    @endif    
                                    </span>
                                </p> --}}

                                
                                <p><span class="titel-span">Course Image</span></p>
                                <div class="uplodpic uploadImg">
                                        <a target="_blank" href="{{asset('storage/app/course/'.@$course->image)}}"><img style="padding: 10px;" src="{{asset('storage/app/course/'.@$course->image)}}" class="ad-ban"></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
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
@endsection