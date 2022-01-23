@extends('admin.layouts.app')
@section('title')
@if(@$manager) Edit @else Add @endif Branch Manager
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
                <h2 class="pageheader-title">@if(@$manager) Edit @else Add @endif Branch Manager</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.branch.manager')}}" class="breadcrumb-link">Manage Branch Manager</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$manager) Edit @else Add @endif Branch Manager</li>
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
                <h5 class="card-header">@if(@$manager) Edit @else Add @endif Branch Manager<a class="adbtn btn btn-primary" href="{{route('manage.branch.manager')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.branch.manager')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{@$manager->id}}">
                        <div class="row">
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Name </label>
                                <input name="name" type="text" class="form-control required" placeholder="Type here" value="{{@$manager->name}}">
                            </div>
                            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Email </label>
                                <input name="email" type="text" class="form-control required" placeholder="Type here" value="{{@$manager->email}}">
                            </div>
                            {{-- <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Mobile No </label>
                                <input name="mobile" type="text" class="form-control required" placeholder="Type here" value="{{@$teacher->mobile}}">
                            </div> --}}
                            <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-l imgdiv">
                                <span class="col-form-label">Image</span>
                                <input type="file" class="custom-file-input" id="customFile" name="image" style="display:none">
                                <label class="custom_file_label extrlft" for="customFile">Upload Image</label>
                                <div class="uplodpic uploadImg">
                                    @if(@$manager->image)
                                        <li><img src="{{asset('storage/app/branch_manager_image/'.@$manager->image)}}"></li>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Description </label>
                                <div text_area> 
                                    <textarea placeholder="Type here" name="description" rows="10" class="form-control" cols="70">{{@$manager->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$manager) Update @else Save @endif</button>
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

        
        $("#customFile").change(function () {
            $('.uploadImg').html('');
            let files = this.files;
            if (files.length > 0) {
                let exts = ['image/jpeg', 'image/png', 'image/gif'];
                let valid = true;
                $.each(files, function(i, f) {
                    if (exts.indexOf(f.type) <= -1) {
                        valid = false;
                        return false;
                    }
                });
                if (! valid) {
                    alert('Please choose valid image files (jpeg, png, gif) only.');
                    $("#customFile").val('');
                    return false;
                }
                $.each(files, function(i, f) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('.uploadImg').append('<li><img src="' + e.target.result + '"></li>');
                    };
                    reader.readAsDataURL(f);
                });
            }
            
        });
    });
</script>
@endsection