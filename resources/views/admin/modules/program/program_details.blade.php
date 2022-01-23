@extends('admin.layouts.app')
@section('title')
Program Details
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
                <h2 class="pageheader-title">Program</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('manage.program')}}" class="breadcrumb-link">Manage Program</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Program Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Program Details<a class="adbtn btn btn-primary" href="{{route('manage.program')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <div class="manager-dtls dtls-div">
                        <div class="row fld">
                            <div class="col-md-12">
                                <p><span class="titel-span">Name</span> <span class="deta-span"><strong>:</strong> {{@$program->name ? $program->name : '-' }}</span> </p>
                                <p><span class="titel-span">Status </span> <span class="deta-span"><strong>:</strong> 
                                    @if($program->status=='A')
                                        Active
                                    @elseif($program->status=='I')
                                        Inactive
                                    @endif    
                                    </span>
                                </p>

                                 <p><span class="titel-span">Description</span> <span class="deta-span"><strong>:</strong> {{@$program->description ? @$program->description : 'N.A'}}</span> </p>

                                
                                <p><span class="titel-span">Program Image</span></p>
                                <div class="uplodpic uploadImg">
                                        <a target="_blank" href="{{asset('storage/app/program/'.@$program->image)}}"><img style="padding: 10px;" src="{{asset('storage/app/program/'.@$program->image)}}" class="ad-ban"></a>
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