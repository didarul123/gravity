@extends('admin.layouts.app')
@section('title')
Manage Class
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
                <h2 class="pageheader-title">Manage Class</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Class </li>
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
                <h5 class="card-header">Manage Class <a class="adbtn btn btn-primary" title="Add new category" href="{{route('create.class')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Class</a></h5>
                <div class="card-body">
                    <form action="{{route('manage.class')}}">
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
                            {{-- <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-4 col-12 pad-r pad-l">
                                <label for="inputText3" class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select</option>
                                    <option value="A" {{@$key['status']=='A' ? 'selected' : ''}}>Active</option>
                                    <option value="I" {{@$key['status']=='I' ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div> --}}
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
                                    <th>Class Name</th>
                                    <th>Course Name</th>
                                    <th>Subject Name</th>
                                    <th>Class Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($class as $val)
                                <tr>
                                    <td>{{@$val->title}}</td>
                                    <td>{{@$val->course->name ?? ''}}</td>
                                    <td>{{@$val->subject->name ?? ''}}</td>
                                    <td>{{@$val->class_date}} </td>
                                    <td>
                                       
                                        @if(@$val->status == 1)
                                            Ative
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    {{-- <td class="sorting_1">
                                        <span class="userposted_imgBox">
                                            @if(@$val->image)
                                                <img src="{{asset('storage/app/class/'.@$val->image)}}">
                                            @else
                                                <img src="{{asset('public/noimg.png')}}">
                                            @endif
                                        </span>
                                    </td> --}}
                                    
                                    <td>
                   
                                        
                                        
                                        <a href="{{route('edit.class',[$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>
                                        <a href="{{route('delete.class',[$val->id])}}" onclick="return confirm('Do you want to delete this class ?')"><i class=" fas fa-trash" title="Delete"></i></a>
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
