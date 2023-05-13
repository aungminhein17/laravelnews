<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $category = Category::orderBy('created_at','desc')
        ->when(request('key'),function($query){
            $query->where('title','like','%'.request('key').'%');
        })
        ->paginate(10);
        return view('admin.category.index',compact('category'));
    }

    //category create Page
    public function createPage(){
        return view('admin.category.create');
    }
    //create category
    public function create(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestData($request);
        Category::create($data);
        return back()->with(['created'=>'A new category is added!']);
    }

    //delete
    public function delete($id){
        $data = Category::where('id',$id)->delete();
        return back()->with(['deleted'=>'A category is removed!']);
    }

    //update page
    public function updatePage($id){
        $dbVal = Category::where('id',$id)->first();
        // dd($dbVal->toArray());
        return view('admin.category.update',compact('dbVal'));
    }
    public function update(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestData($request);
        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('category#categoryPage')->with(['updatedSuccess'=>'List Updated']);
    }

    private function requestData($request){
       return [
        'title' => $request->category,
        'description'=> $request->description
       ];
    }
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'category'=> 'required|min:4|unique:categories,title,'.$request->categoryId,
            'description'=>'required'
        ])->validate();
    }
}
