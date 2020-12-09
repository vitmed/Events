<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organiser;
use Illuminate\Http\Request;

class OrganiserController extends Controller
{

    public function index()
    {
        $organiser = Organiser::all();
        //dd($event);
        return response($organiser, 200);
    }

    public function show(Request $request, $id)
    {
        $organiser = Organiser::findOrFail($id);
        if (!empty($organiser)) {
            return response()->json($organiser, 200);
        } else {
            return response()->json(["message" => "Not found"], 404);
        }
    }
    public function store(Request $request)
    {
        $organiser = new Organiser();
        $organiser->name = $request->name;
        $organiser->save();
        //dd($request);
        return response($organiser, 200);
    }

    public function update(Request $request, $id)
    {
        // $event = Event()->$this->update();
        $organiser = Organiser::findOrFail($id);
        //dd($request);
        if (!empty($organiser)) {
            $organiser->name = $request->name;
            $organiser->update();
            return response()->json($organiser, 201);
        } else {
            return response()->json(["message" => "Not found"], 404);
        }
    }
    public function destroy(Request $request, $id)
    {
        $organiser = Organiser::findOrFail($id);
        if (!empty($organiser)) {
            $organiser->delete();
            return response()->json(["message" => "No content"], 204);
        } else {
            return response()->json(["message" => "Not found"], 404);
        }
    }

}
