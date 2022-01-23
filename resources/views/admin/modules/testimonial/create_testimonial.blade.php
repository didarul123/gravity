@extends('admin.layouts.app')
@section('title')
@if(@$slider) Edit @else Add @endif Testimonial
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
                <h2 class="pageheader-title">@if(@$testimonial) Edit @else Add @endif Testimonial</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('manage.testimonial')}}" class="breadcrumb-link">Manage Testimonial</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(@$testimonial) Edit @else Add @endif Testimonial</li>
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
                <h5 class="card-header">@if(@$testimonial) Edit @else Add @endif Slider<a class="adbtn btn btn-primary" href="{{route('manage.testimonial')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></h5>
                <div class="card-body">
                    <form action="{{route('store.testimonial')}}" method="post" id="teacherform" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ID" id="ID" value="{{@$testimonial->id}}">
                        <div class="row">
                            

                            <div class="form-group col-xl-9 col-lg-9 col-md-6 col-sm-5 col-12 pad-r">
                                <label class="col-form-label">Name </label>
                                <input name="full_name" type="text" class="form-control required" placeholder="Type here" value="{{@$testimonial->full_name}}">
                            </div>
                           
                            <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-5 col-12 pad-l imgdiv">
                                <span class="col-form-label">Image</span>
                                <input type="file" class="custom-file-input" id="customFile" name="image" style="display:none">
                                <label class="custom_file_label extrlft" for="customFile">Upload Image</label>

                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p>Size: 78*78px</p>

                                <div class="uplodpic uploadImg">
                                    @if(@$testimonial->image)
                                        <li><img src="{{asset('storage/app/testimonial/'.@$testimonial->image)}}"></li>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Description </label>
                                <div text_area> 
                                    <textarea placeholder="Type here" name="description" class="form-control" rows="10" cols="70">{{@$testimonial->description}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label class="col-form-label">Status </label>
                                <div text_area> 
                                    <select name="status" id="" class="form-control" required="">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xl-12 col-lg-12 col-md-6 col-sm-3 col-12">
                                <label for="inputPassword" class="col-form-label hide_label" style="display:none">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">@if(@$testimonial) Update @else Save @endif</button>
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
                name: {required: true},
                from_date: {required: true},
                to_date: {required: true},
                price: {required: true},
                description: {required: true},
                image:       {required:true}
            },
            submitHandler:function(form){
               form.submit();
            },
        });
        
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