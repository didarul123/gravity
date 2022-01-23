@extends('admin.layouts.app')
@section('title')
Manage FAQ
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
                <h2 class="pageheader-title">Manage FAQ</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage FAQ </li>
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
                <h5 class="card-header">Manage FAQ <a class="adbtn btn btn-primary" title="Add new category" href="{{route('create.faq')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Faq</a></h5>
                <div class="card-body">
                    {{-- <form action="{{route('manage.faq')}}">
                        <div class="row">
                            <div class="form-group col-xl-3 col-lg-4 col-md-6 col-sm-5 col-12 pad-r">
                                <label for="inputText3" class="col-form-label">keyword </label>
                                <input name="keyword" type="text" class="form-control" placeholder="Type Here" value="{{@$key['keyword']}}">
                            </div>
                        </div>
                    </form> --}}
                    <div class="table-responsive user_tableBoxMain">
                        <table id="table_id" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Qustion</th>
                                    <th>Answer</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faq as $val)
                                <tr>
                                    <td>
                                        
                                        {{@$val->question}}
                                    </td>
                                    <td>
                                        
                                        {{@$val->answer}}
                                    </td>
                                    <td>{{@$val->created_at->format('m/d/Y')}}</td>
                                    <td>
                                        <a href="{{route('create.faq',[$val->id])}}"><i class=" fas fa-edit" title="Edit"></i></a>
                                        <a href="{{route('delete.faq',[$val->id])}}" onclick="return confirm('Do you want to delete this faq ?')"><i class=" fas fa-trash" title="Delete"></i></a>
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
