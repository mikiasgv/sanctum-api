<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventCollectionResource;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class CventController extends Controller
{
    // public function __construct() {
    //     $this->authorizeResource(Event::class, 'event');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('planner_id', auth()->user()->id)->get();

        return new EventCollectionResource($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = auth()->user()->events()->create($request->all());

        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('original_id', $id)->firstOrFail();

        $this->authorize('view', $event);

        $checkpoints = $event->checkpoints;
        $alerts = $event->alerts;
        $places = $event->places;
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $event = Event::where('original_id', $id)->firstOrFail();

        $this->authorize('update', $event);

        $event->update($request->all());
        $checkpoints = $event->checkpoints;
        $alerts = $event->alerts;
        $places = $event->places;

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::where('original_id', $id)->firstOrFail();

        $this->authorize('delete', $event);

        $event->delete();

        return ['status' => 'OK'];
    }

    public function allEvents()
    {
        $events = Event::all();

        return new EventCollectionResource($events);
    }
}
