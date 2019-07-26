@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica " >Products</h4>
@endsection

@section('content')
    <div class="row">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="col-md-12">
        <div class="panel panel-primary">
             <div class="panel-heading">
               <h3 class="panel-title">Products <a href="{{route('product.create')}}" class="pull-right"><i class="fa fa-plus" title="Add new Product" aria-hidden="true"></i></a></h3>

         </div>
          <div class="panel-body"> 
                  @if($products->IsEmpty())
                        <div class="alert alert-danger">
                             No Result
                        </div>
                        @else

                        <div class="box">
                <div class="box-header with-border">

                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                           <h4 style="font-family:Helvetica ">List of Products</h4>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Short Desc</th>
                                    <th>Long Desc</th>
                                    <th>SKU</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Created By</th>
                                    <th>Image</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                    <td>{!!str_limit($product->short_description,10,'...')!!}</td>
                                    <td>{!!str_limit($product->long_description,10,'...')!!}</td>
                                        <td>{{ $product->SKU }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>{{ $product->Category->name }}</td>
                                        <td>{{ $product->admin->name }}</td>
                                        <td>
                                            <img src="{{asset('/admin_uploads').'/'.$product->image}}" alt="" class="img-thumbnail"
                                              style="width: 100px">
                                        </td>
                                        <td>
                                            <a href="{{route('product.edit',$product->id)}}"><span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                            <a class="remove-product" title="Delete"      data-value="{{$product->id}}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                            <i class=""></i></a>

                                            <a  href="{{route('product.show',$product->id)}}" 
                                            title="details">
                                            <span class="glyphicon glyphicon-list"></span>
                                            <i class=""></i></a>

                                        </td>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                         <div class="col-md-12 text-right">
                            {{$products->links()}}
                         </div>
                      </div>
                            @endif
                         </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@endsection

@section('script')
	
	<script>
        $(document).ready(function(){
            $('a.remove-product').click(function () {
			var tr = $(this).parent().parent();
			var id = $(this).data('value')
	swal({
        title: "Are you sure?",
        text: "Do you want to delete this Product",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },function () {
        var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax(
                    {
                        url: "{{route('product.destroy')}}/" + id,
                        type: 'POST',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (data){
                             tr.hide();
                         swal("Deleted!", "Product Deleted Succsefully.", "success");

                        }
                    });
                });
            })

        });
       
</script>	
@endsection