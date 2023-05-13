<?php

namespace App\Http\Controllers;
use Storage;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function home(){
        $posts = Post::count();
        $categories = Category::count();
        return view('admin.Home',compact('posts','categories'));
    }
    public function profile(){
        return view('admin.profile.index');
    }
    public function editPage(){
        return view('admin.profile.edit');
    }
    //account update
    public function update($id,Request $request){
        $this->updateprofileValidationCheck($request);
        $data = $this->getUserData($request);
        $dbImages = User::where('id',$id)->first();
        $dbImage=$dbImages->image;
        if($request->hasFile('image')){
            if($dbImage != null){
                Storage::delete('public/'.$dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }else{
            $data['image'] = $dbImage;

        }
        User::where('id',$id)->update($data);
        return redirect()->route('profile#profilePage')->with(['updateSuccess'=>'Profile Updated']);
    }
    //password change
    public function change(){
        return view('admin.profile.change-password');
    }
    //change
    public function changePassword(Request $request){
        $this->passwordValidationCheck($request);
        $currentUserId = Auth::user()->id;

        $user = User::select('password')->where('id',$currentUserId)->first();
        $dbPassword = $user->password;

        if(Hash::check($request->oldPassword,$dbPassword)){
            $data = [
                'password'=> Hash::make($request->newPassword)
            ];
            User::where('id',Auth::user()->id)->update($data);

            // Auth::logoutOtherDevices($data);

            // return redirect()->route('auth#loginPage');
            return redirect()->route('admin#changepw')->with(['matched'=>'The password has changed']);
        }
        return redirect()->route('admin#changepw')->with(['notMatched'=>'The old password is not correct!']);
    }

    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required|min:8',
            'newPassword'=>'required|min:8',
            'confirmPassword'=>'required|min:8|same:newPassword'
        ],[

        ])->validate();
    }
    private function getUserData($request){
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'updated_at'=>Carbon::now(),
            'image'=>$request->image
        ];
    }
    //profile update validation
    private function updateprofileValidationCheck($request){
        Validator::make($request->all(),[
            'image'=>'mimes:jpg,bmp,png,jpeg,webp',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',

        ])->validate();

    }

}
