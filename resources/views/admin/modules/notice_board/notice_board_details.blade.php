@extends('admin.layouts.app')
@section('title')
Notice Board Details
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
                <h2 class="pageheader-title">Notice Board</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('manage.notice.board')}}" class="breadcrumb-link">Manage Notice Board</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Notice Board Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Notice Board Details<a class="adbtn btn btn-primary" href="{{route('manage.notice.board')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <div class="manager-dtls dtls-div">
                        <div class="row fld">
                            <div class="col-md-12">
                                <p><span class="titel-span">Title</span> <span class="deta-span"><strong>:</strong> {{@$notice->title ? $notice->title : '-' }}</span> </p>
                                <p><span class="titel-span">Status </span> <span class="deta-span"><strong>:</strong> 
                                    @if($notice->status=='A')
                                        Active
                                    @elseif($notice->status=='I')
                                        Inactive
                                    @endif    
                                    </span>
                                </p>

                                 <p><span class="titel-span">Description</span> <span class="deta-span"><strong>:</strong> {{@$notice->description ? @$notice->description : 'N.A'}}</span> </p>

                                
                                {{-- <p><span class="titel-span">Branch Manager Image</span></p>
                                <div class="uplodpic uploadImg">
                                        <a target="_blank" href="{{asset('storage/app/branch_manager_image/'.@$manager->image)}}"><img style="padding: 10px;" src="{{asset('storage/app/branch_manager_image/'.@$manager->image)}}" class="ad-ban"></a>
                                </div> --}}
                                
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