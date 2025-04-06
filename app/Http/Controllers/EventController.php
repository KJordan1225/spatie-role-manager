<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // List all events in database
    public function index()
    {
        $events = Event::all();
        $layout = $this->dynamicLayout();

        return view('events.index', compact('events','layout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layout = $this->dynamicLayout();

        return view('events.create', compact('layout'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string',
            'content' => 'nullable|string',
        ]);
    
        $input = $request->all();
    
        $event = Event::create($input);
        $layout = $this->dynamicLayout();
    
        return redirect()->route('event.index','layout')
                        ->with('success','Event created successfully');
    }


    public function dynamicLayout()
    {
        $role = Auth::user()->getRoleNames()->first();

        switch ($role) {
            case 'Admin':
                return 'layouts.adminDashboard';
            case 'Manager':
                return 'layouts.managerDashboard';
            case 'Brother':
                return 'layouts.brotherDashboard';
            default:
                return 'layouts.brotherDashboard';
            }

    } 


}
