<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ListController extends Controller
{
    public function list(){
        $user = User::select('id','name','email','phone','address','image')
        ->when(request('key'),function($query){
            $query->where('name','like','%'.request('key').'%');
        })
        ->paginate(8);
        return view('admin.list.index',compact('user'));
    }

    //userdetails
    public function userDetails($id){
        $user = User::where('id',$id)->first();
        return view('admin.list.detail',compact('user'));
    }

    public function userDelete($id){
        $user = User::where('id',$id)->first();
       $userImage =  $user->image;
       if(File::exists(public_path().'/storage/'.$userImage)){
        File::delete(public_path().'/storage/'.$userImage);
       }
       User::where('id',$id)->delete();
        return back()->with(['banned'=>'A user has been banned!']);
    }
}
