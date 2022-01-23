@extends('admin.layouts.app')
@section('title')
Student Details
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
                <h2 class="pageheader-title">Student</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('manage.branch.manager')}}" class="breadcrumb-link">Manage Student</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Student Details<a class="adbtn btn btn-primary" href="{{route('manage.student')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <div class="manager-dtls dtls-div">
                        <div class="row fld">
                            <div class="col-md-12">
                                <p><span class="titel-span">Name</span> <span class="deta-span"><strong>:</strong> {{@$student->name ? $student->name : '-' }}</span> </p>

                                <p><span class="titel-span">Email</span> <span class="deta-span"><strong>:</strong> {{@$student->email ? @$student->email : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Class</span> <span class="deta-span"><strong>:</strong> {{@$student->class ? @$student->class : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Mobile NO</span> <span class="deta-span"><strong>:</strong> {{@$student->mobile ? @$student->mobile : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Date Of Birth</span> <span class="deta-span"><strong>:</strong> {{@$student->dob ? @$student->dob : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Father's Name</span> <span class="deta-span"><strong>:</strong> {{@$student->father_name ? @$student->father_name : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Address</span> <span class="deta-span"><strong>:</strong> {{@$student->address ? @$student->address : 'N.A'}}</span> </p>
                                <p><span class="titel-span">School or College</span> <span class="deta-span"><strong>:</strong> {{@$student->college_school ? @$student->college_school : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Past Academic Result</span> <span class="deta-span"><strong>:</strong> {{@$student->past_academic_result ? @$student->past_academic_result : 'N.A'}}</span> </p>
                                <p><span class="titel-span">Branch</span> <span class="deta-span"><strong>:</strong> {{@$student->branch ? @$student->branch : 'N.A'}}</span> </p>
                                <p><span class="titel-span">How to read </span> <span class="deta-span"><strong>:</strong> 
                                    @if($student->how_to_read=='ON')
                                        Online
                                    @elseif($student->how_to_read=='OF')
                                        Offnile
                                    @endif    
                                    </span>
                                </p>
                                <p><span class="titel-span">Status </span> <span class="deta-span"><strong>:</strong> 
                                    @if($student->status=='A')
                                        Active
                                    @elseif($student->status=='I')
                                        Inactive
                                    @endif    
                                    </span>
                                </p>

                                
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