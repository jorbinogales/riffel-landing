<?php

namespace App\Http\Controllers;

use App\Models\Answering;
use Illuminate\Http\Request;
use App\Http\Requests\AnsweringRequest;
use App\Http\Resources\AnsweringResource;

class AnsweringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(AnsweringResource::collection(Answering::get()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AnsweringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnsweringRequest $request)
    {
        try {

            Answering::create($request->all());

            return $this->successFullResponse();

        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answering  $answering
     * @return \Illuminate\Http\Response
     */
    public function show(Answering $answering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answering  $answering
     * @return \Illuminate\Http\Response
     */
    public function edit(Answering $answering)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answering  $answering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answering $answering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answering  $answering
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answering $answering)
    {
        //
    }
}
