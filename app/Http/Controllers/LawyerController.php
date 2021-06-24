<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use Illuminate\Http\Request;
use App\Http\Requests\LawyerRequest;
use App\Http\Resources\LawyerResource;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(LawyerResource::collection(Lawyer::get()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LawyerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LawyerRequest $request)
    {
        try {

            Lawyer::create($request->validated());

            return $this->successFullResponse();
            
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function show(Lawyer $lawyer)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lawyer $lawyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lawyer $lawyer)
    {
        //
    }
}
