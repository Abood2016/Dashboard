@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica " >Edit Product <span style="color: red">{{ $product->name }}</span></h4>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="form-group">
		<form action="{{route('product.update',['id' => $product->id])}}" method="POST" enctype="multipart/form-data" >
			@csrf
			{{ method_field('PUT') }}
			<div class="form-group {{$errors->has('image') ? 'has-error' : ''}}" >
				<div class="col-md-9 " style ="text-align: center;">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;" >
                                  	<img src="{{asset('/admin_uploads').'/'.$product->image}}" alt="">
                                  </div>
                                       <div>
                                             <span class="btn red btn-outline btn-file">
                                             <span class="fileinput-new">Select image </span>
                                              <span class="fileinput-exists"> Change </span><br>
                                              <input type="file" name="image"> </span>

                                             <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a><br>
                                                </div>
                                                <span class="error">{{$errors->first('image')}}</span><br>
                                             </div>
                                            </div>                                            
                                          </div>
                                        </div>
									</div>

			<div class="col-lg-3 {{$errors->has('name') ? 'has-error' : ''}} ">
				<input type="text" name="name" class ="form-control" value="{{ $product->name }}" placeholder="Name">
				<span class="error">{{$errors->first('name')}}</span><br>
			</div>	
		
		<div class="col-lg-3 {{$errors->has('price') ? 'has-error' : ''}} ">
				<input type="text" name="price" class ="form-control" value="{{ $product->price }}" placeholder="Price">
				<span class="error">{{$errors->first('price')}}</span><br>
			</div>

		<div class="col-lg-3 {{$errors->has('SKU') ? 'has-error' : ''}} ">
				<input type="text" name="SKU" class ="form-control" value="{{ $product->SKU }}" placeholder="SKU">
				<span class="error">{{$errors->first('SKU')}}</span><br>
			</div>

			<div class="form-group col-md-9 {{$errors->has('long_description') ? 'has-error' : ''}} ">
				<label for="description">Long description</label>
				<textarea
				      id="long_desc" type="text" name="long_description" class ="form-control" cols="5" rows="5" >{{ $product->long_description }}
				</textarea><span class="error">{{$errors->first('long_description')}}</span><br>
			</div>

			<div class="form-group col-md-9 {{$errors->has('short_description') ? 'has-error' : ''}} ">
				<label for="description">Short description</label>
				<textarea
				      id="short_desc" type="text"  name="short_description" class ="form-control" cols="3" rows="3" >{{ $product->short_description }}
				</textarea><span class="error">{{$errors->first('short_description')}}</span><br>
			</div>

			<div class="col-md-9 {{$errors->has('status') ? 'has-error' : ''}} ">
				<label for="Status">Product Status</label>
				<select class="form-group form-control" name="status">
					<option value="" disabled selected>Choose product status</option>
					<option value="electronic" {{$product->status == 'electronic' ?'selected' :' electronic'}}> electronic</option>
					<option value="normal" {{$product->status == 'normal' ?'selected' :' normal'}}> normal</option>
				</select>
				<span class="error">{{$errors->first('status')}}</span><br>
			</div>	


			<div class="col-md-9 {{$errors->has('category_id') ? 'has-error' : ''}} ">
				<label for="Status">Product Category</label>
				<select class="form-group form-control" id="category" name="category_id">
					<option value="" disabled selected>Choose product Category</option>
					@foreach($categories as $category)
                                <option value="{{$category->id}}"

                                	@if($product->category->id == $category->id)
                                            selected
                                    @endif

	                                >{{$category->name}}</option>

                            		@endforeach

				</select>
				<span class="error">{{$errors->first('category_id')}}</span><br>
			</div>	

			<div class="col-md-9">
            <label for="multiple" class="control-label">Select  Product Color</label>
              <select id="multiple color_id"  name="color_id" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
						@foreach($colors as $color)
	            <option value="{{ $color->id }}" {{$product->color_id == $color->id  ? 'selected' : ''}}>{{ $color->color_name}}</option>
	       		 @endforeach
                </select>
              	<span class="error">{{$errors->first('color_id')}}</span><br>

             </div>

                <div class="col-md-9 {{$errors->has('size_id') ? 'has-error' : ''}} ">
				<label for="size_id">Product Size</label>
				<select class="form-group form-control" id="size_id" name="size_id">
					<option value="" disabled selected>Choose product Size</option>
					@foreach($sizes as $size)
	            <option value="{{ $size->id }}" {{$product->size_id == $size->id  ? 'selected' : ''}}>{{ $size->product_size}}</option>
	       		 @endforeach
				</select>
				<span class="error">{{$errors->first('size_id')}}</span><br>
			</div>

			<div class="col-lg-6 {{$errors->has('size') ? 'has-error' : ''}} ">
				<input type="text" name="size" class ="form-control" value="{{ $product->size }}" placeholder="Size">
				<span class="error">{{$errors->first('size')}}</span><br>
			</div><br>
			<div class="form-group col-lg-12">
                    <button class="btn btn-success" type="submit">
                     	Add Product  
                     </button>
                </div>
		</form>
		</div>
		</div>
	</div>
@endsection

@section('style')
   <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection

@section('script')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
$(document).ready(function() {
  $('#long_desc').summernote();
});
</script>
<script>
$(document).ready(function() {
  $('#short_desc').summernote();
});
</script>
@endsection
