<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlertRequest;
use App\Http\Resources\AlertResource;
use App\Models\Alert;
use App\Models\Event;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlertRequest $request)
    {
        $eventID = Event::where('original_id', $request->original_event_id)->first()->id;

        $this->authorize('create', [Alert::class, $eventID]);

        $alert = Alert::create(array_merge($request->all(), ['event_id' => $eventID]));

        return new AlertResource($alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlertRequest $request, $originalId)
    {
        $alert = Alert::where('original_alert_id', $originalId)->first();
        $this->authorize('update', $alert);
        $alert->update($request->all());

        return new AlertResource($alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($originalId)
    {
       $alert = Alert::where('original_alert_id', $originalId)->first();
       $this->authorize('delete', $alert);
       $alert->delete();

       return ['status' => 'OK'];
    }
}
