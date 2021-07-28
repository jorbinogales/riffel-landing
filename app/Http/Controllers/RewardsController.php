<?php

namespace App\Http\Controllers;

use App\Models\Rewards;
use Illuminate\Http\Request;
use App\Http\Requests\Lawyer\RewardsRequest;

class RewardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Lawyer\RewardsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RewardsRequest $request)
    {
        try {

            Rewards::create($request->validated());

            return $this->successFullResponse();

        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rewards  $rewards
     * @return \Illuminate\Http\Response
     */
    public function show(Rewards $rewards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rewards  $rewards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rewards $rewards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rewards  $rewards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rewards $rewards)
    {
        //
    }
}
