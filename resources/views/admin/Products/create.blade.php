@extends('base_layout.master_layout')

@section('title')
	<h4 style="font-family:Helvetica " >Add Product</h4>
@endsection

@section('content')
	<div class="row">
	<div class="col-md-12">

		<div class="form-group">
		<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >
			@csrf
			<div class="form-group {{$errors->has('image') ? 'has-error' : ''}}" >
				<div class="col-md-9 " style ="text-align: center;">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
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
				<input type="text" name="name" class ="form-control" placeholder="Name">
				<span class="error">{{$errors->first('name')}}</span><br>
			</div>	
		
		<div class="col-lg-3 {{$errors->has('price') ? 'has-error' : ''}} ">
				<input type="text" name="price" class ="form-control" placeholder="Price">
				<span class="error">{{$errors->first('price')}}</span><br>
			</div>

		<div class="col-lg-3 {{$errors->has('SKU') ? 'has-error' : ''}} ">
				<input type="text" name="SKU" class ="form-control" placeholder="SKU">
				<span class="error">{{$errors->first('SKU')}}</span><br>
			</div>

			<div class="form-group col-md-9 {{$errors->has('long_description') ? 'has-error' : ''}} ">
				<label for="description">Long description</label>
				<textarea
				      id="long_desc" type="text" name="long_description" class ="form-control" cols="5" rows="5" >
				</textarea><span class="error">{{$errors->first('long_description')}}</span><br>
			</div>

			<div class="form-group col-md-9 {{$errors->has('short_description') ? 'has-error' : ''}} ">
				<label for="description">Short description</label>
				<textarea
				      id="short_desc" type="text"  name="short_description" class ="form-control" cols="3" rows="3" >
				</textarea><span class="error">{{$errors->first('short_description')}}</span><br>
			</div>

			<div class="col-md-9 {{$errors->has('status') ? 'has-error' : ''}} ">
				<label for="Status">Product Status</label>
				<select class="form-group form-control" name="status">
					<option value="" disabled selected>Choose product status</option>
					<option value="electronic">Electronic</option>
					<option value="normal">Normal</option>
				</select>
				<span class="error">{{$errors->first('status')}}</span><br>
			</div>	


			<div class="col-md-9 {{$errors->has('category_id') ? 'has-error' : ''}} ">
				<label for="Status">Product Category</label>
				<select class="form-group form-control" id="category" name="category_id">
					<option value="" disabled selected>Choose product Category</option>
					@foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
				</select>
				<span class="error">{{$errors->first('category_id')}}</span><br>
			</div>	

			<div class="col-md-9">
            <label for="multiple" class="control-label">Select  Product Color</label>
              <select id="multiple color"  name="color_name" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
						@foreach($colors as $item)
                            <option  value="{{$item->color_name}}">{{ $item->color_name }}</option>
                        @endforeach
                </select>
              	<span class="error">{{$errors->first('color')}}</span><br>

              </div>
                <div class="col-md-9 {{$errors->has('size_id') ? 'has-error' : ''}} ">
				<label for="size_id">Product Size</label>
				<select class="form-group form-control" id="size_id" name="size_id">
					<option value="" disabled selected>Choose product Size</option>
					@foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->product_size}}</option>
                            @endforeach
				</select>
				<span class="error">{{$errors->first('size_id')}}</span><br>
			</div>

			<div class="col-lg-6 {{$errors->has('size') ? 'has-error' : ''}} ">
				<input type="text" name="size" class ="form-control" placeholder="Size">
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