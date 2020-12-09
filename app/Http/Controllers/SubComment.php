<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubComment extends Controller
{


//    public function index($subcomments_id)
//    {
//        //dd("dd");
//        $comments = DB::table('sub_comments')->where('sub_comments.comment_id',$subcomments_id)->get();
//        return response()->json($comments,200);
//    }
//
//    public function Show(Comment $comments, $event_id, $id)
//    {
//        //dd("dd");
//        $comments = DB::table('sub_comments')->where('comment_id', $event_id)->where('id', $id)->get()->first();
//        return response()->json($comments,200);
//
//    }
//
//    public function store($event_id, Request $request)
//    {
//            $comments = Comment::create($request->all() + ['event_id' => $event_id]);
//            return response()->json($comments, 201);
//
//
//    }

}
