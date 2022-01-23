@extends('admin.layouts.app')
@section('title')
Dashboard
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
                    <h2 class="pageheader-title">Dashboard</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Dashboard </h5>
                    <div class="card-body">
                        <div class="row clearfix">
                            @if(Auth::guard('admin')->user()->type=='A')
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 category">
                                <div class="info-box bg-pink hover-expand-effect">
                                    <div class="icon">
                                        <img src="{{asset('public/admin/images/home1.png')}}">
                                    </div>
                                    <div class="content">
                                        <div class="text">Total Teacher</div>
                                        <div class="number count-to">{{@$teacher}}</div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 skill">
                                <div class="info-box bg-cyan hover-expand-effect">
                                    <div class="icon">
                                        <img src="{{asset('public/admin/images/home2.png')}}">
                                    </div>
                                    <div class="content">
                                        <div class="text">Total B.Manager</div>
                                        <div class="number count-to">5</div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 employer">
                                <div class="info-box bg-light-green hover-expand-effect">
                                    <div class="icon">
                                        <img src="{{asset('public/admin/images/home3.png')}}">
                                    </div>
                                    <div class="content">
                                        <div class="text">Total Student</div>
                                        <div class="number count-to">0</div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 project">
                                <div class="info-box bg-cyan hover-expand-effect" style="background: #e94d1e !important;">
                                    <div class="icon">
                                        <img src="{{asset('public/admin/images/home5.png')}}">
                                    </div>
                                    <div class="content">
                                        <div class="text">Branch Manager</div>
                                        <div class="number count-to">{{@$branch_manager}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 provider">
                                <div class="info-box bg-orange hover-expand-effect">
                                    <div class="icon">
                                        <img src="{{asset('public/admin/images/home4.png')}}">
                                    </div>
                                    <div class="content">
                                        <div class="text">Total Course</div>
                                        <div class="number count-to" >{{@$course}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 project">
                                <div class="info-box bg-cyan hover-expand-effect" style="background: #e94d1e !important;">
                                    <div class="icon">
                                        <img src="{{asset('public/admin/images/home5.png')}}">
                                    </div>
                                    <div class="content">
                                        <div class="text">Total Notice</div>
                                        <div class="number count-to">{{@$notice}}</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 payment">
                                <div class="info-box bg-pink hover-expand-effect" style="background: #5e5e5e !important;">
                                    <div class="icon">
                                        <img src="{{asset('public/admin/images/home6.png')}}">
                                    </div>
                                    <div class="content">
                                        <div class="text">Total Payments</div>
                                        <div class="number count-to">0</div>
                                    </div>
                                </div>
                            </div> --}}
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