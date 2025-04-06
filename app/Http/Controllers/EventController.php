<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['lastFiveEventsIndex', 'showDetails']);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $event = Event::find($id);
        $layout = $this->dynamicLayout();

        return view('events.show',compact('event','layout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $event = Event::find($id);
        $layout = $this->dynamicLayout();
    
        return view('events.edit',compact('event','layout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string',
            'content' => 'nullable|string',
        ]);
    
        $input = $request->all();        
    
        $event = Event::find($id);
        $event->update($input);

        $layout = $this->dynamicLayout();
    
        return redirect()->route('event.index','layout')
                        ->with('success','Event updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        Event::find($id)->delete();
        $layout = $this->dynamicLayout();

        return redirect()->route('event.index','layout')
                        ->with('success','Event deleted successfully');
    }


    // Prepare list of events to display on public website
    public function lastFiveEventsIndex()
    {
        $events = Event::latest('start_date')->take(5)->get()->sortBy('start_date');
        $layout = 'layouts.guest';
        return view('guest_pages.last_five_list',compact('layout','events'));        
    }


    // Show details of event on public website
    public function showDetails($id)
    {
        $event = Event::find($id);
        $layout = 'layouts.guest';
        return view('guest_pages.event-details',compact('layout','event'));        
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
