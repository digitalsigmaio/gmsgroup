@extends('layouts.master')



@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_mobile"></i> Notifications</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Send Notification</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('notification') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <!-- Title -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="title">Title</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                        </div>
                        <!-- Body -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="body">Body</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="body" id="body" required>
                            </div>
                        </div>
                        <!-- Link -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="link">Link</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="link" id="link">
                            </div>
                        </div>


                        <!-- Buttons -->
                        <div class="form-group">
                            <!-- Buttons -->
                            <div class="col-lg-offset-2 col-lg-9">
                                <button type="submit" class="btn btn-primary">Send</button>
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
            <div class="alert alert-dismissible alert-danger col-md-6 col-md-offset-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if(session()->get('report'))
        <div class="row">
            <div class="alert alert-dismissible alert-success col-md-6 col-md-offset-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ session()->get('report') }}</strong>.
            </div>
        </div>
    @endif

@endsection