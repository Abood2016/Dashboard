@extends('base_layout.master_layout')

 @section('title')
	<h4 style="font-family:Helvetica " >Admins</h4>
@endsection


@section('content')
    <div class="row">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="col-md-12">
        <div class="panel panel-primary">
             <div class="panel-heading">
               <h3 class="panel-title">Admins <a href="{{route('admin.create')}}" class="pull-right"><i class="fa fa-plus" title="Add new Admin" aria-hidden="true"></i></a></h3>

         </div>
          <div class="panel-body"> 
                  @if($admins->IsEmpty())
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
                           <h4 style="font-family:Helvetica ">List of Admin</h4>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Address</th>
                                    <th>Age</th>
                                    <th>Image</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>{{ $admin->email }}</td>
                                    <td>{!!str_limit($admin->description,10,'...')!!}</td>
                                        <td>{{ $admin->address }}</td>
                                        <td>{{ $admin->age }}</td>
                                        <td>
                                            <img src="{{asset('/admin_uploads').'/'.$admin->image}}" alt="" class="img-thumbnail"
                                              style="width: 100px">
                                        </td>
                                        <td>
                                            <a href="{{route('admin.edit',$admin->id)}}"><span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                            <a class="remove-admin" title="Delete"      data-value="{{$admin->id}}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                            <i class=""></i></a>

                                        </td>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                         <div class="col-md-12 text-right">
                            {{$admins->links()}}
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
            $('a.remove-admin').click(function () {
			var tr = $(this).parent().parent();
			var id = $(this).data('value')
	swal({
        title: "Are you sure?",
        text: "Do you want to delete this Admin",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    },function () {
        var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax(
                    {
                        url: "{{route('admin.destroy')}}/" + id,
                        type: 'POST',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (data){
                             tr.hide();
                         swal("Deleted!", "Admin Deleted Succsefully.", "success");

                        }
                    });
                });
            })

        });
       
</script>	
@endsection