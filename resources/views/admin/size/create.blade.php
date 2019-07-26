@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Add Size</h4>
@endsection


@section('content')
	<div class="row">
	<div class="col-md-12">

		<div class="form-group">
			
		<form action="{{route('size.store')}}" method="POST" >
			@csrf
			<div class="col-lg-6 {{$errors->has('product_size') ? 'has-error' : ''}} ">
				<input type="text" name="product_size" id="product_size" value="{{ old('product_size') }}" class ="form-control" placeholder="Size">
				<span class="error">{{$errors->first('product_size')}}</span><br>
			</div>
			<div class="form-group col-lg-12">
                    <button class="btn btn-success" type="submit">
                     	Add Size  
                     </button>
                </div>
		</form>
		</div>
		</div>
	</div>
@endsection
