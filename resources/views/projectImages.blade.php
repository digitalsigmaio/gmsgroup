@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_images"></i> Gallery</h3>
        </div>
    </div>

    <!-- Content -->

    <!-- Image Form -->
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-left">New Image</div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="padd">

                    <div class="form quick-post">
                        <!-- Edit profile form (not working)-->
                        <form class="form-horizontal" action="{{ route('newProjectImage', compact('project')) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

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
    </div>
    <!-- Images List -->
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Images list</strong></h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($images))
                        @foreach($images as $image)
                            <tr>
                                <td><img src="{{ $image->image }}" style="height:80px; margin-top:-2px;"></td>
                                <td><a href="{{ route('editProjectImage', compact(['project', 'image'])) }}"><span class="btn btn-info">Edit</span></a></td>
                                <td>
                                    <form action="{{ route('deleteProjectImage', compact(['project', 'image'])) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger deleteItem">Delete</button>
                                    </form>
                                </td>
                            </tr>
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