@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Categories</h4>
@endsection

@section('content')
	<div class="row">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="col-md-12">
        <div class="panel panel-primary">
 			 <div class="panel-heading">
               <h3 class="panel-title">Categories <a href="{{route('category.create')}}" class="pull-right"><i class="fa fa-plus" title="Add new Category" aria-hidden="true"></i></a></h3>

         </div>
          <div class="panel-body"> 
                  @if($categories->IsEmpty())
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
                           <h4 style="font-family:Helvetica ">List of Categories</h4>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td><a href="{{route('category.edit',$category->id)}}"><span class="glyphicon glyphicon-edit"></span>

                                        </a>
                                              
                                        <a class="remove-category" title="Delete"	              	data-value="{{$category->id}}">
                                        	<span class="glyphicon glyphicon-remove"></span>
	                              			<i class=""></i></a>
										</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                                
                  <div class="col-md-12 text-right">
                            {{$categories ->links()}}
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
        $('.remove-category ').click(function () {
            var id = $(this).data('value');
            var tr = $(this).parent().parent();
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this Category",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                            },
                function () {
                    /**
                     *
                     * send ajax request for deleting category
                     *
                     */
                    $.ajax({
                        url: '{{route('category.destroy')}}/' + id,
                        method: 'POST',
                        data: {body: '', _token: '{{csrf_token()}}'}
                        }).success(function (response,data) {
                        if (response.status == 200) {
                        swal("Category Deleted Successfully", response.message, "success")
                        tr.hide();
                        } else 
                            swal("Can't Delete this Category", response.message, "error")
                    })
                });
        })
        
    </script>
@endsection