@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="social_share_circle"></i> Social Networks</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">New Social Network</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('storeSocial') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Name -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="name">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="url">Link</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="url" id="url">
                            </div>
                        </div>

                        <!-- Logo -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="logo">Logo</label>
                            <div class="col-lg-10">
                                <input type="file" name="logo" id="logo" class="form-control">
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