@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_datareport"></i> Services</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Services list</strong></h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Arabic Name</th>
                        <th>English Name</th>
                        <th>Arabic Description</th>
                        <th>English Description</th>
                        <th>Gallery</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($services))
                        @foreach($services as $service)
                            <tr>
                                <td><img src="{{ $service->logo }}" style="height:40px; margin-top:-2px;"></td>
                                <td><div dir="rtl">{{ $service->ar_name }}</div></td>
                                <td>{{ $service->en_name }}</td>
                                <td><div dir="rtl">{{ $service->ar_description }}</div></td>
                                <td>{{ $service->en_description }}</td>
                                <td><a href="{{ route('serviceImages', compact('service')) }}"><span class="btn btn-success">View</span></a></td>
                                <td><a href="{{ route('editService', compact('service')) }}"><span class="btn btn-info">Edit</span></a></td>
                                <td>
                                    <form action="{{ route('deleteService', compact('service')) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger deleteItem">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="7" style="text-align: center"><h3>Nothing to show</h3></td></tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection