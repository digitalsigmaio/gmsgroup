@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_flowchart"></i> Subsidiaries</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Subsidiaries list</strong></h2>
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($children))
                        @foreach($children as $child)
                        <tr>
                            <td><img src="{{ $child->logo }}" style="height:40px; margin-top:-2px;"></td>
                            <td>{{ $child->ar_name }}</td>
                            <td>{{ $child->en_name }}</td>
                            <td>{{ $child->ar_description }}</td>
                            <td>{{ $child->en_description }}</td>
                            <td><a href="{{ route('editSubsidiary', compact('child')) }}"><span class="btn btn-info">Edit</span></a></td>
                            <td>
                                <form action="{{ route('deleteSubsidiary', compact('child')) }}" method="post">
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