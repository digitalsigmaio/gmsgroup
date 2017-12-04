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
            <div class="pull-left">New User</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Name -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="username">Username</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="email">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="email" id="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="password">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="role">Role</label>
                            <div class="col-lg-10">
                                <select name="role" id="role" class="form-control">
                                    @php
                                        $roles = \Illuminate\Support\Facades\Auth::user()->roles;
                                        for($i = 0; $i < count($roles); $i++){
                                            if ($i > \Illuminate\Support\Facades\Auth::user()->role){
                                                echo "<option value='" . $i . "'>" . $roles[$i] . "</option>";
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="form-group">
                            <!-- Buttons -->
                            <div class="col-lg-offset-2 col-lg-9">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="widget-foot">
                <!-- Footer goes here -->

            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="row">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


@endsection