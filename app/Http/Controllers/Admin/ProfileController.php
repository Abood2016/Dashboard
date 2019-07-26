<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
    	$admins = Admin::all();
        return view('admin.profile.index',compact('admins'));
    	return view('base_layout.header.header',compact('admins'));
    }


    public function edit($id)
    {
    	$admin = Admin::find($id);
    	return view('admin.profile.edit',compact('admin'));
    }

    public function update(Request $request , $id)
    {
        $admin = Admin::find($id);
        $request->validate($this->rules($id) , $this->messages());
     
        if($request->hasFile('image')){
                    if(File::exists(public_path('admin_uploads/') . $admin->image))  {
                        File::delete(public_path('admin_uploads/') .  $admin->image);
                    }
                    $image = $request->image;
                    $image->move('admin_uploads',$image->getClientOriginalName());

                    $admin->image = $request->image->getClientOriginalName();
            }

        $admin->fill($request->all());
        $admin->update();
        return redirect()->route('profile.index')->with('success','Profile updated successfully');
       
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
            'email.unique' => 'email is duplicated',
            'email.required' => 'email is required',
            'address.required' => 'address is required',
            'age.required' => 'Age is required',
            'image.required' => 'Profile image is required',
            'image.mimes' => 'Invalid image',
        ];
    }
}
