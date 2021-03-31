<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceRequest;
use App\Http\Resources\PlaceResource;
use App\Models\Event;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceRequest $request)
    {
        $eventID = Event::where('original_id', $request->original_event_id)->first()->id;

        $this->authorize('create', [Place::class, $eventID]);

        $place = Place::create(array_merge($request->all(), ['event_id' => $eventID]));

        return new PlaceResource($place);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaceRequest $request, $originalId)
    {
        $place = Place::where('original_place_id', $originalId)->first();
        $this->authorize('update', $place);
        $place->update($request->all());

        return new PlaceResource($place);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($originalId)
    {
        $place = Place::where('original_place_id', $originalId)->first();
        $this->authorize('delete', $place);
        $place->delete();

        return ['status' => 'OK'];
    }
}
