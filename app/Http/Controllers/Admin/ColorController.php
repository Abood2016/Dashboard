<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
	public function create()
	{
		return view('admin.colors.create');	
	}


  public function store(Request $request)
    {
    	$request->validate($this->rules() , $this->messages());	

    	 $color = Color::create([
            'color_name' => $request->color_name,
            'color' => $request->color,
        ]);
        return redirect()->back()->with('success','Color Added Successfully');
    }



    public function index()
    {
        $colors = Color::paginate(10);
        return view('admin.colors.index',compact('colors'));    
    }


     public function edit($id)
		 {
		 	      $colors = Color::find($id);
	   return view('admin.colors.edit',compact('colors'));
  }

    public function update(Request $request ,$id)
   				 {
   		     $colors = Color::find($id);
        $request->validate($this->rules(), $this->messages());

        $colors->update([
            'color_name' => $request->color_name,
            'color' => $request->color,
        ]);
        return redirect()->route('color.index')->with('success','Color Updated Successfully');
   }


	private function rules()
    {
        $rules = [
            'color_name' => 'required',
            'color' => 'required',
        ];

        return $rules;
    }


     private function messages()
    {
        return [
            'color_name.required' => 'Color Name is required',
            'color.required' => 'Color is required',
        ];
    
    }

       public function destroy($id = null)
     {
        try {
            $color = Color::findOrFail($id);
          
            $color->delete();
         return response()->json(['status' => 200, 'message' => 'Great :)']);
        } catch (ModelNotFoundException $modelNotFoundException) {
        return response()->json(['status' => 200, 'message' => 'Category not Found']);
        }
    }

}
