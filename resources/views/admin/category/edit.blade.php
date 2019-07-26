@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Edit Category <span style="color: red"> {{ $categories->name }} </span></h4>
@endsection


@section('content')
	<div class="row">
	<div class="col-md-12">

		<div class="form-group">
			
		<form action="{{route('category.update',['id' => $categories->id])}}" method="POST" >
			@csrf
			{{method_field('PUT')}}

			<div class="col-lg-3 {{$errors->has('name') ? 'has-error' : ''}} ">
				<input type="text" name="name" value="{{ $categories->name }}" class ="form-control" placeholder="Category Name">
				<span class="error">{{$errors->first('name')}}</span><br>
			</div>	
		
			<div class="form-group col-lg-12">
                    <button class="btn btn-success" type="submit">
                     	Edit Category  
                     </button>
                </div>
		</form>
		</div>
		</div>
	</div>
@endsection
