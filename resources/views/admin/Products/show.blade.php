@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica " >Product Details</h4>
@endsection


@section('content')

<div class="row">

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Product Details</h4>
            <p class="category">List of all stock</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <tbody>

                    <tr>
                        <th>ID</th>
                        <td>{{$product->id}}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{$product->name}}</td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>{{$product->price}}</td>
                    </tr>

                    <tr>
                        <th>long description</th>
                        <td>{!! $product->long_description !!}</td>
                    </tr>

                    <tr>
                        <th>Short description</th>
                        <td>{!! $product->short_description !!}</td>
                    </tr>

                    <tr>
                        <th>Size</th>
                            @if(empty($product->Size->product_size))
                        <td>
                           <span style="color: red">No Size Selected</span> 
                           <a href="{{route('product.edit',$product->id)}}" title="Edit Product Size"><span class="glyphicon glyphicon-edit"></span>
                                        </a>
                            @else    
                            <td>{{$product->Size->product_size}}</td>
                            @endif    
                        </td>
                    </tr>

                     <th>Color</th>
                            @if(empty($product->color->color_name))
                        <td>
                           <span style="color: red">No Color Selected</span> 
                           <a href="{{route('product.edit',$product->id)}}" ><span class="glyphicon glyphicon-edit" title="Edit Product Color"></span>
                                        </a>
                            @else    
                            <td>{{$product->color->color_name}}</td>
                            @endif    
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$product->status}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$product->slug}}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{$product->Category->name}}</td>
                    </tr>
                    <tr>
                        <th>Created by</th>
                        <td>{{$product->admin->name}}</td>
                    </tr>
					<tr>
                        <th>Created At</th>
                        <td>{{$product->created_at ->diffForHumans()}}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><a href="{{asset('admin_uploads/') .'/' .$product->image}}" target="_blank"><img src="{{asset('admin_uploads/') .'/' .$product->image}}" alt="" class="img-thumbnail" style="width: 150px;"> </a></td>
                    </tr>

                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
        <a href="{{ route('product.index')}}" class="btn btn-primary" >Back To Products</a>
@endsection