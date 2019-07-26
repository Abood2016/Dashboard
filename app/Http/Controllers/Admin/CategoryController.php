<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    public function create()
    {
    	return view('admin.category.create');
    }

     public function store(Request $request)
    {
    	$request->validate($this->rules() , $this->messages());	

    	 $category = Category::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success','Category Added Successfully');
    }


    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
   }

  public function update(Request $request ,$id)
    {
        $categories = Category::find($id);
        $request->validate($this->rules(), $this->messages());

        $categories->update([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index')->with('success','Category Updated Successfully');
   }

    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index',compact('categories'));    
    }


    public function destroy($id = null)
     {
        try {
            $category = Category::findOrFail($id);
            $categoryProduct = $category->Products()->count();
            if ($categoryProduct > 0)
                return response()->json(['status' => 404, 'message' => 'This Category associated with Product']);
            $category->delete();
         return response()->json(['status' => 200, 'message' => 'Great :)']);
        } catch (ModelNotFoundException $modelNotFoundException) {
        return response()->json(['status' => 200, 'message' => 'Category not Found']);
        }
    }

    private function rules()
    {
        $rules = [
            'name' => 'required',
        ];

        return $rules;
    }


     private function messages()
    {
        return [
            'name.required' => 'Category Name is required',
        ];
    
    }



}
