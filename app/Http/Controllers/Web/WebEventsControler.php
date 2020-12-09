<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WebApi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WebEventsControler extends Controller
{
    private const ROUTE_PREFIX = 'api/events';
    //private const ROUTE_PREFIX = 'http://localhost:8000/api/events';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function index()
//    {
//        if (Auth::check()) {
//            //$statuses = Status::latest()->paginate(50);
//            // dd($statuses);
//            $i = new EventController();
//            $events = $i->getIndex(self::ROUTE_PREFIX);
//            return view('events.index', compact('events'));
//        } else return redirect('login');
//    }
    public function index()
    {
        $i = new WebApi();
        $events = $i->getIndex(self::ROUTE_PREFIX);
       // dd($events );
       // $events = Event::all();

        return view('events.index', compact($events));
    }
}
