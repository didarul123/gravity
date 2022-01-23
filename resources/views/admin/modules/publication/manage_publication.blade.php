@extends('admin.layouts.app')
@section('title')
Manage Publication
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
                <h2 class="pageheader-title">Manage Publication</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Publication</li>
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
                <h5 class="card-header">Manage Publication <a class="adbtn btn btn-primary" title="Add new category" href="{{route('create.publication')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Publication</a></h5>
                <div class="card-body">
                    <form action="{{route('manage.publication')}}">
                        <div class="row">
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label for="inputText3" class="col-form-label">keyword </label>
                                <input name="keyword" type="text" class="form-control" placeholder="Type Here" value="{{@$key['keyword']}}">
                            </div>

                            
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12 pad-l">
                                <label for="inputPassword" class="col-form-label hide_label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary search_btnUser">Search</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive user_tableBoxMain">
                        <table id="table_id" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>Created Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pub as $val)
                                <tr>
                                    <td>
                                        
                                        {{@$val->title}}
                                    </td>
                                    <td>{{@$val->created_at->format('m/d/Y')}}</td>
                                    <td>{{@$val->description}}</td>
                                    {{-- <td class="sorting_1">
                                        <span class="userposted_imgBox">
                                            @if(@$val->image)
                                                <img src="{{asset('storage/app/branch_manager_image/'.@$val->image)}}">
                                            @else
                                                <img src="{{asset('public/noimg.png')}}">
                                            @endif
                                        </span>
                                    </td> --}}
                                    
                                    <td>
                                        <a href="{{route('create.publication',[$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>
                                        <a href="{{route('delete.publication',[$val->id])}}" onclick="return confirm('Do you want to delete this publication ?')"><i class=" fas fa-trash" title="Delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        {{-- <div class="paginate">{{$category->links()}}</div> --}}
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
