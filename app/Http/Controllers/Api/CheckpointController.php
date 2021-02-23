<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckpointRequest;
use App\Http\Resources\CheckpointResource;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckpointRequest $request)
    {
        $this->authorize('create', [Checkpoint::class, $request->event_id]);
        $checkpoint = Checkpoint::create($request->all());

        return new CheckpointResource($checkpoint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckpointRequest $request, Checkpoint $checkpoint)
    {
        $this->authorize('update', $checkpoint);
        $checkpoint->update($request->all());

        return new CheckpointResource($checkpoint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkpoint $checkpoint)
    {
       $this->authorize('delete', $checkpoint);
       $checkpoint->delete();

       return ['status' => 'OK'];
    }
}
