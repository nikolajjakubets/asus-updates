@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Devices
                    <a class="btn btn-xs btn-success pull-right" href="{{ url('devices/add') }}">Add device</a>
                </div>

                <div class="panel-body table-responsive">
                    @if(count($devices) == 0)
                        <strong>No devices added, yet!</strong>
                    @else
                        @set('num', 0)
                        <table class="table table-nomargin">
                            <thead>
                                <th>#</th>
                                <th>Device name</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($devices as $device)
                                    @set('num', $num += 1)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>{{ $device->name }}</td>
                                        <td><a href="{{ $device->url }}">{{ \str_limit($device->url, $limit = 60, $end = '...') }}</a></td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="{{ url('devices/edit/' . $device->id ) }}">Edit</a>
                                            <a class="btn btn-xs btn-danger" href="{{ url('devices/delete/' . $device->id ) }}">Delete</a>
                                            <a class="btn btn-xs btn-default" href="{{ url('devices/move/' . $device->id . '/up') }}"><i class="fa fa-btn fa-arrow-up"></i></a>
                                            <a class="btn btn-xs btn-default" href="{{ url('devices/move/' . $device->id . '/down') }}"><i class="fa fa-btn fa-arrow-down"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Categories
                    <a class="btn btn-xs btn-success pull-right" href="{{ url('categories/add') }}">Add category</a>
                </div>

                <div class="panel-body table-responsive">
                    @if(count($categories) == 0)
                        <strong>No categories added, yet!</strong>
                    @else
                        @set('num', 0)
                        <table class="table table-nomargin">
                            <thead>
                                <th>#</th>
                                <th>Category name</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                @set('num', $num += 1)
                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ url('categories/edit/' . $category->id ) }}">Edit</a>
                                        <a class="btn btn-xs btn-danger" href="{{ url('categories/delete/' . $category->id ) }}">Delete</a>
                                        <a class="btn btn-xs btn-default" href="{{ url('categories/move/' . $category->id . '/up') }}"><i class="fa fa-btn fa-arrow-up"></i></a>
                                        <a class="btn btn-xs btn-default" href="{{ url('categories/move/' . $category->id . '/down') }}"><i class="fa fa-btn fa-arrow-down"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
