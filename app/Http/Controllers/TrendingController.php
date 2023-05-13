<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendingController extends Controller
{
    public function trend(){
        $post = ActionLog::select('posts.*','categories.title as category_title',DB::raw('COUNT(action_logs.post_id) as post_count'))
        ->leftJoin('posts','posts.id','action_logs.post_id')
        ->leftJoin('categories','categories.id','posts.category_id')
        ->groupBy('action_logs.post_id')
        ->orderBy('post_count','desc')
        ->when(request('key'),function($query){
            $query->where('posts.title','like','%'.request('key').'%');
        })
        ->paginate(6);
        return view('admin.trend_posts.index',compact('post'));
    }
    public function trendDetails($id){
        $post = ActionLog::select('posts.*','categories.title as category_title',DB::raw('COUNT(action_logs.post_id) as post_count'))
        ->leftJoin('posts','posts.id','action_logs.post_id')
        ->leftJoin('categories','categories.id','posts.category_id')
        ->where('posts.id',$id)
        ->first();
        return view('admin.trend_posts.details',compact('post'));
    }
}
