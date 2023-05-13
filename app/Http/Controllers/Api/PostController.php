<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //posts
    public function allposts(){
        $post = Post::orderBy('posts.created_at','desc')->get();

        $viewCount = ActionLog::select(DB::raw('COUNT(action_logs.post_id) as viewCount'))
        ->leftJoin('posts','posts.id','action_logs.post_id')
        ->groupBy('action_logs.post_id')
        ->orderBy('posts.created_at','desc')->get();
        return response()->json([
            'post'=>$post,
            'view_count'=>$viewCount,
            'status'=>'ok'
        ]);
    }
    public function allCategory(){
        $category = Category::orderBy('created_at','desc')->get();
        return response()->json([
            'category' => $category,
            'status' => 'success'
        ]);
    }
    public function postSearch(Request $request){
        $post = Post::where('title','like','%'.$request->key.'%')->orderBy('created_at','desc')->get();
        return response()->json([
            'searchData'=>$post
        ]);
    }
    public function categorySearch(Request $request){
    //     $post = Post::select('posts.*','categories.title as category_title')
    //     ->leftJoin('categories','posts.category_id','categories.id')
    //   ->get();
    // $category = Category::select('posts.*')
    // ->join('posts','categories.id','posts.category_id')
    // ->where('categories.title','like','%'.$request->key.'%')->get();
    $category = Post::where('category_id',$request->key)->get();
       return response()->json([
        'category'=>$category
       ]);
    }

    public function postDetail(Request $request){
        $post = Post::where('id',$request->postId)->first();
        return response()->json([
            'post'=>$post
        ]);
    }

    public function viewCount(Request $request){
        $data = [
            'user_id' => $request->user_id,
            'post_id'=>$request->post_id
        ];
        ActionLog::create($data);

        $view_count = ActionLog::where('post_id',$request->post_id)->count();
        return response()->json([
            'view_count'=>$view_count
        ]);
    }

}
