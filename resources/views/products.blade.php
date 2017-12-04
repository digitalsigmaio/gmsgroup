@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_gift"></i> Products</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Products list</strong></h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Arabic Name</th>
                        <th>English Name</th>
                        <th>Arabic Description</th>
                        <th>English Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($products))
                        @foreach($products as $product)
                            <tr>
                                <td><img src="{{ $product->logo }}" style="height:40px; margin-top:-2px;"></td>
                                <td>{{ $product->ar_name }}</td>
                                <td>{{ $product->en_name }}</td>
                                <td>{{ $product->ar_description }}</td>
                                <td>{{ $product->en_description }}</td>
                                <td><a href="{{ route('editProduct', compact('product')) }}"><span class="btn btn-info">Edit</span></a></td>
                                <td>
                                    <form action="{{ route('deleteProduct', compact('product')) }}" method="post">
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