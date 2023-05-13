<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //user login release token

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();

        if(isset($user)){
            if(Hash::check($request->password,$user->password)){
                return response()->json([
                    'user'=>$user,
                    'token' => $user->createToken(time())->plainTextToken
                ]);
            }else{
                return response()->json([
                    'user'=>null,
                    'token'=>null
                ]);
            }
        }else{
            return response()->json([
                'user'=>null,
                'token'=>null,
                'userStatus'=>false
            ]);
        }
    }
    //register
    public function register(Request $request){
        // Validator::make($request->all(), [
        //     'email' => ['string', 'email', 'max:255', 'unique:users']
        // ])->validate();
        $oldEmail = User::select('email')->get();
        if($request->email = $oldEmail){
            return response()->json([
                'message'=> 'That user email has already taken'
            ]);
        }else{
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'gender'=>$request->gender,
                'password'=>Hash::make($request->password)
            ];
            User::create($data);
            $user = User::where('email',$request->email)->first();
             return response()->json([
                'user'=>$data,
                'token'=>$user->createToken(time())->plainTextToken
            ]);
        }

    }
    public function categoryList(){
        $category = Category::get();
        return response()->json([
            'message'=>'ok tl',
            'category'=>$category
        ]);
    }
}

