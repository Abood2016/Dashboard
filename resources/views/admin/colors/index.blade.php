@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Colors</h4>
@endsection

@section('content')
	<div class="row">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="col-md-12">
        <div class="panel panel-primary">
 			 <div class="panel-heading">
               <h3 class="panel-title">Colors <a href="{{route('color.create')}}" class="pull-right"><i class="fa fa-plus" title="Add new Color" aria-hidden="true"></i></a></h3>

         </div>
          <div class="panel-body"> 
                  @if($colors->IsEmpty())
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
                           <h4 style="font-family:Helvetica ">List of Colors</h4>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color Name</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($colors as $color)
                                    <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->color_name }}</td>
                                        <td>{{ $color->color }}</td>
                                        <td><a href="{{route('color.edit',$color->id)}}"><span class="glyphicon glyphicon-edit"></span>

                                        </a>
                                              
                                        <a class="remove-color" title="Delete"	              	data-value="{{$color->id}}">
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
                            {{$colors ->links()}}
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
            $('a.remove-color').click(function () {
            var tr = $(this).parent().parent();
            var id = $(this).data('value')
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this Color",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },function () {
        var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax(
                    {
                        url: "{{route('color.destroy')}}/" + id,
                        type: 'POST',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (data){
                             tr.hide();
                         swal("Deleted!", "Color Deleted Succsefully.", "success");

                        }
                    });
                });
            })

        });
       
</script>   
@endsection