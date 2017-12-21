@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_contacts"></i> Users</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Users list</strong></h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($users))
                        @foreach($users as $user)
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 2 && $user->role > 1)
                                    <tr>
                                        <td><img src="{{ $user->image }}" style="height:40px; margin-top:-2px;"></td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->fullName() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role() }}</td>

                                        <td>@if(\Illuminate\Support\Facades\Auth::user() == $user)
                                            <a href="{{ route('editUser', compact('user')) }}"><span class="btn btn-info">Edit</span></a>
                                            @endif</td>

                                        <td>
											@if(\Illuminate\Support\Facades\Auth::user()->role < $user->role)
                                            <form action="{{ route('deleteUser', compact('user')) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger deleteItem">Delete</button>
                                            </form>
											@endif
                                        </td>
                                    </tr>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->role <= $user->role)
                                <tr>
                                    <td><img src="{{ $user->image }}" style="height:40px; margin-top:-2px;"></td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->fullName() }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role() }}</td>
                                    <td>
									@if(\Illuminate\Support\Facades\Auth::user()->role < $user->role ||
										\Illuminate\Support\Facades\Auth::user() == $user)
										<a href="{{ route('editUser', compact('user')) }}"><span class="btn btn-info">Edit</span></a></td>
									@endif
                                    <td>
									@if(\Illuminate\Support\Facades\Auth::user()->role < $user->role ||
										\Illuminate\Support\Facades\Auth::user() == $user)
                                        <form action="{{ route('deleteUser', compact('user')) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger deleteItem">Delete</button>
                                        </form>
									@endif
                                    </td>
                                </tr>
                            @endif
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