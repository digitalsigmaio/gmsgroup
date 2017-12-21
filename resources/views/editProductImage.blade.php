@extends('layouts.master')

@section('content')


<!-- Header -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_images"></i> Gallery</h3>
    </div>
</div>

<!-- Content -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left">Edit Image</div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="padd">

            <div class="form quick-post">
                <!-- Edit profile form (not working)-->
                <form class="form-horizontal" action="{{ route('updateProductImage', compact(['product', 'productImage'])) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">

                    <!-- Image -->
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