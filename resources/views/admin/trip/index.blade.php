@extends('admin.layouts.master')
@section('title')
    Admin
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Home Page
            <small></small>
        </h1>

    </section>
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @can('trips.create',\Illuminate\Support\Facades\Auth::user())
                <a href="{{url('/admin/trip/create')}}" class="btn btn-primary pull-right margin-bottom">
                    <i class="fa fa-plus"></i>
                    Add new
                </a>
                @endcan
            </div>
        </div>

        <!-- search EXAMPLE -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body">


                            <div class="form-group">
                                <label class="col-sm-1 control-label">Name</label>

                                <div class="col-sm-5">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <label class="col-sm-1 control-label">Email</label>

                                <div class="col-sm-5">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info center-block">
                                <i class="fa fa-search"></i>
                                search
                            </button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Show All </h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            @foreach($trips as $trip)
                                    <tr>
                                        <td>{{$trip->id}}</td>
                                        <td>{{$trip->title}}</td>
                                        <td><img src="{{Request::root()}}/public/uploads/trip/cover/{{$trip->photo}}" width="40px" height="40px" alt=""></td>
                                        <td>{{$trip->price}}</td>
                                        <td>
                                            @can('trips.update',\Illuminate\Support\Facades\Auth::user())
                                            <a href="{{url('/admin/trip/'.$trip->id.'/edit')}}" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('trips.delete',\Illuminate\Support\Facades\Auth::user())
                                            <a href="{{url('/admin/trip/'.$trip->id.'/delete')}}" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>
                                            @endcan
                                            <a href="{{url('/admin/trip/'.$trip->id)}}" title="View" class="btn btn-success btn-circle"><i class="fa fa-eye"></i></a>
                                                <form method="post" action="{{url('/admin/trip/'.$trip->id.'/mail')}}">
                                                    {{csrf_field()}}
                                                  <a> <button title="send to subscribers" type="submit" class="btn btn-warning btn-circle"><i class="fa fa-group"></i></button> </a>
                                                </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>


@endsection

@section('css')

@endsection

@section('js')

@endsection
