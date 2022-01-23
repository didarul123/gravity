@extends('admin.layouts.app')
@section('title')
Manage Notice Board
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="board_title text-center">
                        <h5 class="card-header" style="border-bottom: 1px solid #5a038d;">Manage Notice Board Title</h5>
                    </div>
                    <div class="board_form">
                        <form action="{{route('update-notice-board-title', [$notice_board_title->id])}}" method="post">
                            @csrf
                            <div class="title mt-2">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$notice_board_title->title}}">
                            </div>
                            <div class="description mt-2">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description" value="{{$notice_board_title->description}}">
                            </div>
                            <div class="board_btn text-center mt-3 mb-3">
                                <button type="submit" class="btn btn-primary " style="padding: 6px 20px;margin-left: -5px;">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>



<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Manage Notice Board</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Notice Board </li>
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
                <h5 class="card-header">Manage Notice Board 
                    <a class="adbtn btn btn-primary" title="Add new category" href="{{route('create.notice.board')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Notice Board</a>

               

                    <button type="button" class="adbtn btn btn-primary mr-3" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus" aria-hidden="true"></i> Manage Notice Board Title</button>

                </h5>


     


                <div class="card-body">
                    <form action="{{route('manage.notice.board')}}">
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
                                    <th>title</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notice as $val)
                                <tr>
                                    <td>
                                        
                                        {{@$val->title}}
                                    </td>
                                    <td>{{@$val->created_at->format('m/d/Y')}}</td>
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
                                        @if(@$val->status=='A')
                                            Active
                                        @elseif(@$val->status=='I')
                                            Inactive
                                        @endif
                                    </td>
                                    <td>
                   
                                        {{-- @if($val->status=='A')
                                        <a  href="" onclick="return confirm('Do you want to change status for this category ?')"><i class=" fas fa-times" title="Inactive"></i></a>
                                        @elseif($val->status=='I')
                                        <a href="" onclick="return confirm('Do you want to change status for this category ?')"><i class="fas fa-check" title="Active"></i></a>
                                        @endif --}}
                                        <a href="{{route('view.notice.board',[$val->id])}}"><i class="fas fa-eye" title="View"></i></a>
                                        <a href="{{route('create.notice.board',[$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>
                                        <a href="{{route('delete.notice.board',[$val->id])}}" onclick="return confirm('Do you want to delete this Notice Board ?')"><i class=" fas fa-trash" title="Delete"></i></a>
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
