<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BackeEnd\Admins\Update;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
    	$admins = Admin::paginate(10);
        return view('admin.admins.index',compact('admins'));
    	return view('base_layout.header.header',compact('admins'));
    }

    public function CreateAdmin()
    {
       
        return view('admin.admins.create');
    }


    public function StoreAdmin(Request $request)
    {
        $requestArray = $request->validate($this->rules() , $this->messages());

        if($request->hasFile('image')){

                  //upload image 
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image->move('admin_uploads' , $image->getClientOriginalName());    
        }

       $admin = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'description' => $request->description,
            'age' => $request->age,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'image' => $request->image->getClientOriginalName(),
        ]);
          return redirect()->back()->with('success','Add Successfully');
    }
}


    public function edit($id)
    {
    	$admin = Admin::find($id);
    	return view('admin.admins.edit',compact('admin'));
    }

    public function update(Request $request , $id)
    {
     $admin = Admin::FindOrFail($id);
     $requestArray = $request->validate($this->rules($id) , $this->messages());
     
        if($request->hasFile('image')){
                    if(File::exists(public_path('admin_uploads/') . $admin->image))  {
                        File::delete(public_path('admin_uploads/') .  $admin->image);
                    }
                    $image = $request->image;
                    $image->move('admin_uploads',$image->getClientOriginalName());

                    $admin->image = $request->image->getClientOriginalName();
            }
      if(isset($requestArray['password']) && $requestArray['password'] != "")
        {
        $requestArray['password'] = Hash::make($requestArray['password']);
        
        }else{
            unset($requestArray['password']);
        }


      $admin->update($requestArray);
                return redirect()->route('admin.index')
                ->with('success','Profile updated successfully');
               
    }

  public function destroy($id = null)
     {
       try {
        $admin = Admin::find($id);
        $admin->delete();
         return response()->json(['success','Admin deleted']);
        } catch (ModelNotFoundException$modelNotFoundException) {
            return redirect()->route('admin.index')->with('error', 'Admin Not Found');
        }
    }


    private function rules($id = null)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'description' => 'required',
            'address' => 'required',
            'age' => 'required',
        ];
        if ($id) {
         $rules['email'] = 'required|unique:admins,email,' . $id;
         $rules['password'] = 'required' . $id;
        } else {
            $rules['email'] = 'required|unique:admins,email';
            $rules['image'] = 'required|mimes:jpeg,png,bmp,jpg';
        }

        return $rules;
    }

 private function messages()
    {
        return [
            'name.required' => 'Name is required',
            'username.required' => 'username is required',
            'description.required' => 'description is required',
            'email.required' => 'email is required',
            'address.required' => 'address is required',
            'age.required' => 'Age is required',
            'image.required' => 'Profile image is required',
            'image.mimes' => 'Invalid image',
        ];
    }
}
