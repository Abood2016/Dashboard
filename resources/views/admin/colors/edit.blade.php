@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica ">Edit Clor <span style="color: red"> {{ $colors->name }} </span></h4>
@endsection


@section('content')
	<div class="row">
	<div class="col-md-12">

		<div class="form-group">
			
		<form action="{{route('color.update',['id' => $colors->id])}}" method="POST" >
			@csrf
			{{method_field('PUT')}}

			<div class="col-lg-6 {{$errors->has('color_name') ? 'has-error' : ''}} ">
				<input type="text" name="color_name" id="color_name" value="{{ $colors->color_name }}" class ="form-control" placeholder="Color Name">
				<span class="error">{{$errors->first('color_name')}}</span><br>
			</div>
			<div class="col-md-6 {{$errors->has('color') ? 'has-error' : ''}}">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="color" name="color" id="color" value="{{ $colors->color }}" class="form-control" placeholder="Color">
                                <span class="error">{{$errors->first('color')}}</span>
                        </div>
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
