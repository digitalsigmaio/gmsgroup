@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="social_share_circle"></i> Social Networks</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Social Networks list</strong></h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($socials))
                        @foreach($socials as $social)
                            <tr>
                                <td><img src="{{ $social->logo }}" style="height:40px; margin-top:-2px;"></td>
                                <td>{{ $social->name }}</td>
                                <td><a href="{{ $social->url }}" target="_blank">{{ $social->url }}</a></td>
                                <td><a href="{{ route('editSocial', compact('social')) }}"><span class="btn btn-info">Edit</span></a></td>
                                <td>
                                    <form action="{{ route('deleteSocial', compact('social')) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger deleteItem">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="5" style="text-align: center"><h3>Nothing to show</h3></td></tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection