<?php

namespace App\Http\Controllers;
use Storage;
use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function posts(){
    //    $post = DB::table('posts')
    //    ->join('action_logs','posts.id','action_logs.post_id')
    //    ->groupBy('action_logs.post_id')
    //    ->get();
        $posts = Post::select('posts.*','categories.title as category_title')
        ->leftJoin('categories','posts.category_id','categories.id')
        ->when(request('key'),function($query){
            $query->where('title','like','%'.request('key').'%');
        })->orderBy('created_at','desc')->paginate(6);

        $category = Category::select('id','title')->get();
        return view('admin.posts.index' ,compact('category','posts'));
    }
     //posting
    public function postPosts(Request $request){
        $this->postValidationCheck($request,'create');
        $data = $this->requestPostInfo($request);
        if($request->hasFile('image')){
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            ;
        }
        Post::create($data);
        return redirect()->route('posts#postPage')->with(['posted'=> 'Post Created']);
    }
    //delete
    public function delete($id){
        Post::where('id',$id)->delete();
        return back()->with(['deleted'=>'Deleted']);
    }
    //read
    public function detail($id){
        $post = ActionLog::select('action_logs.*','posts.*','categories.title as category_title',DB::raw('COUNT(action_logs.post_id) as post_count'))
        ->leftJoin('posts','posts.id','action_logs.post_id')
        ->leftJoin('categories','categories.id','posts.category_id')
        ->groupBy('action_logs.post_id')
        ->where('posts.id',$id)->first();
        return view('admin.posts.detail',compact('post'));
    }

    //edit
    public function edit($id){
        $postData = Post::where('id',$id)->first();
        $category = Category::get();
        return view('admin.posts.edit',compact('postData','category'));
    }
    //update
    public function update(Request $request){
        $this->postValidationCheck($request,'update');
        $data = $this->requestPostInfo($request);
        $oldImages = Post::where('id',$request->id)->first();
        $oldImage = $oldImages->image;
       if($request->hasFile('image')){
        if($oldImage != null){
            Storage::delete('public/'. $oldImage);
        }
        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public',$fileName);
        $data['image'] = $fileName;
       }else{
        $data['image'] = $oldImage;
       }
    //    if($request->hasFile('image')){
    //     $dbImage = User::where('id',$id)->first();
    //     $dbImage=$dbImage->image;

    //     if($dbImage != null){
    //         Storage::delete('public/'.$dbImage);
    //     }

    //     $fileName = uniqid() . $request->file('image')->getClientOriginalName();
    //     $request->file('image')->storeAs('public',$fileName);
    //     $data['image'] = $fileName;
    // }

        Post::where('id',$request->id)->update($data);
        return redirect()->route('posts#postPage')->with(['updated'=>'Product Updated']);
    }

    //trend posts



    private function requestPostInfo($request){
        return [
            'category_id'=>$request->categoryId,
            'title'=> $request->title,
            'description'=>$request->description,
            'image'=>$request->image,
            'created_at'=>Carbon::now()
        ];
    }

    //validator product

    private function postValidationCheck($request,$action){
       $validation = [
            'title'=>'required|min:5|unique:posts,title,'.$request->id,
            'categoryId'=>'required',
            'description'=>'required|min:10',

       ];
       $validation['image'] = $action == 'create' ? 'required|mimes:jpg,jpeg,png,webp|file' :'mimes:jpg,ipeg,png,webp|file';

       Validator::make($request->all(), $validation)->validate();
    }
}
