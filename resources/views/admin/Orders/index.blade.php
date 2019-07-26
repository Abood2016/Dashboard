@extends('base_layout.master_layout')

@section('title')
    <h4 style="font-family:Helvetica " >Orders</h4>
@endsection

@section('content')
    <div class="row">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="col-md-12">
        <div class="panel panel-primary">
             <div class="panel-heading">

         </div>
          <div class="panel-body"> 
                  @if($orders->IsEmpty())
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
                           <h4 style="font-family:Helvetica ">List of Orders</h4>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                     <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                       <td>
                                        @foreach($order->products as $item)

                                            {{ $item->name }}

                                        @endforeach
                                    </td>
                                    <td>
                                    @foreach($order->orderitems as $item)

                                            {{ $item->quantity }}

                                        @endforeach
                                    </td>
                                    <td> 
                                    @if($order->status)   
                                    <span class="label label-success">Confirmed</span>

                                     @else
                                     <span class="label label-warning">Pending</span>       
                                    @endif    

                                     </td>
                                       <td>
                                           @if($order->status)
                                           <a href="{{ route('order.pending',['id' => $order->id]) }}" class="btn btn-warning btn-sm"
                                                    title="Pending">Pending</a>

                                            @else
                                            <a href="{{ route('order.confirm',['id' => $order->id]) }}" class="btn btn-success btn-sm"
                                                    title="Confirm">Confirm</a>
                                           @endif 

                                           <a href="{{ route('order.show',['id' => $order->id]) }}" class="btn btn-success btn-sm"
                                                    title="details">Details</a> 
                                            
                                        </td>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                         <div class="col-md-12 text-right">
                            {{$orders->links()}}
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