@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_datareport"></i> Clients</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Edit Client</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('updateClient', compact('client')) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_name">Arabic Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_name" id="ar_name" value="{{ $client->ar_name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_name">English Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_name" id="en_name" value="{{ $client->en_name }}">
                            </div>
                        </div>

                        <!-- Products -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="products">Products</label>
                            <div class="col-lg-10">
                                <div class="form-check" id="products">
                                    @foreach($products as $product)

                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="products[]" value="{{ $product->id }}"
                                                    {{ $client->hasProduct($product->id) ? 'checked disabled' : '' }}>
                                            {{ $product->en_name }}
                                        </label>

                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Services -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="services">Services</label>
                            <div class="col-lg-10">
                                <div class="form-check" id="services">
                                    @foreach($services as $service)

                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}"
                                                    {{ $client->hasService($service->id) ? 'checked disabled' : '' }}>
                                            {{ $service->en_name }}
                                        </label>

                                    @endforeach
                                </div>
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