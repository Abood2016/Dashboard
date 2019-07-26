<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        $products = Product::paginate(10);
        // $products = Product::all();
        return view('admin.Products.index',compact('products'));

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.Products.edit',compact('product'))->with('categories',Category::all())->with('colors',Color::all())->with('sizes',Size::all());
    }

    public function update(Request $request , $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate($this->rules($id) , $this->messages());
        if($request->hasFile('image')){

                    if(File::exists(public_path('admin_uploads/') . $product->image))  {
                        File::delete(public_path('admin_uploads/') .  $product->image);
                    }
                    $image = $request->image;
                    $image->move('admin_uploads',$image->getClientOriginalName());

                    $product->image = $request->image->getClientOriginalName();
            }

            $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'long_description' => $request->long_description,
            'short_description' => $request->short_description,
            'size' => $request->size,
            'color_id' => $request->color_id,
            'SKU' => $request->SKU,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'size_id' => $request->size_id,
            'image' =>$product->image,
            ]);
        return redirect()->route('product.index')->with('success','Product updated successfully');

    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        if ($categories->count()  == 0)
        {
            Session::flash('success',' You Must Add Category Before');
            return redirect()->back();
        }
        return view('admin.Products.create',compact('colors'))
        ->with('categories',$categories)->with('sizes',$sizes);
    }

    public function store(Request $request)
    {
    	$request->validate($this->rules() , $this->messages());
        $id = Auth::guard('admin')->user()->id;
		//upload image 
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image->move('admin_uploads' , $image->getClientOriginalName());    
        }
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'long_description' => $request->long_description,
            'short_description' => $request->short_description,
            'size' => $request->size,
            'SKU' => $request->SKU,
            'status' => $request->status,
            'admin_id' => $id,
            'category_id' => $request->category_id,
            'size_id' => $request->size_id,
            'slug' => str_slug($request->name),
            'image' => $request->image->getClientOriginalName(),
        ]);
        // ;
        $product->colors()->attach($request->color_name);
        return redirect()->route('product.index')->with('success','Product Added Successfully');
 
     }


     public function show($id)
     {
        $product = Product::find($id);
        return view('admin.Products.show',compact('product'));
     }


     public function destroy($id = null)
     {
       try {
        $product = Product::find($id);
        $product->delete();
         return response()->json(['success','Product deleted']);
        } catch (ModelNotFoundException$modelNotFoundException) {
            return redirect()->route('product.index')->with('error', 'Product Not Found');
        }
    }
 
    private function rules($id = null)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            // 'color_id' => 'required',
            'long_description' => 'required',
            'short_description' => 'required',
            'category_id' => 'required',
            'size' => 'required',
            'status' => 'required|in:electronic,normal',

        ];
        if ($id) {
         $rules['SKU'] = 'required|unique:products,SKU,' . $id;
        } else {
            $rules['SKU'] = 'required|unique:products,SKU';
            $rules['image'] = 'required|mimes:jpeg,png,bmp,jpg';
        }

        return $rules;
    }

     private function messages()
    {
        return [
            'name.required' => 'Name is required',
            'price.required' => 'price is required',
            'SKU.required' => 'SKU is required',
            'SKU.unique' => 'SKU is duplicated',
            // 'color_id.required' => 'Color is required',
            'long_description.required' => 'long description is required',
            'short_description.required' => 'short description is required',
            'size.required' => 'size is required',
            'category_id.required' => 'Category is required',
            'status.required' => 'status is required',
            'status.in' => 'Invalid status',
            'image.required' => 'Product image is required',
            'image.mimes' => 'Invalid image',
        ];
    }
}
