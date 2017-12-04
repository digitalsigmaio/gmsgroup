@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_contacts"></i> Users</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">{{ $user->fullName() }}</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('updateUser', compact('user')) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                    <!-- Name -->
                        @if(\Illuminate\Support\Facades\Auth::user() == $user || \Illuminate\Support\Facades\Auth::user()->role < 2)
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="username">Username</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="first_name">First Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="last_name">Last Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="email">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user() == $user)
                            <div class="form-group">
                            <label class="control-label col-lg-2" for="image">Image</label>
                            <div class="col-lg-10">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="email"></label>
                            <a id="changePassword" class="btn btn-info">Change Password</a>
                        </div>
                        <div id="newPassword" class="form-group">
                            <label class="control-label col-lg-2" for="password">New Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role < 2)
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="role">Role</label>
                            <div class="col-lg-10">
                                <select name="role" id="role" class="form-control">
                                    @php
                                        $roles = \Illuminate\Support\Facades\Auth::user()->roles;
                                        for($i = 0; $i < count($roles); $i++){
                                            if ($i >= \Illuminate\Support\Facades\Auth::user()->role){
                                                $output =  "<option value='" . $i . "' ";
                                                if($user->role == $i){
                                                    $output .= "selected";
                                                }
                                                $output .= ">" . $roles[$i] . "</option>";
                                                echo $output;
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        @endif
                        <!-- Buttons -->
                        <div class="form-group">
                            <!-- Buttons -->
                            <div class="col-lg-offset-2 col-lg-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="widget-foot">
                <!-- Footer goes here -->
                @if(count($errors) > 0)
                    <div class="row">
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection