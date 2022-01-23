@extends('admin.layouts.app')
@section('title')
Manage Branch Manager
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
                <h2 class="pageheader-title">Manage Branch Manager</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Branch Manager </li>
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
                <h5 class="card-header">Manage Branch Manager <a class="adbtn btn btn-primary" title="Add new category" href="{{route('create.branch.manager')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Branch Manager</a></h5>
                <div class="card-body">
                    <form action="{{route('manage.branch.manager')}}">
                        <div class="row">
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label for="inputText3" class="col-form-label">keyword </label>
                                <input name="keyword" type="text" class="form-control" placeholder="Type Here" value="{{@$key['keyword']}}">
                            </div>
{{--                             <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Parent Category</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">Select</option>
                                    @foreach($parent as $val)
                                        <option value="{{$val->id}}" {{@$key['parent_id']==@$val->id ? 'selected' : ''}}>{{@$val->name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select</option>
                                    <option value="A" {{@$key['status']=='A' ? 'selected' : ''}}>Active</option>
                                    <option value="I" {{@$key['status']=='I' ? 'selected' : ''}}>Inactive</option>
                                </select>
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
                                    <th>Name</th>
                                    {{-- <th>Parent Category</th> --}}
                                    <th>Email</th>
                                    <th>Image</th>
                                    {{-- <th>Mobile No</th> --}}
                                    <th>Status</th>
                                    <th>Verified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($manager as $val)
                                <tr>
                                    <td>
                                        {{-- {{@$val->gerParentName->name ? @$val->gerParentName->name : '-'}} --}}
                                        {{@$val->name}}
                                    </td>
                                    <td>{{@$val->email}}</td>
                                    <td class="sorting_1">
                                        <span class="userposted_imgBox">
                                            @if(@$val->image)
                                                <img src="{{asset('storage/app/branch_manager_image/'.@$val->image)}}">
                                            @else
                                                <img src="{{asset('public/noimg.png')}}">
                                            @endif
                                        </span>
                                    </td>
                                    {{-- <td>
                                        {{@$val->mobile}}
                                    </td> --}}
                                    <td>
                                        @if(@$val->status=='A')
                                            Active
                                        @elseif(@$val->status=='I')
                                            Inactive
                                        @endif
                                    </td>
                                    <td>
                                        @if($val->is_verified=='Y')
                                            Yes 
                                        @elseif($val->is_verified=='N')
                                            No 
                                        @endif
                                    </td>
                                    <td>
                   
                                        {{-- @if($val->status=='A')
                                        <a  href="" onclick="return confirm('Do you want to change status for this category ?')"><i class=" fas fa-times" title="Inactive"></i></a>
                                        @elseif($val->status=='I')
                                        <a href="" onclick="return confirm('Do you want to change status for this category ?')"><i class="fas fa-check" title="Active"></i></a>
                                        @endif --}}
                                        <a href="{{route('view.branch.manager',[$val->id])}}"><i class="fas fa-eye" title="View"></i></a>
                                        <a href="{{route('create.branch.manager',[$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>
                                        <a href="{{route('delete.branch.manager',[$val->id])}}" onclick="return confirm('Do you want to delete branch manager ?')"><i class=" fas fa-trash" title="Delete"></i></a>

                                        @if(@$val->is_verified == 'N' && @$val->user_status != 'U' && @$val->user_status != 'D')
                                            <a href="{{route('branch.manager.verify',@$val->id)}}"title="Branch Manager Verified" onclick="return confirm('Are sure you want to verified this Branch Manager?')"> <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                        @endif

                                        @if(@$val->is_verified == 'Y' && @$val->user_status != 'U' && @$val->user_status != 'D')
                                            <a href="{{route('branch.manager.verify',@$val->id)}}"title="Branch Manager Unverified" onclick="return confirm('Are sure you want to unverified this Branch Manager?')"> <i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                                        @endif

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
