@extends('admin.layouts.app')
@section('title')
Manage Routine
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
                <h2 class="pageheader-title">Manage Routine</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Routine </li>
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
                <h5 class="card-header">Manage Routine <a class="adbtn btn btn-primary" title="Add new category" href="{{route('create.routine')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Routine</a></h5>
                <div class="card-body">
                    <form action="{{route('manage.routine')}}">
                        @csrf
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
                                    <th>Title</th>
                                    <th>Class</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($routine as $val)
                                <tr>
                                    <td>
                                        
                                        {{@$val->title}}
                                    </td>
                                    
                                    <td class="sorting_1">
                                         {{@$val->getRoutine->name ? $val->getRoutine->name : "N.A"}}
                                    </td>
                                    <td>{{@$val->created_at->format('d F Y')}}</td>
                                    <td>                   
                                        <a href="{{route('delete.routine',$val->id)}}" onclick="return confirm('Do you want to delete this routine ?')"><i class=" fas fa-trash" title="Delete"></i></a>
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
