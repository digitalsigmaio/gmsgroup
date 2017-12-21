@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_building"></i> {{ $parentCompany->en_name }}</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Edit Company</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('updateCompany') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $parentCompany->id }}">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_name">Arabic Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_name" id="ar_name" value="{{ $parentCompany->ar_name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_name">English Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_name" id="en_name" value="{{ $parentCompany->en_name }}">
                            </div>
                        </div>

                        <!-- About -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_about">Arabic About</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="ar_about" id="ar_about">{{ $parentCompany->ar_about }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_about">English About</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="en_about" id="en_about">{{ $parentCompany->en_about }}</textarea>
                            </div>
                        </div>

                        <!-- Vision -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_vision">Arabic Vision</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="ar_vision" id="ar_vision">{{ $parentCompany->ar_vision }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_vision">English Vision</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="en_vision" id="en_vision">{{ $parentCompany->en_vision }}</textarea>
                            </div>
                        </div>

                        <!-- Slogan -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_slogan">Arabic Slogan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_slogan" id="ar_slogan" value="{{ $parentCompany->ar_slogan }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_slogan">English Slogan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_slogan" id="en_slogan" value="{{ $parentCompany->en_slogan }}">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_address">Arabic Address</label>
                            <div class="col-lg-10">

                                <input type="text" class="form-control" name="ar_address" id="ar_address" value="{{ $parentCompany->ar_address }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_address">English Address</label>
                            <div class="col-lg-10">

                                <input type="text" class="form-control" name="en_address" id="en_address" value="{{ $parentCompany->en_address }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="email">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="email" id=emaill" value="{{ $parentCompany->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="tel">Tel</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="tel" id="tel" value="{{ $parentCompany->tel }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="gmap">Google Maps</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="gmap" id="gmap" value="{{ $parentCompany->gmap }}">
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