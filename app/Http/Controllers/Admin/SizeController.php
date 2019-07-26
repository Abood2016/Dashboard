<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function create()
    {
    	return view('admin.size.create');
    }


     public function store(Request $request)
    {
    	$request->validate($this->rules() , $this->messages());		

    	$size = Size::create([
    		'product_size' => $request->product_size,
    	]);
    	return redirect()->route('size.index')->with('success','Size Added Successfully');
    }



		public function edit($id)
		 {
		$sizes = Size::find($id);
	   return view('admin.size.edit',compact('sizes'));
  }

    public function update(Request $request ,$id)
   	 {
  	     $sizes = Size::find($id);
        $request->validate($this->rules(), $this->messages());

        $sizes->update([
            'product_size' => $request->product_size,
        ]);
        return redirect()->route('size.index')->with('success','Size Updated Successfully');
   }

 public function index()
    {
        $sizes = Size::paginate(10);
        return view('admin.size.index',compact('sizes'));    
    }



public function destroy($id = null)
     {
        try {
            $size = Size::findOrFail($id);
          
          $size->delete();
         return response()->json(['status' => 200, 'message' => 'Great :)']);
        } catch (ModelNotFoundException $modelNotFoundException) {
        return response()->json(['status' => 200, 'message' => 'Size not Found']);
        }
    }

    private function rules()
    {

        $rules = [
            'product_size' => 'required',
        ];
        return $rules;
    }

      private function messages()
    {
        return [
            'product_size.required' => 'Size is required',
        ];
    
    }

}
