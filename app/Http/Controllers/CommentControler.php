<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentControler extends Controller
{
    public function index($comments_id)
    {
        $comments = DB::table('comments')->where('comments.event_id',$comments_id)->get();
        return response()->json($comments,200);
    }

    public function show(Comment $comments, $event_id, $id)
    {
        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->CommentControllerShow)){
            $comments = DB::table('comments')->where('event_id', $event_id)->where('id', $id)->get()->first();
            return response()->json($comments,200);
        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }

    }


    public function store($event_id, Request $request)
    {
        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->CommentControllerStore)){
            $comments = Comment::create($request->all() + ['event_id' => $event_id]);
            return response()->json($comments, 201);
        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }

    }

    public function update(Request $request, $event_id, $id)
    {

        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->CommentControllerUpdate)){

            $comments = Comment::findOrFail($id);
            if (!empty($comments)) {
                if($comments->event_id == $event_id) {
                    $comments->text = $request->text;
                    $comments->save();
                    return response()->json($comments, 201);
                }
            }
            return response()->json(["message" => "Not found"], 404);

        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }

    }

    public function destroy(Request $request,$event_id, $id)
    {

        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->CommentControllerDestroy)){

            $comments = Comment::findOrFail($id);
            if (!empty($comments)) {
                if ($comments->event_id == $event_id) {
                    $comments->delete();
                    return response()->json(["message" => "No content"], 204);
                }
            }
            return response()->json(["message" => "Not found"], 404);
        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }
    }
}
