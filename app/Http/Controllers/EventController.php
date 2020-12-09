<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
       // dd(Auth::user()->getRememberToken());
        //dd($event);
        return response($event, 200);
    }

    public function show(Request $request, $id)
    {

        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->EventControllerShow)){

            $event = Event::findOrFail($id);
            if (!empty($event)) {
                return response()->json($event, 200);
            } else {
                return response()->json(["message" => "Not found"], 404);
            }

        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }
    }

    public function store(Request $request)
    {
        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->EventControllerStore)){

            $event = new Event();
            $event->name = $request->name;
            $event->price = $request->price;
            $event->location = $request->location;
            $event->save();
            return response($event, 200);

        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }
    }

    public function update(Request $request, $id)
    {

        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->EventControllerUpdate)){

            $event = Event::findOrFail($id);
            if (!empty($event)) {
                $event->name = $request->name;
                $event->price = $request->price;
                $event->location = $request->location;
                $event->update();
                return response()->json($event, 201);
            } else {
                return response()->json(["message" => "Not found"], 404);
            }

        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }
    }

    public function destroy(Request $request, $id)
    {

        $roles=new ApiController();
        if (Auth::user() && in_array(Auth::user()->role,$roles->EventControllerDestroy)){

            $event = Event::findOrFail($id);
            if (!empty($event)) {
                $event->delete();
                return response()->json(["message" => "No content"], 204);
            } else {
                return response()->json(["message" => "Not found"], 404);
            }

        } else {
            return response()->json([
                'error' => 'Forbidden.'
            ], 403);
        }
    }
}
