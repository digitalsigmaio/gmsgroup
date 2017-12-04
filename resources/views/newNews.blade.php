@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_datareport"></i> News</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">New Post</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('storeNews') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Name -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_title">Arabic Title</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_title" id="ar_title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_title">English Title</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_title" id="en_title">
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_body">Arabic Body</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="ar_body" id="ar_body"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_body">English Body</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="en_body" id="en_body"></textarea>
                            </div>
                        </div>
                        <!-- Logo -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="image">Image</label>
                            <div class="col-lg-10">
                                <input type="file" name="image" id="image" class="form-control">
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