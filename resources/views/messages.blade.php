@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_mail"></i> Messages</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Message list</strong></h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($messages))
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->title }}</td>
                                <td>{{ $message->body }}</td>
                                <td>{{ $message->tel }}</td>
                                <td>{{ $message->email }}</td>
                                <td>
                                    <form action="{{ route('deleteMessage', compact('message')) }}" method="post">
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