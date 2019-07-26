@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Add Category</h4>
@endsection


@section('content')
	<div class="row">
	<div class="col-md-12">

		<div class="form-group">
			
		<form action="{{route('category.store')}}" method="POST" >
			@csrf

			<div class="col-lg-3 {{$errors->has('name') ? 'has-error' : ''}} ">
				<input type="text" name="name" class ="form-control" placeholder="Category Name">
				<span class="error">{{$errors->first('name')}}</span><br>
			</div>	
		
			<div class="form-group col-lg-12">
                    <button class="btn btn-success" type="submit">
                     	Add Category  
                     </button>
                </div>
		</form>
		</div>
		</div>
	</div>
@endsection
